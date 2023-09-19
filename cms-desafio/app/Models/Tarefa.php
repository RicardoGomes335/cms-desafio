<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'sub_titulo',
        'image',
        'conteudo',
        'documento_suporte',
    ];
}
