<?php

$validate=new Classes\ClassValidate();
$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email,"login");//pode ser qualquer action
$validate->validateStrongSenha($senha);
$validate->validateSenha($email,$senha);
var_dump($validate->getErro());