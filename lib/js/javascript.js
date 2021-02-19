//Máscaras para cad. form.
VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999");
VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99");

//Retorno do root
function getRoot() {
    var root = "http://" + document.location.hostname + "/login_AMUBA/";
    return root;
}


(function getCaptcha() {

    grecaptcha.ready(function () {
        grecaptcha.execute('6LeH3FMaAAAAABvRScbrgaZhFy0eThHJ9KZHSN_9', { action: 'homepage' }).then(function (token) {
            const gRecaptchaResponse = document.querySelector("#g-recaptcha-response").value = token;
        });
    });
}
    ());

//Ajax do formulário de cadastro
$(function(){
$("cadastro#formCadastro").on("submit", function (event) {
    event.preventDefault();
    dados = $(this).serialize();

    
     $.ajax({
            url: getRoot() + 'controllers/controllerCadastro',
            type: "POST",
            dataType: "json",
            data: dados,
            success: function (response) {
                console.log(response)
            }
            //error: function (response) {
                //console.log(response)
             // console.log("There was an error. Try again please!");
            //}
        });
        return false;
});
});