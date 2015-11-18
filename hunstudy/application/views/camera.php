<!-- 카메라 문서 페이지 입니다. -->
<?
	//카메라 정보를 표현하는 함수.
	function Camera_detail($location){

			$sql1 = "select count(*) from camera_detail where name='$location'";
			$result1 = mysql_query($sql1) or die (mysql_error());
			$is_value=mysql_result($result1,0,0);


			if($is_value == 0){
				echo " ";

			}

			else{
			$sql = "select * from camera_detail where name='$location'";
			$result = mysql_query($sql) or die (mysql_error());
			$detail=mysql_result($result,0,2);
			$detail1=mysql_result($result,0,3);
			$detail2=mysql_result($result,0,4);
			$detail3=mysql_result($result,0,5);

			echo "<span class=\"label label-success\">";
			echo $detail;
			echo "</span>&nbsp<span class=\"label\">";
			echo $detail3;
			echo "</span><br><span class=\"label\">";
			echo $detail1;
			echo "</span>&nbsp<span class=\"label\">";
			echo $detail2;
			echo "</span>";
			}
		}

		function Camera_detail2($location){
			$sql = "select * from camera_detail where name='$location'";
			$result = mysql_query($sql) or die (mysql_error());
			$detail=mysql_result($result,0,2);
			$detail1=mysql_result($result,0,3);
			$detail2=mysql_result($result,0,4);
			$detail3=mysql_result($result,0,5);
			echo $detail;
		}
?>
<!DOCTYPE html>

<html lang="ko" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	<meta name="Generator" content="XpressEngine" />

<!-- TITLE -->
	<title>Camera</title>
