<?php
class Atcad_train extends CI_Model{
	var train_no = '';
	var train_name = '';
	var train_active = '1';
	
	
	function __construct{
		parent::__construct();
            $this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');
			$this->load->database();		
	}
	
	function get_list(){
		$query = $this->db->get('trains', 5);
		return $query;
	}
	
	function insert_entry(){
		
	}
}
?>
