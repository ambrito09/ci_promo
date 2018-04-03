<?php

class Migracion extends CoreController {

	public function __construct()
    {
        parent::__construct();	
		$this->accesoAdmin();
		$this->load->model("admin/Madmin");
    }
	
	public function index(){
		$arreglo_lineas = "";
		$file = new SplFileObject(APPPATH."migrations/002_add_blog.php");

		// Loop until we reach the end of the file.
		while (!$file->eof()) {
			// Echo one line from the file.
			$arreglo_lineas .= $file->fgets();
		}
		$file = null;
		$this->template['view'] .= $this->load->view("admin/basedatos/index", array("id"=>"basedatos","titulo"=>"Base de datos","subtitle"=>"Migraci&oacute;n","lineas"=>$arreglo_lineas), true);
		$this->loadAdmin();
	}
	
    public function migration(){
        if($this->isPostBack()){
            $version = $this->Madmin->getmigracionversion()->version+1;
            if ($version<10){
                $version = "00".$version;
            } else if($version<100){
                $version = "0".$version;
            }
            $codigo = trim($this->input->post('codigo', true));

            $ourFileName = $version."_change_database.php";
            $ourFileHandle = fopen(APPPATH."migrations/".$ourFileName, 'w') or die("can't open file");
            $texto = "<?php\n";
            $texto .= "defined('BASEPATH') OR exit('No direct script access allowed');\n";
            $texto .= "class Migration_change_database extends CI_Migration {\n";
            $texto .= "public function up(){\n";
            $texto .= $codigo.";\n";
            $texto .= "}\n";
            $texto .= "public function down(){\n";
            $texto .= "}\n";
            $texto .= "}\n";
            $texto .= "?>\n";
            fwrite($ourFileHandle, $texto);
            fclose($ourFileHandle);
            $this->load->library('migration');
            $this->migration->version($version);
            if ($this->migration->current() === FALSE)
            {
                show_error($this->migration->error_string());
            }else {
                echo "success";
            }
        }
	}
}