<?php


#Caminhos absolutos
$pastaInterna = "login_AMUBA/";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");#http://localhost/login_AMUBA/

(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') ? $barra = "" : $barra = "/";

define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");


#Atalhos
define('DIRIMG', DIRPAGE . 'img/');#DIRIMG = login_AMUBA/img/
define('DIRCSS', DIRPAGE . 'lib/css/');
define('DIRJS', DIRPAGE . 'lib/js/');


#Acesso ao Banco de Dados/Data Base
define('HOST', "localhost");
define('DB', "sistema");
define('USER', "root");
define('PASS', "");

#outras Informações
define("SITEKEY","6LeH3FMaAAAAABvRScbrgaZhFy0eThHJ9KZHSN_9");
define("SECRETKEY","6LeH3FMaAAAAAHEZrzau4ycQiiC0V90OOdNyin_4");
