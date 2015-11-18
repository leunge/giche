<?php
//db연결.
	include '/var/www/xe/info.php';
	include '/var/www/_head.php';
	dbConn();
	mysql_selectdb('web', $connect);
//ptrg에서 값을 받아와서 변수에 저장한다.
			$tablename = 'camera';
			$lastup = $_POST["lastup"];  
			$lastdown = $_POST["lastdown"]; 
			$device = $_POST["device"];  
			$status = $_POST["state"];
			$sta = $_POST["status"];

			$tmpstata=$status;

			$tmpstat=explode(" ",$status); //띄어쓰기를 기준으로 이름을 받는다.
			$status=$tmpstat[0];

			$today=time();

			$device = iconv('euc-kr','utf-8',$device); 

			$loca=explode(" ",$device); //띄어쓰기를 기준으로 이름을 받는다.
			$name=$loca[0];

			
			$x=explode(" ",$lastup); // 들어온 날짜를 년,월,일로 분할해 변수로 저장합니다
			$s_Date=$x[0]; // 지정된 날짜 
				$d=explode("-",$s_Date); 
			$s_day=$x[1]; // 지정된 요일
			$s_time=$x[2]; // 지정된 시간.
				$t=explode(":",$s_time); 
				if($s_day=="오후" || date("H",$today) >12){$t[0]=$t[0]+12;}

			$uptime=mktime($t[0],$t[1],$t[2],$d[1],$d[2],$d[0]); 

			$x=explode(" ",$lastdown); // 들어온 날짜를 년,월,일로 분할해 변수로 저장합니다		
			$s_Date=$x[0]; // 지정된 날짜 
				$d=explode("-",$s_Date); 
			$s_day=$x[1]; // 지정된 요일
			$s_time=$x[2]; // 지정된 시간.
				$t=explode(":",$s_time); 
				//if($s_day=="오후" || date("H",$today) >12){$t[0]=$t[0]+12;}
				if(date("H",$today) == 0) {$t[0]= 0;}
				else if(date("H",$today) >12){$t[0]=$t[0]+12;}
				
			$downtime=mktime($t[0],$t[1],$t[2],$d[1],$d[2],$d[0]);

//--------------------------------------------------------------------------------------- 여기까지 데이터 받아서 저장은 완료.

// uptime이 없는 떨어져 있는 것들 중 같은 이름이 있는지 확인.
			$sql = "select count(*) from $tablename where utime is NULL AND location='$name'";
			$result = mysql_query($sql) or die (mysql_error());
			$is_Down =mysql_result($result,0,0);
// uptime이 있는 올라와 있는 것들 중 같은 이름이 있는지 확인.
			$sql = "select count(*) from $tablename where utime is not NULL AND location='$name'";
			$result = mysql_query($sql) or die (mysql_error());
			$is_Up =mysql_result($result,0,0);
			
			if( $is_Up != 0){// 올라온것중 이름이같고 가장 최근것의 uptime을 구한다.
				$sql = "select utime from $tablename where location='$name' order by utime desc";
				$result = mysql_query($sql) or die (mysql_error());
				$camera_last_up =mysql_result($result,0,0);
			}
			else{$camera_last_up  = 0;}

