<?php

namespace App\Services\UseCases\Pedido\CadastrarPedido;

/**
 * Class CadastrarPedidoCommand
 * @package App\Services\UseCases\Pedido\CadastrarPedido
 */
class CadastrarPedidoCommand
{

    /**
     * @var int
     */
    private $idCliente;

    /**
     * @var int
     */
    private $idProduto;

    /**
     * @var int
     */
    private $quantidade;

    /**
     * CadastrarPedidoCommand constructor.
     * @param int $idCliente
     * @param int $idProduto
     * @param int $quantidade
     */
    public function __construct($idCliente, $idProduto, $quantidade)
    {
        $this->idCliente = $idCliente;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
    }

    /**
     * @return int
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @return int
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * @return int
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

}
