<?php

namespace App\Services\UseCases\Pedido;

use App\Repositories\PedidoRepository;

/**
 * Class PedidoHandler
 * @package App\Services\UseCases\Pedido
 */
class PedidoHandler
{

    /**
     * @var PedidoRepository
     */
    protected $pedidoRepository;

    /**
     * PedidoHandler constructor.
     */
    public function __construct()
    {
        $this->pedidoRepository = new PedidoRepository();
    }

}
