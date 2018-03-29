<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * De esta clase heredan las clases modelos. Principales funcionalidades:  
	 * - Cargar otra modelo.
	 * 
	 * @author Alejandro Martínez Brito.
	 */
	 
class CoreModel extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	
	public function CoreModel(){
		parent::__construct();
	}
	
	/**
	 * Para cargar una clase modelo desde una clase modelo.
	 * @param $modelo - Cadena con el nombre de la clase modelo que deseamos cargar.
	 * @return Instancia de clase modelo.
	 */
	public function loadModel($modelo){
		$CI =& get_instance(); //Creo una instancia del Framework
		if(is_null($modelo)) //Lanzo una excepción por si se olvida la clase modelo.
			throw new Exception("Debe poner el nombre de la clase modelo que desea cargar.");
		if(!is_null($modelo)){ 
			$CI->load->model(strtolower($modelo)); //Cargo la modelo.
		}
		//Devuelvo la instacia de la clase modelo.
		return $CI->$modelo;	
	}
}