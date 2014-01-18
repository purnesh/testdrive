<?php
class Atcad_train extends CI_Model{
	var $train_number;
	var $train_name;
	var $train_active;
	var $train_from;
	var $train_to;
	var $train_start_time;
	var $train_destination_time;
	
	function __construct(){
		parent::__construct();
            $this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');
			$this->load->database();
	}
	
	function get_list(){
		$query = $this->db->get('train_details');
		return $query;
	}
	
	function insert_entry(){
		
	}
}
?>
