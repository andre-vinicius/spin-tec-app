<?php

namespace App\Services\UseCases\Produto\BuscarProdutoPorId;

/**
 * Class BuscarProdutoPorIdCommand
 * @package App\Services\UseCases\Produto\BuscarProdutoPorId
 */
class BuscarProdutoPorIdCommand
{

    /**
     * @var int
     */
    private $id;

    /**
     * BuscarProdutoPorIdCommand constructor.
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
