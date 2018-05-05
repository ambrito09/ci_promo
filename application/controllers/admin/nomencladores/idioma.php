<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Idioma extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("nomencladores/Midioma");
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;
		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Midioma->cantidad();
		$data["listado"] = $this->Midioma->listaidioma($per_page,$offset);
		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
            array(
                'base_url'		 => site_url('/admin/nomencladores/idioma/index/'),
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
		$data["id"] = "idioma";
		$data["titulo"] = "Nomencladores";
		$data["subtitle"] = "Idioma";
        $this->template['view'] .= $this->load->view("admin/nomencladores/idioma/index",$data, true);
        $this->loadAdmin();
	}
	
	public function add(){
		if($this->isPostBack()){
			$nombre = trim($this->input->post('nombre', true));
			$codigo = trim($this->input->post('codigo', true));
			if (empty($nombre) || empty($codigo)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Midioma->insertar(array("lang"=>$codigo,"name"=>$nombre));
			redirect("admin/nomencladores/idioma");			
		}

		$this->template['view'] .= $this->load->view("admin/nomencladores/idioma/add", array("id"=>"idioma","titulo"=>"Nomencladores","subtitle"=>"Idioma"), true);
        $this->loadAdmin();
	}
	
	public function edit(){
		if($this->isPostBack()){
			$nombre = trim($this->input->post('nombre', true));
			$codigo = trim($this->input->post('codigo', true));
			$id = trim($this->input->post('id', true));
			if (empty($nombre) || empty($id) || empty($codigo)){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Midioma->editar(array("lang"=>$codigo,"name"=>$nombre),$id);
			redirect("admin/nomencladores/idioma");			
		}
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Midioma->mostraridiomaxId(array("id"=>$id));
		$this->template['view'] .= $this->load->view("admin/nomencladores/idioma/edit", array("id"=>"idioma","titulo"=>"Nomencladores","subtitle"=>"Idioma","result"=>$result), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Midioma->eliminar($id);
		redirect("admin/nomencladores/idioma");
	}
}