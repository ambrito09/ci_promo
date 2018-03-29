<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zona extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->load->model("nomencladores/Mzona");
		$this->load->model("nomencladores/Mprovincia");
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;
		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Mzona->cantidad();
		
		$data["listado"] = $this->Mzona->listazona($per_page,$offset);
		for ($i=0;$i<count($data["listado"]);$i++){
			$data["listado"][$i]->id_provincia = $this->Mprovincia->mostrarProvinciaxId(array("id"=>$data["listado"][$i]->id_provincia))->value;
		}
		
		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
							array(
									'base_url'		 => site_url('/admin/nomencladores/zona/index/'),
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
		$data["id"] = "zona";
		$data["subtitle"] = "Zonas";
        $this->template['view'] .= $this->load->view("admin/nomencladores/zona/index",$data, true);
        $this->loadAdmin();
	}
	
	public function add(){
		if($this->isPostBack()){
			$valor = trim($this->input->post('valor', true));
			$provincia = trim($this->input->post('provincia', true));
			if (empty($valor)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mzona->insertar(array("value"=>$valor,"id_provincia"=>$provincia));
			redirect("admin/nomencladores/zona");			
		}
		
		 $result = $this->Mprovincia->listaProvincia();
		
		$this->template['view'] .= $this->load->view("admin/nomencladores/zona/add", array("id"=>"zona","subtitle"=>"Zonas","result"=>$result), true);
        $this->loadAdmin();
		
	}
	
	public function edit(){
		if($this->isPostBack()){
			$valor = trim($this->input->post('valor', true));
			$provincia = trim($this->input->post('provincia', true));
			$id = trim($this->input->post('id', true));
			if (empty($valor) || empty($id)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mzona->editar(array("value"=>$valor,"id_provincia"=>$provincia),$id);
			redirect("admin/nomencladores/zona");			
		}
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Mzona->mostrarzonaxId(array("id"=>$id));
		 $listado = $this->Mprovincia->listaProvincia();
		$this->template['view'] .= $this->load->view("admin/nomencladores/zona/edit", array("id"=>"zona","subtitle"=>"Zonas","result"=>$result,"listado"=>$listado), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Mzona->eliminar(array("id"=>$id));
		redirect("admin/nomencladores/zona");
	}
}