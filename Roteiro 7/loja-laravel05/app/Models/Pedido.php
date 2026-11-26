<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    protected $fillable = ['cliente_id', 'data', 'valor'];
    protected function casts(): array
    {
        return [
            'data' => 'date',
            'valor' => 'decimal:2',
        ];
    }
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