<!-- CSS -->
	<link rel="stylesheet" href="/xe/common/css/xe.min.css?20121021144313" type="text/css" media="all" />
	<link rel="stylesheet" href="/xe/modules/message/skins/default/message.css?20121021144313" type="text/css" media="all" />
	<link rel="stylesheet" href="/xe/modules/admin/tpl/css/admin_ko.css?20121021144313" type="text/css" media="all" />
	<link rel="stylesheet" href="/xe/modules/admin/tpl/css/admin.min.css?20121021144313" type="text/css" media="all" />
	<style type="text/css">
		/*#loginAccess { position: absolute; top: 50%; left: 50%; margin: -205px -192px;};*/

	</style>

    <!-- Le styles -->
    <link href="/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/css/docs.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/js/google-code-prettify/prettify.css" rel="stylesheet">

	<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bootstrap/docs/assets/js/jquery.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-transition.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-alert.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-modal.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-dropdown.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-scrollspy.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-tab.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-tooltip.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-popover.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-button.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-collapse.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-carousel.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-typeahead.js"></script>
    <script src="/bootstrap/docs/assets/js/bootstrap-affix.js"></script>
    <script src="/bootstrap/docs/assets/js/application.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
	<script>
	function searchgiche(){ //정보체계 담당 연락처 
		var new_win = window.open("http://www.hq.af.mil:9999/AfPortal/10/board2/test.jsp",'search','width=770px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	function popup(){ //날씨
		var new_win = window.open('Weather','new','width=1100px,height=700px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	function Print_popup(){ //프린트 페이지 
		var new_window = window.open("Camera_Print",'print','width=1000px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	function mail_popup(){ //카메라 메일
		var new_window = window.open("Camera_mail",'print','width=1000px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	function Print_popup2(){ //18시 카메라 현황
		var new_window = window.open("Camera_Print718",'print','width=1000px,height=650px,toolbar=no,status=no,menubar=no,location=no');
	}
	</script>
	<script language="JavaScript">
	function AccWrite(num){ //ACC로 넘기는 함수.
		formName = "Accform"+num;
		//alert(formName);
		document.forms[formName].target = "hiddenifr";
		document.forms[formName].submit();
	}
	</script>

	<script language="JavaScript">
	function AccWrite(num){ 
		formName = "Accform"+num;
		//alert(formName);
		document.forms[formName].target = "hiddenifr";
		document.forms[formName].submit();
	}
	</script>

<script type="text/javascript">
var xmlHttp;
var total;
var mode=1;

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}
    
function createQueryString(formName) {
    var locationa = document.forms[formName].location.value;
    var reason = document.forms[formName].reason.value;
    var person = document.forms[formName].person.value;
	var phone = document.forms[formName].phone.value;
	var ddate = document.forms[formName].ddate.value;
	var dtime = document.forms[formName].dtime.value;
	var udate = document.forms[formName].udate.value;
	var utime = document.forms[formName].utime.value;
	var etc = document.forms[formName].etc.value;
	var no = document.forms[formName].no.value;
    
    var queryString = "location=" + locationa + "&reason=" + reason + "&person=" + person + "&phone=" + phone + "&ddate=" + ddate + "&dtime=" + dtime + "&udate=" + udate + "&utime=" + utime + "&etc=" + etc + "&no=" + no;
    
    return queryString;
}

function MyFormWrite(number) {
    createXMLHttpRequest();
    var formName = "myForm" + number;
    var url = "http://48.2.160.99:7885/hunstudy/index.php/inform/Camera_write";
    var queryString = createQueryString(formName);
	
    xmlHttp.open("POST", url, true);
    xmlHttp.onreadystatechange = handleStateChange;
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");    
    xmlHttp.send(queryString);

}
    
function handleStateChange() {
    if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
            parseResults();

        }
    }
}

function MyFormWrite2(Camtotal) {
	total=Camtotal;

	if(total >= 1){
		MyFormWrite(total);
	}
	else{
		;
	}
	//alert(total);
}

function  parseResults() {
	total--;
	MyFormWrite2(total);
}

		function doStart() {
            createXMLHttpRequest();
            var url = "http://48.2.160.99:7885/hunstudy/index.php/inform/camera";
            xmlHttp.open("GET", url, true);
            xmlHttp.onreadystatechange = startCallback;
            xmlHttp.send(null);
        }

        function startCallback() {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {                    
                    refreshTime();
                }
            }
        }
        

        function refreshTime(){
            var time_span = document.getElementById("time");
            var time_val = time_span.innerHTML;

            var int_val = parseInt(time_val);
            var new_int_val = int_val - 1;
            if(mode == "1"){
				if (new_int_val > -1) {
					setTimeout("refreshTime()", 1000);
					time_span.innerHTML = new_int_val;                
				} else {
					time_span.innerHTML = 120;
					this.location.href = './Camera';
				}
			}
        }
//~로 puse기능 
		function StartCount(){
			mode = 1;
		}

		function PauseCount(){
			mode = 0;
		}

		$(document).keyup(function(event){
			if(event.keyCode==192){
				if(mode == "1"){
					PauseCount();
				}
				else if(mode == "0"){
					StartCount();
					refreshTime();
				}
			}

			

		}); 

</script>
<SCRIPT>///////////////// 단축키. ////////////////////
		$(document).keydown(function(event){
			if(event.keyCode==18){
				$(document).keyup(function(event){

					if(event.keyCode==49){
						window.open("http://48.2.147.139:8080/JungJeonPlace/main.do");
					}
					else if(event.keyCode==50){
						window.open("http://48.2.160.99:7885/");
					}
					else if(event.keyCode==51){
						location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/In";
					}
					else if(event.keyCode==52){
						location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/ACC";
					}
					else if(event.keyCode==53){
						location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/lists";
					}
					else if(event.keyCode==54){
						location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/Camera";
					}
					else if(event.keyCode==55){
						location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/Phone";
					}
					else if(event.keyCode==56){
						location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/links";
					}	
					fflush(event);
				});
			}
		}); </SCRIPT>


