<?php

namespace App\Services\UseCases\Cliente\DeletarProduto;

/**
 * Class DeletarProdutoCommand
 * @package App\Services\UseCases\Cliente\DeletarProduto
 */
class DeletarProdutoCommand
{

    /**
     * @var int
     */
    private $id;

    /**
     * DeletarProdutoCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
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
