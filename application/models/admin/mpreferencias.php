<?php
class Mpreferencias extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function getemailconfig(){
		$query = $this->db->get('correo'); 
		return $query->first_row();
	}
	
	public function editaremail($data){
		$this->db->update('correo', $data);
	}
	
}