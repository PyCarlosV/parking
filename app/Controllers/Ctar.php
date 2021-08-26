<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mvehi;
use App\Models\Mfactura;
class Ctar extends BaseController{
    public function guardarT()
    {
    $request = \Config\Services::request();
    $url='http://localhost:4000/ini/vehiculos';
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $resultado2=curl_exec($ch);
    $datas['productos']=$resultado2;
    if ($this->validate('tarifa')) {
    $p=$request->getVar('idr');
    $url='http://localhost:4000/veh/'.$p;
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $resultado=curl_exec($ch);
    $datas['productos']=$resultado;
    $lista=json_decode($datas['productos'],true);
    $idg=$lista['data'][0][0];
    $datos=[
      'metodo'=>$request->getVar('metodo'),
      'tipo'=>$request->getVar('tipo'),
      'idr'=>$idg
    ];
      $url='http://localhost:4000/add/tarifa';
      $ch=curl_init($url);
       $payload = json_encode( $datos);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $result = curl_exec($ch);
       curl_close($ch);
    #print_r($result);
    #$vistas = view('vcabecera').view('factura', $datas);
    #return $vistas;
    return $this->response->redirect(base_url('/tarifa'));
      #$nuevocontacto->insert($datos);
    };
    echo view('vcabecera').view('tarifa', $datas,[
      'validation'=>$this->validator
    ]);
  }
}