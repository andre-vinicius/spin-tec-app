<?php

namespace App\Services\UseCases\Pedido\AtualizarPedido;

/**
 * Class AtualizarPedidoCommand
 * @package App\Services\UseCases\Pedido\AtualizarPedido
 */
class AtualizarPedidoCommand
{

    /**
     * @var int
     */
    private $idPedido;

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
     * AtualizarPedidoCommand constructor.
     * @param int $idPedido
     * @param int $idCliente
     * @param int $idProduto
     * @param int $quantidade
     */
    public function __construct($idPedido, $idCliente, $idProduto, $quantidade)
    {
        $this->idPedido = $idPedido;
        $this->idCliente = $idCliente;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
    }

    /**
     * @return int
     */
    public function getIdPedido()
    {
        return $this->idPedido;
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
