<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$url = 'http://localhost:4000/ini/empleado';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$resultado = curl_exec($ch);
		$datas['productos'] = $resultado;
		$lista = json_decode($datas['productos'], true);
		for ($i = 0; $i <= (count($lista['data']) - 1); $i++) {
			$url = 'http://localhost:4000/empleadosa/' . $lista['data'][$i][0];
			$ch = curl_init($url);
			$datos2 = [
				'cargos' => $lista['data'][$i][1],
				'contra' => $lista['data'][$i][6],
				'correo' => $lista['data'][$i][5],
				'di' => $lista['data'][$i][2],
				'idf' => $lista['data'][$i][3],
			];
			$payload = json_encode($datos2);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($ch);
			curl_close($ch);
			#print_r($result); 
		}
		$vista = view('inicio');
		return $vista;
	}
	public function publicos()
	{
		return view('UPublico');
	}
	public function validar()
	{
		$url = 'http://localhost:4000/pu/veh';
		$request = \Config\Services::request();
		// iniciamos el recurso de url
		$ch = curl_init($url);
		$datos = [
			'id' => $request->getVar('txtpassword')
		];
		$payload = json_encode($datos);
		//setup request to send json via POST
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//establecer el tipo de retorno json
		//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//establecer el tipo de retorno json
		//ejecutamos
		$resultado = curl_exec($ch);

		//cerramos
		curl_close($ch);

		$resultado_ = json_decode($resultado, true);

		if (count($resultado_['data']) <= 0) {

			$vistas = view('UPublico');
			return   $vistas;
		} else {
			//else if($resultado_['data']>0) password_verify()

			$session = session();
			$datos_sesion = [
				'user'=>$resultado_['data'][0][1],
				'vehi' => $resultado_['data'][0][0],
				'placa'=>$resultado_['data'][0][2],
				'emp'=>''.$session->get('sesion')['emp']
			];

			#$session = \Config\Services::session($config);
			$session->remove('sesion');
			$session = session();

			$session->set('sesion', $datos_sesion);

			#print_r ($session->get('vehi')['vehi']);
			#print_r ($resultado_['data']);
			return $this->response->redirect(base_url('/esta'));
			#echo $request->getVar('txtpassword');
			
		}
	}

	public function oesta()
    {
        $url='http://localhost:4000/space';
        $ch=curl_init($url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $resultado=curl_exec($ch);
        $data['productos']=$resultado;
		$session = session();
		$url = 'http://localhost:4000/pu/veh2';
		// iniciamos el recurso de url
		$ch = curl_init($url);
		$datos = [
			'id' => $session->get('sesion')['vehi']
		];
		$payload = json_encode($datos);
		//setup request to send json via POST
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//establecer el tipo de retorno json
		//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//establecer el tipo de retorno json
		//ejecutamos
		$resultado = curl_exec($ch);

		//cerramos
		curl_close($ch);

		$resultado_ = json_decode($resultado, true);
		$datas=[
			'myve'=>$resultado_,
			'sesion'=> $session->get('sesion'),
			'productos'=>$data
		];
        $vistas=view('vspaces',$datas);
		#print_r ($session->get('sesion')['user']);
        return $vistas;
    }

	public function ocu()
	{
		$request = \Config\Services::request();
		$session = session();
		$url = 'http://localhost:4000/estac';
		$ch = curl_init($url);
		$datos = [
			'id' => $request->getVar('txtnomremodal')
		];
		$payload = json_encode($datos);
		//setup request to send json via POST
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "post");

		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//establecer el tipo de retorno json
		//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//establecer el tipo de retorno json
		//ejecutamos
		$resultados = curl_exec($ch);

		//cerramos
		curl_close($ch);
		$lista = json_decode($resultados, true);
		$url = 'http://localhost:4000/ocupar';
		// iniciamos el recurso de url
		$ch = curl_init($url);
		$datos = [
			'espacio' => $lista['data'][0][0],
			'placa'=>$session->get('sesion')['vehi']
		];
		$payload = json_encode($datos);
		//setup request to send json via POST
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "post");

		curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
		//establecer el tipo de retorno json
		//curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

		//set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

		//return response instead of outputting
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		//establecer el tipo de retorno json
		//ejecutamos
		$resultado = curl_exec($ch);

		//cerramos
		curl_close($ch);

		$resultado_ = json_decode($resultado, true);
        #print_r($resultado);
        return $this->response->redirect(base_url('/esta'));

	}
	public function salir2()
	{
		$session = session();
			$session->remove('sesion');
			$session->destroy();
			return $this->response->redirect(base_url('/'));
		
	}
	public function salir()
	{
		$session = session();
		if (empty($session->get('sesion')['emp'])) {
			$session->remove('sesion');
			$session->destroy();
			return $this->response->redirect(base_url('/'));
		}else{
			$datos_sesion = [
			'user'=>'',
			'vehi' =>'',
			'emp'=>$session->get('sesion')['emp']
			];
			$session->set('sesion', $datos_sesion);
			return $this->response->redirect(base_url('/log'));
		}
	}
}
