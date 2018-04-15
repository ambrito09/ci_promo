<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicidad extends CoreController {
	
    public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("admin/Mpublicidad");	
    }

	public function index()
	{
		$this->load->library('pagination');	
		$per_page = 5;
		$offset = ($this->uri->segment(5, 0)!=null?($this->uri->segment(5, 0)-1)*$per_page:0);
		$total_rows = $this->Mpublicidad->cantidad();
		
		$data["listado"] = $this->Mpublicidad->listarpublicidad($per_page,$offset);
		$data["cantidad"] = count($data["listado"]);
		
		$this->pagination->initialize(
            array(
                'base_url'		 => site_url('/admin/publicidad/publicidad/index/'),
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
		$data["id"] = "publicidad";
		$data["titulo"] = "Publicidad";
		$data["subtitle"] = "Anuncios";
        $this->template['view'] .= $this->load->view("admin/publicidad/index",$data, true);
        $this->loadAdmin();
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
			$this->Mpublicidad->editar(array("if_activo"=>$reverse),$id);
			redirect("admin/publicidad/publicidad/index");
		} else {
			show_error("Esta enviando datos incorrectos al servidor");
			exit;
		}
	}
	
	public function view(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$result = $this->Mpublicidad->mostrarpublicidadxId(array("publicidad.id"=>$id));
		$this->template['view'] .= $this->load->view("admin/publicidad/view", array("id"=>"publicidad","titulo"=>"Publicidad","subtitle"=>"Anuncios","result"=>$result), true);
        $this->loadAdmin();
	}
	
	public function delete(){
		$id = $this->uri->segment(5, 0);
		if (empty($id)) {
			show_error("Esta enviando datos vacios al servidor");
			exit;
		}
		$this->Mpublicidad->eliminar(array("id"=>$id));
		redirect("admin/publicidad/publicidad/index");
	}
}