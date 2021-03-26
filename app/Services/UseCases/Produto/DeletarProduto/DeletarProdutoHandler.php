<?php

namespace App\Services\UseCases\Produto\DeletarProduto;

use App\Models\Produto;
use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class DeletarProdutoHandler
 * @package App\Services\UseCases\Produto\DeletarProduto
 */
class DeletarProdutoHandler extends ProdutoHandler
{

    /**
     * @param DeletarProdutoCommand $command
     * @return bool
     */
    public function execute(DeletarProdutoCommand $command)
    {
        $id = $command->getId();

        /** @var Produto $produto */
        $produto = $this->produtoRepository->bucarPorId($id);

        $produto->setAtivo(false);

        return $this->produtoRepository->atualizar($produto);
    }

}
