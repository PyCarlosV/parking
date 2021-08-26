<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mvehi;
use App\Models\Mfactura;
class Cfactura extends BaseController{
    public function guardarf()
    {
    $request = \Config\Services::request();
    $url='http://localhost:4000/ini/vehiculos';
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $resultado=curl_exec($ch);
    $datas['productos']=$resultado;

    if ($this->validate('factura')) {
    $p=$request->getVar('idr');
    $url='http://localhost:4000/veh/'.$p;
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $resultado=curl_exec($ch);
    $datas['productos']=$resultado;
    $lista=json_decode($datas['productos'],true);
    $idg=$lista['data'][0][0];
    $datos=[
      'tieent'=>$request->getVar('tieent'),
      'tiesal'=>$request->getVar('tiesal'),
      'tot'=>$request->getVar('tot'),
      'caja'=>$request->getVar('caja'),
      'idr'=>$idg
    ];
    $url='http://localhost:4000/ini2/vehiculos/idp/'.$idg;
    $ch=curl_init($url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $resultado=curl_exec($ch);
    $datas2['productos']=$resultado;
    $lista=json_decode($datas2['productos'],true);
    $datos2=[
        'idp'=> $idg,
        'borr'=>1,
        'placa' => $lista['data'][0][1],
        'modelo' => $lista['data'][0][2],
        'color' => $lista['data'][0][3],
        'fecent' => $lista['data'][0][4],
        'fecsal' => $lista['data'][0][5],
        'ide' => $lista['data'][0][7],
        'idem'=> $lista['data'][0][8]      
         ];
      $fs=cfecha($datos2,$datos);
      if ($fs[0]==0){
        echo "<script>";
        echo "alert('los campos de fecha y hora deben ser superiores a la fecha y hora que registro el vehiculo.')";
        echo "</script>";
        #return $this->response->redirect(base_url('/factura'));
        $vistas = view('vcabecera').view('factura', $datas);
        return $vistas;
        echo "<script>";
        echo "alert('los campos de fecha y hora deben ser superiores a la fecha y hora que registro el vehiculo.')";
        echo "</script>";
        #echo "<script>";
        #echo "alert('".$fs[1]."')";
        #echo "</script>";
      }
      else{
      $url='http://localhost:4000/add/factura';
      $ch=curl_init($url);
       $payload = json_encode( $datos);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $result = curl_exec($ch);
       curl_close($ch);
    #print_r($result);
    $vistas = view('vcabecera').view('factura', $datas);
    return $vistas;
    return $this->response->redirect(base_url('/factura'));
      #$nuevocontacto->insert($datos);
    }
    };
    echo view('vcabecera').view('factura', $datas,[
      'validation'=>$this->validator
    ]);
  }
}