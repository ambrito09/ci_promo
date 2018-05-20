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

        if ($this->session->userdata("idU") == false)
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

        $user = $this->_getUserData();

        $this->template["view"] = $this->load->view("profile/myprofile", array('user'=>$user), true);
        $this->loadView();
    }

    public function getPoints()
    {
        $this->cargaIdioma($this->session->userdata("lang"));
        $this->template["menu"] = $this->loadMenu("_profileMenu");

        $this->load->model("nomencladores/Mofertaspuntos", "puntos");
        $data = array(
            "user" => $this->_getUserData(),
            "pointsOffers" => $this->puntos->listaofertapuntosa()
        );

        $this->template["view"] = $this->load->view("profile/getpoints", $data, true);
        $this->loadView();
    }

    public function upgrade()
    {
        $this->cargaIdioma($this->session->userdata("lang"));
        $this->template["menu"] = $this->loadMenu("_profileMenu");

        $this->load->model("nomencladores/Mtipocuenta", "tipocuenta");
        $data = array(
            "user" => $this->_getUserData(),
            "accountTypes" => $this->tipocuenta->listatipocuenta()
        );

        $this->template["view"] = $this->load->view("profile/upgrade", $data, true);
        $this->loadView();
    }

    public function myannounce()
    {
        $currentLang = $this->getCurrentIdioma();
        $this->load->model("nomencladores/mservicio", "serv");
        $this->load->model("nomencladores/mprovincia", "prov");
        $this->load->model("admin/mpublicidad", "publ");
        $data = array();
        $data["publicidad"] = $this->publ->getPublicidadById($this->session->userdata("idU"), $currentLang->id);
        $data["servicios"] = $this->serv->listaservicioLang(array("id_lang"=>$currentLang->id));
        $data["provincias"] = $this->prov->listaProvincia();
        $this->template["view"] = $this->load->view("profile/createannounce", $data, true);
        $this->loadView();
    }

    public function saveannounce()
    {
        if ($this->isPostBack($_POST))
        {
            $this->load->model("admin/mpublicidad", "publ");
            $currentLang = $this->getCurrentIdioma();
            $has_publicidad = $this->publ->getPublicidadById($this->session->userdata("idU"), $currentLang->id);
            if ($has_publicidad != null)
            {
                $this->publ->modificarpublicidad($_POST, $this->template["idiomas"]);
            }
            else
            {
                $this->publ->insertarpublicidad($_POST, $this->template["idiomas"]);
            }
            redirect(site_url("profile/myprofile"));
        }
        else
        {
            redirect(site_url());
        }
    }

    private function _getUserData()
    {
        $user = $this->usuario->mostrarusuarioxId(array('id'=>$this->session->userdata("idU")));
        $user->cant_visitas = $this->usuario->getProfileVisitCount($user->id);
        $user->publicidad = $this->usuario->getUserPublicidad($user->id);

        return $user;
    }
}