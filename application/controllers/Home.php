<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CoreController {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("home/Mregister");
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

    public function activacion(){
        $code = $this->uri->segment(3, 0);
        $activate = $this->Mregister->activarUsuario($code);
        if ($activate){
            echo "todo ok";
        } else {
            echo "Este usuario ya esta activo";
        }
    }

    public function emailisused(){
        //echo $this->uri->segment(3, 0);exit;
        if($this->isPostBack()){
            $email = trim($this->input->post('email', true));
            $exist = $this->Mregister->emailisused($email);
            $array = array("bool"=>false);
            if ($exist){
                $array["bool"] = true;
                $array["msg"] = "El correo esta en uso.";
            }
            print_r(json_encode($array));exit;
        }
    }

    public function register()
    {
        if($this->isPostBack()){
            $fullname = trim($this->input->post('fullname', true));
            $userid = trim($this->input->post('userid', true));
            $email = trim($this->input->post('email', true));
            $password = trim($this->input->post('password', true));
            $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
            if (empty($fullname) || empty($userid) ||  empty($email) || empty($password)){
                show_error("Está enviando datos vacíos al servidor");
                exit;
            } else if (!preg_match($regex, $email)){
                show_error("Email invalido");
                exit;
            } else {

                $this->load->library('email');
                //Indicamos el protocolo a utilizar
                /*$config['protocol'] = 'smtp';

               //El servidor de correo que utilizaremos
                $config["smtp_host"] = 'correo.geomix.geocuba.cu';

               //Nuestro usuario
                $config["smtp_user"] = 'leosdan@geomix.geocuba.cu';

               //Nuestra contraseña
                $config["smtp_pass"] = 'AopenCupl30sd4n';

               //El puerto que utilizará el servidor smtp
                $config["smtp_port"] = '25';

               //El juego de caracteres a utilizar
                $config['charset'] = 'utf-8';
                $config['newline'] = "\r\n";

               //Permitimos que se puedan cortar palabras
                $config['wordwrap'] = TRUE;

               //El email debe ser valido
               $config['validate'] = FALSE;
               $config['smtp_crypto'] = 'SSL';
               $config['mailtype'] = 'html';

              //Establecemos esta configuración
                $this->email->initialize($config);*/



                $password=md5($password); // encrypted password
                $activation=md5($email.time()); // encrypted email+timestamp

                $data = array(
                    "nombre_completo" => $fullname,
                    "usuario"         => $userid,
                    "clave"           => $password,
                    "email"           => $email,
                    "activacion"      => $activation
                );

                $this->Mregister->insertar($data);

                $this->email->from('promo@as.com',"Prueba");
                $this->email->to($email);
                $this->email->subject('Email verification');
                $url = site_url("home/activacion/".$activation);
                $body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. <br/> <br/> <a href="'.$url.'">'.$url.'</a>';
                $this->email->message($body);
                $this->email->send();
                /*if ( ! $this->email->send())
                {
                    // Generate error
                    echo "Email is not sent!!";
                }

                echo $this->email->print_debugger();*/
            }
        }
        $this->load->view("home/register", array());
    }
}
