<?php
class Mprovincia extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('provincia', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('provincia', $arreglo);
	}
	
	public function listaProvincia($per_page=null,$offset=null){
		$query = $this->db->get('provincia',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrarProvinciaxId($arreglo){
		$query = $this->db->get_where('provincia',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($data,$id){
		$this->db->update('provincia', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('provincia'); 
		return $query->num_rows();
	}
	
}
?>