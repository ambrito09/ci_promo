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

    public function eliminar_serv_pub($arreglo){
        $this->db->delete('servicios_publicidad', $arreglo);
    }

    public function insertarpublicidad($arreglo, $idiomas)
    {
        //Datos para tabla publicidad
        $publicidad = array(
            "id_provincia"=>$arreglo["announceProvince"],
            "email_publico"=>$this->session->userdata("emailS"),
            "id_usuario"=>$this->session->userdata("idU"),
            "numero_telefono"=>$arreglo["announcePhone"],
            "if_activo"=>1,
            "cant_visitas"=>0,
            "fecha_publicacion"=>date("Y-m-d"),
            "zona"=>$arreglo["announceZone"]
        );
        $this->db->insert("publicidad", $publicidad);
        $id_publicidad = $this->db->insert_id();

        foreach ($idiomas as $lang)
        {
            //Datos para tabla publicidad_lang
            $publicidad_lang = array(
                "id_publicidad" => $id_publicidad,
                "id_lang" => $lang->id,
                "contenido_publicidad" => $arreglo["announceContent".$lang->lang],
                "titulo_publicidad" => $arreglo["announceTitulo".$lang->lang]
            );
            $this->db->insert("publicidad_lang", $publicidad_lang);
        }

        foreach ($arreglo["announceServicesSelected"] as $item)
        {
            //Datos para tabla servicios_publicidad
            $servicios_publicidad = array(
                "id_publicidad" => $id_publicidad,
                "id_servicio" => $item
            );
            $this->db->insert("servicios_publicidad", $servicios_publicidad);
        }
	}

    public function getPublicidadById($idU, $currentLangId)
    {
        $query = $this->db->get_where("publicidad", array("id_usuario"=>$idU));

        if ($query->num_rows() == 0)
        {
            return null;
        }

        //Publicidad a retornar
        $publicidad = $query->first_row();
        $publicidad->publicidad_lang = array();
        $publicidad->serv_publicidad = array();
        //Publicidad_lang
        $query_lang = $this->db->get_where("publicidad_lang", array("id_publicidad"=>$publicidad->id));

        if ($query_lang->num_rows() != 0)
        {
            foreach ($query_lang->result() as $item)
            {
                $publicidad->publicidad_lang[$item->id_lang] = $item;
            }
        }

        //servicios_publicidad
        $this->db->join("servicio_lang", "servicios_publicidad.id_servicio = servicio_lang.id_servicio AND servicio_lang.id_lang = ".$currentLangId);
        $query_serv = $this->db->get_where("servicios_publicidad", array("id_publicidad"=>$publicidad->id));
        if ($query_serv->num_rows() != 0)
        {
            foreach ($query_serv->result() as $item)
            {
                $publicidad->serv_publicidad[] = $item;
            }
        }

        return $publicidad;
	}

    public function modificarpublicidad($arreglo, $idiomas)
    {
        $query = $this->db->get_where("publicidad", array("id_usuario"=>$this->session->userdata("idU")));

        $user_publicidad = $query->first_row();

        //Datos para tabla publicidad
        $publicidad = array(
            "id_provincia"=>$arreglo["announceProvince"],
            "numero_telefono"=>$arreglo["announcePhone"],
            "fecha_publicacion"=>date("Y-m-d"),
            "zona"=>$arreglo["announceZone"]
        );
        $this->db->update("publicidad", $publicidad,array("id"=>$user_publicidad->id));

        foreach ($idiomas as $lang)
        {
            //Datos para tabla publicidad_lang
            $publicidad_lang = array(
                "contenido_publicidad" => $arreglo["announceContent".$lang->lang],
                "titulo_publicidad" => $arreglo["announceTitulo".$lang->lang]
            );
            $this->db->update("publicidad_lang", $publicidad_lang,array("id_publicidad"=>$user_publicidad->id, "id_lang"=>$lang->id));
        }

        //Eliminamos los servicios
        $this->db->delete("servicios_publicidad", array("id_publicidad" => $user_publicidad->id));

        foreach ($arreglo["announceServicesSelected"] as $item)
        {
            //Datos para tabla servicios_publicidad
            $servicios_publicidad = array(
                "id_publicidad" => $user_publicidad->id,
                "id_servicio" => $item
            );
            $this->db->insert("servicios_publicidad", $servicios_publicidad);
        }
	}
}