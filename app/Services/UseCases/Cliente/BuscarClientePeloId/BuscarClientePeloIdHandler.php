<?php

namespace App\Services\UseCases\Cliente\BuscarClientePeloId;

use App\Services\UseCases\Cliente\ClienteHandler;

/**
 * Class BuscarClientePeloIdHandler
 * @package App\Services\UseCases\Cliente\BuscarClientePeloId
 */
class BuscarClientePeloIdHandler extends ClienteHandler
{

    /**
     * @param BuscarClientePeloIdCommand $command
     * @return mixed
     */
    public function execute(BuscarClientePeloIdCommand $command)
    {
        $id = $command->getId();

        return $this->clienteRepository->buscaPorId($id);
    }

}
