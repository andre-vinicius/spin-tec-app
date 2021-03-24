<?php

namespace App\Services\UseCases\Produto\BuscarProdutoPeloCodigo;

/**
 * Class BuscarProdutoPeloNomeCommand
 * @package App\Services\UseCases\Produto\BuscarProdutoPeloCodigo
 */
class BuscarProdutoPeloNomeCommand
{

    /**
     * @var string
     */
    private $nome;

    /**
     * BuscarProdutoPeloNomeCommand constructor.
     * @param string $nome
     */
    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

}
