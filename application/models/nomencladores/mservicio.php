<?php
class Mservicio extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($names,$codes){
		$this->db->insert('servicio', array("date_add"=>date("Y-m-d")));
		$this->db->select_max('id','maximo');
		$query = $this->db->get('servicio');
		$idCat = $query->first_row()->maximo;
		foreach($names as $key=>$n){
			if (!empty($n)){
				$query_lang = $this->db->get_where('idioma',array("lang"=>$codes[$key]));
				$id_lang = $query_lang->first_row()->id;
				$arreglo = array(
					"id_lang"=>$id_lang,
					"id_servicio"=>$idCat,
					"value"=>$n
				);
				$this->db->insert('servicio_lang', $arreglo);
			}
		}
	}
	
	public function eliminar($arreglo){
		$this->db->delete('servicio', $arreglo);
	}
	
	public function eliminar_serv_lang($arreglo){
		$this->db->delete('servicio_lang', $arreglo);
	}

	public function listaservicio($datos,$per_page=null,$offset=null){
		$this->db->select('servicio.id as id,value,servicio_lang.id_lang as id_lang');
		$this->db->join("servicio_lang", "servicio.id = servicio_lang.id_servicio");
		$query = $this->db->get_where("servicio", $datos,$per_page,$offset);
		return $query->result();
	}
	public function listaservicioLang($arreglo){
		$query = $this->db->get_where('servicio_lang',$arreglo);
		return $query->result();		
	}

	public function mostrarservicioxId($arreglo){
		$query = $this->db->get_where('servicio',$arreglo);
		return $query->first_row();	
	}
	
	public function editar($names,$codes,$id){
		$idCat = $id;
		foreach($names as $key=>$n){
			if (!empty($n)){
				$query_lang = $this->db->get_where('idioma',array("lang"=>$codes[$key]));
				$id_lang = $query_lang->first_row()->id;
				$arreglo = array(
					"id_lang"=>$id_lang,
					"id_servicio"=>$idCat,
					"value"=>$n
				);
				$this->db->insert('servicio_lang', $arreglo);
			}
		}
	}
	
	public function cantidad(){
		$query = $this->db->get('servicio'); 
		return $query->num_rows();
	}
	
}
?>