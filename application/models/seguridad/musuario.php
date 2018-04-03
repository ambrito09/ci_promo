<?php
class Musuario extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($arreglo){
		$this->db->insert('usuario', $arreglo);
	}
	
	public function eliminar($arreglo){
		$this->db->delete('usuario', $arreglo);
	}
	
	public function listausuarios($per_page=null,$offset=null){
		$query = $this->db->get('usuario',$per_page,$offset); 
		return $query->result();		
	}
	
	public function mostrarusuarioxId($arreglo){
		$query = $this->db->get_where('usuario',$arreglo);
		return $query->first_row();	
	}
	
	public function cambiarpassword($arreglo){
		$arr = array(
			"id"=>$arreglo["id"],
			"clave"=>$arreglo["old"]
		);
		$result = $this->db->get_where('usuario',$arr)->first_row();
		if ($result != null){
			$this->db->update('usuario', array("clave"=>$arreglo["new"]), array('id' => $arreglo["id"]));
			return true;
		}
		return false;	
	}
	
	public function editar($data,$id){
		$this->db->update('usuario', $data, array('id' => $id));
	}
	
	public function cantidad(){
		$query = $this->db->get('usuario'); 
		return $query->num_rows();
	}
	public function emailisused($email){
		$query = $this->db->get_where('usuario', array('email' => $email))->first_row();
		if ($query!=null)
			return true;
		return false;
	}
	public function userisused($usuario){
		$query = $this->db->get_where('usuario', array('usuario' => $usuario))->first_row();
		if ($query!=null)
			return true;
		return false;
	}
	
}
?>