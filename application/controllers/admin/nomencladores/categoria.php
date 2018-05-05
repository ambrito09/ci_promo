<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("nomencladores/Mcategoria");
		$this->load->model("nomencladores/Midioma");
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;

		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Mcategoria->cantidad();
		$id_lang = $this->Midioma->mostraridiomaxcode(array("lang"=>$this->session->userdata("langS")));
		$data["listado"] = $this->Mcategoria->listacategoria(array("id_lang"=>$id_lang),$per_page,$offset);

		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
            array(
                'base_url'		 => site_url('/admin/nomencladores/categoria/index/'),
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
		$data["id"] = "categoria";
		$data["titulo"] = "Nomencladores";
		$data["subtitle"] = "Categor&iacute;as";
        $this->template['view'] .= $this->load->view("admin/nomencladores/categoria/index",$data, true);
        $this->loadAdmin();
	}
	
	public function add(){
		if($this->isPostBack()){
			$names = $this->input->post('valor', true);
			$codes = $this->input->post('hvalores', true);
			if (count($names)==0){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mcategoria->insertar($names,$codes);
			redirect("admin/nomencladores/categoria");			
		}

		$this->template['view'] .= $this->load->view("admin/nomencladores/categoria/add", array("id"=>"categoria","titulo"=>"Nomencladores","subtitle"=>"Categor&iacute;as","idiomas"=>$this->Midioma->listaidioma()), true);
        $this->loadAdmin();
	}
	
	public function edit(){
		if($this->isPostBack()){
			$names = $this->input->post('valor', true);
			$codes = $this->input->post('hvalores', true);
			$id = $this->input->post('hid', true);
			if (count($names)==0){
				show_error("Está enviando datos vacíos al servidor");
				exit;
			}
			$this->Mcategoria->eliminar_cat_lang(array("id_categoria"=>$id));
			$this->Mcategoria->editar($names,$codes,$id);
			//$this->Mcategoria->editar(array("value"=>$valor),$id);
			redirect("admin/nomencladores/categoria");			
		}
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Mcategoria->mostrarcategoriaxId(array("id"=>$id));
		$cats = $this->Mcategoria->listacategoria(array("id_categoria"=>$result->id));

		$this->template['view'] .= $this->load->view("admin/nomencladores/categoria/edit", array("id"=>"categoria","titulo"=>"Nomencladores","subtitle"=>"Categor&iacute;as","result"=>$result,"idiomas"=>$this->Midioma->listaidioma(),"cats"=>$cats), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Mcategoria->eliminar_cat_lang(array("id_categoria"=>$id));
		$this->Mcategoria->eliminar(array("id"=>$id));
		redirect("admin/nomencladores/categoria");
	}
}