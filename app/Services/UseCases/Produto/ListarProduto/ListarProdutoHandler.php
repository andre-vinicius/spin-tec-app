<?php

namespace App\Services\UseCases\Cliente\ListarProduto;

use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class ListarProdutoHandler
 * @package App\Services\UseCases\Cliente\ListarProduto
 */
class ListarProdutoHandler extends ProdutoHandler
{

    /**
     * @param ListarProdutoCommand $command
     */
    public function execute(ListarProdutoCommand $command)
    {
        $this->produtoRepository->listarTodos();
    }

}
