<?php 
namespace App\Models;

use CodeIgniter\Model;

class Mregi extends Model{
    public function getregi()
    {
    return $this->db->table('factura')
    #->from('vehiculos')
    #'SELECT modelo,ide,fecent,tieent,fecsal,tiesal,placa,tot  FROM vehiculos INNER JOIN factura ON vehiculos.idp = factura.idr';
    #->select('modelo,ide,fecent,tieent,fecsal,tiesal,placa,tot')
    ->join('vehiculos', 'vehiculos.idp = factura.idr')
    ->get()->getResultArray();
    }
}