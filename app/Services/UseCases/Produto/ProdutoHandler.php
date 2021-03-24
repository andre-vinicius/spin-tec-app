<?php

namespace App\Services\UseCases\Produto;

use App\Repositories\ProdutoRepository;

/**
 * Class ProdutoHandler
 * @package App\Services\UseCases\Produto
 */
class ProdutoHandler
{

    /**
     * @var ProdutoRepository
     */
    protected $produtoRepository;

    /**
     * ProdutoHandler constructor.
     */
    public function __construct()
    {
        $this->produtoRepository = new ProdutoRepository();
    }

}
