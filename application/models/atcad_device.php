<?php
	class Atcad_device extends CI_Model{
		function __construct(){
			parent::__construct();
            $this->load->helper('url');
			$this->load->helper('form');
			$this->load->helper('html');
			$this->load->library('session');
			$this->load->database();
		}
	
		public function verify_device_code(){
			
		}

		public function authenticate_device($device, $tte){
			$param = array($device, $tte);
			$sql = "select * from atcad_devices where device_number = ? AND device_tte = ?";
			$query = $this->db->query($sql, $param);
			if ($query->num_rows() > 0)
			{
				return 1;
			}
			else{
				return 0;
			}
		}
		
		
	
	}
?>
