// More API functions here:
// https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

// the link to your model provided by Teachable Machine export panel
const letters = [
    "AB",
    "CD",
    "EF",
    "GI",
    "LM",
    "NO",
    "PQ",
    "RS",
    "TU",
    "VW",
    "Y"
    // adicione mais letras conforme necessário
];

let currentLetterIndex = 0;
let model, webcam, labelContainer, maxPredictions;

// Função para inicializar o modelo e a webcam
async function init() {
    const currentLetter = letters[currentLetterIndex];
    const modelURL = `../assets/IA/Alfabeto em libras/${currentLetter}/model.json`;
    const metadataURL = `../assets/IA/Alfabeto em libras/${currentLetter}/metadata.json`;

    // Atualiza as imagens correspondentes à letra atual
    const imageElement1 = document.getElementById('letra-imagem1');
    const imageElement2 = document.getElementById('letra-imagem2');

    // Atualiza as fontes das imagens com base nas letras
    imageElement1.src = `../assets/img/alfabeto/${currentLetter[0]}.png`; // A.png
    imageElement2.src = `../assets/img/alfabeto/${currentLetter[1]}.png`; // B.png

    // Carregar o modelo e metadados
    model = await tmImage.load(modelURL, metadataURL);
    maxPredictions = model.getTotalClasses();

    // Configurar a webcam
    const flip = true; // se deve inverter a webcam
    webcam = new tmImage.Webcam(500, 300, flip); // largura, altura, inverter
    await webcam.setup(); // solicitar acesso à webcam
    await webcam.play();
    window.requestAnimationFrame(loop);

    // Limpar o contêiner da webcam antes de adicionar a nova câmera
    const webcamContainer = document.getElementById("webcam-container");
    webcamContainer.innerHTML = ""; // Limpa o conteúdo anterior
    webcamContainer.appendChild(webcam.canvas); // Adiciona a nova câmera

    // Obter e limpar o contêiner de rótulos
    labelContainer = document.getElementById("label-container");
    if (labelContainer) { // Verifica se o contêiner de rótulos existe
        // Limpa o conteúdo anterior das previsões
        for (let i = 0; i < maxPredictions; i++) {
            if (!labelContainer.childNodes[i]) {
                labelContainer.appendChild(document.createElement("div")); // Cria novo elemento se não existir
            }
            labelContainer.childNodes[i].innerHTML = ""; // Limpa o conteúdo anterior
        }
    } else {
        console.error("Contêiner de rótulos não encontrado.");
    }
}



async function loop() {
    webcam.update(); // update the webcam frame
    await predict();
    window.requestAnimationFrame(loop);
}

// run the webcam image through the image model
async function predict() {
    const camera = document.getElementById('camera');
    const identificado = document.getElementById('identificado');
    
    // Predição pode ser feita em uma imagem, vídeo ou elemento canvas
    const prediction = await model.predict(webcam.canvas);

    // Inicializa uma variável para verificar se algum sinal é identificado
    let signalIdentified = false;

    for (let i = 0; i < maxPredictions; i++) {
        // Se a probabilidade for 1.00 ou mais, identificamos a classe
        if (prediction[i].probability.toFixed(2) >= 1.00) {
            const classPrediction = prediction[i].className;
            labelContainer.childNodes[i].innerHTML = classPrediction;

            // Define que um sinal foi identificado
            signalIdentified = true;
        } else {
            // Limpa a classe se a probabilidade não atender aos critérios
            labelContainer.childNodes[i].innerHTML = '';
        }
    }

    // Atualiza a visibilidade da câmera e do identificado baseado na previsão
    if (signalIdentified) {
        camera.classList.add('active');
        identificado.classList.add('active');
    } else {
        camera.classList.remove('active');
        identificado.classList.remove('active');
    }
}


// Navegar para a próxima letra
function nextLetter() {
    if (currentLetterIndex < letters.length - 1) {
        currentLetterIndex++;
        init(); // Recarregar o modelo da próxima letra
    }
    updateButtonVisibility(); // Atualiza a visibilidade dos botões
}

// Navegar para a letra anterior
function previousLetter() {
    if (currentLetterIndex > 0) {
        currentLetterIndex--;
        init(); // Recarregar o modelo da letra anterior
    }
    updateButtonVisibility(); // Atualiza a visibilidade dos botões
}

// Função para atualizar a visibilidade dos botões
function updateButtonVisibility() {
    const prevButton = document.getElementById("prevButton");
    const nextButton = document.getElementById("nextButton");

    // Oculta o botão de letra anterior se estiver na primeira letra
    if (currentLetterIndex === 0) {
        prevButton.style.display = "none"; // Esconde o botão
    } else {
        prevButton.style.display = "block"; // Mostra o botão
    }

    // Oculta o botão de próxima letra se estiver na última letra
    if (currentLetterIndex === letters.length - 1) {
        nextButton.style.display = "none"; // Esconde o botão
    } else {
        nextButton.style.display = "block"; // Mostra o botão
    }
}

// Chame esta função uma vez ao carregar a página para definir a visibilidade correta
updateButtonVisibility();