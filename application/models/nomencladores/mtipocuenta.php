<?php
class Mtipocuenta extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('tipo_cuenta', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('tipo_cuenta', $arreglo);
	}
	
	public function listatipocuenta($per_page=null,$offset=null){
		$query = $this->db->get('tipo_cuenta',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrartipocuentaxId($arreglo){
		$query = $this->db->get_where('tipo_cuenta',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($data,$id){
		$this->db->update('tipo_cuenta', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('tipo_cuenta'); 
		return $query->num_rows();
	}
	
}
?>