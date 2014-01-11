<?php


class Setup extends CI_Controller{
	
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
	/*	
		$a = $this->db->query('create table user_store(
			username varchar(20),
			name varchar(30),
			access_level int,
			password varchar(20)
			);');
		echo $a;
		$a = $this->db->query('insert into user_store VALUES(
			"purneshtripathi",
			"Purnesh Tripathi",
			3,
			"Purmesh#1"
			);');
		echo $a;
		$a = $this->db->query('insert into user_store VALUES(
			"saurabhverma",
			"Saurabh Verma",
			3,
			"srv123"
			);');
		echo $a;
		$a = $this->db->query('insert into user_store VALUES(
			"administrator",
			"Texas Instruments",
			2,
			"ti_admin"
			);');
		echo $a;
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS ci_sessions (
			session_id varchar(40) DEFAULT "0" NOT NULL,
			ip_address varchar(45) DEFAULT "0" NOT NULL,
			user_agent varchar(120) NOT NULL,
			last_activity int(10) unsigned DEFAULT 0 NOT NULL,
			user_data text NOT NULL,
			PRIMARY KEY (session_id),
			KEY last_activity_idx (last_activity)
		);');
		echo $a;
		
*/		
	}
}
?>
