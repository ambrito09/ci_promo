<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CoreController {
	
	public function __construct()
    {
        parent::__construct();
		$this->accesoAdmin();
		$this->load->model("admin/Madmin");

    }
	
	public function index()
	{

        $this->template['view'] .= $this->load->view("admin/home/index", array("titulo"=>"Dashboard","subtitle"=>"Overview","estadisticas"=>$this->Madmin->estadisticas(),"topprofile"=>$this->Madmin->topprofile()), true);
        $this->loadAdmin();
	}
	


	public function showvisitxmonth(){
		$result = $this->Madmin->showvisitxmonth();
		print_r(json_encode($result));exit;
	}
}