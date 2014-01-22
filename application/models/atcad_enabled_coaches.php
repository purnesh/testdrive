<?php
	class Atcad_enabled_coaches extends CI_Model{
		
		public function __construct(){
			parent::__construct();
            $this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');
			$this->load->database();
		}
		
		public function get_list($train_number){
			$table_name = $train_number."_aec";
			$query = $this->db->get($table_name);
			return $query;
		}
		
		public function get_details($tno, $cno){
			$table_name = $tno."_aec_".$cno."_details";
			$query = $this->db->get($table_name);
			return $query;
		}
	}
?>
