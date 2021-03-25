<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Status
 * @package App\Models
 */
class Status extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Status';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idStatus';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Um para muitos
     */
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'idStatus', 'idStatus');
    }

    /**
     * Getters e Setters
     */
    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

}
