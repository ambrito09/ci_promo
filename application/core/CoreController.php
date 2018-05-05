<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @property CI_DB_active_record $db
 * @property CI_Loader $load
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Email $email
 * @property CI_DB_forge $dbforge
 * @property CI_Table $table
 * @property CI_Session $session
 * @property CI_FTP $ftp
 */

//session_start();
/**
 * De esta clase heredan las clases controladores. Principales funcionalidades:
 * - Menu.
 * - Mostrar vistas con plantilla.
 *
 * @author Alejandro Martínez Brito.
 */

class CoreController extends CI_Controller{

    public $template = array(); //Nombre del template que se va a usar.

    public function __construct(){
        parent::__construct();
		$this->load->model("nomencladores/Midioma");
        /*Default vars for the template*/
        $this->template = array(
            'title' => 'Promotion',
            'viewTitle' => '',
            'keywords' => '',
            'description' => '',
			"idiomas"=>$this->Midioma->listaidioma(),
            'view' => '',
            'menu' => $this->loadMenu("_frontMenu")
        );
        $this->load->vars($this->template);
        if($this->session->userdata("lang") != ''){
            $this->cargaIdioma($this->session->userdata("lang"));
        }
        else {
            $this->session->set_userdata('lang', 'it');
            $this->cargaIdioma("it");
        }
    }

    /**
     * Load site template
     * @return void
     */
    public function loadView(){
        /* Load the site's template with the view defined in the controller class, in 'VIEW' var.*/
        $this->load->view('shared/_layout', $this->template);
    }

    public function loadAdmin(){
        /*Load the site's admin template with the view defined in the controller class, in 'VIEW' var.*/
        $this->load->view('shared/nuevolayout', $this->template);
    }

    public function accesoAdmin(){
        if (empty($this->session->userdata('idU')))
            redirect("admin/home");
    }

    /**
     * Check if there is any value in $_POST.
     *
     * @param array $arr_data
     * @return bool
     */
    public function isPostBack($arr_data=array())
    {
        if ( !is_array($arr_data) )
        {
            $arr_data = array( $arr_data );
        }
        if (isset($_POST) && count($_POST) > 0)
        {
            return true;
        }
        return false;
    }

    public function language()
    {
        $lang = $this->uri->segment(3);
        $this->cargaIdioma($lang);
        $this->session->unset_userdata('lang');
        $this->session->set_userdata("lang", $lang);
        $var = explode('/', $_SERVER['HTTP_REFERER']);
        if($var[5] == "home" && ($var[6] == "index" || $var[6] == "")){
            $url = $var[5]."/".$var[6]."/".$lang;
        /*if($var[4] == "home" && ($var[5] == "index" || $var[5] == "")){
            $url = $var[4]."/".$var[5]."/".$lang;*/
            redirect($url);
        }
        else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

	public function idiomas(){
		$lang = $this->uri->segment(5);
		$this->session->unset_userdata('langS');
        $this->session->set_userdata("langS", $lang);
		redirect($_SERVER['HTTP_REFERER']);
	}

    public function cargaIdioma($idioma) {
        if($idioma == 'it')
            $this->lang->load("ui", "italian");
        else
            $this->lang->load("ui", "english");
    }

    public function loadMenu($menu)
    {
        $this->cargaIdioma($this->session->userdata("lang"));
        return $this->load->view("shared/$menu", array(), true);
    }
}
