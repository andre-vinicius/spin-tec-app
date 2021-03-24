<?php

namespace App\Services\UseCases\Cliente\AtualizarProduto;

use App\Models\Produto;
use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class AtualizarProdutoHandler
 * @package App\Services\UseCases\Cliente\AtualizarProduto
 */
class AtualizarProdutoHandler extends ProdutoHandler
{

    /**
     * @param AtualizarProdutoCommand $command
     */
    public function execute(AtualizarProdutoCommand $command)
    {
        $id = $command->getId();
        $nome = $command->getNome();
        $codigoBarras = $command->getCodigoBarras();
        $valorUnitario = $command->getValorUnitario();

        $produto = $this->produtoRepository->bucarPorId($id);
        $produto->setNome($nome);
        $produto->setCodigoBarras($codigoBarras);
        $produto->setValorUnitario($valorUnitario);

        $this->produtoRepository->atualizar($produto);
    }

}
