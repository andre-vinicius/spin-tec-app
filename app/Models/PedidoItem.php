<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoItem
 * @package App\Models
 */
class PedidoItem extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'PedidoItem';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idPedidoItem';

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Um para muitos
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