<script>
	$(document).ready(function(){
		$("#fadeIn").toggle(
			function(){	$("#fadeTarget").css("visibility","visible")(1000);	},
			function(){	$("#fadeTarget").css("visibility","hidden"); }
		);
	});

	$(document).ready(function(){
		$("#fadeIn").mouseover(function(){
			$("#fadeTarget").fadeIn(1000);
		});
	});
</script>
	
    <link href="/bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/bootstrap/docs/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/bootstrap/docs/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/bootstrap/docs/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/bootstrap/docs/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/bootstrap/docs/assets/ico/apple-touch-icon-57-precomposed.png">

  </head>




  <body data-spy="scroll" data-target=".bs-docs-sidebar" onLoad=setTimeout('doStart()',1000);>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#" onClick='javascript:searchgiche();'>Giche Work</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
			<li><a href='In'>Start</a></li>
			<li><a href='ACC'>ACC</a></li>
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">Information <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href='lists'>Inform</a></li>
                  <li><a href='Backup'>backup</a></li>
                  <li><a href='list_Important'>Important</a></li>
                  <li class="divider"></li>
                  <li><a href="knowledge">knowledge</a></li>
                </ul>
              </li>
			 <li class=active><a href='Camera'>Camera</a></li>
			 <li><a href='Phone'>Phone</a></li>
			 <li><a href='links'>Link</a></li>

              
            </ul>
          </div><!--/.nav-collapse -->
        </div>

      </div>
    </div>

	</div>
		<div id="fadeTarget" style='width:95%;height:5px;visibility:hidden;'><br>
					<p align="right"><input type=text value="뇌우 경보로 인한 케이블 분리"></p>
					<p align="right"><input type=text value="장비이상으로 인한 카메라 OFF"></p>
					<p align="right"><input type=text value="확인 후 조치하기로 함"></p>
					<p align="right"><input type=text value="주간 중 조치 예정"></p>		
	</div>
	<div align="right" style='position: fixed;
  right: 0;
  left: 90%;
  top:98%;
  z-index: 1030;
  margin-bottom: 0;
  width:200px;height:20px;background:#3d3d3d;color:#fff;text-align:center; border:2px;'>next reflash time is <span id="time">120</span></div>
<div class="row">
	<div class="span12 offset3">
		<div class="tooltip-demo">
			<ul class="nav nav-pills">
			<li class="active"><a href="Camera">Camera</a></li>
			<li ><a href="http://48.2.160.41/public/checklogin.htm?username=prtgadmin&password=rlcpqks%2301&guiselect=radio&loginurl=48.2.160.40/group.htm?id=0 " target="_blank">PRTG</a></li>
			<li ><a href="#" onClick='javascript:popup();'>Weather</a></li >
			<li ><a href="#" onClick='javascript:Print_popup();'>Print</a></li >
			<li ><a href="#" onClick='javascript:mail_popup();'>Email</a></li >
			<li ><a href='Camera_detail'>카메라 번호</a></li >
			<li ><a href="#" onClick='javascript:Print_popup2();'>설치현황</a></li >
			<li><div class="span3 offset2 alert alert-error"><center>현재 <font size="5"><b><? echo 88-$total_num;?>/88</font></b>대 운영 중 &nbsp<font size="5"><b><? echo $total_num;?></b></font>대 다운<br></div></li>
			<a href='Camera_clean' rel="tooltip" data-placement="top" title="8시 이전의 카메라 정보를 삭제"><button type="button" class="btn btn-inverse btn btn-large btn-primary">정리</button></a></ul>
		</div>
	</div>
	<div class="span1">
<div class="btn-group btn-group-vertical">
 <button type="button" class="btn btn-success" onClick='javascript:MyFormWrite2(<? echo $total_camera;?>);'>전체저장</button>
 <button id="fadeIn" class="btn btn-info dropdown-toggle">복붙</button>
