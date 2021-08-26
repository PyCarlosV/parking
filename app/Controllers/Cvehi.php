<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Mvehi;
use App\Models\Mcliente;


class Cvehi extends Controller
{
  public function index()
  {
    $url = 'http://localhost:4000/ini2/vehiculos/borr/0';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $data['productos'] = $resultado;
    $vistas = view('vcabecera') . view('vvehi', $data);
    return $vistas;
  }

  public function indexb()
  {
    $url = 'http://localhost:4000/ini/vehiculos';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $data['productos'] = $resultado;
    $vistas = view('vcabecera') . view('vvehi', $data);
    return $vistas;
  }

  public function guardarv()
  {
    $request = \Config\Services::request();

    $url = 'http://localhost:4000/ini/clientes';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas2['productos'] = $resultado;

    if ($this->validate('vehiculo')) {
      $p = $request->getVar('di');
      $url = 'http://localhost:4000/emp';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $resultado = curl_exec($ch);
      $datas['productos'] = $resultado;
      $lista = json_decode($datas['productos'], true);
      $idf = $lista['data'][0][0];
      $url = 'http://localhost:4000/cli/' . $p;
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $resultado = curl_exec($ch);
      $datas['productos'] = $resultado;
      $lista = json_decode($datas['productos'], true);
      $idg = $lista['data'][0][0];

      $url = 'http://localhost:4000/add/vehiculos';
      // iniciamos el recurso de url
      $ch = curl_init($url);

      $datos = [
        'placa' => $request->getVar('placa'),
        'modelo' => $request->getVar('modelo'),
        'color' => $request->getVar('color'),
        'fecent' => $request->getVar('entrada'),
        'fecsal' => $request->getVar('salida'),
        'ide' => $idg,
        'idem' => $idf
      ];
      $payload = json_encode($datos);
      //setup request to send json via POST

      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
      //establecer el tipo de retorno json
      //curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

      //attach encoded JSON string to the POST fields
      curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

      //set the content type to application/json
      curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

      //return response instead of outputting
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      //execute the POST request
      $result = curl_exec($ch);

      //close cURL resource
      curl_close($ch);
      #print_r($result);
      #$vistas = view('vcabecera').view('vehiculo',$datas2);
      #print($result);
      #return $vistas;
      return $this->response->redirect(base_url('/vehiculo'));
      #print($result);
    };
    echo view('vcabecera') . view('vehiculo', $datas2, [
      'validation' => $this->validator
    ]);
  }
  public function deletecontact()
  {
    $request = \Config\Services::request();
    $id = $request->getVar('txtideliminar');
    $url = 'http://localhost:4000/ini2/vehiculos/idp/' . $id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas['productos'] = $resultado;
    $lista = json_decode($datas['productos'], true);
    $datos = [
      'idp' => $id,
      'borr' => 1,
      'placa' => $lista['data'][0][1],
      'modelo' => $lista['data'][0][2],
      'color' => $lista['data'][0][3],
      'fecent' => $lista['data'][0][4],
      'fecsal' => $lista['data'][0][5],
      'ide' => $lista['data'][0][7],
      'idem' => $lista['data'][0][8]
    ];

    //indicamos la utl de la api
    $url = 'http://localhost:4000/updatev/vehiculos';

    // iniciamos el recurso de url
    $ch = curl_init($url);

    $payload = json_encode($datos);
    //setup request to send json via POST

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    //establecer el tipo de retorno json


    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $result = curl_exec($ch);

    //close cURL resource
    curl_close($ch);
    #print_r($id);
    #print_r($result);
    #print_r($datos);
    return $this->response->redirect(base_url('veisa'));
  }
  public function editcontact($id)
  {
    $url = 'http://localhost:4000/ini2/vehiculos/idp/' . $id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas['productos'] = $resultado;
    $vistas = view('vcabecera') . view('veditvehi', $datas);

    return $vistas;
    #print_r($res);
  }
  public function updatecontact()
  {
    $request = \Config\Services::request();
    # code...
    $id = $request->getVar('txteditarmodal');
    $url = 'http://localhost:4000/ini2/vehiculos/idp/' . $id;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas['productos'] = $resultado;
    $lista = json_decode($datas['productos'], true);
    $datos = [
      'idp' => $id,
      'placa' => $request->getVar('txtplacamodal'),
      'modelo' => $request->getVar('txtmodemodal'),
      'color' => $request->getVar('txtcolmodal'),
      'fecent' => $request->getVar('txtfechamodal'),
      'fecsal' => $request->getVar('txthoramodal'),
      'borr' => $lista['data'][0][6],
      'ide' => $lista['data'][0][7],
      'idem' => $lista['data'][0][8]
    ];
    $url = 'http://localhost:4000/updatev/vehiculos';

    // iniciamos el recurso de url
    $ch = curl_init($url);

    $payload = json_encode($datos);
    //setup request to send json via POST

    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    //establecer el tipo de retorno json


    //attach encoded JSON string to the POST fields
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    //set the content type to application/json
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

    //return response instead of outputting
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //execute the POST request
    $result = curl_exec($ch);

    //close cURL resource
    #$id=$request->getVar('txteditarmodal');
    #$updatecontact->update($id,$datos);
    #echo 'actualizando la base de datos';
    #print_r($datos);
    curl_close($ch);
    print_r($result);
    #echo 'actualizando la base de datos';
    return $this->response->redirect(base_url('veisa'));
  }
}
