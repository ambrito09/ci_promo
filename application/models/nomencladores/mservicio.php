<?php
class Mservicio extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('servicio', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('servicio', $arreglo);
	}
	
	public function listaservicio($per_page=null,$offset=null){
		$query = $this->db->get('servicio',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrarservicioxId($arreglo){
		$query = $this->db->get_where('servicio',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($data,$id){
		$this->db->update('servicio', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('servicio'); 
		return $query->num_rows();
	}
	
}
?>