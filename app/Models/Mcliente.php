<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mcliente extends Model{
    protected $table      = 'clientes';
    protected $primaryKey = 'idc';
    protected $allowedFields=['nombres','apellidos','tel','dire','ide','di'];
}