<?php

namespace App\Services\UseCases\Produto\CadastrarProduto;

/**
 * Class CadastrarProdutoCommand
 * @package App\Services\UseCases\Produto\CadastrarProduto
 */
class CadastrarProdutoCommand
{

    /**
     * @var string
     */
    private $nome;

    /**
     * @var float
     */
    private $valorUnitario;

    /**
     * @var string
     */
    private $codigoBarras;

    /**
     * CadastrarProdutoCommand constructor.
     * @param $nome
     * @param $valorUnitario
     * @param $codigoBarras
     */
    public function __construct($nome, $valorUnitario, $codigoBarras)
    {
        $this->nome = $nome;
        $this->valorUnitario = $valorUnitario;
        $this->codigoBarras = $codigoBarras;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return float
     */
    public function getValorUnitario()
    {
        return $this->valorUnitario;
    }

    /**
     * @return string
     */
    public function getCodigoBarras()
    {
        return $this->codigoBarras;
    }

}
