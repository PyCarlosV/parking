<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\mcliente;

class Cclientes extends BaseController{
    public function guardarc()
    {
      $request = \Config\Services::request();
      if ($this->validate('cliente')) {
      $url='http://localhost:4000/add/clientes';
      // iniciamos el recurso de url
      $ch=curl_init($url);
      $af=fechayhora();
      $datos=[
        'nombres'=>$request->getVar('nombres'),
        'apellidos'=>$request->getVar('apellidos'),
        'tel'=>$request->getVar('tel'),
        'dire'=>$request->getVar('dire'),
        'di'=>$request->getVar('di'),
        'fecha'=>$af['fecha'],
        'hora'=>$af['hora']
    ];
       $payload = json_encode( $datos);
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
       print_r($result);

   
      return $this->response->redirect(base_url('/cliente'));
      #return view('cliente');
      #localecho $nuevocontacto->insert($datos);
    };# else {
      #  echo "<script>";
      #  echo "alert('los campos no cumple los requisitos')";
      #  echo "</script>";
      #};
      echo view('vcabecera').view('cliente',[
        'validation'=>$this->validator
      ]);
    }
    
}