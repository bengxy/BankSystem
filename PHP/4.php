
<?php
error_reporting(0);
/*$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
error_reporting(0);
$con = mysql_connect("10.214.29.203","lab","root");
if (!$con)
{
	echo "Fail";  
}



	$time = '2015-09-21 17:25:00';
	$t = array();
	$r = array();
	for ($i=0; $i < 4; $i++) { 
		$time = date('Y-m-d H:i:s',strtotime("$time +1 day"));
		$time = date('Y-m-d H:i:s',strtotime("$time -9 hour"));
		for($j = 0;$j<108;$j++){
			$time =	date('Y-m-d H:i:s',strtotime("$time +5 minutes"));
			$t[$i*108+$j] = $time;
			$query  = "SELECT waiting_num from bank_waiting_system.daily_waiting where time_point = '$time';";
			$result = mysql_query($query,$con);
			while($row = mysql_fetch_array($result))
			{
				$count = $row['waiting_num'];
				$r[$i*108+$j] = $count;
			}
		}
	}
//}
	$res = array();
	$res[0] = $t;
	$res[1] = $r;*/
	$res = array(array("2015-09-22 08:30:00","2015-09-22 08:35:00","2015-09-22 08:40:00","2015-09-22 08:45:00","2015-09-22 08:50:00","2015-09-22 08:55:00","2015-09-22 09:00:00","2015-09-22 09:05:00","2015-09-22 09:10:00","2015-09-22 09:15:00","2015-09-22 09:20:00","2015-09-22 09:25:00","2015-09-22 09:30:00","2015-09-22 09:35:00","2015-09-22 09:40:00","2015-09-22 09:45:00","2015-09-22 09:50:00","2015-09-22 09:55:00","2015-09-22 10:00:00","2015-09-22 10:05:00","2015-09-22 10:10:00","2015-09-22 10:15:00","2015-09-22 10:20:00","2015-09-22 10:25:00","2015-09-22 10:30:00","2015-09-22 10:35:00","2015-09-22 10:40:00","2015-09-22 10:45:00","2015-09-22 10:50:00","2015-09-22 10:55:00","2015-09-22 11:00:00","2015-09-22 11:05:00","2015-09-22 11:10:00","2015-09-22 11:15:00","2015-09-22 11:20:00","2015-09-22 11:25:00","2015-09-22 11:30:00","2015-09-22 11:35:00","2015-09-22 11:40:00","2015-09-22 11:45:00","2015-09-22 11:50:00","2015-09-22 11:55:00","2015-09-22 12:00:00","2015-09-22 12:05:00","2015-09-22 12:10:00","2015-09-22 12:15:00","2015-09-22 12:20:00","2015-09-22 12:25:00","2015-09-22 12:30:00","2015-09-22 12:35:00","2015-09-22 12:40:00","2015-09-22 12:45:00","2015-09-22 12:50:00","2015-09-22 12:55:00","2015-09-22 13:00:00","2015-09-22 13:05:00","2015-09-22 13:10:00","2015-09-22 13:15:00","2015-09-22 13:20:00","2015-09-22 13:25:00","2015-09-22 13:30:00","2015-09-22 13:35:00","2015-09-22 13:40:00","2015-09-22 13:45:00","2015-09-22 13:50:00","2015-09-22 13:55:00","2015-09-22 14:00:00","2015-09-22 14:05:00","2015-09-22 14:10:00","2015-09-22 14:15:00","2015-09-22 14:20:00","2015-09-22 14:25:00","2015-09-22 14:30:00","2015-09-22 14:35:00","2015-09-22 14:40:00","2015-09-22 14:45:00","2015-09-22 14:50:00","2015-09-22 14:55:00","2015-09-22 15:00:00","2015-09-22 15:05:00","2015-09-22 15:10:00","2015-09-22 15:15:00","2015-09-22 15:20:00","2015-09-22 15:25:00","2015-09-22 15:30:00","2015-09-22 15:35:00","2015-09-22 15:40:00","2015-09-22 15:45:00","2015-09-22 15:50:00","2015-09-22 15:55:00","2015-09-22 16:00:00","2015-09-22 16:05:00","2015-09-22 16:10:00","2015-09-22 16:15:00","2015-09-22 16:20:00","2015-09-22 16:25:00","2015-09-22 16:30:00","2015-09-22 16:35:00","2015-09-22 16:40:00","2015-09-22 16:45:00","2015-09-22 16:50:00","2015-09-22 16:55:00","2015-09-22 17:00:00","2015-09-22 17:05:00","2015-09-22 17:10:00","2015-09-22 17:15:00","2015-09-22 17:20:00","2015-09-22 17:25:00","2015-09-23 08:30:00","2015-09-23 08:35:00","2015-09-23 08:40:00","2015-09-23 08:45:00","2015-09-23 08:50:00","2015-09-23 08:55:00","2015-09-23 09:00:00","2015-09-23 09:05:00","2015-09-23 09:10:00","2015-09-23 09:15:00","2015-09-23 09:20:00","2015-09-23 09:25:00","2015-09-23 09:30:00","2015-09-23 09:35:00","2015-09-23 09:40:00","2015-09-23 09:45:00","2015-09-23 09:50:00","2015-09-23 09:55:00","2015-09-23 10:00:00","2015-09-23 10:05:00","2015-09-23 10:10:00","2015-09-23 10:15:00","2015-09-23 10:20:00","2015-09-23 10:25:00","2015-09-23 10:30:00","2015-09-23 10:35:00","2015-09-23 10:40:00","2015-09-23 10:45:00","2015-09-23 10:50:00","2015-09-23 10:55:00","2015-09-23 11:00:00","2015-09-23 11:05:00","2015-09-23 11:10:00","2015-09-23 11:15:00","2015-09-23 11:20:00","2015-09-23 11:25:00","2015-09-23 11:30:00","2015-09-23 11:35:00","2015-09-23 11:40:00","2015-09-23 11:45:00","2015-09-23 11:50:00","2015-09-23 11:55:00","2015-09-23 12:00:00","2015-09-23 12:05:00","2015-09-23 12:10:00","2015-09-23 12:15:00","2015-09-23 12:20:00","2015-09-23 12:25:00","2015-09-23 12:30:00","2015-09-23 12:35:00","2015-09-23 12:40:00","2015-09-23 12:45:00","2015-09-23 12:50:00","2015-09-23 12:55:00","2015-09-23 13:00:00","2015-09-23 13:05:00","2015-09-23 13:10:00","2015-09-23 13:15:00","2015-09-23 13:20:00","2015-09-23 13:25:00","2015-09-23 13:30:00","2015-09-23 13:35:00","2015-09-23 13:40:00","2015-09-23 13:45:00","2015-09-23 13:50:00","2015-09-23 13:55:00","2015-09-23 14:00:00","2015-09-23 14:05:00","2015-09-23 14:10:00","2015-09-23 14:15:00","2015-09-23 14:20:00","2015-09-23 14:25:00","2015-09-23 14:30:00","2015-09-23 14:35:00","2015-09-23 14:40:00","2015-09-23 14:45:00","2015-09-23 14:50:00","2015-09-23 14:55:00","2015-09-23 15:00:00","2015-09-23 15:05:00","2015-09-23 15:10:00","2015-09-23 15:15:00","2015-09-23 15:20:00","2015-09-23 15:25:00","2015-09-23 15:30:00","2015-09-23 15:35:00","2015-09-23 15:40:00","2015-09-23 15:45:00","2015-09-23 15:50:00","2015-09-23 15:55:00","2015-09-23 16:00:00","2015-09-23 16:05:00","2015-09-23 16:10:00","2015-09-23 16:15:00","2015-09-23 16:20:00","2015-09-23 16:25:00","2015-09-23 16:30:00","2015-09-23 16:35:00","2015-09-23 16:40:00","2015-09-23 16:45:00","2015-09-23 16:50:00","2015-09-23 16:55:00","2015-09-23 17:00:00","2015-09-23 17:05:00","2015-09-23 17:10:00","2015-09-23 17:15:00","2015-09-23 17:20:00","2015-09-23 17:25:00","2015-09-24 08:30:00","2015-09-24 08:35:00","2015-09-24 08:40:00","2015-09-24 08:45:00","2015-09-24 08:50:00","2015-09-24 08:55:00","2015-09-24 09:00:00","2015-09-24 09:05:00","2015-09-24 09:10:00","2015-09-24 09:15:00","2015-09-24 09:20:00","2015-09-24 09:25:00","2015-09-24 09:30:00","2015-09-24 09:35:00","2015-09-24 09:40:00","2015-09-24 09:45:00","2015-09-24 09:50:00","2015-09-24 09:55:00","2015-09-24 10:00:00","2015-09-24 10:05:00","2015-09-24 10:10:00","2015-09-24 10:15:00","2015-09-24 10:20:00","2015-09-24 10:25:00","2015-09-24 10:30:00","2015-09-24 10:35:00","2015-09-24 10:40:00","2015-09-24 10:45:00","2015-09-24 10:50:00","2015-09-24 10:55:00","2015-09-24 11:00:00","2015-09-24 11:05:00","2015-09-24 11:10:00","2015-09-24 11:15:00","2015-09-24 11:20:00","2015-09-24 11:25:00","2015-09-24 11:30:00","2015-09-24 11:35:00","2015-09-24 11:40:00","2015-09-24 11:45:00","2015-09-24 11:50:00","2015-09-24 11:55:00","2015-09-24 12:00:00","2015-09-24 12:05:00","2015-09-24 12:10:00","2015-09-24 12:15:00","2015-09-24 12:20:00","2015-09-24 12:25:00","2015-09-24 12:30:00","2015-09-24 12:35:00","2015-09-24 12:40:00","2015-09-24 12:45:00","2015-09-24 12:50:00","2015-09-24 12:55:00","2015-09-24 13:00:00","2015-09-24 13:05:00","2015-09-24 13:10:00","2015-09-24 13:15:00","2015-09-24 13:20:00","2015-09-24 13:25:00","2015-09-24 13:30:00","2015-09-24 13:35:00","2015-09-24 13:40:00","2015-09-24 13:45:00","2015-09-24 13:50:00","2015-09-24 13:55:00","2015-09-24 14:00:00","2015-09-24 14:05:00","2015-09-24 14:10:00","2015-09-24 14:15:00","2015-09-24 14:20:00","2015-09-24 14:25:00","2015-09-24 14:30:00","2015-09-24 14:35:00","2015-09-24 14:40:00","2015-09-24 14:45:00","2015-09-24 14:50:00","2015-09-24 14:55:00","2015-09-24 15:00:00","2015-09-24 15:05:00","2015-09-24 15:10:00","2015-09-24 15:15:00","2015-09-24 15:20:00","2015-09-24 15:25:00","2015-09-24 15:30:00","2015-09-24 15:35:00","2015-09-24 15:40:00","2015-09-24 15:45:00","2015-09-24 15:50:00","2015-09-24 15:55:00","2015-09-24 16:00:00","2015-09-24 16:05:00","2015-09-24 16:10:00","2015-09-24 16:15:00","2015-09-24 16:20:00","2015-09-24 16:25:00","2015-09-24 16:30:00","2015-09-24 16:35:00","2015-09-24 16:40:00","2015-09-24 16:45:00","2015-09-24 16:50:00","2015-09-24 16:55:00","2015-09-24 17:00:00","2015-09-24 17:05:00","2015-09-24 17:10:00","2015-09-24 17:15:00","2015-09-24 17:20:00","2015-09-24 17:25:00","2015-09-25 08:30:00","2015-09-25 08:35:00","2015-09-25 08:40:00","2015-09-25 08:45:00","2015-09-25 08:50:00","2015-09-25 08:55:00","2015-09-25 09:00:00","2015-09-25 09:05:00","2015-09-25 09:10:00","2015-09-25 09:15:00","2015-09-25 09:20:00","2015-09-25 09:25:00","2015-09-25 09:30:00","2015-09-25 09:35:00","2015-09-25 09:40:00","2015-09-25 09:45:00","2015-09-25 09:50:00","2015-09-25 09:55:00","2015-09-25 10:00:00","2015-09-25 10:05:00","2015-09-25 10:10:00","2015-09-25 10:15:00","2015-09-25 10:20:00","2015-09-25 10:25:00","2015-09-25 10:30:00","2015-09-25 10:35:00","2015-09-25 10:40:00","2015-09-25 10:45:00","2015-09-25 10:50:00","2015-09-25 10:55:00","2015-09-25 11:00:00","2015-09-25 11:05:00","2015-09-25 11:10:00","2015-09-25 11:15:00","2015-09-25 11:20:00","2015-09-25 11:25:00","2015-09-25 11:30:00","2015-09-25 11:35:00","2015-09-25 11:40:00","2015-09-25 11:45:00","2015-09-25 11:50:00","2015-09-25 11:55:00","2015-09-25 12:00:00","2015-09-25 12:05:00","2015-09-25 12:10:00","2015-09-25 12:15:00","2015-09-25 12:20:00","2015-09-25 12:25:00","2015-09-25 12:30:00","2015-09-25 12:35:00","2015-09-25 12:40:00","2015-09-25 12:45:00","2015-09-25 12:50:00","2015-09-25 12:55:00","2015-09-25 13:00:00","2015-09-25 13:05:00","2015-09-25 13:10:00","2015-09-25 13:15:00","2015-09-25 13:20:00","2015-09-25 13:25:00","2015-09-25 13:30:00","2015-09-25 13:35:00","2015-09-25 13:40:00","2015-09-25 13:45:00","2015-09-25 13:50:00","2015-09-25 13:55:00","2015-09-25 14:00:00","2015-09-25 14:05:00","2015-09-25 14:10:00","2015-09-25 14:15:00","2015-09-25 14:20:00","2015-09-25 14:25:00","2015-09-25 14:30:00","2015-09-25 14:35:00","2015-09-25 14:40:00","2015-09-25 14:45:00","2015-09-25 14:50:00","2015-09-25 14:55:00","2015-09-25 15:00:00","2015-09-25 15:05:00","2015-09-25 15:10:00","2015-09-25 15:15:00","2015-09-25 15:20:00","2015-09-25 15:25:00","2015-09-25 15:30:00","2015-09-25 15:35:00","2015-09-25 15:40:00","2015-09-25 15:45:00","2015-09-25 15:50:00","2015-09-25 15:55:00","2015-09-25 16:00:00","2015-09-25 16:05:00","2015-09-25 16:10:00","2015-09-25 16:15:00","2015-09-25 16:20:00","2015-09-25 16:25:00","2015-09-25 16:30:00","2015-09-25 16:35:00","2015-09-25 16:40:00","2015-09-25 16:45:00","2015-09-25 16:50:00","2015-09-25 16:55:00","2015-09-25 17:00:00","2015-09-25 17:05:00","2015-09-25 17:10:00","2015-09-25 17:15:00","2015-09-25 17:20:00","2015-09-25 17:25:00"),array("11","9","11","3","6","5","4","7","5","3","4","3","4","6","9","12","12","17","17","14","10","7","9","8","6","7","4","2","1","2","4","5","4","6","7","5","6","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","3","2","2","3","3","3","5","5","3","8","10","12","11","12","14","12","8","8","9","8","6","4","3","2","3","4","3","3","2","4","5","8","9","7","6","7","5","5","6","8","9","8","6","2","0","0","0","0","6","6","10","14","12","8","4","4","6","0","3","4","0","0","0","0","1","0","0","3","0","1","0","0","2","1","0","5","9","9","6","5","6","4","0","1","1","0","4","4","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","3","0","2","0","3","9","6","5","6","11","13","13","16","16","13","10","11","8","7","7","8","7","4","4","2","2","0","0","1","0","1","2","2","2","2","0","0","0","0","0","0","0","0","0","0","0","0","0","10","9","6","0","0","0","2","4","7","7","4","2","2","1","1","3","0","0","2","0","0","0","0","0","2","2","0","0","1","1","0","2","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","1","1","1","1","0","3","5","2","4","6","11","13","12","13","13","13","14","13","12","8","4","0","0","0","3","2","3","7","7","5","2","1","0","1","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","6","7","9","4","1","1","0","1","2","10","12","11","14","13","11","4","4","4","0","0","0","0","2","0","0","1","1","2","2","2","2","2","3","1","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","0","10","6","9","6","4","5","5","5","1","1","1","3","1","5","8","9","7","2","3","4","5","0","0","0","1","1","1","1","0","1","1","3","2","1","0","1","0","0","0","0","0","0","0","0","0","0","0","0"));
	echo json_encode($res);
	
?>