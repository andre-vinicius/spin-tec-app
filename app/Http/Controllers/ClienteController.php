<?php

namespace App\Http\Controllers;

use App\Exceptions\UseCases\ValidacaoException;
use App\Services\UseCases\Cliente\AtualizarCliente\AtualizarClienteCommand;
use App\Services\UseCases\Cliente\AtualizarCliente\AtualizarClienteHandler;
use App\Services\UseCases\Cliente\CadastrarCliente\CadastrarClienteCommand;
use App\Services\UseCases\Cliente\CadastrarCliente\CadastrarClienteHandler;
use App\Services\UseCases\Cliente\DeletarCliente\DeletarClienteCommand;
use App\Services\UseCases\Cliente\DeletarCliente\DeletarClienteHandler;
use App\Services\UseCases\Cliente\ListarCliente\ListarClienteCommand;
use App\Services\UseCases\Cliente\ListarCliente\ListarClienteHandler;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class ClienteController
 * @package App\Http\Controllers
 */
class ClienteController extends BaseController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json((new ListarClienteHandler())->execute(new ListarClienteCommand()));
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
            $cpf = $request->get('cpf') ?: '';
            $email = $request->get('email') ?: '';

            (new CadastrarClienteHandler())->execute(new CadastrarClienteCommand($nome, $cpf, $email));

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
            $cpf = $request->get('cpf') ?: '';
            $email = $request->get('email') ?: '';

            (new AtualizarClienteHandler())->execute(new AtualizarClienteCommand($id, $nome, $cpf, $email));

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

            (new DeletarClienteHandler())->execute(new DeletarClienteCommand($id));

            return reponse()->json(['sucesso' => true, 'mensagem' => 'Cliente desativado com sucesso!', 'dados' => []]);
        } catch (ValidacaoException $e) {
            return reponse()->json(['sucesso' => false, 'mensagem' => $e->getMessage(), 'dados' => []]);
        }
    }

}
