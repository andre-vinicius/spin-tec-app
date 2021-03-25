<?php

namespace App\Repositories;

use App\Models\Produto;

/**
 * Class ProdutoRepository
 * @package App\Repositories
 */
class ProdutoRepository
{

    /**
     * @param Produto $produto
     * @return bool
     */
    public function cadastrar(Produto $produto)
    {
        return $produto->save();
    }

    /**
     * @param Produto $produto
     * @return bool
     */
    public function atualizar(Produto $produto)
    {
        return $produto->save();
    }

    /**
     * Listar todos os produtos
     *
     * @return Produto[]|\Illuminate\Database\Eloquent\Collection
     */
    public function listarTodos()
    {
        return Produto::all();
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function bucarPorId(int $id)
    {
        return Produto::find($id);
    }

    public function buscarPorCodigoBarras(string $codigoBarras)
    {

    }

    public function buscarPorNome(string $nome)
    {

    }

}
