<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CoreController {
    public function __construct()
    {
        parent::__construct();

    }

	public function index()
	{
        $this->template['view'] .= $this->load->view("admin/home/index", array("id"=>"dashboard","subtitle"=>"Dashboard"), true);
        $this->loadAdmin();
	}
}
