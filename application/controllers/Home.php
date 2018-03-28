<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CoreController {
    public function __construct()
    {
        parent::__construct();

    }

	public function index()
	{
        $this->template['view'] .= $this->load->view("home/index", array(), true);
        $this->loadView();
	}

    public function profile($profileID)
    {
        if ($this->uri->segment(3) === FALSE)
        {
            $profileID = 0;
        }

        $this->template['view'] .= $this->load->view("home/profile", array(), true);
        $this->loadView();
	}

    public function login()
    {
        $this->load->view("home/login", array());
	}
}
