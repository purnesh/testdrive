<?php
class Atcad_train extends CI_Model{
	
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
	
	function insert($tno, $tname, $tfro, $tto, $tst, $tdt, $ta){
		$data = array(
		   'train_number' => $tno,
		   'train_name' => $tname,
		   'train_from' => $tfro,
		   'train_to' => $tto,
		   'train_start_time' => $tst,
		   'train_destination_time' => $tdt,
		   'train_active' => $ta
		);

		$a = $this->db->insert('train_details', $data);
		echo $a;
	}
	
	function get_route($train_number){
		$tname = $train_number."_route";
		$query = $this->db->get($tname);
		return $query;
	}
}
?>
