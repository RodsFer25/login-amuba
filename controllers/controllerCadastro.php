<?php

$validate=new Classes\ClassValidate();
$validate->validateFields($_POST);
$validate->validateEmail($email);
$validate->validateIssetEmail($email);
$validate->validateData($dataNascimento);
$validate->validateCpf($cpf);
$validate->validateConfSenha($senha,$senhaConf);
$validate->validateStrongSenha($senha);
$validate->validateCaptcha($gRecaptchaResponse);
/*$validate->validateFinalCad($arrResponse);*/
$validate->validateFinalCad($arrVar);