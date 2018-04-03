<?php
class Mregister extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('usuario', $arreglo);
	}
	
	public function activarUsuario($code){
		$query = $this->db->get_where('usuario', array('activacion' => $code));
		$result = $query->first_row();
		$id_user = $result->id;
		$status = $result->status;
		if (!$status){
			$this->db->set('status', 1);
			$this->db->where('id', $id_user);
			$this->db->update('usuario'); 
			return true;
		}
		return false;
	}
	
	public function emailisused($email){
		$query = $this->db->get_where('usuario', array('email' => $email))->first_row();
		if ($query!=null)
			return true;
		return false;
		
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