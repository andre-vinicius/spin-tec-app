<?php

namespace App\Http\Controllers;

use App\Exceptions\UseCases\ValidacaoException;
use App\Services\UseCases\Cliente\AtualizarProduto\AtualizarProdutoCommand;
use App\Services\UseCases\Cliente\AtualizarProduto\AtualizarProdutoHandler;
use App\Services\UseCases\Cliente\CadastrarProduto\CadastrarProdutoCommand;
use App\Services\UseCases\Cliente\CadastrarProduto\CadastrarProdutoHandler;
use App\Services\UseCases\Cliente\DeletarProduto\DeletarProdutoCommand;
use App\Services\UseCases\Cliente\DeletarProduto\DeletarProdutoHandler;
use App\Services\UseCases\Cliente\ListarProduto\ListarProdutoCommand;
use App\Services\UseCases\Cliente\ListarProduto\ListarProdutoHandler;
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
        return response()->json((new ListarProdutoHandler())->execute(new ListarProdutoCommand()));
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

            return reponse()->json(['sucesso' => true, 'mensagem' => 'Cliente cadastrado com sucesso!', 'dados' => []]);
        } catch (ValidacaoException $e) {
            return reponse()->json(['sucesso' => false, 'mensagem' => $e->getMessage(), 'dados' => []]);
        }
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function update(Request $request)
    {
        try {
            $id = $request->get('id') ?: '';
            $nome = $request->get('nome') ?: '';
            $valorUnitario = $request->get('valorUnitario') ?: '';
            $codigoBarra = $request->get('codigoBarra') ?: '';

            (new AtualizarProdutoHandler())->execute(new AtualizarProdutoCommand($id, $nome, $valorUnitario, $codigoBarra));

            return reponse()->json(['sucesso' => true, 'mensagem' => 'Cliente editado com sucesso!', 'dados' => []]);
        } catch (ValidacaoException $e) {
            return reponse()->json(['sucesso' => false, 'mensagem' => $e->getMessage(), 'dados' => []]);
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

            return reponse()->json(['sucesso' => true, 'mensagem' => 'Produto desativado com sucesso!', 'dados' => []]);
        } catch (ValidacaoException $e) {
            return reponse()->json(['sucesso' => false, 'mensagem' => $e->getMessage(), 'dados' => []]);
        }
    }

}
