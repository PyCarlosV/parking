<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mvehi extends Model{
    protected $table      = 'vehiculos';
    protected $primaryKey = 'idp';
    protected $allowedFields=['placa','modelo','color','fecent','fecsal','idr','ide'];
}