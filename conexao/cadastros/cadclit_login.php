<?php

require_once("conexao/conexao.php");
 
// inserção no banco de dados
if(isset($_POST['first_name'])){

    $nome       = mysqli_escape_string($conecta, $_POST['first_name']);
    $email      = mysqli_escape_string($conecta, $_POST['email']);
    $senha      = mysqli_escape_string($conecta, $_POST['passwd']);
    $re_senha   = mysqli_escape_string($conecta, $_POST['re_password']);

    $insercao  = "INSERT INTO users (first_name, email, passwd, re_password) 
    VALUES ('$nome', '$email', '$senha', '$re_senha') ";

    $operacao_insercao = mysqli_query($conecta, $insercao);
    if(!$operacao_insercao){
        die("Erro no banco");
    }
}
/*
$select = "SELECT estadoID, estados ";
$select .= " FROM estados";
$lista_estados = mysqli_query($conecta, $select);
if (!$lista_estados) {
    print
    die("Erro no banco!!!");
}
?>*/