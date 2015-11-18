<?
	//include '/var/www/xe/info.php';
	//include '/var/www/_head.php';
	//dbConn();
	//mysql_selectdb('web', $connect);

	class Inform extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}


		public function tests(){
			$data['inform_type'] = '3';
			$data['type'] = '3';
			$sql = "select * from inform where type = 3 and no%2=0 order by lasttime desc";
			$data['array']=$this->db->query($sql);


			$sql = "select * from inform where type = 3 and no%2=1 order by lasttime desc";
			$data['query']=$this->db->query($sql);
			$this -> load ->view('test',$data);
		}

		public function Work(){
			$this -> load ->view('error_work');
		}

		public function list_Old(){
			$data['inform_type'] = '2';
			$data['type'] = '2';
			$data['modify'] = '0';
			$sql = "select * from inform where type = 2 order by lasttime desc";
			$data['query']=$this->db->query($sql);
			$this -> load ->view('informOld',$data);
		}

		public function list_Important(){
			$data['inform_type'] = '3';
			$data['type'] = '3';
			$sql = "select * from inform where type = 3 and no%2=0 order by lasttime desc";
			$data['array']=$this->db->query($sql);


			$sql = "select * from inform where type = 3 and no%2=1 order by lasttime desc";
			$data['query']=$this->db->query($sql);
			$this -> load ->view('inform',$data);
		}

		public function list_New(){
			$data['inform_type'] = '1';
			$data['type'] = '1';
			$sql = "select * from inform where type = 1 and no%2=0 order by lasttime desc";
			$data['array']=$this->db->query($sql);


			$sql = "select * from inform where type = 1 and no%2=1 order by lasttime desc";
			$data['query']=$this->db->query($sql);
			$this -> load ->view('inform',$data);
		}
		public function Inform_Insert(){
			$tablename = 'inform';
			$writetime = time();
			//$name = addslashes($_POST['name']);
			$memo = addslashes($_POST['memo']);
			$type = addslashes($_POST['type']);
			//$pluspage = addslashes($_POST['pluspage']);
			
			$sql = "INSERT INTO $tablename VALUES('',NULL,'$memo','$type',NULL,$writetime,$writetime)";
			mysql_query($sql) or die (mysql_error());

				if(	$type==1){header("location: ./list_New");	}
				elseif (	$type==2){header("location: ./list_Old");	}
				else {		header("location: ./list_Important");	}
		}

			public function Inform_Delete(){
				$tablename = 'inform';
				$number = addslashes($_GET['no']);
				$type = addslashes($_GET['type']);

				$sql = "delete from $tablename where no=$number";
				mysql_query($sql) or die (mysql_error());

				if($type==1){header("location: ./list_New");	}
				else if ($type==2){header("location: ./list_Old");}
				else if ($type==3){header("location: ./list_Important");}
		}

			public function Inform_Modify(){
				$number = addslashes($_GET['no']);
				$type_now=$_GET['type'];
				$data['type']=$type_now;


				$query = "select * from inform where no='$number'"; // 글 번호를 가지고 조회를 합니다.
				$result = mysql_query($query) or die (mysql_error());
				$array = mysql_fetch_array($result);

				$data['type']=$array['type'];
				$data['memo']=$array['memo'];
				$data['writetime']=$array['writetime'];//writetime 수정 안하기

				if($type_now==1){
				$data['inform_type'] = '1';
				$sql = "select * from inform where type = 1 and no%2=0 order by writetime desc";
				$data['array']=$this->db->query($sql);
				$sql = "select * from inform where type = 1 and no%2=1 order by writetime desc";
				$data['query']=$this->db->query($sql);
				$this -> load ->view('inform_modify',$data);
				}
				else if($type_now==2){
				$data['inform_type'] = '2';
				$data['type'] = '2';
				$data['modify'] = '1';
				$sql = "select * from inform where type = 2 order by lasttime desc";
				$data['query']=$this->db->query($sql);
				$this -> load ->view('informOld',$data);
				}
			
				else {
				$data['inform_type'] = '3';
				$sql = "select * from inform where type = 3 and no%2=0 order by writetime desc";
				$data['array']=$this->db->query($sql);
				$sql = "select * from inform where type = 3 and no%2=1 order by writetime desc";
				$data['query']=$this->db->query($sql);
				$this -> load ->view('inform_modify',$data);
				}
				
		}
			
			public function Inform_Modifyok(){
				$tablename = 'inform';
				$number = addslashes($_GET['no']);
				$memo = addslashes($_POST['memo']);
				$type = addslashes($_POST['type']);
				$lasttime = time();
				
				//$writetime = time();
				$writetime=$_POST['wtime'];
				$sql = "update $tablename set
                        name=NULL, memo='$memo', type='$type', pluspage=NULL, writetime='$writetime',lasttime='$lasttime'
                        where no=$number";
				mysql_query($sql) or die (mysql_error());
				if(		$type==1){header("location: ./list_New");	}
				elseif (	$type==2){header("location: ./list_Old");}
				else {		header("location: ./list_Important");	}
		}
			public function Tchange_N(){
				$tablename = 'inform';
				$number = addslashes($_GET['no']);
				$type = addslashes($_GET['type']);
				$sql = "update $tablename set type='1' where no=$number";
				mysql_query($sql) or die (mysql_error());

				if($type==1){header("location: ./list_New");	}
				else if ($type==2){header("location: ./list_Old");}
				else if ($type==3){header("location: ./list_Important");}
		}
			public function Tchange_O(){
				$tablename = 'inform';
				$number = addslashes($_GET['no']);
				$type = addslashes($_GET['type']);
				$sql = "update $tablename set type='2' where no=$number";
				mysql_query($sql) or die (mysql_error());

				if($type==1){header("location: ./list_New");	}
				else if ($type==2){header("location: ./list_Old");}
				else if ($type==3){header("location: ./list_Important");}
		}
		public function Tchange_I(){
				$tablename = 'inform';
				$number = addslashes($_GET['no']);
				$type = addslashes($_GET['type']);
				$sql = "update $tablename set type='3' where no=$number";
				mysql_query($sql) or die (mysql_error());

				if($type==1){header("location: ./list_New");	}
				else if ($type==2){header("location: ./list_Old");}
				else if ($type==3){header("location: ./list_Important");}
		}

