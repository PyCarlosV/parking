<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mtar extends Model{
    protected $table      = 'tarifa';
    protected $primaryKey = 'idta';
    protected $allowedFields=['ttar','tveh','vid'];
}