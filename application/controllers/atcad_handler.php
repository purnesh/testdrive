<?php
class Atcad_handler extends CI_Controller{
	private $logged_in;
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->model('atcad_train');
		$this->load->model('atcad_enabled_coaches');
		$this->load->model('atcad_device');
		$this->load->database();
		$a = $this->session->all_userdata();
		if(isset($a['logged_in']) && isset($a['logged_in'])){
			$this->logged_in = TRUE;
		}
		else{
			$this->logged_in = FALSE;
		}
	}
	
	public function login($dc, $tc){
		if($this->atcad_device->authenticate_device($dc, $tc)){
			$this->logged_in = TRUE;
			$valid['logged_in'] = $this->logged_in;
			$this->session->set_userdata($valid);
			$a = $this->session->all_userdata();
			var_dump($a);
			$this->load->view('xsrf_tokenizer');
		}
		else{
			$this->logged_in = FALSE;
			echo "Maa Chuda";
		}
	}
	//http://ti-atcad.com/index.php/atcad_handler/login/DMY_000/123456
	
	public function pnr_code_verifier($pnr_code){
		$a = $this->session->all_userdata();
		if($a['logged_in']){
			if($pnr_code){
				echo "reder";
			}
		}
	}
}
?>
