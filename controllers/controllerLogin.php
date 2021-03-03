<?php
namespace Classes;

use Classes\ClassValidate;
$validate=new ClassValidate();
$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email,"login");
$validate->validateStrongSenha($senha);
$validate->validateSenha($email,$senha);
var_dump($validate->getErro());