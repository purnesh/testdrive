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
		$a = $this->db->query('create table if not exists user_store(
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


	// ---- WARNING ----
	// DO NOT USE THIS FUNCTION DIRECTLY
	function pnr_store($pnr, $name, $age, $email, $tno, $frm, $to, $seat, $coach){
		$a = $this->db->query('CREATE TABLE IF NOT EXISTS pnr_store (
			pnr_no int(20) DEFAULT "0" PRIMARY KEY NOT NULL,
			train_number int(10) NOT NULL,
			passenger_name varchar(20),
			passenger_age int(10),
			email varchar(50),
			from_stn varchar(10) NOT NULL,
			to_stn varchar(10) NOT NULL,
			seat_no int(20),
			coach_no varchar(10),
			confirmation int(10) DEFAULT 1 NOT NULL,
			FOREIGN KEY (train_number) REFERENCES train_details(train_number)
		);');
		echo "PNR Table exists or created \n";
		$data = array(
					'pnr_no' => $pnr,
					'passenger_name' => $name,
					'passenger_age' => $age,
					'email' => $email,
					'train_number' => $tno,
					'from_stn' => $frm,
					'to_stn' => $to,
					'seat_no' => $seat,
					'coach_no' => $coach
						);
		$b = 1;
		$a = $this->db->insert('pnr_store', $data);
		echo "PNR Details Inserted\n";
		//$b = $this->mailer_daemon($name, $age, $email, $pnr, $tno, $seat, $coach, $frm, $to);
		if($a && $b){
			return 1;
		}
	}
	// http://localhost/testdrive/index.php/setup/pnr_store/123456456/32073/NDLS/KKR/2/12546
	// DO NOT USE THIS FUNCTION DIRECTLY
	// ---- WARNING ----
	// Use with passenger_details inserter
	
	function train_details_inserter($tno, $tname, $tfro, $tto, $tst, $tdt, $ta, $route){
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
		
		if($this->train_route_definer($tno, $route)){
			if($this->coach_details_inserter($tno, 000, 'Engine', 'EE1', '123456', 'DMY_000', 5) && $this->coach_details_inserter($tno, 1, 'Waiting List', 'W/L', '123456', 'DMY_000', 500)){
				echo "Coach Lister Created\n";
				echo "You're advised to create coach blueprints manually\n";
			}
		}
	}
	//http://localhost/testdrive/index.php/setup/train_details_inserter/32073/Rajdhani-Express/NDLS/KKR/23:30/05:30/0/NDLS_New-Delhi_23:30_23:30__GZB_Ghaziabad_23:45_00:00
	
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
		//var_dump($arr);
		$i=0;
			while($i<count($arr)){
				$data = explode('_', $arr[$i]);
				$data2 = array('station_code' => $data[0],
						'station_name' => $data[1],
						'arrival_time' => $data[2],
						'departure_time' =>$data[3]
						);
				$a = $this->db->insert($tname, $data2);
				$i = $i + 1;
			}
			return 1;
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
	
	
	// --DEPRICATED--
	//Use atcad_train model's get_list instead 
	function train_details_selector($tno){
		$tname = $tno."_aec";
		$a = $this->db->get($tname);
		var_dump($a);
	}
	// --DEPRICATED--
	//Use atcad_train model's get_list instead
	
	
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
	public function reserve($pnr_no, $pname, $age, $email, $tno, $cls, $frm, $to){
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
		$los = $this->db->query("select * from $route;");
		$c = $los->num_rows();
		$i = 1;
		$str = "";
		$str2 = "";
		foreach($loc->result() as $coaches){
			foreach($los->result() as $station){
				if($station->station_code == $frm){
					$flag1 = 1;
				}
				if($flag1 == 1){
					
					$str = $str."$station->station_code = 0";
					$str2 = $str2."$station->station_code = 1";
					
					if($station->station_code !=$to){
							$str = $str." and ";
							$str2 = $str2.", ";
					}
					else{
						break;
					}
				}
			}
			$n = $tno."_aec_".$coaches->coach_number."_details";
			$seat_result = $this->db->query("select * from $n where $str");
			if($seat_result->num_rows()){
				$row = $seat_result->row();
				$alotted_seat_no = $row->serial_number;
				$coach_name_raw = $this->db->query("select coach_name from $name where coach_number = $coaches->coach_number;");
				$alotted_coach_no = $coach_name_raw->row()->coach_name;
				if($this->pnr_store($pnr_no, $pname, $age, $email, $tno, $frm, $to, $alotted_seat_no, $alotted_coach_no)){
					$this->db->query("update $n set $str2 where serial_number=$alotted_seat_no");
					$err = 3;
				}
			}
			if($err == 3){
				break;
			}
		}
		if($err == 3){
			echo $alotted_coach_no. $alotted_seat_no;
		}
		else{
			echo "Waiting List";
		}
	}
	//http://localhost/testdrive/index.php/setup/reserve/3234554/Bhaskar/21/purnesh@live.com/87569/Chair-Car/NYT/RYT
	// ----WARNING----
	//DO NOT USE THIS FUNCTION DIRECTLY - USE WITH passenger_details_inserter


	//DO NOT USE THIS FUNCTION DIRECTLY
	//THE SERVER IS DESIGNED TO USE THIS FUNCTION INTERNALLY
	public function mailer_daemon($name, $age, $email, $pnr, $tno, $seat, $coach, $frm, $to){
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['mailtype'] = 'html';
		$this->email->initialize($config);

		$this->email->from('admin@ti-atcad.com', 'ATCAD - TI');
		$this->email->to($email);
		
		$this->email->subject("PNR No: $pnr");
		$this->email->message("
						Congratualtions! $name<br/>
						Age: $age has been alotted $seat in $coach for train number $tno for travel from $frm to $to. <br />
						Thank you for using our services.
						");

        echo $this->email->send();
		echo $this->email->print_debugger();
	}
	//DO NOT USE THIS FUNCTION DIRECTLY
	//THE SERVER IS DESIGNED TO USE THIS FUNCTION INTERNALLY

	
	public function passenger_details_inserter($tno, $cls, $pname, $age, $email, $frm, $to){
		$name = 'reservation_details_tno';
		$create = $this->db->query("CREATE TABLE IF NOT EXISTS $name (
									serial_number int(10) PRIMARY KEY AUTO_INCREMENT,
									pnr_number varchar(10) UNIQUE,
									coach_name varchar(5),
									seat_alotted int(10)
								)");
		if($create){
			echo "Reservation Charts OK for $tno \n";
			$pnr = rand(1000000000, 9999999999);
			$this->reserve($pnr, $pname, $age, $email, $tno, $cls, $frm, $to);
		}
	}
	//localhost/testdrive/index.php/setup/passenger_details_inserter/87569/Chair-Car/Purnesh-Tripathi/19/purnesh.xyz@gmail.com/NZE/RYT

	
	function device_details_updater($device_number, $tted){
		$a = $this->db->query("update atcad_devices set device_tte = $tted where device_number = $device_number");
		echo $a;
	}
}
?>
