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
			$this->load->model('atcad_train');
			$this->load->model('atcad_enabled_coaches');
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
	
	function train_details_inserter($tno, $tname, $tfro, $tto, $tst, $tdt, $ta){
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
	
		echo "Train Details\n";
		
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
		echo "Details Inserted\n";
		
		if($this->coach_details_inserter($tno, 000, 'Engine', 'EE1', '123456', 'DMY_000', 5)){
			echo "Coach Lister Created\n";
			echo "You're advised to create coach blueprints manually\n";
		}
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
	
	function train_route_definer($tno, $aster){
		$tname = $tno."_route";
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$tname.' (
			serial_number int(10) AUTO_INCREMENT PRIMARY KEY,
			station_code varchar(10) UNIQUE,
			station_name varchar(20) NOT NULL,
			arrival_time varchar(5) NOT NULL,
			departure_time varchar(5) NOT NULL
		);');
		$arr = explode('__', $aster);
		var_dump($arr);
		$i=0; 
			while($arr[$i]){
				$data = explode('_', $arr[$i]);
				$data2 = array('station_code' => $data[0],
						'station_name' => $data[1],
						'arrival_time' => $data[2],
						'departure_time' =>$data[3]
						);
				$a = $this->db->insert($tname, $data2);
				$i = $i + 1;
			}
	}
	//http://localhost/testdrive/index.php/setup/train_route_definer/87569/NZE_Nazier_23:30_01:20__NYT_Nayait_1:25_1:30__RYT_Raight_1:35_1:55
	
	// ---- WARNING ----
	//DO NOT USE THIS METHOD BEFORE DEFINING ROUTE FOR A TRAIN
	function coach_details_inserter($tno, $cno, $ccls, $cname, $ctte, $capacity){
		$tname = $tno."_aec";
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$tname.' (
			coach_number int(10) PRIMARY KEY,
			coach_class varchar(20) DEFAULT "1" NOT NULL,
			coach_name varchar(5) DEFAULT "1" NOT NULL,
			coach_tte varchar(20) DEFAULT 1 NOT NULL,
			coach_capacity int(5) DEFAULT 1 NOT NULL
		);');
		if($a){$data = array('coach_number' => $cno,
					'coach_class' => $ccls,
					'coach_name' => $cname,
					'coach_tte' =>$ctte,
					'coach_capacity' => $capacity
					);
			$a = $this->db->insert($tname, $data);
			$this->coach_blueprint_inserter($tno, $cno, $ccls, $capacity);
			echo 'All well and good';
			return 1;
		}
		else{
			return 0;
		}
		
	}
	//http://localhost/testdrive/index.php/setup/coach_details_inserter/42073/23568/Chair-Car/CC1/4E00707BD590/10
	
	// ---- WARNING ----
	//DO NOT USE THIS METHOD BEFORE DEFINING ROUTE FOR A TRAIN
	function coach_blueprint_inserter($tno, $coach_number, $class, $capacity){
			$the_name = $tno."_aec_".$coach_number."_details";
			$answer = $this->atcad_train->get_route($tno);
			$list = "";
			foreach($answer->result() as $row){
				$list = $list.", ".$row->station_code." varchar(5) DEFAULT '0'";
			}
			$a = $this->db->query('CREATE TABLE IF NOT EXISTS '.$the_name.' (
				serial_number int(10) PRIMARY KEY,
				seat_type varchar(5) DEFAULT "1" NOT NULL
				'.$list.'
			);');
			$t=1;
			switch($class){
				case "Chair-Car":
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
						$a = $this->db->query('insert into '.$the_name." (serial_number, seat_type) values(
							$i, '$st'
							);");
					}
					break;
					
				case "Engine":
					for($i=1; $i<=$capacity; $i++){
						$st;
						switch ($t){
							case 1:
								$st = "Driver";
								$t = $t + 1;
								break;
							case 2:
								$st = "Astt. Driver";
								$t = $t + 1;
								break;
							case 3:
								$st = "Staff";
								$t = 1;
								break;
						}
						$a = $this->db->query('insert into '.$the_name." (serial_number, seat_type) values(
							$i, '$st'
							);");
					}
			}
	}
	//http://localhost/testdrive/index.php/setup/coach_blueprint_inserter/87569/24568/Chair-Car/20
	
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
	
	
	// ---- WARNING ----
	//DO NOT USE THIS FUNCTION DIRECTLY - USE WITH passenger_details_inserter
	public function check_state($tno, $cls, $frm, $to){
		$flag1 = 0;
		$flag2 = 0;
		$err = 0;
		$alotted_seat_no = 0;
		$alotted_coach_no = 0;
		$name = $tno."_aec";
		$lister = "";
		$n = "";
		$route = "";
		$numbers = "";
		//List of coach number
		$loc = $this->db->query("select coach_number from $name where coach_class='$cls';");
		$route = $tno."_route";
		//List of station codes
		$los = $this->db->query("select * from $route;");
		foreach($loc->result() as $list_of_coaches){
			$n = $tno."_aec_".$list_of_coaches->coach_number."_details";
			$q = $this->db->get($n);
			//List of seats
			foreach($q->result() as $seats_row){
				$lister = "";
				$err = 0;
				foreach($los->result() as $station){
					if($err == 0 && ($flag1 == 1 || $station->station_code == $frm)){
						$flag1 = 1;
						$c = $station->station_code;
						if(!$seats_row->$c && $station->station_code != $to){
							$lister = $lister.$station->station_code."=1".", ";
						}
						else{
							if($station->station_code == $to){
								$lister = $lister.$station->station_code."=1";
								$alotted_seat_no = $seats_row->serial_number;
								$alotted_coach_no = $list_of_coaches->coach_number;
								$err = 2;
								break;
							}
							else{
								$err = 1;
								break;
							}
						}
					}
					
				}
				if($err == 2){
						break;
				}
				else{
					
				}
			}
			if($err == 2){
					break;
			}
		}
		if($err == 1){
			echo "FUCK";
		}
		else{
			echo $this->db->query("update $n set $lister where serial_number=$alotted_seat_no");
		}
	}
	//http://localhost/testdrive/index.php/setup/check_state/87569/Chair-Car/NZE/RYT
	// ----WARNING----
	//DO NOT USE THIS FUNCTION DIRECTLY - USE WITH passenger_details_inserter

	public function mailer_daemon(){
		$email_config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => 'kaumudi.upreti@gmail.com',
            'smtp_pass' => 'Kaumudiishere.',
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );

        $this->load->library('email', $email_config);

        $this->email->from('kaumudi.upreti@gmail.com', 'invoice');
        $this->email->to('purnesh.xyz@gmail.com');
        $this->email->subject('Invoice');
        $this->email->message('Test');

        echo $this->email->send();
	}

	public function passenger_details_inserter($tno, $cls, $name, $age, $email, $frm, $to){
		$name = 'reservation_details_tno';
		$create = $this->db->query("CREATE TABLE IF NOT EXISTS $name (
									serial_number int(10) PRIMARY KEY AUTO_INCREMENT,
									pnr_number varchar(10) UNIQUE,
									coach_name varchar(5),
									seat_alotted int(10)
								)");
		if($create){
			echo "Reservation Charts OK for $tno";
			
		}
	}
	//http://ti-atcad.com/index.php/setup/tte_details_inserter/385962457859/DMY_000/Saurabh_Verma
	
	function device_details_updater($device_number, $tted){
		$a = $this->db->query("update atcad_devices set device_tte = $tted where device_number = $device_number");
		echo $a;
	}
}
?>
