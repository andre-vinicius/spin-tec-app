<?php

namespace App\Services\UseCases\Cliente;

use App\Repositories\ClienteRepository;

/**
 * Class ClienteHandler
 * @package App\Services\UseCases\Cliente
 */
abstract class ClienteHandler
{

    /**
     * @var ClienteRepository
     */
    protected $clienteRepository;

    /**
     * ClienteHandler constructor.
     */
    public function __construct()
    {
        $this->clienteRepository = new ClienteRepository();
    }

}
