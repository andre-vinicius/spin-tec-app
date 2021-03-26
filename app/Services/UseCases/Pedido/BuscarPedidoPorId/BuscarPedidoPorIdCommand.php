<?php

namespace App\Services\UseCases\Pedido\BuscarPedidoPorId;

/**
 * Class BuscarPedidoPorIdCommand
 * @package App\Services\UseCases\Pedido
 */
class BuscarPedidoPorIdCommand
{

    /**
     * @var int
     */
    private $id;

    /**
     * BuscarPedidoPorIdCommand constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
