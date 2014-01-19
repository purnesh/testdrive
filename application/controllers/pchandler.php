<?php
class Pchandler extends CI_Controller{
	private $logged_in;
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->library('session');
		$this->load->model('atcad_train');
		$this->load->model('atcad_enabled_coaches');
		$this->load->database();
		$a = $this->session->all_userdata();
		if(isset($a['logged_in']) && isset($a['logged_in'])){
			$this->logged_in = TRUE;
		}
		else{
			$this->logged_in = FALSE;
		}
	}
	public function index($a){
		if($this->logged_in){
			echo ' r';
		}
		else{
			echo "You're not logged in!";
		}
	}
	
	public function get_trains(){
		if($this->logged_in){
			$data['a'] = $this->atcad_train->get_list();
			$data['header'] = "<i class='fa fa-th-list'></i>Trains List";
			$data['the_trail'] = array("trains-list breadcrumb-trail" => "Trains List");
			$this->load->view('train_list', $data);
		}
		else{
			$data['signin_title'] = "Sign in - ATCAD";
			$data['error'] = "You have been logged out!";
			$this->load->view('signin', $data);
		}
	}
	
	public function home_panel(){
		echo "read";
	}
	
	public function train_details($train_number){
		if($this->logged_in){
			$data['a'] = $this->atcad_enabled_coaches->get_list($train_number);
			$data['header'] = "<i class='fa fa-th-list'></i>ATCAD Coaches";
			$data['the_trail'] = array	("trains-list breadcrumb-trail" => "Trains List",
										"atcad-enabled-coaches breadcrumb-trail" => "ATCAD Coaches");
			$this->load->view('train_details',$data);
		}
		else{
			$data['signin_title'] = "Sign in - ATCAD";
			$data['error'] = "You have been logged out!";
			$this->load->view('signin', $data);
		}
	}
	
	public function get_ttedetails($ttecode){
		echo "$ttecode";
	}
}
?>

