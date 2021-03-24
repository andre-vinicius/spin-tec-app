<?php

namespace App\Repositories;

use App\Models\Cliente;

/**
 * Class ClienteRepository
 * @package App\Repositories
 */
class ClienteRepository
{

    /**
     * @param Cliente $cliente
     */
    public function cadastrar(Cliente $cliente)
    {
        $cliente->save();
    }

    /**
     * @param Cliente $cliente
     */
    public function atualizar(Cliente $cliente)
    {
        $cliente->save();
    }

    /**
     * Listar todos os clientes
     */
    public function listarTodos()
    {
        return Cliente::all();
    }

    /**
     * @param int $id
     */
    public function buscaId(int $id)
    {
        return Cliente::find($id);
    }

    public function buscarPorCpf(string $cpf)
    {

    }

    public function buscarPorEmail(string $email)
    {

    }

}
