<?php

namespace App\Services\UseCases\Cliente\AtualizarCliente;

/**
 * Class AtualizarProdutoCommand
 * @package App\Services\UseCases\Cliente\AtualizarCliente
 */
class AtualizarClienteCommand
{

    /**
     * @var int
     */
    private $id;

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
    public function __construct($id, $nome, $cpf, $email)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
