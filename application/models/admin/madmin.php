<?php
class Madmin extends CoreModel {

    public function __construct(){
        parent::CoreModel();
    }

    public function login($data){
        $this->db->select("nombre_completo,usuario,roles.value as rol,usuario.id as ids,email,status");
        $this->db->join("roles", "usuario.id_rol = roles.id");
        $query = $this->db->get_where('usuario', $data);
        if ($query->first_row()!=null)
            return $query->first_row();
        return false;
    }

    public function getmigracionversion(){
        $query = $this->db->get('migrations');
        return  $query->first_row();
    }

    public function addcontador($id,$server){
        $arreglo = array(
            "dia" => date("d"),
            "mes" => date("m"),
            "anno" => date("Y"),
            "fecha" => date("d/m/Y"),
            "hora" => date("h:i:s"),
            "ip" => $server,
            "id_usuario" => $id
        );
        $this->db->like('fecha', date("d/m/Y"));
        $result = $this->db->get_where("contador",array('id_usuario' => $id))->result();
        if ($result == null){
            $this->db->insert('contador', $arreglo);
        }
    }

    public function showvisitxmonth(){
        $this->db->select("count(id) as cantidad,mes");
        $this->db->group_by("mes");
        $query = $this->db->get_where('contador');
        return $query->result();
    }

    public function estadisticas(){
        $this->db->select("count(id) as cantidad");
        $visitas = $this->db->get_where('contador')->first_row()->cantidad;
        $this->db->select("count(id) as cantidad");
        $visitas_publicidad = $this->db->get_where('contador','id_publicidad != 0')->first_row()->cantidad;
        $this->db->select("count(id) as cantidad");
        $usuarios = $this->db->get_where('usuario')->first_row()->cantidad;
        $this->db->select("count(id) as cantidad");
        $publicidad = $this->db->get_where('publicidad',array("if_activo"=>1))->first_row()->cantidad;
        $this->db->select("count(id) as cantidad");
        $ofertas_vip = $this->db->get_where('publicidad',array("if_activo"=>1,"carrusel_vip"=>1))->first_row()->cantidad;
        return array("visitas"=>$visitas,"usuarios"=>$usuarios,"publicidad"=>$publicidad,"visitas_publicidad"=>$visitas_publicidad,"ofertas_vip"=>$ofertas_vip);
    }

    public function topprofile(){
        $this->db->select("nombre_completo,cant_puntos,count(contador.id) as cantidad,id_usuario");
        $this->db->join("contador", "usuario.id = contador.id_usuario");
        $this->db->order_by('cant_puntos', 'DESC');
        $this->db->order_by('cantidad', 'DESC');
        $this->db->group_by("id_usuario");
        $query = $this->db->get('usuario', 5, 0);
        return $query->result();
    }
}