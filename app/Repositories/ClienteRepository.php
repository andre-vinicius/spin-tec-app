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
     * @return bool
     */
    public function cadastrar(Cliente $cliente)
    {
        return $cliente->save();
    }

    /**
     * @param Cliente $cliente
     * @return bool
     */
    public function atualizar(Cliente $cliente)
    {
        return $cliente->save();
    }

    /**
     * Listar todos os clientes
     *
     * @return Cliente[]|\Illuminate\Database\Eloquent\Collection
     */
    public function listarTodos()
    {
        return Cliente::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function buscaPorId(int $id)
    {
        return Cliente::find($id);
    }

    /**
     * @param string $cpf
     * @return mixed
     */
    public function buscarPorCpf(string $cpf)
    {
        return Cliente::where('cpf', $cpf);
    }

    /**
     * @param string $email
     * @return mixed
     */
    public function buscarPorEmail(string $email)
    {
        return Cliente::where('email', $email);
    }

}
