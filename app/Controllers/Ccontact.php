<?php 
namespace App\Controllers;

use App\Models\Mcliente;
use CodeIgniter\Controller;
use App\Models\mcontacts;
use App\Models\Mlogin;

class Ccontact extends Controller{
    public function moslistas()
    {
        $url='http://localhost:4000/ini2/clientes/borr/0';
        $ch=curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado=curl_exec($ch);
        $data['productos']=$resultado;
        $vistas=view('vcabecera').view('vcliente',$data);
        return $vistas;
    }

    public function moslistasb()
    {
        $url='http://localhost:4000/ini/clientes';
        $ch=curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado=curl_exec($ch);
        $data['productos']=$resultado;
        $vistas=view('vcabecera').view('vcliente',$data);
        return $vistas;
    }

    public function vistacrear()
    {
        # code...
        $vistas=view('vcabecera').
                view('vcreatecontact');
        
        return $vistas;
    }
    
    public function guardarcontacto($res)
    {
        $request = \Config\Services::request();
        $url='http://localhost:4000/ini/clientes';
        $ch=curl_init($url);
        $datos=[
            'nombres'=>$request->getVar('nombre'),
            'apellidos'=>$request->getVar('apellido'),
            'tel'=>$request->getVar('telefono'),
            'dire'=>$request->getVar('dire'),    
            'di'=>$request->getVar('di'),
            'ide'=>$res,
        ];
        $payload = json_encode( $datos);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);   
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado=curl_exec($ch);
        curl_close($ch);
        print_r($resultado);
        #$vistas=view('vcabecera'). view('logeado');
        return $this->response->redirect(base_url('/logeado'));
        #return $vistas;
    }
    public function guardarcontacto2()
    {
        $request = \Config\Services::request();
        $nuevocontacto=new Mcontacts();
        $listacontactos=new Mlogin();
        $resultadodatos['listab']=$listacontactos->findAll();
        foreach ($resultadodatos['listab'] as $l):
            if ($l['log']==1):
                $res=$l['ide'];
            endif;
        endforeach;
        $datos=[
            'nombres'=>$request->getVar('nombre'),
            'apellidos'=>$request->getVar('apellido'),
            'tel'=>$request->getVar('telefono'),
            'dire'=>$request->getVar('dire'),    
            'di'=>$request->getVar('di'),
            'ide'=>$res,
        ];

        $nuevocontacto->insert($datos);
        #echo "ingresando a la base de datos";
        $vistas=view('vcabecera'). view('logeado');
        return $vistas;
    }
    public function deletecontact()
    {
        $request = \Config\Services::request();
        $id=$request->getVar('txtideliminar');
        $url='http://localhost:4000/ini2/clientes/idc/'.$id;
        $ch=curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado=curl_exec($ch);
        $datas['productos']=$resultado;
        $lista=json_decode($datas['productos'],true);
        $datos=[
            'idc'=> $id,
            'borr'=>1,
            'nombres' => $lista['data'][0][1],
            'apellidos' => $lista['data'][0][2],
            'tel' => $lista['data'][0][3],
            'fecha' => $lista['data'][0][7],
            'hora' => $lista['data'][0][8],
            'dire' => $lista['data'][0][4],
            'ide'=> $lista['data'][0][8],
            'di' => $lista['data'][0][5]        
             ];
    
                //indicamos la utl de la api
                $url='http://localhost:4000/updatec/clientes';
    
                // iniciamos el recurso de url
                $ch=curl_init($url);
                
                 $payload = json_encode( $datos);
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
                 #print_r($result);
        return $this->response->redirect(base_url('/clisa'));
    }
    public function editcontact($id)
    {
        # code...
        $url='http://localhost:4000/ini2/clientes/idc/'.$id;
        $ch=curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado=curl_exec($ch);
        $datas['productos']=$resultado;
        $lista=json_decode($datas['productos'],true);
        $vistas=view('vcabecera').view('veditcontact',$datas);
        
        return $vistas;
        #print_r($res);
    }
    public function updatecontact()
    {
        $request = \Config\Services::request();
        # code...
        #$updatecontact=new Mcliente();
        $id=$request->getVar('txteditarmodal');
        $url='http://localhost:4000/ini2/clientes/idc/'.$id;
        $ch=curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado=curl_exec($ch);
        $datas['productos']=$resultado;
        $lista=json_decode($datas['productos'],true);
             $datos=[
                'idc'=>$id,
                 'nombres'=>$request->getVar('txtnomremodal'),
                 'apellidos'=>$request->getVar('txtapelmodal'),
                 'tel'=>$request->getVar('txttelefonomodal'),
                 'dire'=>$request->getVar('txtdiremodal'),
                 'di'=>$request->getVar('txtdimodal'),
                 'borr'=>$lista['data'][0][6],
                 'fecha'=>$lista['data'][0][7],
                 'hora'=>$lista['data'][0][8]
             ];
    
                //indicamos la utl de la api
                $url='http://localhost:4000/updatec/clientes';
    
                // iniciamos el recurso de url
                $ch=curl_init($url);
                
                 $payload = json_encode( $datos);
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
        return $this->response->redirect(base_url('clisa'));

    }
}