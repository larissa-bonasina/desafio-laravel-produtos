<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'nome',
        'sku',
        'preco',
        'quantidade_estoque',
        'categoria_id',
        'ativo',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
