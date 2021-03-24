<?php

namespace App\Services\UseCases\Cliente\DeletarCliente;

/**
 * Class DeletarProdutoCommand
 * @package App\Services\UseCases\Cliente\DeletarCliente
 */
class DeletarClienteCommand
{

    /**
     * @var int
     */
    private $id;

    /**
     * DeletarProdutoCommand constructor.
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
