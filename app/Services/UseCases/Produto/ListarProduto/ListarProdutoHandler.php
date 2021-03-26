<?php

namespace App\Services\UseCases\Produto\ListarProduto;

use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class ListarProdutoHandler
 * @package App\Services\UseCases\Produto\ListarProduto
 */
class ListarProdutoHandler extends ProdutoHandler
{

    /**
     * @param ListarProdutoCommand $command
     * @return \App\Models\Produto[]|\Illuminate\Database\Eloquent\Collection
     */
    public function execute(ListarProdutoCommand $command)
    {
        return $this->produtoRepository->listarTodos();
    }

}
