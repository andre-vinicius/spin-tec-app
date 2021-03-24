<?php

namespace App\Services\UseCases\Cliente\AtualizarProduto;

/**
 * Class AtualizarProdutoCommand
 * @package App\Services\UseCases\Cliente\AtualizarProduto
 */
class AtualizarProdutoCommand
{

    /**
     * @var int
     */
    private $id;

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
     * AtualizarProdutoCommand constructor.
     * @param int $id
     * @param string $nome
     * @param float $valorUnitario
     * @param string $codigoBarras
     */
    public function __construct($id, $nome, $valorUnitario, $codigoBarras)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->valorUnitario = $valorUnitario;
        $this->codigoBarras = $codigoBarras;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
