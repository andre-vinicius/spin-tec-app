<?php

namespace App\Services\UseCases\Produto\BuscarProdutoPeloCodigo;

/**
 * Class BuscarProdutoPeloCodigoCommand
 * @package App\Services\UseCases\Produto\BuscarProdutoPeloCodigo
 */
class BuscarProdutoPeloCodigoCommand
{

    /**
     * @var string
     */
    private $codigoBarras;

    /**
     * BuscarProdutoPeloCodigoCommand constructor.
     * @param string $codigoBarras
     */
    public function __construct($codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
    }

    /**
     * @return string
     */
    public function getCodigoBarras(): string
    {
        return $this->codigoBarras;
    }

}
