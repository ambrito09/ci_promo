<?php
class Mzona extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('zona', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('zona', $arreglo);
	}
	
	public function listazona($per_page=null,$offset=null){
		$query = $this->db->get('zona',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrarzonaxId($arreglo){
		$query = $this->db->get_where('zona',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($data,$id){
		$this->db->update('zona', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('zona'); 
		return $query->num_rows();
	}
	
}
?>