<?php
//passo 1
$servidor   = "localhost"; //servidor local
$usuario    = "root";      //usuario de acesso ao banco de dados
$senha      = "";          //senha de acesso do XAMPP
$banco      = "login_amuba";     //nome do banco
$conecta    = mysqli_connect($servidor, $usuario, $senha, $banco);

//passo 2 - verificar erros
if (mysqli_connect_errno()) {
    die("Conexão falhou: " . mysqli_connect_errno());
}
