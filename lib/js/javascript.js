//Máscaras para cad. form.
VMasker(document.querySelector("#dataNascimento")).maskPattern("99/99/9999");
VMasker(document.querySelector("#cpf")).maskPattern("999.999.999-99");

//Retorno do root
function getRoot() {
    var root = "http://" + document.location.hostname + "/login_AMUBA/";
    return root;
}


function getCaptcha() {

    grecaptcha.ready(function () {
        grecaptcha.execute('6LeH3FMaAAAAABvRScbrgaZhFy0eThHJ9KZHSN_9', { action: 'homepage' }).then(function (token) {
            const gRecaptchaResponse = document.querySelector("#g-recaptcha-response").value = token;
        });
    });
}
getCaptcha();

//Ajax do formulário de cadastro
//$(function(){
$("#formCadastro").on("submit", function (event) {
    event.preventDefault();
    var dados = $(this).serialize();

    $.ajax({
        url: getRoot() + 'controllers/controllerCadastro',
        type: "POST",
        dataType: "json",
        data: dados,
        success: function (xhr) {
            $('.retornoCad').empty();
            //$(".retornoCad").append("Dados inseridos com sucesso!");
            if (xhr.retorno == 'erro') {
                getCaptcha();
                $.each(xhr.erros, function (key, value) {
                    $('.retornoCad').append(value + '<br>');
                });
            } else {
                $('.retornoCad').append('Dados inseridos com sucesso!');
            }
        }
        /*error: function (xhr) {
            $(".retornoCad").empty();
            getCaptcha();
            $.each(xhr.response.erros, function(key,value){
                $(".retornoCad").append(value + '<br>');
            });
            
        }*/
    });
    //return false;
});
//});