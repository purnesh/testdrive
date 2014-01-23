<?php
	class atcad_handler{
		public $connection;
		public $hostname;
		public $username;
		public $password;
		public $db_name;
		public $db;
		
		function __construct(){
			$this->hostname = 'localhost';
			$this->username = 'root';
			$this->password = '9897132475';
			$this->db_name = 'atcad_data';
			$this->data_base_connect();
		}
		
		public function data_base_connect(){
			$this->connection = mysql_connect($this->hostname, $this->username, $this->password);
			$this->db = mysql_select_db($this->db_name);
			return $this->connection;
		}
		
		public function device_verification($a, $b){
			$res = mysql_query("select * from atcad_devices where device_number='$a' AND device_tte='$b'");
			$result = mysql_fetch_array($res);
			if($result){
				return 1;
			}
			else{
				return 0;
			}
		}
		
		public function assignment($a, $b){
			$res = mysql_query("select * from atcad_devices where device_number='$a' AND device_tte='$b'");
			if($row = mysql_fetch_array($res)){
				$r = '#'.'Train No: '.$row['device_train'].'*';
				$rest = mysql_query("select * from train_details where train_number=".$row['device_train'].";");
				$row2 = mysql_fetch_array($rest);
				$s = '#'.$row2['train_name'].'*';
				$t = '#'.'Coach Name: '.$row['device_coach_name'].'*$';
				echo $r;
				echo $s;
				echo $t;
			}
			else{
				echo "ASD";
			}
			return 0;
		}
		
		public function ticket_verification($pnr_number){
			$res = mysql_query("select * from pnr_store where pnr_no=$pnr_number");
			$result = mysql_fetch_array($res);
			if($result){
				$name = $result['passenger_name'];
				$age = $result['passenger_age'];
				$frm = $result['from_stn'];
				$to  = $result['to_stn'];
				$seat = $result['seat_no'];
				$coach_no  = $result['coach_no'];
				
				echo "# $name $age*";
				echo "# $frm $to*";
				echo "# $seat $coach_no*".'$';
				$a = mysql_query("update pnr_store set confirmation=2 where pnr_no=$pnr_number");
				return 1;
			}
			else{
				return 0;
			}
		}
	}
	
	if(isset($_POST['request_category'])){
		$handle = new atcad_handler;
		switch ($_POST['request_category']){
			case 'device_verification':
				if($handle->device_verification($_POST['device_number'], $_POST['device_tte'])){
					echo "#Login Success*$";
				}
				else{
					echo "#Login Failed*$";
				}
				break;
				
			case 'ticket_verification':
				if($handle->device_verification($_POST['device_number'], $_POST['device_tte'])){
					$res = $handle->ticket_verification($_POST['pnr_number']);
					if($res){
						
					}
					else{
						echo "#Invalid PNR Code*$";
					}
				}
				else{
					echo "#Login Failed*$";
				}
				break;
			case 'assignment':
				if($handle->device_verification($_POST['device_number'], $_POST['device_tte'])){
					$handle->assignment($_POST['device_number'], $_POST['device_tte']);
				}
				else{
					echo "#Login Failed*$";
				}
				break;
			default:
				echo "Default";
				break;
		}
	}
	else{
		echo "Unauthorized access";
	}

/*
<form method='post' action='atcad_handler.php'>
	<input type='text' name='request_category' />
	<input type='text' name='device_number' />
	<input type='text' name='device_tte' />
	<input type='submit' />
</form>
*/

?>
