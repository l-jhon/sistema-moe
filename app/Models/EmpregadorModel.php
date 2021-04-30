<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpregadorModel extends Model
{
    protected $table = 'empregadores';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['email', 'password'];
}

?>