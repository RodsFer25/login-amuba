<?php

namespace Classes;

use Models\ClassCadastro;
use ZxcvbnPhp\Zxcvbn;

class ClassValidate
{

    private $erro = [];
    private $cadastro;

    public function __construct()
    {
        $this->cadastro = new ClassCadastro();
    }

    public function getErro()
    {
        return $this->erro;
    }

    public function setErro($erro)
    {
        array_push($this->erro, $erro);
    }

    #Validar se os campos desejados foram preenchidos
    public function validateFields($par)
    {
        $i = 0;
        foreach ($par as $key => $value) {
            if (empty($value)) {
                $i++;
            }
        }
        if ($i == 0) {
            return true;
        } else {
            $this->setErro("Preencha todos os dados!");
            return false;
        }
    }

    #Validação se o dado é um email
    public function validateEmail($par)
    {
        if (filter_var($par, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->setErro("Email inválido!");
        }
    }

    #Validar se o email existe no banco de dados (action -> null: para cadastro)
    public function validateIssetEmail($email, $action = null)
    {
        $b = $this->cadastro->getIssetEmail($email);

        if ($action == null) {
            if ($b > 0) {
                $this->setErro("Email já cadastrado!");
                return false;
            } else {
                return true;
            }
        } else {
            if ($b > 0) {
                return true;
            } else {
                $this->setErro("Email não cadastrado!");
                return false;
            }
        }
    }

    #Validação se o dado é uma data
    public function validateData($par)
    {
        $data = \DateTime::createFromFormat("d/m/Y", $par);
        if (($data) && ($data->format("d/m/Y") === $par)) {
            return true;
        } else {
            $this->setErro("Data inválida!");
            return false;
        }
    }

    #Validação se o dado é um CPF
    public function validateCpf($par)
    {
        // Extrai somente os números
        $cpf = preg_replace("/[^0-9]/is", '', $par);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            $this->setErro("CPF Inválido!");
            return false;
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $this->setErro("CPF Inválido!");
            return false;
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    #Verificar se a senha e senhaConf são iguais
    public function validateConfSenha($senha, $senhaConf)
    {
        if ($senha === $senhaConf) {
            return true;
        } else {
            $this->setErro("Senha diferente de confirmação de senha!");
        }
    }

    #verificar a força da senha
    public function validateStrongSenha($senha, $par = null)
    {
        $zxcvbn = new Zxcvbn;
        $weak = $zxcvbn->passwordStrength($senha);
        echo $weak['score']; // will print 0

        $strong = $zxcvbn->passwordStrength($senha);
        echo $strong['score']; // will print 4

        if ($par == null) {
            if ($strong['score'] >= 3) {
                return true;
            } else {
                $this->setErro("Utilize uma senha mais forte!");
            }
        } else {
            /*login*/
        }
    }

    #Verificação da Senha digitada com o hash no banco de dados
    public function validateSenha($email, $senha)
    {
        # code...
    }

    public function validateCaptcha($captcha, $score = 0.5)
    {
        $return = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . SECRETKEY . "&response={$captcha}");
        $response = json_decode($return);
        if ($response->success == true && $response->score >= $score) {
            return true;
        } else {
            $this->setErro("Captcha Inválido! Recarregue a página!");
        }
    }

    #Validação Final do cadastro
    public function validateFinalCad($arrVar)
    {
        if (count($this->getErro()) > 0) {
            $arrResponse = [
                "retorno" => "erro",
                "erros" => $this->getErro()
            ];
        } else {
            /*$this->cadastro->insertCad($arrVar);*/
        }
        return ($arrResponse);
    }
}
