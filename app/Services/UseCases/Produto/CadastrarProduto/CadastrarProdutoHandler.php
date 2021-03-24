<?php

namespace App\Services\UseCases\Cliente\CadastrarProduto;

use App\Models\Produto;
use App\Services\UseCases\Produto\ProdutoHandler;

/**
 * Class CadastrarProdutoHandler
 * @package App\Services\UseCases\Cliente\CadastrarProduto
 */
class CadastrarProdutoHandler extends ProdutoHandler
{

    /**
     * @param CadastrarProdutoCommand $command
     */
    public function execute(CadastrarProdutoCommand $command)
    {
        $nome = $command->getNome();
        $codigoBarras = $command->getCodigoBarras();
        $valorUnitario = $command->getValorUnitario();

        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setCodigoBarras($codigoBarras);
        $produto->setValorUnitario($valorUnitario);

        $this->produtoRepository->cadastrar($produto);
    }

}
