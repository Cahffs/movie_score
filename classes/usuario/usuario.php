<?php
class Usuario
{
    public $cod;
    public $nome;
    public $login;
    public $senha;

    public function __construct($cod, $nome, $login, $senha)
    {
        $this->cod = $cod;
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
    }

    public function validaUsuarioSenha($login, $senha)
    {
        return $this->login === $login && $this->senha === $senha;
    }
}
?>