<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero',
        'ano',
        'visibilidade',
        'publicacao',
        'validade',
        'data_validade',
        'descricao',
        'arquivo',
        'integrantes_nao_servidores',
        'ativa'
    ];

    protected $casts = [
        'data_validade' => 'date:d/m/Y',
    ];

    public function servidores()
    {
        return $this->belongsToMany(Servidor::class, 'portaria_servidores', 'portaria_id', 'servidor_id');
    }

}
