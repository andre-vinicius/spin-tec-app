<?php

namespace App\Services\UseCases\Cliente\CadastrarCliente;

/**
 * Class CadastrarProdutoCommand
 * @package App\Services\UseCases\Cliente\CadastrarCliente
 */
class CadastrarClienteCommand
{

    /**
     * @var
     */
    private $nome;

    /**
     * @var
     */
    private $cpf;

    /**
     * @var string
     */
    private $email;

    /**
     * CadastrarProdutoCommand constructor.
     * @param $nome
     * @param $cpf
     * @param string $email
     */
    public function __construct($nome, $cpf, $email)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

}
