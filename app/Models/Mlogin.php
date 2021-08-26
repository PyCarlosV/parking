<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mlogin extends Model{
    protected $table      = 'empleado';
    protected $primaryKey = 'ide';
    protected $allowedFields=['cargos','di','idf','log'];
}
