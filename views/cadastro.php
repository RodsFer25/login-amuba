<?php \Classes\ClassLayout::setHead('Cadastro', 'Realize seu cadastro!'); ?>

<div class="topFaixa float w100 center">
    Cadastro de Cliente
</div>

<div class="retornoCadErro" style="
    padding: 5px;
    border-color: #e8273b; 
    color: #FFF; 
    background-color: #ed5565;">

</div>

<div class="retornoCadSuccess" style="
    padding: 5px;
    border-color: #87c940;
	color: #FFF;
	background-color: #a0d468;">

</div>

<form name="formCadastro" id="formCadastro" action="<?php echo DIRPAGE . 'controllers/controllerCadastro' ?>" method="post">
    <div class="cadastro float center">
        <input class="float w100 h40" type="text" id="nome" name="nome" placeholder="Nome:" >
        <input class="float w100 h40" type="email" id="email" name="email" placeholder="Email:" >
        <input class="float w100 h40" type="text" id="cpf" name="cpf" placeholder="CPF:" >
        <input class="float w100 h40" type="text" id="dataNascimento" name="dataNascimento" placeholder="Data de Nascimento:" >
        <input class="float w100 h40" type="password" id="senha" name="senha" placeholder="Senha:" >
        <input class="float w100 h40" type="password" id="senhaConf" name="senhaConf" placeholder="Confirme sua senha:" >
        <input class="float w100 h40" type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" >
        <input class="inlineBlock h40" type="submit" value="Cadastrar">
   </div>
</form>

<?php \Classes\ClassLayout::setFooter(); ?>