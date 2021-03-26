<?php

namespace App\Services\UseCases\Cliente\BuscarClientePeloId;

/**
 * Class BuscarClientePeloIdCommand
 * @package App\Services\UseCases\Cliente\BuscarClientePeloId
 */
class BuscarClientePeloIdCommand
{

    /**
     * @var int
     */
    private $id;

    /**
     * BuscarClientePeloIdCommand constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
