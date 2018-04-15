<?php
class Mpublicidad extends CoreModel {
	
	public function __construct(){
		parent::CoreModel();
	}
	
	public function listarpublicidad($per_page=null,$offset=null){
		$this->db->select("publicidad.id as idpub,titulo_publicidad,categoria.value as cat,servicio.value as serv,zona.value as zona,provincia.value as prov,if_activo");
		$this->db->join("categoria", "publicidad.id_categoria = categoria.id");	
		$this->db->join("servicio", "publicidad.id_servicio = servicio.id");	
		$this->db->join("zona", "publicidad.id_zona = zona.id");	
		$this->db->join("provincia", "publicidad.id_provincia = provincia.id");	
		$query = $this->db->get('publicidad',$per_page,$offset);	
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
		$this->db->select("publicidad.id as idpub,titulo_publicidad,categoria.value as cat,servicio.value as serv,zona.value as zona,provincia.value as prov,if_activo,contenido_publicidad,fecha_publicacion,cant_visitas,carrusel_vip,gototop,nombre_completo,edad,email,direccion,numero_telefono,codigo_postal");
		$this->db->join("categoria", "publicidad.id_categoria = categoria.id");	
		$this->db->join("servicio", "publicidad.id_servicio = servicio.id");	
		$this->db->join("zona", "publicidad.id_zona = zona.id");	
		$this->db->join("provincia", "publicidad.id_provincia = provincia.id");	
		$this->db->join("usuario", "publicidad.id_usuario = usuario.id");	
		$query = $this->db->get_where('publicidad',$arreglo);
		return $query->first_row();	
	}
	
	public function eliminar($arreglo){
		$this->db->delete('publicidad', $arreglo);
	}
	
}