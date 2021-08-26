<?php

namespace App\Controllers;

use App\Models\Mvehi;
use App\Models\Mcliente;
use App\Models\Mregi;
use App\Models\Mtar;
use App\Models\Mlogin;
use CodeIgniter\Controller;

class Cpark extends BaseController
{
  protected $Mregi;

  public function __construct()
  {
    $this->Mregi = new Mregi();
  }
  public function index()
  {

    $vistas = view('vcabecera') . view('cliente');
    return $vistas;
  }
  public function vehi()
  {
    $url = 'http://localhost:4000/ini/clientes';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas['productos'] = $resultado;
    $vistas = view('vcabecera') . view('vehiculo', $datas);
    return $vistas;
  }
  public function factu()
  {
    $url = 'http://localhost:4000/ini/vehiculos';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas['productos'] = $resultado;
    $vistas = view('vcabecera') . view('factura', $datas);
    return $vistas;
  }
  public function tari()
  {
    $url = 'http://localhost:4000/ini/vehiculos';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas['productos'] = $resultado;
    $vistas = view('vcabecera') . view('tarifa', $datas);
    return $vistas;
  }

  public function registro()
  {
    $url = 'http://localhost:4000/resisp';
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultado = curl_exec($ch);
    $datas['productos'] = $resultado;
    $vistas = view('vcabecera') . view('parking', $datas);
    return $vistas;
  }
  public function registrob()
  {
    $nuevocontacto2 = new Mtar();
    $resultadodatos['lista'] = $nuevocontacto2->findAll();
    $data = [
      'title' => 'Lista registro',
      'regi' => $this->Mregi->getregi(),
      'isi' => $resultadodatos,
    ];
    #print_r(  $data['isi']['lista'][0]['idta']);
    #echo $data['isi'];
    #echo 'hola';
    $vistas = view('vcabecera') . view('parking', $data);
    return $vistas;
  }
  public function login()
  {

    $vistas = view('login');
    return $vistas;
  }
  public function regi()
  {

    $vistas = view('regis');
    return $vistas;
  }
  public function singup()
  {
    $request = \Config\Services::request();
    if ($request->getVar('password') != $request->getVar('repassword')) {
      echo "<script>";
      echo "alert('las passwords deben coincidir')";
      echo "</script>";
      echo view('regis');
    } else {
      if ($this->validate('reg')) {
        $datos = [
          'email' => $request->getVar('email'),
          'password' => $request->getVar('password'),
          'ndi' => $request->getVar('ndi'),
          'idf' => $request->getVar('idf'),
          'cargo' => $request->getVar('Cargo')
        ];
        $url = 'http://localhost:4000/add/empleado';
        $ch = curl_init($url);
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
          $url = 'http://localhost:4000/correo';
          $ch = curl_init($url);
          $datos = [
            #'mails2' =>'seigenssama@gmail.com',
            'mails2' => $request->getVar('email'),
            #'subject' =>"u: ".$request->getVar('email')."c: ".$request->getVar('password'),
            'subject' => 'Registro Exitoso',
            'content' => 'Ya se encuentra en el registro de empleados, Asi que ya puede iniciar sesion con su email y password.'
          ];
          $payload = json_encode($datos);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($ch);
          curl_close($ch);
          #return $this->response->redirect(base_url('/login'));
          print_r($result);
        };
        echo view('regis', [
          'validation' => $this->validator
        ]);
      }
    }
  


  public function recu()
  {

    $vistas = view('send');
    return $vistas;
  }
  public function send()
  {
    $request = \Config\Services::request();
    if ($this->validate('usuario2')) {
      $datos = [
        'email' => $request->getVar('email')
      ];
      $url = 'http://localhost:4000/ini/empleado';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $resultado = curl_exec($ch);
      $datas['productos'] = $resultado;
      $lista = json_decode($datas['productos'], true);
      $ut = validation($lista, $datos, 1);
      if ($ut != 0) {
        $url = 'http://localhost:4000/correo';
        $ch = curl_init($url);
        $datos = [
          #'mails2' =>'seigenssama@gmail.com',
          'mails2' => $request->getVar('email'),
          #'subject' =>"u: ".$request->getVar('email')."c: ".$request->getVar('password'),
          'subject' => "forgot password",
          'content' => "recibimos su solicitud y aqui le entregamos la respuesta su password es :" . $ut . '/' . 'contenido.txt'
        ];
        $payload = json_encode($datos);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        #print_r($result);
        #return view( 'login');
        #print_r($lista['data'][0][0]);
        #$listacontactos->update($id,1);
        #print('/9'.$id.'5/log');
        return $this->response->redirect(base_url('/login'));
        #print_r($lista['data'][0]);
      } else {
        return $this->response->redirect(base_url('/recu'));
      }
    };
    echo view('send', [
      'validation' => $this->validator
    ]);
  }

  public function veri()
  {
    $request = \Config\Services::request();
    if ($this->validate('usuario')) {
      $datos = [
        'email' => $request->getVar('email'),
        'password' => $request->getVar('password')
      ];
      $url = 'http://localhost:4000/ini/empleado';
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $resultado = curl_exec($ch);
      $datas['productos'] = $resultado;
      $lista = json_decode($datas['productos'], true);
      $ut = validation($lista, $datos);
      if ($ut == 1) {
        $url = 'http://localhost:4000/correo';
        $ch = curl_init($url);
        $datos = [
          #'mails2' =>'seigenssama@gmail.com',
          'mails2' => $request->getVar('email'),
          #'subject' =>"u: ".$request->getVar('email')."c: ".$request->getVar('password'),
          'subject' => 'Inicio de sesion ',
          'content' => 'Se informa de un inicio de sesion, si se trata de usted ignorar el mensaje.'
        ];
        $payload = json_encode($datos);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        #print_r($result);
        #return view( 'login');
        #print_r($lista['data'][0][0]);
        #$listacontactos->update($id,1);
        #$as=dsdasste("j/m/Y/g:i a");
        #print('/9'.$id.'5/log');
        $url = 'http://localhost:4000/ini2/empleado/contra/' . $request->getVar('password');
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $resultado = curl_exec($ch);
        $datas['productos'] = $resultado;
        $lista = json_decode($datas['productos'], true);
        $url = 'http://localhost:4000/empleados/' . $lista['data'][0][0];
        $ch = curl_init($url);
        $datos2 = [
          'cargos' => $lista['data'][0][1],
          'contra' => $lista['data'][0][6],
          'correo' => $lista['data'][0][5],
          'di' => $lista['data'][0][2],
          'idf' => $lista['data'][0][3],
        ];
        $payload = json_encode($datos2);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        #print_r($result);
        #return view('logeado2');
        $session = session();
        $datos_sesion = [
          'emp' => $request->getVar('email')
        ];
        $session->set('sesion', $datos_sesion);
        return $this->response->redirect(base_url('/log'));
        #print_r($result);
      } else {
        return $this->response->redirect(base_url('/login'));
      }
    }; # else {
    #  echo "<script>";
    #  echo "alert('los campos no cumple los requisitos')";
    #  echo "</script>";
    #};
    echo view('login', [
      'validation' => $this->validator
    ]);
  }
  public function logeado()
  {
    #$a=['id'=>$i[1]];
    #$listacontactos=new mlogin();
    #$resultadodatos['lista']=$listacontactos->findAll();
    #return view('logeado2',$a);
    return view('logeado2');
  }
}
