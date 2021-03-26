<?php

namespace App\Services\UseCases\Produto\CadastrarProduto;

use App\Models\Produto;
use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class CadastrarProdutoHandler
 * @package App\Services\UseCases\Produto\CadastrarProduto
 */
class CadastrarProdutoHandler extends ProdutoHandler
{

    /**
     * @param CadastrarProdutoCommand $command
     * @return bool
     */
    public function execute(CadastrarProdutoCommand $command)
    {
        $nome = $command->getNome();
        $codigoBarras = $command->getCodigoBarras();
        $valorUnitario = $command->getValorUnitario();

        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setCodigoBarras($codigoBarras);
        $produto->setValorUnitario((float)$valorUnitario);
        $produto->setAtivo(false);

        return $this->produtoRepository->cadastrar($produto);
    }

}
