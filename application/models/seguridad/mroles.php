<?php
class Mroles extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('roles', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('roles', $arreglo);
	}
	
	public function listaroles($per_page=null,$offset=null){
		$query = $this->db->get('roles',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrarrolesxId($arreglo){
		$query = $this->db->get_where('roles',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($data,$id){
		$this->db->update('roles', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('roles'); 
		return $query->num_rows();
	}
	
}
?>