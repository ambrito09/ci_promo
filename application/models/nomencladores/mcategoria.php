<?php
class Mcategoria extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('categoria', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('categoria', $arreglo);
	}
	
	public function listacategoria($per_page=null,$offset=null){
		$query = $this->db->get('categoria',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrarcategoriaxId($arreglo){
		$query = $this->db->get_where('categoria',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($data,$id){
		$this->db->update('categoria', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('categoria'); 
		return $query->num_rows();
	}
	
}
?>