<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emailconfig extends CoreController {
    public function __construct()
    {
        parent::__construct();
        $this->accesoAdmin();
        $this->load->model("admin/Mpreferencias");
    }

    public function index()
    {
        $message = $this->uri->segment(5, 0);
        if (!empty($message)){
            switch($message){
                case "mail":
                    $data["message"] = "Correo enviado correctamente.";
                    break;
                case "update":
                    $data["message"] = "Datos actualizados correctamente.";
                    break;
                case "mailerror":
                    $data["message"] = "Se ha producido un error al enviar el correo.";
                    $data["error"] = 1;
                    break;
            }
        }
        $data["resultado"] = $this->Mpreferencias->getemailconfig();
        $data["id"] = "preferencias";
        $data["titulo"] = "Preferencias";
        $data["subtitle"] = "E-mail";
        $this->template['view'] .= $this->load->view("admin/preferencias/email",$data, true);
        $this->loadAdmin();
    }

    public function updatemailconf(){
        if($this->isPostBack()){
            $tipo_envio = trim($this->input->post('tipo_envio', true));
            $formato = trim($this->input->post('formato', true));
            $arreglo = array(
                "mailtype"=>$tipo_envio,
                "mailformat"=>$formato
            );
            $this->Mpreferencias->editaremail($arreglo);
            $mensaje = "update";
            redirect("admin/preferencias/emailconfig/index/".$mensaje);
        }
    }

    public function configsmtp(){
        if($this->isPostBack()){
            $protocol = trim($this->input->post('protocol', true));
            $smtp_server = trim($this->input->post('smtp_server', true));
            $smtp_user = trim($this->input->post('smtp_user', true));
            $smtp_password = trim($this->input->post('smtp_password', true));
            $smtp_crypto = trim($this->input->post('smtp_crypto', true));
            $port = trim($this->input->post('port', true));
            $charset = trim($this->input->post('charset', true));
            $newline = trim($this->input->post('newline', true));
            $validate = (trim($this->input->post('validate', true))=="on"?1:0);
            $wordwrap = (trim($this->input->post('wordwrap', true))=="on"?1:0);
            $arreglo = array(
                "protocol"=>$protocol,
                "smtp_host"=>$smtp_server,
                "smtp_user"=>$smtp_user,
                "smtp_pass"=>$smtp_password,
                "smtp_crypto"=>$smtp_crypto,
                "smtp_port"=>$port,
                "charset"=>$charset,
                "newline"=>$newline,
                "validate_email"=>$validate,
                "wordwrap"=>$wordwrap
            );
            $this->Mpreferencias->editaremail($arreglo);
            $mensaje = "update";
            redirect("admin/preferencias/emailconfig/index/".$mensaje);
        }
    }

    public function sendemailtest(){
        if($this->isPostBack()){
            $email = trim($this->input->post('email', true));
            $resultado = $this->Mpreferencias->getemailconfig();
            $body = "This is a test message. Your server is now configured to send email";
            $subject = "Test message -- Promo";
            $this->load->library('email');
            $config = array();

            if ($resultado->mailtype == 0) {
                //Indicamos el protocolo a utilizar
                $config['protocol'] = $resultado->protocol;

                //El servidor de correo que utilizaremos
                $config["smtp_host"] = $resultado->smtp_host;

                //Nuestro usuario
                $config["smtp_user"] = $resultado->smtp_user;

                //Nuestra contraseña
                $config["smtp_pass"] = $resultado->smtp_pass;

                //El puerto que utilizará el servidor smtp
                $config["smtp_port"] = $resultado->smtp_port;

                //El juego de caracteres a utilizar
                $config['charset'] = $resultado->charset;
                $config['newline'] = $resultado->newline;

                //Permitimos que se puedan cortar palabras
                $config['wordwrap'] = $resultado->wordwrap;

                //El email debe ser valido
                $config['validate'] = $resultado->validate_email;
                $config['smtp_crypto'] = $resultado->smtp_crypto;

                $config['mailtype'] = $resultado->mailformat;
                $this->email->initialize($config);

                //Establecemos esta configuración

            }
            $this->email->from($email,"No-reply");
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($body);
            $mensaje = "";
            if (!$this->email->send()) {
                $mensaje = "mailerror";
            }else {
                $mensaje = "mail";
            }

            redirect("admin/preferencias/emailconfig/index/".$mensaje);
        }

    }
}