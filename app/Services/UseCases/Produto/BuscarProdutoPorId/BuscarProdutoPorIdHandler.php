<?php

namespace App\Services\UseCases\Produto\BuscarProdutoPorId;

use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class BuscarProdutoPorIdHandler
 * @package App\Services\UseCases\Produto\BuscarProdutoPorId
 */
class BuscarProdutoPorIdHandler extends ProdutoHandler
{

    public function execute(BuscarProdutoPorIdCommand $command)
    {
        $id = $command->getId();

        return $this->produtoRepository->bucarPorId($id);
    }

}
