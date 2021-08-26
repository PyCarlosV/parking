<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	public $usuario = [
		'email' =>'required|min_length[5]|Valid_email|max_length[40]',
		'password' => 'required|min_length[4]|alpha_numeric|max_length[40]'
	];

	public $reg = [
		'email' =>'required|min_length[5]|Valid_email|max_length[40]',
		'password' => 'required|min_length[4]|alpha_numeric|max_length[40]',
		'ndi'=>'required|max_length[11]|min_length[8]|numeric',
		'idf'=>'required|max_length[30]|min_length[2]|alpha',
		'Cargo'=>'required|max_length[50]|min_length[5]|alpha',
	];

	public $usuario2 = [
		'email' =>'required|min_length[5]|Valid_email|max_length[40]'
	];

	public $cliente =[
		'nombres'=>'required|alpha_space|max_length[100]|min_length[6]',
		'apellidos'=>'required|alpha_space|max_length[100]|min_length[6]',
		'tel'=>'required|max_length[10]|min_length[8]|numeric',
		'di'=>'required|max_length[11]|min_length[8]|numeric',
		'dire'=>'required|max_length[20]|min_length[5]',
	];

	public $vehiculo =[
		'placa'=>'required|alpha_numeric|max_length[10]|min_length[3]',
		'modelo'=>'required|alpha|max_length[30]|min_length[3]',
		'color'=>'required|max_length[30]|min_length[3]|alpha',
		'di'=>'required|max_length[11]|min_length[8]|numeric',
		'entrada'=>'required|max_length[30]|min_length[5]',
		'salida'=>'required|max_length[31]|min_length[2]'
	];

	public $factura =[
		'idr'=>'required|alpha_numeric|max_length[10]|min_length[3]',
		'caja'=>'required|alpha_numeric|max_length[20]|min_length[3]',
		'tot'=>'required|max_length[40]|min_length[5]|numeric',
		'tieent'=>'required|max_length[30]|min_length[5]',
		'tiesal'=>'required|max_length[31]|min_length[2]'
	];
	public $tarifa =[
		'idr'=>'required|alpha_numeric|max_length[10]|min_length[3]',
		'metodo'=>'required|alpha_space|max_length[20]|min_length[3]',
		'tipo'=>'required|max_length[12]|min_length[4]|alpha',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
}