///////////////////////////////////////////////////////////////////////////////////////////////
//전달체계 //
		public function lists(){
			$sql = "select * from bbs_inform where no=1";
			$data['array']=$this->db->query($sql);


			//$sql = "select * from bbs_inform where no = 2";
			//$data['query']=$this->db->query($sql);

			$data['inform_type'] = '2';
			$data['type'] = '2';
			$data['modify'] = '0';
			$sql = "select * from inform where type = 2 order by lasttime desc";
			$data['query']=$this->db->query($sql);
			

			$this -> load ->view('inform_New',$data);
		}
		public function New_Inform_Insert(){
			$tablename = 'bbs_inform';
			$writetime = time();
			//$name = addslashes($_POST['name']);
			$memo1 = addslashes($_POST['memo1']);
			$memo2 = addslashes($_POST['memo2']);
	
			//$pluspage = addslashes($_POST['pluspage']);
		
			$sql = "update $tablename set
                         memo='$memo1', writetime=$writetime
                        where no=1";
			mysql_query($sql) or die (mysql_error());


			$sql = "update $tablename set
                         memo='$memo2', writetime=$writetime
                        where no=2";
			mysql_query($sql) or die (mysql_error());

			header("location: ./lists");
		}

		public function Backup(){
			$this -> load ->view('inform_backup');
		}
		public function knowledge(){
			$this -> load ->view('inform_ACC_important');
		}


		public function doback(){
								echo "<script>
										function popup(){
											var new_win = window.open('dobackup','new','width=350px,height=0px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
										}
									</script>";
								echo "<html><body onLoad=setTimeout('popup()',2);>";
								echo "<IFRAME src=http://48.2.160.99:7885/xe/index.php?mid=free&act=dispMemberLogout frameborder=0 width=10 height=10></iframe>";
								echo "</body></html>";							
		}
		public function dobackup(){
				
				$time=date("H");
				if($time <= 7){	$today=time();
								$yesterday=mktime(00,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
								$day = date("Y년 m월 d일", $yesterday); }
				else {$day = date("Y년 m월 d일");  }
				$query = "select * from bbs_inform where no=1"; // 전달 위치 no=1
				$result = mysql_query($query) or die (mysql_error());
				$array = mysql_fetch_array($result);

				$data['memo']=$array['memo'];
				$data['writetime']=$day;
				$this -> load ->view('backup',$data);	
		}

/////////////////////////////////////////////////////////////////////////
// 카메라
		public function Weather(){

			echo "<IFRAME src='http://weather.hq.af.mil:8080/wxhq08/apache/isnw/isn02main.html' frameborder='0' width='1100px' height='600px'></iframe>";
			echo "<br><br><br><br><br><br><p> 카메라 위치 </p>";
			
		}


		public function Camera(){
			$sql = "select * from camera where utime is NULL ORDER BY dtime";
			$data['query_err']=$this->db->query($sql);

			$sql = "select * from camera where utime is not NULL ORDER BY utime desc";
			$data['query_success']=$this->db->query($sql);


			$sql = "select count(*) from camera where utime is NULL";
			$result = mysql_query($sql) or die (mysql_error());
			$data['total_num']=mysql_result($result,0,0);

			$sql = "select count(*) from camera";
			$result = mysql_query($sql) or die (mysql_error());
			$data['total_camera']=mysql_result($result,0,0);

			$this -> load ->view('camera', $data);
		}

		public function Camera_Print(){
			$today=time();
			if(date("H",$today) <= 9)
			{
				$time8=mktime(8,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				$time11=mktime(11,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				$time14=mktime(14,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				$time17=mktime(17,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				$time20=mktime(20,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				$time23=mktime(23,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				$time2=mktime(2,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time5=mktime(5,00,00,date("m",$today),date("d",$today),date("y",$today));	
				$time8a=mktime(8,00,00,date("m",$today),date("d",$today),date("y",$today));
			}
			else {
				$time8=mktime(8,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time11=mktime(11,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time14=mktime(14,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time17=mktime(17,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time20=mktime(20,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time23=mktime(23,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time2=mktime(2,00,00,date("m",$today),date("d",$today)+1,date("y",$today));
				$time5=mktime(5,00,00,date("m",$today),date("d",$today)+1,date("y",$today));	
				$time8a=mktime(8,00,00,date("m",$today),date("d",$today)+1,date("y",$today));
			}

			/*
			echo date("y-m-d H i", $time8);
			echo "<br>";
			echo date("y-m-d H i", $time11);echo "<br>";
			echo date("y-m-d H i", $time14);echo "<br>";
			echo date("y-m-d H i", $time17);echo "<br>";
			echo date("y-m-d H i", $time20);echo "<br>";
			echo date("y-m-d H i", $time23);echo "<br>";
			echo date("y-m-d H i", $time2);echo "<br>";
			echo date("y-m-d H i", $time5);echo "<br>";
			echo $time8a;echo "<br>";
			*/
			
			$sql = "select count(*) from camera where utime is NULL";
			$result = mysql_query($sql) or die (mysql_error());
			$data['total_num']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where dtime <= '$time8' AND ( utime is NULL OR utime > '$time8' )";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num0']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time11' ) AND dtime <= '$time11'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num8']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time14' ) AND dtime <= '$time14'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num11']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time17' ) AND dtime <= '$time17'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num14']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time20' ) AND dtime <= '$time20'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num17']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time23' ) AND dtime <= '$time23'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num20']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time2' ) AND dtime <= '$time2'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num23']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time5' ) AND dtime <= '$time5'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num2']=mysql_result($result,0,0);

			$sql = "select count(*) from camera where ( utime is NULL OR utime > '$time8a' ) AND dtime <= '$time8a'";
			$result = mysql_query($sql) or die (mysql_error());
			$data['num5']=mysql_result($result,0,0);

			$sql = "select * from camera where utime is NULL ORDER BY dtime";
			$data['query_err']=$this->db->query($sql);

			$sql = "select count(*) from camera where utime is NULL";
			$result = mysql_query($sql) or die (mysql_error());
			$data['total_num']=mysql_result($result,0,0);


			$this -> load ->view('camera_Print', $data);
			
		}
		public function Camera_Print718(){
			$today=time();
			if(date("H",$today) <= 8) //8시 전까진 어제꺼 인쇄.
			{
				$time7=mktime(7,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				$time18=mktime(18,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
			}
			else
			{
				$time7=mktime(7,00,00,date("m",$today),date("d",$today),date("y",$today));
				$time18=mktime(18,00,00,date("m",$today),date("d",$today),date("y",$today));
			}

			$sql = "select * from camera where ( utime is NULL OR utime > '$time7' ) AND dtime <= '$time7'";
			$data['time_7']=$this->db->query($sql);

			$sql = "select location from camera where ( utime is NULL OR utime > '$time18' ) AND dtime <= '$time18'";
			$data['time_18']=$this->db->query($sql);

			$this -> load ->view('camera_print718', $data);



		}
		public function Camera_mail(){
			$sql = "select count(*) from camera where utime is NULL";
			$result = mysql_query($sql) or die (mysql_error());
			$data['total_num']=mysql_result($result,0,0);

			$sql = "select * from camera where utime is NULL ORDER BY dtime";
			$data['query_err']=$this->db->query($sql);

			$this -> load ->view('camera_email', $data);
		}

		public function Camera_detail(){
			$sql = "select * from camera_detail where no%2=0";
			$data['query1']=$this->db->query($sql);

			$sql = "select * from camera_detail where no%2=1";
			$data['query2']=$this->db->query($sql);
			
			$this -> load -> view('camera_detail', $data);
		}
		public function cam_dDelete(){
				$tablename = 'camera_detail';
				$number = addslashes($_GET['no']);
				$sql = "delete from $tablename where no=$number";
				mysql_query($sql) or die (mysql_error());
				header("location: ./Camera_detail");
		}
		public function Camera_dwrite(){
			$tablename = 'camera_detail';
			$number = addslashes($_POST['no']);
			$name = addslashes($_POST['name']);
			$location = addslashes($_POST['location']);
			$phone1 = addslashes($_POST['phone1']);
			$phone2 = addslashes($_POST['phone2']);
			$phone3 = addslashes($_POST['phone3']);
			

			if($number==0){
						$sql = "INSERT INTO $tablename VALUES('','$name','$location','$phone1','$phone2','$phone3')";
			}
			else{
					$sql = "update $tablename set
                       name='$name', location='$location',phone1='$phone1',phone2='$phone2',phone3='$phone3'
                       where no='$number'";
			}


			mysql_query($sql) or die (mysql_error());
		
			header("location: ./Camera_detail");
		}

		public function Camera_write(){
			$tablename = 'camera';
			//$name = addslashes($_POST['name']);
			$number = addslashes($_POST['no']);
			$udate = addslashes($_POST['udate']);
			$utime = addslashes($_POST['utime']);
			$reason = addslashes($_POST['reason']);
			$location = addslashes($_POST['location']);
			$person = addslashes($_POST['person']);
			$ddate = addslashes($_POST['ddate']);
			$dtime = addslashes($_POST['dtime']);
			$phone = addslashes($_POST['phone']);
			$etc = addslashes($_POST['etc']);
			
			$ddate = preg_replace("/-/", "-", $_POST['ddate']);
			$ddate = str_replace("/", "-", $ddate);
			$ddate = str_replace(".", "-", $ddate);
			$udate = str_replace(":", "-", $udate);

			$dtime = preg_replace("/:/", "", $dtime);
			
			$udate = preg_replace("/-/", "-", $_POST['udate']);
			$udate = str_replace("/", "-", $udate);
			$udate = str_replace(".", "-", $udate);
			$udate = str_replace(":", "-", $udate);

			$utime = preg_replace("/:/", "", $utime);

			$tmp2=explode("-",$ddate); 
			$d_m=$tmp2[0]; // 월
			$d_d=$tmp2[1]; // 일

			$tmp1=explode("-",$udate); 
			$u_m=$tmp1[0]; // 월
			$u_d=$tmp1[1]; // 일
			

			if($utime==0){$mo=0;}
			else {$mo=1;}
			$downtime=mktime($dtime/100,$dtime%100,00,$d_m,$d_d,date("Y"));
			$uptime=mktime($utime/100,$utime%100,00,$u_m,$u_d,date("Y"));

			//echo date("m/d  H:i",$downtime);
			//$d=date("m/d  h:i",$downtime);
			
			if($number==0){
				if($mo==0){
						$sql = "INSERT INTO $tablename VALUES('',NULL,'$location','$reason','$person','$downtime',NULL,'$phone','$etc')";}
					else{
						$sql = "INSERT INTO $tablename VALUES('',NULL,'$location','$reason','$person','$downtime','$uptime','$phone','$etc')";}
			}
			else{
				if($mo==0){
				$sql = "update $tablename set
                        name=NULL, memo='$reason', location='$location', person='$person',dtime='$downtime',utime=NULL,phone='$phone', etc='$etc'
                       where no=$number";}
				else {
				$sql = "update $tablename set
                        name=NULL, memo='$reason', location='$location', person='$person',dtime='$downtime',utime='$uptime',phone='$phone', etc='$etc'
                       where no=$number";}
			}


			mysql_query($sql) or die (mysql_error());
		
			header("location: ./Camera");
		}
		public function cam_Delete(){
				$tablename = 'camera';
				$number = addslashes($_GET['no']);
				$sql = "delete from $tablename where no=$number";
				mysql_query($sql) or die (mysql_error());
				header("location: ./Camera");
		}
		public function cam_Ok(){
				$tablename = 'camera';
				$camtime = time();
				$number = addslashes($_GET['no']);
				//$name = addslashes($_POST['name']);
				$sql = "update $tablename set
                        utime='$camtime'
                       where no=$number";
				mysql_query($sql) or die (mysql_error());
				header("location: ./Camera");
		}

		public function Camera_write2(){
			$tablename = 'camera_detail';
			$name = addslashes($_POST['location']);
			$location = addslashes($_POST['reason']);
			$phone1 = addslashes($_POST['person']);
			$phone2 = addslashes($_POST['udate']);
			$phone3 = addslashes($_POST['utime']);


			$sql = "update $tablename set
                        phone2='$phone2'
                       where no=8";
			mysql_query($sql) or die (mysql_error());
		
			header("location: ./Camera");
		}
		public function Camera_clean(){
				$tablename = 'camera';
				$today=time();
				$num=0;
				if(date("H",$today) <= 8)
				{
					$time_six=mktime(6,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				}
				else if(date("H",$today) > 8)
				{
					$time_six=mktime(6,00,00,date("m",$today),date("d",$today),date("y",$today));
				}
				//echo date("m-d H i ",$time_six);
				$sql = "delete from $tablename where utime is not NULL AND utime < '$time_six'";
				mysql_query($sql) or die (mysql_error());
				header("location: ./Camera");
		}
		
		//////////////////////////////////////
		// 링크 페이지 
		public function links(){
			$this -> load ->view('link');
		}
		public function viewNAC(){
			$this -> load ->view('viewNAC');
		}

		////////////////////////////////////
		// 전화번호 
		public function Phone(){
			$this -> load ->view('phone');
		}
		
		/////////////////////////////////////
		// start 페이지 
		public function In(){

			

			$sql = "select * from bbs_inform where no=5";
			$data['vacation']=$this->db->query($sql);

			$sql = "select * from bbs_inform where no=6";
			$data['ojt']=$this->db->query($sql);

			$sql = "select * from bbs_inform where no=4";
			$data['clean']=$this->db->query($sql);

			$sql = "select * from bbs_inform where no>6 AND no<17";
			$data['clean2']=$this->db->query($sql);

			$this -> load ->view('information',$data);
		}

		public function New_start_Insert(){

			$tablename = 'bbs_inform';
			$writetime = time();
			$type = addslashes($_POST['type']);

			if($type==2){
			$vacation = addslashes($_POST['vacation']);
			$sql = "update $tablename set
                         memo='$vacation', writetime=$writetime
                        where no=5";
			mysql_query($sql) or die (mysql_error());
			header("location: ./In#vacation");
			}
			else if($type==3){
			$ojt = addslashes($_POST['OJT']);
			$sql = "update $tablename set
                         memo='$ojt', writetime=$writetime
                        where no=6";
			mysql_query($sql) or die (mysql_error());
			header("location: ./In#OJT");
			}

		}

		public function clean_Insert(){
			$tablename = 'bbs_inform';
			$writetime = time();
			$cleana = addslashes($_POST['cleana']);
			$name[1] = addslashes($_POST['name1']);	$clean[1] = addslashes($_POST['clean1']);
			$name[2] = addslashes($_POST['name2']);	$clean[2] = addslashes($_POST['clean2']);
			$name[3] = addslashes($_POST['name3']);	$clean[3] = addslashes($_POST['clean3']);
			$name[4] = addslashes($_POST['name4']);	$clean[4] = addslashes($_POST['clean4']);
			$name[5] = addslashes($_POST['name5']);	$clean[5] = addslashes($_POST['clean5']);
			$name[6] = addslashes($_POST['name6']);	$clean[6] = addslashes($_POST['clean6']);
			$name[7] = addslashes($_POST['name7']);	$clean[7] = addslashes($_POST['clean7']);
			$name[8] = addslashes($_POST['name8']);	$clean[8] = addslashes($_POST['clean8']);
			$name[9] = addslashes($_POST['name9']);	$clean[9] = addslashes($_POST['clean9']);
			$name[10] = addslashes($_POST['name10']);	$clean[10] = addslashes($_POST['clean10']);
			
			for($i =1 ; $i<11 ; $i++){
				if($clean[$i]=="") $clean[$i]=0;
				$tmp=$i+6;
				$sql = "update $tablename set  
					subject='".$clean[$i]."', memo='".$name[$i]."', writetime='$writetime'
					where no='$tmp'";
				mysql_query($sql) or die (mysql_error());
			}

			$sql = "update $tablename set
                         memo='$cleana', writetime=$writetime
                        where no=4";
			mysql_query($sql) or die (mysql_error());

			header("location: ./In#clean");
		}

		public function del_clean(){
			$tablename = 'bbs_inform';
			for($i =1 ; $i<11 ; $i++){
			$tmp=$i+6;
			$sql = "update $tablename set
                        subject='0', memo='', writetime='$writetime'
                        where no='$tmp'";
			mysql_query($sql) or die (mysql_error());
			}
			header("location: ./In#clean");
		}

		public function saveone_clean(){
			$tablename = 'bbs_inform';
			$writetime = time();
			$num = $_GET['number'];
			$num = $num + 6;

			$sql = "select subject from bbs_inform where no='$num'";
			$result = mysql_query($sql) or die (mysql_error());
			$state=mysql_result($result,0,0);

			if($state==1) $state=0;
			else $state=1;


			$sql = "update $tablename set subject='$state', writetime='$writetime' where no='$num'";
			mysql_query($sql) or die (mysql_error());

				


			
			
	

		}



//////////////////////////////////////////////////////////
// ACC
		public function ACC(){
			if(date("H")<6){		
				$tmp1=date('Y-m');
				$tmp2=date('d')-1;
				if($tmp2 == 0){
					$yesterday= time()-86400;
					$tmp1=date('Y-m',$yesterday);
					$tmp2=date('d',$yesterday);
				}

				if($tmp2 < 10 ){$data['calendardate']= $tmp1. "-0" .$tmp2;}
				else{$data['calendardate']= $tmp1. "-" .$tmp2;}
			}
			else {	$data['calendardate']=date('Y-m-d');}
			//echo $data['calendardate'];
			$this -> load ->view('inform_ACC',$data);
		}

		public function makeCalendar(){

			$AccYear = $_GET["AccYear"]; 
			$AccMonth = $_GET["AccMonth"]; 
			$AccDay = $_GET["AccDay"];
			$tmp;
			
			if($AccMonth < 10 && strlen($AccMonth) <2){
				if($AccDay <10)	{$tmp= "$AccYear" . "0" . $AccMonth . "0". $AccDay;}
				else {$tmp= "$AccYear" . "0" . $AccMonth . "". $AccDay;}
			}
			else{
				if($AccDay <10)	{$tmp= "$AccYear" . "" . $AccMonth . "0". $AccDay;}
				else {$tmp= "$AccYear" . "" . $AccMonth . "". $AccDay;}
			}
			$tmp="http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main.jsp?workdate=" . $tmp;
			
			header("location: $tmp");

		}

		public function makeCalendar2(){
			$AccYear = $_GET["year"]; 
			$AccMonth = $_GET["month"]; 
			$AccDay = $_GET["day"];
			$tmp;
			
			if($AccMonth < 10 && strlen($AccMonth) <2){
				if($AccDay <10)	{$tmp= "$AccYear" . "-0" . $AccMonth . "-0". $AccDay;}
				else {$tmp= "$AccYear" . "-0" . $AccMonth . "-". $AccDay;}
			}
			else{
				if($AccDay <10)	{$tmp= "$AccYear" . "-" . $AccMonth . "-0". $AccDay;}
				else {$tmp= "$AccYear" . "-" . $AccMonth . "-". $AccDay;}
			}

			$data['calendardate']=date($tmp);
			$this -> load ->view('inform_ACC',$data);
		}
//////////////////////////////////////////////////////////
// L4
	public function L4(){
			$this -> load ->view('L4switch');
		}
//////////////////////////////////////////////////////////
// 체계점검.
	public function DailyCheck(){
		$data['linkpage'] = "http://www.hq.af.mil:9999/biseo/new_main/10/biseo_10_index.html";
			$this -> load ->view('DailyCheck',$data);
		}

	public function DayCheck(){
		$page_number= $_GET["page_number"]; 
		$num=0;
			switch($page_number){
				//케이스별로 각 체계들 주소 기입.
				case 0:  /* 0;					*/ $data['linkpage'] = "";						break; $num++;
				
				default: 
					$data['linkpage'] = "http://www.hq.af.mil:9999/AfPortal/new/portal_main.jsp";						break;
			}

			
				echo $data['linkpage'];
				
	}


		
	}

?>
