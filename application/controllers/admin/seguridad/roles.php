<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("seguridad/Mroles");
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;
		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Mroles->cantidad();
		$data["listado"] = $this->Mroles->listaroles($per_page,$offset);
		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
            array(
                'base_url'		 => site_url('/admin/seguridad/roles/index/'),
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
		$data["id"] = "roles";
		$data["titulo"] = "Seguridad";
		$data["subtitle"] = "Roles";
        $this->template['view'] .= $this->load->view("admin/seguridad/roles/index",$data, true);
        $this->loadAdmin();
	}
	
	public function add(){
		if($this->isPostBack()){
			$valor = trim($this->input->post('valor', true));
			$codigo = trim($this->input->post('codigo', true));
			if (empty($valor) || empty($codigo)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mroles->insertar(array("value"=>$valor,"code"=>$codigo));
			redirect("admin/seguridad/roles");			
		}

		$this->template['view'] .= $this->load->view("admin/seguridad/roles/add", array("id"=>"roles","titulo"=>"Seguridad","subtitle"=>"Roles"), true);
        $this->loadAdmin();
	}
	
	public function edit(){
		if($this->isPostBack()){
			$valor = trim($this->input->post('valor', true));
			$codigo = trim($this->input->post('codigo', true));
			$id = trim($this->input->post('id', true));
			if (empty($valor) || empty($id)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mroles->editar(array("value"=>$valor,"code"=>$codigo),$id);
			redirect("admin/seguridad/roles");			
		}
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Mroles->mostrarrolesxId(array("id"=>$id));
		$this->template['view'] .= $this->load->view("admin/seguridad/roles/edit", array("id"=>"roles","titulo"=>"Seguridad","subtitle"=>"Roles","result"=>$result), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Mroles->eliminar(array("id"=>$id));
		redirect("admin/seguridad/roles");
	}
}