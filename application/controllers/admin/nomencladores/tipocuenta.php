<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipocuenta extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("nomencladores/Mtipocuenta");
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;
		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Mtipocuenta->cantidad();
		$data["listado"] = $this->Mtipocuenta->listatipocuenta($per_page,$offset);
		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
            array(
                'base_url'		 => site_url('/admin/nomencladores/tipocuenta/index/'),
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
		$data["id"] = "tipocuenta";
		$data["titulo"] = "Nomencladores";
		$data["subtitle"] = "Tipo de cuenta";
        $this->template['view'] .= $this->load->view("admin/nomencladores/tipocuenta/index",$data, true);
        $this->loadAdmin();
	}
	
	public function add(){
		if($this->isPostBack()){
			$valor = trim($this->input->post('valor', true));
			if (empty($valor)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mtipocuenta->insertar(array("value"=>$valor));
			redirect("admin/nomencladores/tipocuenta");			
		}

		$this->template['view'] .= $this->load->view("admin/nomencladores/tipocuenta/add", array("id"=>"tipocuenta","titulo"=>"Nomencladores","subtitle"=>"Tipo de cuenta"), true);
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
			$this->Mtipocuenta->editar(array("value"=>$valor),$id);
			redirect("admin/nomencladores/tipocuenta");			
		}
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Mtipocuenta->mostrartipocuentaxId(array("id"=>$id));
		$this->template['view'] .= $this->load->view("admin/nomencladores/tipocuenta/edit", array("id"=>"tipocuenta","titulo"=>"Nomencladores","subtitle"=>"Tipo de cuenta","result"=>$result), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Mtipocuenta->eliminar(array("id"=>$id));
		redirect("admin/nomencladores/tipocuenta");
	}
}