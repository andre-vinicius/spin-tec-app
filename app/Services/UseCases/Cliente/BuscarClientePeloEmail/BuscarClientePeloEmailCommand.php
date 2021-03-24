<?php

namespace App\Services\UseCases\Cliente\BuscarClientePeloEmail;

/**
 * Class BuscarClientePeloEmailCommand
 * @package App\Services\UseCases\Cliente\BuscarClientePeloEmail
 */
class BuscarClientePeloEmailCommand
{

    /**
     * @var string
     */
    private $email;

    /**
     * CadastrarProdutoCommand constructor.
     * @param string $email
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

}
