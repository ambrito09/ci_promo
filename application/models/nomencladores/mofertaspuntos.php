<?php
class Mofertaspuntos extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('oferta_puntos', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('oferta_puntos', $arreglo);
	}
	
	public function listaofertapuntosa($per_page=null,$offset=null){
		$query = $this->db->get('oferta_puntos',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrarofertapuntosxId($arreglo){
		$query = $this->db->get_where('oferta_puntos',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($data,$id){
		$this->db->update('oferta_puntos', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('oferta_puntos'); 
		return $query->num_rows();
	}
	
}
?>