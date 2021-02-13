<?php \Classes\ClassLayout::setHead('Login', 'Realize seu Login.', '');

//$url = isset($_GET['url']) ? $_GET['url'] : '' 
?>


<div class="fundo">
</div>

<form name="formLogin" id="formLogin" action="<?php echo DIRPAGE . 'controllers/controllerLogin'; ?>">
    <div class="login">
        <div class="loginLogomarca float center w100">
            <img style="width: 300px;" src="<?php echo DIRPAGE . 'img/screenshot_2.png'; ?>" alt="Logo Marca - AMUBA">
        </div>

        <div class="loginFormulario float center w100">
            <input class="float w100 h40" type="email" name="email" id="email" placeholder="Email:" required>
            <input class="float w100 h40" type="password" name="password" id="password" placeholder="Senha:" required>
            <input class="float h40 center" type="submit" value="Entrar">
            <div class="loginTextos float center"><a href="<?php echo DIRPAGE . 'esqueci-minha-senha'; ?>"> Esqueci minha senha. </a></div>
        </div>
    </div>
</form>

<?php \Classes\ClassLayout::setFooter(); ?>