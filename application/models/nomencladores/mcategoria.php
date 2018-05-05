<?php
class Mcategoria extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function insertar($names,$codes){
		$this->db->insert('categoria', array("date_add"=>date("Y-m-d")));
		$this->db->select_max('id','maximo');
		$query = $this->db->get('categoria');
		$idCat = $query->first_row()->maximo;
		foreach($names as $key=>$n){
			if (!empty($n)){
				$query_lang = $this->db->get_where('idioma',array("lang"=>$codes[$key]));
				$id_lang = $query_lang->first_row()->id;
				$arreglo = array(
					"id_lang"=>$id_lang,
					"id_categoria"=>$idCat,
					"value"=>$n
				);
				$this->db->insert('categoria_lang', $arreglo);
			}
		}
	}
	
	public function eliminar($arreglo){
		$this->db->delete('categoria', $arreglo);
	}
	
	public function eliminar_cat_lang($arreglo){
		$this->db->delete('categoria_lang', $arreglo);
	}

	public function listacategoria($datos,$per_page=null,$offset=null){
		$this->db->select('categoria.id as id,value,categoria_lang.id_lang as id_lang');
		$this->db->join("categoria_lang", "categoria.id = categoria_lang.id_categoria");
		$query = $this->db->get_where("categoria", $datos,$per_page,$offset);
		return $query->result();
	}
	public function listacategoriaLang($arreglo){
		$query = $this->db->get_where('categoria_lang',$arreglo);
		return $query->result();		
	}
	
	public function mostrarcategoriaxId($arreglo){
		$query = $this->db->get_where('categoria',$arreglo);
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
					"id_categoria"=>$idCat,
					"value"=>$n
				);
				$this->db->insert('categoria_lang', $arreglo);
			}
		}
	}
	
	public function cantidad(){
		$query = $this->db->get('categoria'); 
		return $query->num_rows();
	}
	
}
?>