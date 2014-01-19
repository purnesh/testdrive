<?php
	class Passengers extends CI_Model{
		function __construct(){
			parent::__construct();
            $this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');
			$this->load->database();
		}
		
		
	}
?>
