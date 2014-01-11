<?php

class Control extends CI_Controller{
	
	public function __construct()
       {
            parent::__construct();
            $this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');
			$this->load->database();
	}
	
	public function index(){
		$a = $this->session->all_userdata();
		
		if(isset($a['logged_in']) && $a['logged_in']){
			$this->load->view('c_panel', $a);
		}
		else{
			if(isset($_POST['username']) && $_POST['username']!=NULL){
				$gv =0 ;
				if(isset($_POST['password']) && $_POST['password'] != NULL){
				
					$verifier = array('username' => $_POST['username'], 'password' => $_POST['password']);
					$results = $this->db->get_where('user_store', $verifier);
					foreach ($results->result() as $row)
					{	
						if($row){
							$valid['name'] = $row->name;
							$valid['access_level'] = $row->access_level;
							$valid['logged_in'] = TRUE;
							$this->session->set_userdata($valid);
							$a = $this->session->all_userdata();
							$this->load->view('c_panel', $a);
							$gv = 1;
						}					
					}
						if($gv == 0){
							$data['error'] = "Incorrect Administrator Code or Password";
							$this->load->view('signin', $data);
							$gv =1;
						}
				}
				if($gv == 0){
					$data['error'] = "Please enter a valid password";
					$this->load->view('signin', $data);
				}
			}
			else{
				$data['error'] = "Empty fields are not going to work here";
				$this->load->view('signin', $data);
			}
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		$data['error'] = "You have been successfully logged out";
				$this->load->view('signin', $data);
	}
}
?>
