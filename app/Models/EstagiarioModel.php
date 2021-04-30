<?php

namespace App\Models;

use CodeIgniter\Model;

class EstagiarioModel extends Model
{
    protected $table = 'estagiarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'curso', 'ano_de_ingresso', 'minicurriculo', 'id_usuario'];
}

?>