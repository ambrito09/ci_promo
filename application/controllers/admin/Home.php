<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CoreController {
    public function __construct()
    {
        parent::__construct();
		$this->load->model("admin/Madmin");		
    }

	public function index()
	{
		$this->load->view("admin/login", array());
	}
	
	public function login(){		
		if($this->isPostBack()){
			$email = trim($this->input->post('email', true));
			$clave = trim($this->input->post('clave', true));
			$data = array(
				"email"=>$email,
				"clave"=>md5($clave),
				"status"=>1,
				"code"=>"admin"
			);
			$result = $this->Madmin->login($data);
			if (!$result){
				redirect("admin/home/index");
			} else {
				$datos_session = array(
					"nombreS"=>$result->nombre_completo,
					"userS"=>$result->usuario,
					"rolS"=>$result->rol,
					"idU"=>$result->ids,
					"emailS"=>$result->email,
					"statusS"=>$result->status,
					"loggedIn"=>true
				);
				$this->session->set_userdata($datos_session);
				//$this->Madmin->addcontador($result->ids,$_SERVER['REMOTE_ADDR']);
				redirect("admin/seguridad/dashboard/index");
			}
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect("admin/home/index");
	}
}
