<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mfactura extends Model{
    protected $table      = 'factura';
    protected $primaryKey = 'idf';
    protected $allowedFields=['tieent','tiesal','tot','caja','idr','fecent'];
    // Uncomment below if you want add primary key
    // protected $primaryKey = 'id';
}