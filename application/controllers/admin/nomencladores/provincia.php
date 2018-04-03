<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Provincia extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("nomencladores/Mprovincia");
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;
		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Mprovincia->cantidad();
		
		$data["listado"] = $this->Mprovincia->listaProvincia($per_page,$offset);
		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
            array(
                'base_url'		 => site_url('/admin/nomencladores/provincia/index/'),
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
		$data["id"] = "provincia";
		$data["titulo"] = "Nomencladores";
		$data["subtitle"] = "Provincias";
        $this->template['view'] .= $this->load->view("admin/nomencladores/provincia/index",$data, true);
        $this->loadAdmin();
	}
	
	public function add(){
		if($this->isPostBack()){
			$valor = trim($this->input->post('valor', true));
			if (empty($valor)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mprovincia->insertar(array("value"=>$valor));
			redirect("admin/nomencladores/provincia");			
		}

		$this->template['view'] .= $this->load->view("admin/nomencladores/provincia/add", array("id"=>"provincia","titulo"=>"Nomencladores","subtitle"=>"Provincias"), true);
        $this->loadAdmin();
	}
	
	public function edit(){
		if($this->isPostBack()){
			$valor = trim($this->input->post('valor', true));
			$id = trim($this->input->post('id', true));
			if (empty($valor) || empty($id)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mprovincia->editar(array("value"=>$valor),$id);
			redirect("admin/nomencladores/provincia");			
		}
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Mprovincia->mostrarProvinciaxId(array("id"=>$id));
		$this->template['view'] .= $this->load->view("admin/nomencladores/provincia/edit", array("id"=>"provincia","titulo"=>"Nomencladores","subtitle"=>"Provincias","result"=>$result), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Mprovincia->eliminar(array("id"=>$id));
		redirect("admin/nomencladores/provincia");
	}
}