<?php

namespace App\Services\UseCases\Cliente\BuscarClientePeloCPF;

/**
 * Class BuscarClientePeloCPFCommand
 * @package App\Services\UseCases\Cliente\BuscarClientePeloCPF
 */
class BuscarClientePeloCPFCommand
{

    /**
     * @var
     */
    private $cpf;

    /**
     * CadastrarProdutoCommand constructor.
     * @param $cpf
     */
    public function __construct($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

}