// 들어온김에 정리한번.
				
				$num=0;
				if(date("H",$today) <= 8) //7시 이전에는 2일전 6시 이전 올라온 자료 삭제
				{
					$time_six=mktime(6,00,00,date("m",$today),date("d",$today)-2,date("y",$today));
				}
				else if(date("H",$today) > 8) //7시 이전에는 1일전 6시이전 올라온 자료 삭제
				{
					$time_six=mktime(6,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				}
				$sql = "delete from $tablename where utime is not NULL AND utime < '$time_six'";
				mysql_query($sql) or die (mysql_error());
				
			
// 안떨어져있고 Down메세지인경우 기록.
			 if($status=="Down" && $is_Down == 0){
				 if($is_Up != 0){//올라온지 2시간이 안되어 다시 떨어진 경우 다시 다운으로 처리.
					 $tmp1=date("H",$uptime);
					 $tmp2=date("H",$camera_last_up);
					 $tmp3 = $tmp1-$tmp2;
					 if( $tmp3 < 0 ) $tmp3 = $tmp3*(-1);

					 if($tmp3 <= 2){ 
						$sql = "update $tablename set utime=NULL where location='$name' AND utime='$camera_last_up'";
						$aa = mysql_query($sql) or die (mysql_error());
						$typec=1;

					 }
					 else {
						 $sql = "INSERT INTO $tablename VALUES('',NULL,'$name','','','$downtime',NULL,'','')";
						mysql_query($sql) or die (mysql_error());
						$typec=2;
					 }

				 }

				else{
					
					if($name == "16비"&& date("H",$today) > 16){$typec=4;}
					else if($name == "Probe"){$typec=4;}
					else{
						$sql = "INSERT INTO $tablename VALUES('',NULL,'$name','','','$downtime',NULL,'','')";
						mysql_query($sql) or die (mysql_error());

						$typec=3;
					}

					
				}
				$tmp="lastdown=". $lastdown ."\nlastup=". $lastup ."\ndevice=".$name ."\nstatus=".$status ."=> " . $tmpstata. "\nisdown=".$is_Down. "\n isup=".$is_Up. "\nlast_up=".date("Ymd H:i", $camera_last_up)."\nsta=".$sta ."\ntmp3=".$tmp3."\n type=".$typec ."\n". $aa;
						$fp=fopen("/data/NAS_Guest/gicheBackup/gichework/prtg1.txt","w+");
						fwrite($fp,$tmp);
						fclose($fp);
			 }
//떨어져있고 UP메시지인경우 update.
			 else if($status=="Up" && $is_Down != 0){
					$sql = "select dtime from $tablename where utime is NULL AND location='$name'";
					$result = mysql_query($sql) or die (mysql_error());
					$downt=mysql_result($result,0,0);
					$tmp1=date("H",$uptime);
					$tmp2=date("H",$downt);
					$typec=6;

				 if($tmp1 - $tmp2 < 1){//떨어진지 1시간 이내는 그냥 삭제
					 $sql = "delete from $tablename where utime is NULL AND location='$name'";
					 mysql_query($sql) or die (mysql_error());	
					 $typec=4;
					 
				 } else{ 
					$sql = "update $tablename set utime='$uptime' where utime is NULL AND location='$name'";
					 mysql_query($sql) or die (mysql_error());			
					  $typec=5;
				}

				 $tmp="lastdown=". date("H:i",$downtime)."dd=".  $lastdown ."\nlastup=". $lastup  ."\ndevice=". $name . "\nstatus=" . $status ."=> " . $tmpstata. "\nisdown=".$is_Down. "\nisup=".$is_Up. "\nlast_up=".date("Ymd H:i", $camera_last_up)."\nsta=".$sta ."\ntype=" .  $typec. "\n time". $tmp1."-".$tmp2;

				  $fp=fopen("/data/NAS_Guest/gicheBackup/gichework/prtg.txt","w+");
				 fwrite($fp,$tmp);

				 fclose($fp);
			 }
		//떨어져있고 Unusual메시지인경우 update.
			 else if($status=="Unusual" && $is_Down != 0){
					$sql = "select dtime from $tablename where utime is NULL AND location='$name'";
					$result = mysql_query($sql) or die (mysql_error());
					$downt=mysql_result($result,0,0);
					$tmp1=date("H",$uptime);
					$tmp2=date("H",$downt);
					$typec=6;

				 if($tmp1 - $tmp2 < 1){//떨어진지 1시간 이내는 그냥 삭제
					 $sql = "delete from $tablename where utime is NULL AND location='$name'";
					 mysql_query($sql) or die (mysql_error());	
					 $typec=4;
					 
				 } else{ 
					$sql = "update $tablename set utime='$uptime' where utime is NULL AND location='$name'";
					 mysql_query($sql) or die (mysql_error());			
					  $typec=5;
				}

				 $tmp="lastdown=". date("H:i",$downtime)."dd=".  $lastdown ."\nlastup=". $lastup  ."\ndevice=". $name . "\nstatus=" . $status ."=> " . $tmpstata. "\nisdown=".$is_Down. "\nisup=".$is_Up. "\nlast_up=".date("Ymd H:i", $camera_last_up)."\nsta=".$sta ."\ntype=" .  $typec. "\n time". $tmp1."-".$tmp2;

				  $fp=fopen("/data/NAS_Guest/gicheBackup/gichework/prtg3.txt","w+");
				 fwrite($fp,$tmp);

				 fclose($fp);
			 }


			 $tmp="lastdown=". date("H:i",$downtime)."dd=".  $lastdown ."\nlastup=". $lastup  ."\ndevice=". $name . "\nstatus=" . $status ."=> " . $tmpstata. "\nisdown=".$is_Down. "\nisup=".$is_Up. "\nlast_up=".date("Ymd H:i", $camera_last_up)."\nsta=".$sta ."\ntype=" .  $typec;

				  $fp=fopen("/data/NAS_Guest/gicheBackup/gichework/prtg2.txt","w+");
				 fwrite($fp,$tmp);

				 fclose($fp);
?>