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
		

	$a = $this->db->query('CREATE TABLE IF NOT EXISTS train_details (
			train_number int(10),
			train_name varchar(30) DEFAULT "1" NOT NULL,
			train_from varchar(5) DEFAULT "1" NOT NULL,
			train_to varchar(5) DEFAULT "1" NOT NULL,
			train_start_time varchar(6) DEFAULT "0" NOT NULL,
			train_destination_time varchar(6) DEFAULT "0" NOT NULL,
			train_active int(1) DEFAULT "1",
			PRIMARY KEY (train_number)
		);');
	
	echo $a;
	*/ 	
	}
	
	function train_details_inserter($tno, $tname, $tfro, $tto, $tst, $tdt, $ta){
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

	
	function train_details_updater($train_number, $attribute, $value){
		if($attribute == 'train_active' || $attribute == 'train_number'){
			$a = $this->db->query("update train_details set $attribute = $value where train_number = $train_number");
		}
		else{
			$a = $this->db->query("update train_details set $attribute = '$value' where train_number = $train_number");
		}
		echo $a;
	}
	
	
}
?>
