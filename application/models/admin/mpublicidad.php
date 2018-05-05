<?php
class Mpublicidad extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function listarpublicidad($datos,$per_page=null,$offset=null){
		$this->db->select("publicidad.id as idpub,publicidad_lang.titulo_publicidad as titulo_publicidad,categoria_lang.value as cat,servicio_lang.value as serv,zona,provincia.value as prov,if_activo");
		$this->db->join("publicidad_lang", "publicidad.id = publicidad_lang.id_publicidad");
		$this->db->join("categoria_lang", "publicidad.id_categoria = categoria_lang.id_categoria");
		$this->db->join("servicio_lang", "publicidad.id_servicio = servicio_lang.id_servicio");
		$this->db->join("provincia", "publicidad.id_provincia = provincia.id");	
		$query = $this->db->get_where('publicidad',$datos,$per_page,$offset);
		return $query->result(); 		
	}
	
	public function cantidad(){
		$query = $this->db->get('publicidad'); 
		return $query->num_rows();
	}
	
	public function editar($data,$id){
		$this->db->update('publicidad', $data, array('id' => $id));
	}
	
	public function mostrarpublicidadxId($arreglo){
		$this->db->select("publicidad.id as idpub,publicidad_lang.titulo_publicidad as titulo_publicidad,categoria_lang.value as cat,servicio_lang.value as serv,zona,provincia.value as prov,if_activo,publicidad_lang.contenido_publicidad as contenido_publicidad,fecha_publicacion,cant_visitas,carrusel_vip,gototop,edad,email,publicidad_lang.direccion as direccion,numero_telefono,codigo_postal");
		$this->db->join("publicidad_lang", "publicidad.id = publicidad_lang.id_publicidad");
		$this->db->join("categoria_lang", "publicidad.id_categoria = categoria_lang.id_categoria");
		$this->db->join("servicio_lang", "publicidad.id_servicio = servicio_lang.id_servicio");
		$this->db->join("provincia", "publicidad.id_provincia = provincia.id");	
		$this->db->join("usuario", "publicidad.id_usuario = usuario.id");	
		$query = $this->db->get_where('publicidad',$arreglo);
		return $query->first_row();	
	}
	
	public function eliminar($arreglo){
		$this->db->delete('publicidad', $arreglo);
	}
	
	public function eliminar_pub_lang($arreglo){
		$this->db->delete('publicidad_lang', $arreglo);
	}

}