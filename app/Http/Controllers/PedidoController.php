<?php

namespace App\Http\Controllers;

use App\Exceptions\UseCases\ValidacaoException;
use App\Services\UseCases\Pedido\AtualizarPedido\AtualizarPedidoCommand;
use App\Services\UseCases\Pedido\AtualizarPedido\AtualizarPedidoHandler;
use App\Services\UseCases\Pedido\BuscarPedidoPorId\BuscarPedidoPorIdHandler;
use App\Services\UseCases\Pedido\BuscarPedidoPorId\BuscarPedidoPorIdCommand;
use App\Services\UseCases\Pedido\CadastrarPedido\CadastrarPedidoCommand;
use App\Services\UseCases\Pedido\CadastrarPedido\CadastrarPedidoHandler;
use App\Services\UseCases\Pedido\DeletarPedido\DeletarPedidoCommand;
use App\Services\UseCases\Pedido\DeletarPedido\DeletarPedidoHandler;
use App\Services\UseCases\Pedido\ListarPedido\ListarPedidoCommand;
use App\Services\UseCases\Pedido\ListarPedido\ListarPedidoHandler;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends BaseController
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $pedidos = (new ListarPedidoHandler())->execute(new ListarPedidoCommand());

        return response()->json(['sucesso' => true, 'dados' => $pedidos]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $pedido = (new BuscarPedidoPorIdHandler())->execute(new BuscarPedidoPorIdCommand($id));

        return response()->json(['sucesso' => true, 'dados' => $pedido]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {
        try {
            $idCliente = $request->get('cliente') ?: 0;
            $idProduto = $request->get('produto') ?: 0;
            $quantidade = $request->get('quantidade') ?: 0;

            (new CadastrarPedidoHandler())->execute(new CadastrarPedidoCommand($idCliente, $idProduto, $idCliente));

            return response()->json(['sucesso' => true, 'mensagem' => 'Pedido cadastrado com sucesso!']);
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
            $idCliente = $request->get('cliente') ?: 0;
            $idProduto = $request->get('produto') ?: 0;
            $quantidade = $request->get('quantidade') ?: 0;

            (new AtualizarPedidoHandler())->execute(new AtualizarPedidoCommand($id, $idCliente, $idProduto, $quantidade));

            return response()->json(['sucesso' => true, 'mensagem' => 'Pedido editado com sucesso!']);
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

            (new DeletarPedidoHandler())->execute(new DeletarPedidoCommand($id));

            return response()->json(['sucesso' => true, 'mensagem' => 'Pedido desativado com sucesso!']);
        } catch (ValidacaoException $e) {
            return response()->json(['sucesso' => false, 'mensagem' => $e->getMessage()]);
        }
    }

}
