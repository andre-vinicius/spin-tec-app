<?php

namespace App\Services\UseCases\Cliente\DeletarProduto;

use App\Models\Produto;
use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class DeletarProdutoHandler
 * @package App\Services\UseCases\Cliente\DeletarProduto
 */
class DeletarProdutoHandler extends ProdutoHandler
{

    /**
     * @param DeletarProdutoCommand $command
     */
    public function execute(DeletarProdutoCommand $command)
    {
        $id = $command->getId();

        /** @var Produto $produto */
        $produto = $this->produtoRepository->bucarPorId($id);

        $produto->setAtivo(false);

        $this->produtoRepository->atualizar($produto);
    }

}
