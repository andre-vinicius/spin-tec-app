<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Produto
 * @package App\Models
 */
class Produto extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Produto';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'idProduto';

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
     * The users that belong to the role.
     */
    public function Pedido()
    {
        return $this->belongsToMany(Pedido::class, 'PedidoItem', 'idPedido', 'idProduto');
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
     * @param string $nome
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param float $valorUnitario
     */
    public function setValorUnitario(float $valorUnitario)
    {
        $this->valorUnitario = $valorUnitario;
    }

    /**
     * @return float
     */
    public function getValorUnitario(): float
    {
        return $valorUnitario;
    }

    /**
     * @param string $codigoBarras
     */
    public function setCodigoBarras(string $codigoBarras)
    {
        $this->codigoBarras = $codigoBarras;
    }

    /**
     * @return string
     */
    public function getCodigoBarras(): string
    {
        return $this->codigoBarras;
    }

    /**
     * @param bool $ativo
     */
    public function setAtivo(bool $ativo)
    {
        $this->ativo = $ativo;
    }

    /**
     * @return bool
     */
    public function isAtivo(): bool
    {
        return $this->ativo;
    }

}
