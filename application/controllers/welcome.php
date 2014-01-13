<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
       {
            parent::__construct();
            $this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');
		}
	public function index()
	{	
		$a = $this->session->all_userdata();
		if(isset($a['logged_in']) && $a['logged_in']){
			$this->load->view('index_page2');
			$this->load->view('footer');
		}
		else{
			$data['title'] = "ATCAD - Home";
			$data['placeh'] = "Administrator Code";
			
			$this->load->view('index_page', $data);
			$this->load->view('footer');
		}
	}
	
	public function sender(){
		$this->load->helper('url');
		$data['title'] = "Welcome Mr. X";
		$this->load->view('index_page2', $data);
		
	}
}
