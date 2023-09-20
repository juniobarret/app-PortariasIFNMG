<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servidor extends Model
{
    use HasFactory;

    protected $table = 'servidores';
    protected $fillable = [
        'nome',
        'avatar',
        'cargo',
        'matricula',
        'telefone',
        'email',
        'endereco',
    ];

    public function portarias()
    {
        return $this->belongsToMany(Portaria::class, 'portaria_servidores', 'servidor_id', 'portaria_id')
            ->orderBy("publicacao", "asc");
    }

    
}
