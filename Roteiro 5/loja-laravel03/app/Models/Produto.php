<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produto extends Model
{
    protected $fillable = ['categoria_id', 'nome', 'preco'];

    // Convertendo o preço automaticamente para decimal (opcional, igual foi feito em Pedido)
    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2',
        ];
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
    //protected $fillable = [
        //'nome',
        //'descricao',
        //'preco',
        //'quantidade',
        //'ativo',
    //];
    //protected function casts(): array
    //{
    //    return [
    //        'preco' => 'decimal:2',
    //        'quantidade' => 'integer',
    //        'ativo' => 'boolean',
    //    ];
    //}
