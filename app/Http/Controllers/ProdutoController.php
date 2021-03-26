<?php

namespace App\Http\Controllers;

use App\Exceptions\UseCases\ValidacaoException;
use App\Services\UseCases\Produto\AtualizarProduto\AtualizarProdutoCommand;
use App\Services\UseCases\Produto\AtualizarProduto\AtualizarProdutoHandler;
use App\Services\UseCases\Produto\CadastrarProduto\CadastrarProdutoCommand;
use App\Services\UseCases\Produto\CadastrarProduto\CadastrarProdutoHandler;
use App\Services\UseCases\Produto\DeletarProduto\DeletarProdutoCommand;
use App\Services\UseCases\Produto\DeletarProduto\DeletarProdutoHandler;
use App\Services\UseCases\Produto\ListarProduto\ListarProdutoCommand;
use App\Services\UseCases\Produto\ListarProduto\ListarProdutoHandler;
use App\Services\UseCases\Produto\BuscarProdutoPorId\BuscarProdutoPorIdCommand;
use App\Services\UseCases\Produto\BuscarProdutoPorId\BuscarProdutoPorIdHandler;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class ProdutoController
 * @package App\Http\Controllers
 */
class ProdutoController extends BaseController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $produtos = (new ListarProdutoHandler())->execute(new ListarProdutoCommand());

        return response()->json(['sucesso' => true, 'dados' => $produtos]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $produto = (new BuscarProdutoPorIdHandler())->execute(new BuscarProdutoPorIdCommand($id));

        return response()->json(['sucesso' => true, 'dados' => $produto]);
    }

    /**
     * Cadastra cliente
     *
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        try {
            $nome = $request->get('nome') ?: '';
            $valorUnitario = $request->get('valorUnitario') ?: '';
            $codigoBarra = $request->get('codigoBarra') ?: '';

            (new CadastrarProdutoHandler())->execute(new CadastrarProdutoCommand($nome, $valorUnitario, $codigoBarra));

            return response()->json(['sucesso' => true, 'mensagem' => 'Cliente cadastrado com sucesso!']);
        } catch (ValidacaoException $e) {
            return response()->json(['sucesso' => false, 'mensagem' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function update($id, Request $request)
    {
        try {
            $nome = $request->get('nome') ?: '';
            $valorUnitario = $request->get('valorUnitario') ?: '';
            $codigoBarra = $request->get('codigoBarra') ?: '';

            (new AtualizarProdutoHandler())->execute(new AtualizarProdutoCommand($id, $nome, $valorUnitario, $codigoBarra));

            return response()->json(['sucesso' => true, 'mensagem' => 'Cliente editado com sucesso!']);
        } catch (ValidacaoException $e) {
            return response()->json(['sucesso' => false, 'mensagem' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function destroy(Request $request)
    {
        try {
            $id = $request->get('id') ?: '';

            (new DeletarProdutoHandler())->execute(new DeletarProdutoCommand($id));

            return response()->json(['sucesso' => true, 'mensagem' => 'Produto desativado com sucesso!']);
        } catch (ValidacaoException $e) {
            return response()->json(['sucesso' => false, 'mensagem' => $e->getMessage()]);
        }
    }

}
