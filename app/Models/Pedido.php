<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * @package App\Models
 */
class Pedido extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Pedido';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idPedido';

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
     * Inverso
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente', 'idCliente');
    }

    /**
     * Inverso
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'idStatus', 'idStatus');
    }

    /**
     * Muitos para muitos
     */
    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'PedidoItem', 'idPedido', 'idProduto');
    }

}
