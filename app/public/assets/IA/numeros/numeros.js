// More API functions here:
    // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

    // the link to your model provided by Teachable Machine export panel
    const URL = "../assets/IA/numeros/";
    
    const camera = document.getElementById('camera');
    const identificado = document.getElementById('identificado');

    let model, webcam, labelContainer, maxPredictions;

    // Load the image model and setup the webcam
    async function init() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        // load the model and metadata
        // Refer to tmImage.loadFromFiles() in the API to support files from a file picker
        // or files from your local hard drive
        // Note: the pose library adds "tmImage" object to your window (window.tmImage)
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // Convenience function to setup a webcam
        const flip = true; // whether to flip the webcam
        webcam = new tmImage.Webcam(500, 300, flip); // width, height, flip
        await webcam.setup(); // request access to the webcam
        await webcam.play();
        window.requestAnimationFrame(loop);

        // append elements to the DOM
        document.getElementById("webcam-container").appendChild(webcam.canvas);
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) { // and class labels
            labelContainer.appendChild(document.createElement("div"));
        }


    }

    async function loop() {
        webcam.update(); // update the webcam frame
        await predict();
        window.requestAnimationFrame(loop);
    }

    // run the webcam image through the image model
    async function predict() {
        // predict can take in an image, video or canvas html element
        const prediction = await model.predict(webcam.canvas);
        for (let i = 0; i < maxPredictions; i++){
            if(prediction[i].probability.toFixed(2) >= (1.00)){
                const classPrediction = prediction[i].className;
                labelContainer.childNodes[i].innerHTML = classPrediction;

                camera.classList.add('active');
                identificado.classList.add('active');

            }else if(
                (prediction[0].probability.toFixed(2) < (1.00)) &
                (prediction[1].probability.toFixed(2) < (1.00)) &
                (prediction[2].probability.toFixed(2) < (1.00)) &
                (prediction[3].probability.toFixed(2) < (1.00)) &
                (prediction[4].probability.toFixed(2) < (1.00)) ){

                camera.classList.remove('active');
                identificado.classList.remove('active');
            }
            else{
                labelContainer.childNodes[i].innerHTML = '';
            }

        }
    }