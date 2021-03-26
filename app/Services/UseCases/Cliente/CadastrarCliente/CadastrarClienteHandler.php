<?php

namespace App\Services\UseCases\Cliente\CadastrarCliente;

use App\Exceptions\UseCases\ValidacaoException;
use App\Models\Cliente;
use App\Services\UseCases\Cliente\ClienteHandler;

/**
 * Class CadastrarProdutoHandler
 * @package App\Services\UseCases\Cliente\CadastrarCliente
 */
class CadastrarClienteHandler extends ClienteHandler
{

    /**
     * @param CadastrarClienteCommand $command
     * @throws ValidacaoException
     */
    public function execute(CadastrarClienteCommand $command)
    {
        $nome = $command->getNome();
        $cpf = $command->getCpf();
        $email = $command->getEmail();

        /**
         * Validações
         */
        if(mb_strlen($nome) > 100) {
            throw new ValidacaoException('O nome deve possuir no máximo 100 caracteres!');
        }

        if(preg_match('/^[0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}$/', $cpf) === false) {
            throw new ValidacaoException('O CPF não é válido!');
        }


        if(preg_match('/^[^0-9][_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) === false) {
            throw new ValidacaoException('O e-mail não é válido!');
        }

        $cliente = new Cliente();
        $cliente->setNome($nome);
        $cliente->setCpf($cpf);
        $cliente->setEmail($email);
        $cliente->setAtivo(true);

        $this->clienteRepository->cadastrar($cliente);
    }

}