</div>

	</div>


	<div class="row">
	<div class="row">
	<font size=2>

		<div class="span13 offset2">
		<div class="alert alert-success">
		<form name='myFormi' method='post' action='Camera_write'>
				<div class="span13">
				<div class="control-group success">
					<input class="input-mini" name="ddate" type="text" value="<? echo date("m-d"); ?>">
					<input class="input-mini" name="dtime" type="text" value="<? echo date("H:i"); ?>">&nbsp
					<input class="input-small" name="location" type="text" placeholder="location">
					<textarea name="reason" rows="1" class="input-xlarge" placeholder="reason"></textarea>
					<input class="input-small" name="person" type="text" placeholder="person">
					<input class="input-small" name="phone" type="text" placeholder="phone">
					<input class="input-mini" name="udate" type="text">
					<input class="input-mini" name="utime" type="text">
					<input class="input-large" name="etc" type="text" placeholder="etc">
					<input class="hidden" name="no" value=0>
				</div>
				</div>
				<div class="span1"><button type=submit class="btn btn-primary btn-success">Write</button></div>
				<br>
		</form>
		</div>
		
    </div>
	<DIV class="span13 offset2" >
	<ul class="the-icons clearfix">
	<table class="table">
			<thead>
              <tr>
                <th><h4>위치</th>
                <th><h4>내용</th>
				<th><h4>담당자</th>
				<th><h4>Phone</th>
                <th><h4>DOWN</th><th></th>
				<th><h4>UP</th><th></th>
				<th><h4>비고</th>
				<th><font size="1">description of icons.</font>
				<div class="tooltip-demo">
				<ul>
				 <a href="#" rel="tooltip" data-placement="top" title="지금 올라왔을때 누릅니다."><i class="icon-ok"></i></a>
				 <a href="#" rel="tooltip" data-placement="top" title="카메라 정보 수정"><i class="icon-wrench" ></i></a>
				 <a href="#" rel="tooltip" data-placement="top" title="ACC로 카메라 정보를 넘깁니다."><i class="icon-pencil"></i></a>
				 <a href="#" rel="tooltip" data-placement="top" title="카메라 정보 삭제"><i class="icon-remove"></i></a>
				 </ul>
				</div>
				</th><th></th>
              </tr>
            </thead>
			
			<tbody>
			<? $my_num=1; ?>
			<?foreach($query_err->result() as $item): ?>
			<tr class=error>
                 <form name='myForm<?=$my_num;?>' method='post' action='Camera_write'>
				 <?
				 echo "<td width=20><input class=input-mini name=location type=text value=";
				 echo $item->location;
				 echo "></td>";
				 echo "<td width=300><textarea name=reason rows=1 class=input-xlarge>";
				 echo $item->memo;
				 echo "</textarea></td>";
				 echo "<td width=30><textarea name=person rows=1 class=input-small>";
				 echo $item->person;
				 echo "</textarea></td>";
				 echo "<td width=30><input class=input-small name=phone type=text value=";
				 echo $item->phone;
				 echo "></td>";
				 $downdate=date("m-d",$item->dtime);
				 echo "<td width=30><input class=input-mini name=ddate type=text value=";
				 echo $downdate;
				 echo "></td>";
				 $downtime=date("H:i",$item->dtime);
				 echo "<td width=30><input class=input-mini name=dtime type=text value=";
				 echo $downtime;
				 echo "></td>";
				 if($item->utime==NULL){
				 $uptime=date("m-d=H:i",$item->utime);
				 echo "<td width=30><input class=input-mini name=udate type=text></td>";
				 echo "<td width=30><input class=input-mini  name=utime type=text></td>";
				 }
				 else{
				 $update=date("m-d",$item->utime);
				 echo "<td width=30><input class=input-mini name=udate type=text value=";
				 echo $update;
				 echo "></td>";
				 $uptime=date("H:i",$item->utime);
				 echo "<td width=30><input class=input-mini name=utime type=text value=";
				 echo $uptime;
				 echo "></td>";}
				 echo "<td width=300><a href='#' rel='tooltip' data-placement='top' title='";
				 echo $item->etc;
				 echo "'><textarea name=etc rows=1 class=input-xlarge>";
				 echo $item->etc;
				 echo "</textarea></div></td>";
				 ?>
				 <input class="hidden" name="no" value=<? echo $item->no; ?>>
				 <td><? Camera_detail($item->location); ?></td>
				 <td width=35>
				 <a href="cam_Ok?no=<?echo $item->no;?>"><i class="icon-ok"></i></a>
				 <i class="icon-wrench" ><button type="submit" class="btn btn-link"></button></i>
				 </form>
				</td>
				<td width=35> <form name="Accform<?=$item->no;?>" method='post' action='http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main_save.jsp?workdate=<?	$cam_yesterday=mktime(6,00,00,date("m",$item->dtime),date("d",$item->dtime)-1,date("Y",$item->dtime));
																																							if(date("H",$item->dtime) < 6) {	echo date("Ymd",$cam_yesterday); }
																																							else {echo date("Ymd",$item->dtime);} ?>' accept-charset='euc-kr'>
					<input class="hidden" name="content" value='<?	echo "NxMS ";
																	$location = preg_replace("/비2/", "비", $item->location);
																		$location = preg_replace("/황병2/", "황병", $location);
																		$location = preg_replace("/화악2/", "화악", $location);
																		$location = preg_replace("/안성2/", "안성", $location);
																		$location = preg_replace("/대천2/", "대천", $location);
																		echo $location;
																	echo "(";
																	Camera_detail2($item->location);
																	echo ") 카메라 다운<br> : ";
																	echo $item->memo; 
																	?>' >
					<input class="hidden" name="hours" value=<? echo date("H",$item->dtime); ?>>
					<input class="hidden" name="minutes" value=<? echo date("i",$item->dtime); ?>>
					<a href="javascript:;" onClick="AccWrite('<?=$item->no;?>');"><i class="icon-pencil"></i></a>
					<a href='cam_Delete?no=<?echo $item->no;?>'><i class="icon-remove"></i></a>
				</form>
				</td>
				 <!--<button type="button" class="close" data-dismiss="alert">x</button>--></tr>
			<?$my_num++; endforeach; ?>
			<?foreach($query_success->result() as $item): ?>
			<tr class=warning>
                 <form name='myForm<?=$my_num;?>' method='post' action='Camera_write'>
				 <?
				
				 echo "<td width=30><input class=input-mini name=location type=text value=";
				 echo $item->location;
				 echo "></td>";
				 echo "<td width=300><textarea name=reason rows=1 class=input-xlarge>";
				 echo $item->memo;
				 echo "</textarea></td>";
				 echo "<td width=30><textarea name=person rows=1 class=input-small>";
				 echo $item->person;
				 echo "</textarea></td>";
				 echo "<td width=30><input class=input-small name=phone type=text value=";
				 echo $item->phone;
				 echo "></td>";
				 $downdate=date("m-d",$item->dtime);
				 echo "<td width=30><input class=input-mini name=ddate type=text value=";
				 echo $downdate;
				 echo "></td>";
				 $downtime=date("H:i",$item->dtime);
				 echo "<td width=30><input class=input-mini name=dtime type=text value=";
				 echo $downtime;
				 echo "></td>";
				 if($item->utime==NULL){
				 $uptime=date("m-d=H:i",$item->utime);
				 echo "<td width=30><input class=input-mini name=udate type=text>";
				 echo "<td width=30><input class=input-mini  name=utime type=text>";
				 }
				 else{
				 $update=date("m-d",$item->utime);
				 echo "<td width=30><input class=input-mini name=udate type=text value=";
				 echo $update;
				 echo ">";
				 $uptime=date("H:i",$item->utime);
				 echo "<td width=30><input class=input-mini name=utime type=text value=";
				 echo $uptime;
				 echo ">";}
				 echo "</td>";
				 echo "<td width=300><a href='#' rel='tooltip' data-placement='top' title='";
				 echo $item->etc;
				 echo "'><textarea name=etc rows=1 class=input-xlarge>";
				 echo $item->etc; 
				 echo "</textarea></a></td>";
				 ?>
				 <input class="hidden" name="no" value=<? echo $item->no; ?>>
				
				 <td>
				 <? 
						$downhour=date("H",$item->dtime);
						$downmin=date("i",$item->dtime);
				?>
				 <? Camera_detail($item->location); ?></td>
				 <td width=35>
				 <a href="cam_Ok?no=<?echo $item->no;?>"><i class="icon-ok"></i></a>		
				 <i class="icon-wrench" ><button type="submit" class="btn btn-link"></button></i>
				</form>
				 </td>
				<td width=35><form name="Accform<?=$item->no;?>" method='post' action='http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main_save.jsp?workdate=<? $cam_yesterday=mktime(6,00,00,date("m",$item->utime),date("d",$item->utime)-1,date("Y",$item->utime));
																																							if(date("H",$item->utime) < 6) {	echo date("Ymd",$cam_yesterday); }
																																							else {echo date("Ymd",$item->utime);} ?>' accept-charset='euc-kr'>
					<input class="hidden" name="content" value='<?	
																	if(date("H") < 6)
																	{
																		$yesterday_time=mktime(6,00,00,date("m"),date("d")-1,date("Y"));
																	}
																	else
																	{
																		$yesterday_time=mktime(6,00,00,date("m"),date("d"),date("Y"));
																	}
																	if($item->dtime < $yesterday_time){
																		echo "NxMS ";
																		$location = preg_replace("/비2/", "비", $item->location);
																		$location = preg_replace("/황병2/", "황병", $location);
																		$location = preg_replace("/화악2/", "화악", $location);
																		$location = preg_replace("/안성2/", "안성", $location);
																		$location = preg_replace("/대천2/", "대천", $location);
																		echo $location;
																		echo "(";
																		Camera_detail2($item->location);
																		echo ") 카메라 정상";
																	}
																	else {
																		echo "NxMS ";
																		$location = preg_replace("/비2/", "비", $item->location);
																		$location = preg_replace("/황병2/", "황병", $location);
																		$location = preg_replace("/화악2/", "화악", $location);
																		$location = preg_replace("/안성2/", "안성", $location);
																		$location = preg_replace("/대천2/", "대천", $location);
																		echo $location;
																		echo "(";
																		Camera_detail2($item->location);
																		echo ") 카메라 다운<br> : ";
																		echo $item->memo; 
																		echo "(";
																		echo date("H",$item->utime);
																		echo ":";
																		echo date("i",$item->utime);
																		echo " 정상)";
																	}
																	?>' >
					<? 
					if($item->dtime < $yesterday_time)
					{
							echo "<input class='hidden' name='hours' value=";
							echo date("H",$item->utime); 
							echo "><input class='hidden' name='minutes' value=";
							echo date("i",$item->utime); 
							echo ">";
					}
																	
						else{
							echo "<input class='hidden' name='hours' value=";
							echo date("H",$item->dtime); 
							echo "><input class='hidden' name='minutes' value=";
							echo date("i",$item->dtime); 
							echo ">";
					}
					?>
					<a href="javascript:;" onClick="AccWrite('<?=$item->no;?>');"><i class="icon-pencil"></i></a>
					<a href='cam_Delete?no=<?echo $item->no;?>'><i class="icon-remove"></i></a>
				</form></td>
				 <!--<button type="button" class="close" data-dismiss="alert">x</button>--></tr>
			<? $my_num++; endforeach; ?>
			</tbody>
			
			</table>
		</ul>
		</div>
	</font>
	</div>
	
</div>

	<!-- /container -->

   
<iframe id="hidden" name="hiddenifr" src='' frameborder="0" width="0" height="0"></iframe>
<IFRAME src="http://www3.hq.af.mil:9999/alhz0/main/bsp_pas.jsp?userid=1&password=1" frameborder="0" width="0" height="0" ></iframe>
  </body>

</html>
