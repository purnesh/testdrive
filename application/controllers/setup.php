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
		$this->create_table_for_train($tno);
		echo $a;
	}
	
	function train_list_selector(){
		$a = $this->db->get('train_details');
		var_dump($a);
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
	
	function coach_details_inserter($tno, $cno, $ccls, $cname, $ctte, $capacity){
		$tname = $tno."_aec";
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$tname.' (
			coach_number int(10) PRIMARY KEY,
			coach_class varchar(20) DEFAULT "1" NOT NULL,
			coach_name varchar(5) DEFAULT "1" NOT NULL,
			coach_tte varchar(20) DEFAULT 1 NOT NULL,
			coach_capacity int(5) DEFAULT 1 NOT NULL,
			FOREIGN KEY (coach_tte) REFERENCES atcad_devices(device_tte)
		);');
		echo $a;
		if($a){$data = array('coach_number' => $cno,
					'coach_class' => $ccls,
					'coach_name' => $cname,
					'coach_tte' =>$ctte,
					'coach_capacity' => $capacity
					);
			$a = $this->db->insert($tname, $data);
		}
		if($a){
			$this->coach_blueprint_inserter($tno, $cno, $ccls, $capacity);
		}
		
	}
	//http://localhost/testdrive/index.php/setup/coach_details_inserter/32072/23568/Chair-Car/CC1/123456/10
	
	function coach_blueprint_inserter($tno, $coach_number, $class, $capacity){
			$the_name = $tno."_aec_".$coach_number."_details";
			$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$the_name.' (
				serial_number int(10) PRIMARY KEY,
				alotted_to varchar(20) DEFAULT "1" NOT NULL,
				seat_type varchar(5) DEFAULT "1" NOT NULL
			);');
			$t=1;
			if($class == "Chair-Car"){
				for($i=1; $i<=$capacity; $i++){
					$st;
					switch ($t){
						case 1:
							$st = "LW";
							$t = $t + 1;
							break;
						case 2:
							$st = "LM";
							$t = $t + 1;
							break;
						case 3:
							$st = "LC";
							$t = $t + 1;
							break;
						case 4:
							$st = "RC";
							$t = $t + 1;
							break;
						case 5:
							$st = "RW";
							$t = 1;
							break;
					}
					$a = $this->db->query('insert into '.$the_name." values(
						$i, 000, '$st'
						);");
				}
			}
	}
	
	function train_details_selector($tno){
		$tname = $tno."_aec";
		$a = $this->db->get($tname);
		var_dump($a);
	}
	
	public function atcad_device_inserter($dno, $dtte, $train, $coach){
		$dname = "atcad_devices";
		
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$dname.' (
			device_number varchar(20) PRIMARY KEY,
			device_tte varchar(20) DEFAULT "000",
			device_train int(10) DEFAULT "42073",
			device_coach_name varchar(5) DEFAULT "EE1"
		);');
		
		echo $a;
		
		
		if($a){$data = array('device_number' => $dno,
							'device_tte' => $dtte,
							'device_train'=> $train,
							'device_coach_name'=> $coach);
			$a = $this->db->insert($dname, $data);
		}
	}
	//http://localhost/testdrive/index.php/setup/atcad_device_inserter/SLVE_9856/4E00707BD590/42073/CC1
	
	public function tte_details_inserter($ttno, $dtte, $ttname){
		$dname = "tte_details";
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$dname.' (
			tte_code varchar(20) PRIMARY KEY,
			device_alotted varchar(20) DEFAULT "DMY_000",
			tte_name varchar(20) DEFAULT "NO_NAME",
			FOREIGN KEY (device_alotted) REFERENCES atcad_devices(device_number)
		);');
		
		echo $a;
		if($a){$data = array('tte_code' => $ttno,
							'device_alotted' => $dtte,
							'tte_name' => $ttname
							);
			$a = $this->db->insert($dname, $data);
			if($a){
				if($dtte != 'DMY_000'){
					if($this->db->query("update atcad_devices set device_tte='$ttno' where  device_number='$dtte';")){
						echo 1;
					}
				}
				else{
					echo 1;
				}
			}
		}
	}
	//http://ti-atcad.com/index.php/setup/tte_details_inserter/4E00707BD590/DMY_000/Saurabh_Verma
	
	/*
	public function passenger_details_inserter($pnrno, $tno, $cls, $name, $age, $frm, $to){
		$dname = $tno."_passengers";
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$dname.' (
			pnr_number varchar(20) PRIMARY KEY,
			train_number varchar(8) DEFAULT "123456",
			ticket_class varchar(8) DEFAULT "CC1",
			name varchar(20) DEFAULT "NO NAME",
			age int(5) DEFAULT 0,
			from varchar(5),
			to varchar(5),
			FOREIGN KEY (train_number) REFERENCES train_details(device_number)
			FOREIGN KEY (device_alotted) REFERENCES atcad_devices(device_number)
		);');
		
		echo $a;
		if($a){$data = array('tte_code' => $ttno,
							'device_alotted' => $dtte,
							'tte_name' => $ttname
							);
			$a = $this->db->insert($dname, $data);
		}
	}*/
	//http://ti-atcad.com/index.php/setup/tte_details_inserter/385962457859/DMY_000/Saurabh_Verma
	
	function device_details_updater($device_number, $tted){
		$a = $this->db->query("update atcad_devices set device_tte = $tted where device_number = $device_number");
		echo $a;
	}
}
?>
