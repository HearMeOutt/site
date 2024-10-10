// !MASK!
$(document).ready(function () {
    // Adicionando máscara ao campo de telefone
    $("#telefone").mask("(00)00000-0000");

    // Adicionando máscara ao campo de CPF
    // $("#CEP").mask("00000-000");

    // Adicionando máscara ao campo de data de nascimento
    //$("#data_nascimento").mask("00/00/0000");

    //$("#CPF").mask("000.000.000-00");
});

const form = document.querySelector("#forms_cadastro");

const nome = document.querySelector("#nome");
const spanNome = document.getElementById('span_nome');
const spanNomeErrado = document.getElementById('span_nome_errado');

const email = document.querySelector("#email");
const spanEmail = document.getElementById('span_email');
const spanEmailValido = document.getElementById('span_email_valido');

const telefone = document.querySelector("#telefone");
const spanTelefone = document.getElementById('span_telefone');
const spanTelefoneValido = document.getElementById('span_telefone_valido');

const senha = document.querySelector("#senha");
const spanSenha = document.getElementById('span_senha');
const spanSenhaValida = document.getElementById('span_senha_valida');
const spanSenhaSegura = document.getElementById('span_senha_segura');

const confirmarSenha = document.querySelector("#confirmar_senha");
const spanConfirmarSenha = document.getElementById('span_confirmar_senha');
const spanSenhaDiferente = document.getElementById('span_senha_diferente');

let politica_privacidade = document.getElementById("politica_privacidade");
const spanPolitica_privacidade = document.getElementById('span_politica_privacidade');

form.addEventListener("submit", (event) =>{

    event.preventDefault();

    var condicaoNome = false;
    var condicaoEmail = false;
    var condicaoTelefone = false
    var condicaoSenha = false;
    var condicaoConfirmarSenha = false;
    var condicaoTermos = false;

    //!verificar se o nome está vazio
    if(nome.value ===""){
        nome.classList.add('active');
        spanNome.classList.add('active');
    }else{
        nome.classList.remove('active');
        spanNome.classList.remove('active');

        //!Verificar se o nome tem mais de 3 letras
        if(nome.value.length < 3){
            nome.classList.add('active');
            spanNomeErrado.classList.add('active');
        }else{
            nome.classList.remove('active');
            spanNomeErrado.classList.remove('active');

            condicaoNome = true;
        }
    }

    //!verificar se o email está vazio
    if(email.value ===""){
        email.classList.add('active');
        spanEmail.classList.add('active');
    }else{
        email.classList.remove('active');
        spanEmail.classList.remove('active');
        //!Verificar se o email é valido
        if(!isEmailValid(email.value)){
            email.classList.add('active');
            spanEmailValido.classList.add('active');
        }else{
            email.classList.remove('active');
            spanEmailValido.classList.remove('active');

            condicaoEmail = true;
        }
    }

    //!verificar se o telefone está vazio
    if(telefone.value === ""){
        telefone.classList.add('active');
        spanTelefone.classList.add('active');
    }else{
        telefone.classList.remove('active');
        spanTelefone.classList.remove('active');

        //!Verificar se o telefone contém 14 dígitos (11 dígitos mais os () e o -)
        if(telefone.value.length != 14){
            telefone.classList.add('active');
            spanTelefoneValido.classList.add('active');
        }else{
            telefone.classList.remove('active');
            spanTelefoneValido.classList.remove('active');

            condicaoTelefone = true;
        }
    }

    //!verificar se a senha está vazio
    if(senha.value ===""){
        senha.classList.add('active');
        spanSenha.classList.add('active');
    }else{
        senha.classList.remove('active');
        spanSenha.classList.remove('active');
        //!verificar se a senha tem no mínimo 8 dígitos
        if(!validarSenha(senha.value, 8)){
            senha.classList.add('active');
            spanSenhaValida.classList.add('active');
        }else{
            senha.classList.remove('active');
            spanSenhaValida.classList.remove('active');

            //!Verificar se a senha esta segura
            if(!validarSenhaSegura(senha.value)){
                senha.classList.add('active');
                spanSenhaSegura.classList.add('active');
            }else{
                senha.classList.remove('active');
                spanSenhaSegura.classList.remove('active');

                condicaoSenha = true;
            }
        }
    }
    
    //!verificar se a confirmção de senha está vazio
    if(confirmarSenha.value ===""){
        confirmarSenha.classList.add('active');
        spanConfirmarSenha.classList.add('active');
    }else{
        confirmarSenha.classList.remove('active');
        spanConfirmarSenha.classList.remove('active');
        //!Verificar se a confirmação de senha é igual a senha
        if(!validarSenhaDiferente(senha.value, confirmarSenha.value)){
            confirmarSenha.classList.add('active');
            spanSenhaDiferente.classList.add('active');
        }else{
            confirmarSenha.classList.remove('active');
            spanSenhaDiferente.classList.remove('active');

            condicaoConfirmarSenha = true;
        }
    }

    //!Verificar se a politica de privacidade está vazio
    if(politica_privacidade.checked){
        spanPolitica_privacidade.classList.remove('active');
        condicaoTermos = true;
    }else{
        spanPolitica_privacidade.classList.add('active'); 
    }

   
    if(condicaoNome & condicaoEmail & condicaoTelefone & condicaoSenha & condicaoConfirmarSenha & condicaoTermos){
        form.submit();
    }

    
});



//Função que valida email
function isEmailValid(email){
    //Criar uma regex para validar email
    const emailRegex = new RegExp(
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    );
    if(emailRegex.test(email)){
        return true;
    }

    return false;
}

//Função que valida a senha
function validarSenha(senha, minDigts){
    if(senha.length >= minDigts){
        return true;
    }

    return false;
}
function validarSenhaDiferente(senha, confirmarSenha){
    if(senha === confirmarSenha){
        return true;
    }

    return false;
}

//Função para validar se a senha é segura
function validarSenhaSegura(senha){
 var retorno = false;
 var letrasMaiusculas = /[A-Z]/;
 var letrasMinusculas = /[a-z]/; 
 var numeros = /[0-9]/;
 var caracteresEspeciais = /[!|@|#|$|%|^|&|*|(|)|-|_]/;
 var auxMaiuscula = 0;
 var auxMinuscula = 0;
 var auxNumero = 0;
 var auxEspecial = 0;
 for(var i=0; i<senha.length; i++){
 if(letrasMaiusculas.test(senha[i]))
 auxMaiuscula++;
 else if(letrasMinusculas.test(senha[i]))
 auxMinuscula++;
 else if(numeros.test(senha[i]))
 auxNumero++;
 else if(caracteresEspeciais.test(senha[i]))
 auxEspecial++;
 }
 if (auxMaiuscula > 0){
 if (auxMinuscula > 0){
 if (auxNumero > 0){
 if (auxEspecial) {
 retorno = true;
 }
 }
 }
 }
 
console.log(retorno);
 return retorno;
}


//!olho para ver a senha
const olho = document.getElementById('olho');
const olhoconfirmar= document.getElementById('olhoconfirmar');
function versenha(){
    if(senha.getAttribute('type') == 'password'){
        senha.setAttribute('type','text');
        olho.classList.add('fa-eye');
    }else{
        senha.setAttribute('type','password');
        olho.classList.remove('fa-eye');
    }
}
function verconfirmarsenha(){
    if(confirmarSenha.getAttribute('type') == 'password'){
        confirmarSenha.setAttribute('type','text');
        olhoconfirmar.classList.add('fa-eye');
    }else{
        confirmarSenha.setAttribute('type','password');
        olhoconfirmar.classList.remove('fa-eye');
    }
}