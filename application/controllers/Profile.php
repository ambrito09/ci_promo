<?php

/**
 * Created by PhpStorm.
 * User: alex
 * Date: 4/12/2018
 * Time: 8:39 PM
 */
class Profile extends CoreController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("seguridad/Musuario", "usuario");

        if ($this->session->userdata("nombreS") == false)
        {
            redirect(site_url("home/login"));
        }
    }

    public function index()
    {
        $this->myprofile();
    }

    public function myprofile()
    {
        $this->cargaIdioma($this->session->userdata("lang"));
        $this->template["menu"] = $this->loadMenu("_profileMenu");

        $user = $this->usuario->mostrarusuarioxId(array('id'=>$this->session->userdata("idU")));
        $user->cant_visitas = $this->usuario->getProfileVisitCount($user->id);

        $this->template["view"] = $this->load->view("profile/myprofile", array('user'=>$user), true);
        $this->loadView();
    }

    public function getPoints()
    {
        $this->cargaIdioma($this->session->userdata("lang"));
        $this->template["menu"] = $this->loadMenu("_profileMenu");
        $this->loadView("profile/myprofile", $this->template);
    }
}