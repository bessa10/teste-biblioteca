<?php

namespace App\Models;

use CodeIgniter\Model;

class LivroModel extends Model
{
    protected $table = 'livros';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'titulo',
        'descricao',
        'url_imagem',
        'favorito'
    ];

}