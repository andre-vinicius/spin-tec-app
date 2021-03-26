<?php

namespace App\Http\Controllers;

use App\Exceptions\UseCases\ValidacaoException;
use App\Services\UseCases\Cliente\AtualizarCliente\AtualizarClienteCommand;
use App\Services\UseCases\Cliente\AtualizarCliente\AtualizarClienteHandler;
use App\Services\UseCases\Cliente\BuscarClientePeloId\BuscarClientePeloIdCommand;
use App\Services\UseCases\Cliente\BuscarClientePeloId\BuscarClientePeloIdHandler;
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
        $clientes = (new ListarClienteHandler())->execute(new ListarClienteCommand());

        return response()->json(['sucesso' => true, 'dados' => $clientes]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $cliente = (new BuscarClientePeloIdHandler())->execute(new BuscarClientePeloIdCommand($id));

        return response()->json(['sucesso' => true, 'dados' => $cliente]);
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

            return response()->json(['sucesso' => true, 'mensagem' => 'Cliente cadastrado com sucesso!']);
        } catch (ValidacaoException $e) {
            return response()->json(['sucesso' => false, 'mensagem' => $e->getMessage()]);
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse]
     */
    public function update($id, Request $request)
    {
        try {
            $nome = $request->get('nome') ?: '';
            $cpf = $request->get('cpf') ?: '';
            $email = $request->get('email') ?: '';

            (new AtualizarClienteHandler())->execute(new AtualizarClienteCommand($id, $nome, $cpf, $email));

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
            $id = $request->get('id') ?: 0;

            (new DeletarClienteHandler())->execute(new DeletarClienteCommand($id));

            return response()->json(['sucesso' => true, 'mensagem' => 'Cliente desativado com sucesso!']);
        } catch (ValidacaoException $e) {
            return response()->json(['sucesso' => false, 'mensagem' => $e->getMessage()]);
        }
    }

}
