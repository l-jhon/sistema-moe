<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpregadorModel extends Model
{
    protected $table = 'empregadores';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome_da_empresa', 'endereco_da_empresa', 'nome_da_pessoa_de_contato', 'descricao_da_empresa', 'id_usuario'];
}

?>