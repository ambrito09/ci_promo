<?php
class Midioma extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('idioma', $arreglo);
	}
	
	public function eliminar($id){		
		$this->db->delete('categoria_lang', array("id_lang"=>$id));
		$this->db->delete('idioma', array("id"=>$id));
	}
	
	public function listaidioma($per_page=null,$offset=null){
		$query = $this->db->get('idioma',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostraridiomaxId($arreglo){
		$query = $this->db->get_where('idioma',$arreglo);
		return $query->first_row();	
	}
	public function mostraridiomaxcode($arreglo){
		$query_lang = $this->db->get_where('idioma',$arreglo);
		return $query_lang->first_row()->id;	
	}
	
				
	public function editar($data,$id){
		$this->db->update('idioma', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('idioma'); 
		return $query->num_rows();
	}
	
}
?>