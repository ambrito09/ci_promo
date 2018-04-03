<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("seguridad/Musuario");
		$this->load->model("seguridad/Mroles");
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;
		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Musuario->cantidad();
		$data["listado"] = $this->Musuario->listausuarios($per_page,$offset);
		for ($i=0;$i<count($data["listado"]);$i++){
			$data["listado"][$i]->id_rol = $this->Mroles->mostrarrolesxId(array("id"=>$data["listado"][$i]->id_rol))->value;			
		}
		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
            array(
                'base_url'		 => site_url('/admin/seguridad/usuario/index/'),
                'total_rows'	 => $total_rows,
                'per_page'		 => $per_page,
                'uri_segment'	 => 5,
                'full_tag_open'	 => '<ul class="pagination pagination-sm inline">',
                'full_tag_close' => '</ul>',
                'display_pages'  => true,
                'first_tag_open' =>  '<li>',
                'first_tag_close'=>  '</li>',
                'cur_tag_open' => '<li><span>',
                'num_tag_open' => '<li>',
                'last_tag_open' => '<li>',
                'cur_tag_close' => '</span></li>',
                'num_tag_close' => '</li>',
                'last_tag_close' => '</li>',
                'num_links' => 1,
                'use_page_numbers' => true,
                'first_link'=> '&laquo;',
                'last_link'=> '&raquo;',
                'prev_link' => false,
                'next_link' => false
            )
        );
		$data['pagination'] = $this->pagination->create_links();
		$data["id"] = "usuario";
		$data["titulo"] = "Seguridad";
		$data["subtitle"] = "Usuarios";
        $this->template['view'] .= $this->load->view("admin/seguridad/usuario/index",$data, true);
        $this->loadAdmin();
	}
	
	public function add(){
		if($this->isPostBack()){
			$nombre = trim($this->input->post('nombre', true));
			$usuario = trim($this->input->post('usuario', true));
			$email = trim($this->input->post('email', true));
			$rol = trim($this->input->post('rol', true));
			$password = trim($this->input->post('password', true));
			if (empty($nombre) || empty($usuario) || empty($email) || empty($password) || empty($rol)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Musuario->insertar(array("nombre_completo"=>$nombre,"usuario"=>$usuario,"email"=>$email,"clave"=>md5($password),"id_rol"=>$rol));
			redirect("admin/seguridad/usuario");			
		}
		$result = $this->Mroles->listaroles();
		
		$this->template['view'] .= $this->load->view("admin/seguridad/usuario/add", array("id"=>"usuario","titulo"=>"Seguridad","subtitle"=>"Usuarios","result"=>$result), true);
        $this->loadAdmin();
	}
	
	public function edit(){
		if($this->isPostBack()){
			$nombre = trim($this->input->post('nombre', true));
			$usuario = trim($this->input->post('usuario', true));
			$email = trim($this->input->post('email', true));
			$rol = trim($this->input->post('rol', true));
			$id = trim($this->input->post('id', true));
			$password = trim($this->input->post('password', true));
			if (empty($nombre) || empty($usuario) || empty($email) || empty($rol)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Musuario->editar(array("nombre_completo"=>$nombre,"usuario"=>$usuario,"email"=>$email,"id_rol"=>$rol,"clave"=>md5($password)),$id);
			redirect("admin/seguridad/usuario");			
		}
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Musuario->mostrarusuarioxId(array("id"=>$id));
		$listado = $this->Mroles->listaroles();
		$this->template['view'] .= $this->load->view("admin/seguridad/usuario/edit", array("id"=>"usuario","titulo"=>"Seguridad","subtitle"=>"Usuarios","result"=>$result,"listado"=>$listado), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Musuario->eliminar(array("id"=>$id));
		redirect("admin/seguridad/usuario");
	}
	
	public function changestatus(){
		$id = $this->uri->segment(5, 0);
		$status = $this->uri->segment(6, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		if ($status == 1 || $status == 0){
			$reverse = ($status == 1?0:1);
			$this->Musuario->editar(array("status"=>$reverse),$id);
			redirect("admin/seguridad/usuario");
		} else {
			show_error("Esta enviando datos incorrectos al servidor");
			exit;
		}
	}
	
	public function changepassword(){
		if($this->isPostBack()){
			$passwordold = trim($this->input->post('passwordold', true));
			$passwordnew = trim($this->input->post('passwordnew', true));
			if (empty($passwordold) || empty($passwordnew)) {
				show_error("Esta enviando datos vacios al servidor");
				exit;
			}
			$bool = $this->Musuario->cambiarpassword(array("id"=>$this->session->userdata('idU'),"old"=>md5($passwordold),"new"=>md5($passwordnew)));
			redirect("admin/seguridad/usuario/profile");
		}
	}
	
	public function uploadavatar(){
		if($this->isPostBack()){
			$config['upload_path'] = "./img/avatar/";		
			$config['allowed_types'] = 'jpg';
			$config['remove_spaces'] = TRUE;
			$config['overwrite'] = TRUE;
			$config['file_name'] = $this->session->userdata("idU");
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()) {
				$error = array('error' => $this->upload->display_errors());
				show_error($error);
			}
			else {
				$datosimg = $this->upload->data();
				$arreglo = array("state"=>200,"result"=>base_url()."img/avatar/".$datosimg["file_name"],"message"=>null);
				print_r(json_encode($arreglo));exit;
			}
		}
	}
	
	public function profile(){
		$this->template['view'] .= $this->load->view("admin/seguridad/usuario/profile", array("id"=>"usuario","titulo"=>"Usuario","subtitle"=>"Perfil"), true);
        $this->loadAdmin();
	}
	
	public function emailisused(){
		if($this->isPostBack()){
			$email = trim($this->input->post('email', true));
			$exist = $this->Musuario->emailisused($email);
			$array = array("bool"=>false);			
			if ($exist){
				$array["bool"] = true;
				$array["msg"] = "El correo esta en uso.";
			}			
			print_r(json_encode($array));exit;
		}
	}
	
	public function userisused(){
		if($this->isPostBack()){
			$usuario = trim($this->input->post('usuario', true));
			$exist = $this->Musuario->userisused($usuario);
			$array = array("bool"=>false);			
			if ($exist){
				$array["bool"] = true;
				$array["msg"] = "El usuario esta en uso.";
			}			
			print_r(json_encode($array));exit;
		}
	}
}