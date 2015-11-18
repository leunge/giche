<?php
////파일 리스트 생성 php
	function mkList($office_list) {
		$office_list = explode("\n", $office_list);
		$cnt_folder_root = 4;
		$cnt_folder = 0;
		foreach ($office_list as $i => $list_path) {
			$arr_file = explode("/", $list_path);
			$file_name = array_pop($arr_file);
			$file_post = explode(".", $file_name);
			if (count($file_post) > 1) {
				$file_post = $file_post[1];
			} else {
				$file_post = "";
			}
			if ($file_post == "" && $cnt_folder == 0) {	 // First Folder 
				switch ($file_name) {
					case "기체반":
						$office = "giche";
						break;
					case "정보실":
						$office = "jungbo";
						break;
					case "상황실":
						$office = "sanghwang";
						break;
					default:
						$office = "";
						break;
				}
				$cnt_now_dir = count($arr_file);
				$cnt_folder++;
				echo $file_name;
			} else if ($file_post == "" && $cnt_now_dir < count($arr_file) && $cnt_folder > 0) { // New Folder
				$cnt_folder++;
				echo $file_name;
				echo "<br>";
				$cnt_now_dir = count($arr_file);
			} else if ($file_post == "" && $cnt_now_dir > count($arr_file) && $cnt_folder > 0 ) { // New Folder in prev Folder that more than 2 depth
				$i = $cnt_now_dir - count($arr_file);
				$cnt_folder--;
				while ($i-- > 0) {			
					$cnt_folder--;
				}
				$cnt_folder++;
				echo $file_name;
				$cnt_now_dir = count($arr_file);				
			} else if ($file_post == "" && $cnt_now_dir == count($arr_file) && $cnt_folder > 0 ) { // New Folder in prev Folder
				$cnt_folder--;
				$cnt_folder++;
				echo $file_name;
				
			} else if (count($arr_file) == 0) { // end List
				while ($cnt_folder-- > 0) {
				}
			} else { // Files
				?><p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a  data-toggle="collapse"href="#collapseTwo" onClick='javascript:viewSchedule("<?=$office?>","<?=$list_path?>");'><?
				echo $file_name;
				echo "</a>&nbsp&nbsp<a rel='tooltip' data-placement='right' title='download' class='icon-download-alt' href='".$list_path."'></a></p>";
			}
		}
	}
?>


<?php 
function crd($s){ // 함수를 제작합니다. 함수내에서 변수 $s 는 "지정된 달" 입니다 
if(!$s){$s=date("Y-m-d");}
$x=explode("-",$s); // 들어온 날짜를 년,월,일로 분할해 변수로 저장합니다.
$s_Y=$x[0]; // 지정된 년도 
$s_m=$x[1]; // 지정된 월
$s_d=$x[2]; // 지정된 요일
 
$s_t=date("t",mktime(0,0,0,$s_m,$s_d,$s_Y)); // 지정된 달은 몇일까지 있을까요?
$s_n=date("N",mktime(0,0,0,$s_m,1,$s_Y)); // 지정된 달의 첫날은 무슨요일일까요?
$l=$s_n%7; // 지정된 달 1일 앞의 공백 숫자.
$ra=($s_t+$l)/7; 
$ra=ceil($ra); $ra=$ra-1; // 지정된 달은 총 몇주로 라인을 그어야 하나?

/* 
$n_d= date("Y-m-d",mktime(0,0,0,$s_m,$s_d+1,$s_Y)); // 다음날
$p_d= date("Y-m-d",mktime(0,0,0,$s_m,$s_d-1,$s_Y)); // 이전날
$n_m= date("Y-m-d",mktime(0,0,0,$s_m+1,$s_d,$s_Y)); // 다음달 (빠뜨린 부분 추가분이에요)
$p_m= date("Y-m-d",mktime(0,0,0,$s_m-1,$s_d,$s_Y)); // 이전달
$n_Y= date("Y-m-d",mktime(0,0,0,$s_m,$s_d,$s_Y+1)); // 내년
$p_Y= date("Y-m-d",mktime(0,0,0,$s_m,$s_d,$s_Y-1)); // 작년
 */
// 변수 $s 에 새로운 값을 넣고 새문서를 만들면, $s 가 들어와 원하는 값을 표시해 줍니다.
//echo ("<table>");
echo "<ul class=nav nav-pills>
<div class='pagination pagination-mini'><ul>";
echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;";
$l_Y =$s_Y;
$last_m=$s_m-1;
if($last_m < 1){
		$last_m =12;
		$l_Y = $l_Y -1;
	}
$last_t=date("t",mktime(0,0,0,$last_m,1,$l_Y)); // 지정된의 전달은 몇일까지 있을까요?
$last_n=date("N",mktime(0,0,0,$last_m,$last_t,$l_Y)); // 지정된의 전달은 몇일까지 있을까요?
echo "<li><a href='http://48.2.160.99:7885/hunstudy/index.php/inform/makeCalendar2?year=".$l_Y."&month=".$last_m."&day=".$last_t."'>";
							if($last_n==6){  
									echo "<font color='orange'><b>";
									echo $last_t;
									echo "</b></font>";
									}// 날짜입니다 토요일
							else if($last_n==7){  
									echo "<font color='red'><b>";
									echo $last_t;
									echo "</b></font>";
									}// 날짜입니다 일요일
							else {  
									echo $last_t;
									}// 날짜입니다
	echo "</a></li>";
    for($r=0;$r<=$ra;$r++){
		 //echo "<tr>";
            for($z=1;$z<=7;$z++){
                $rv=7*$r+$z; $ru=$rv-$l; // 칸에 번호를 매겨줍니다. 1일이 되기전 공백들 부터 마이너스 값으로 채운 뒤 ~ 
               // echo "<td width=10 height=10 align=center>";
                if($ru<=0 || $ru>$s_t){ echo ""; } // 딱 그달에 맞는 숫자가 아님 표시하지 말자 //원래 안에 공백문자 &nbsp;
                else{
					if($ru == $s_d){
							echo "<li class='active'>";
					?><a href='#' data-toggle='tab' onClick='javascript:refreshCalendar(<?=$ru?>);'><? //위에꺼 여기로 옮김.
                    $s=date("Y-m-d",mktime(0,0,0,$s_m,$ru,$s_Y)); // 현재칸의 날짜
							if($z==7){  
									echo "<font color='orange'><b>";
									echo "$ru";
									echo "</b></font>";
									}// 날짜입니다 토요일
							else if($z==1){  
									echo "<font color='red'><b>";
									echo "$ru";
									echo "</b></font>";
									}// 날짜입니다 일요일
							else {  
									echo "$ru";
									}// 날짜입니다
					}
					
					
					else{
						echo "<li>";
					?><a href='#' data-toggle='tab' onClick='javascript:refreshCalendar(<?=$ru?>);'><? //위에꺼 여기로 옮김.
                    $s=date("Y-m-d",mktime(0,0,0,$s_m,$ru,$s_Y)); // 현재칸의 날짜
							if($z==7){  
									echo "<font color='orange'><b>";
									echo "$ru";
									echo "</b></font>";
									}// 날짜입니다 토요일
							else if($z==1){  
									echo "<font color='red'><b>";
									echo "$ru";
									echo "</b></font>";
									}// 날짜입니다 일요일
							else {  
									echo "$ru";
									}// 날짜입니다
					}
					echo "</a></li>";//아래꺼
                }
                //echo "</td>";
            }
			  //echo "</tr>";
    }
	$n_Y=$s_Y;
	$next_m = $s_m +1;
	if($next_m > 12){
		$next_m =1;
		$n_Y = $n_Y +1;
	}
	$ns_n=date("N",mktime(0,0,0,$next_m,1,$n_Y)); // 지정된 달의 첫날은 무슨요일일까요?
	echo "<li><a href='http://48.2.160.99:7885/hunstudy/index.php/inform/makeCalendar2?year=".$n_Y."&month=". $next_m."&day=1'>";
	if($ns_n==6){  
									echo "<font color='orange'><b>";
									echo "1";
									echo "</b></font>";
									}// 날짜입니다 토요일
							else if($ns_n==7){  
									echo "<font color='red'><b>";
									echo "1";
									echo "</b></font>";
									}// 날짜입니다 일요일
							else {  
									echo "1";
									}// 날짜입니다
	echo "</a></li>";
    echo "  </ul>
</div>
</ul>";

}

?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>ACC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

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
	<link rel="stylesheet" href="/message/schedule/schedule.css?">
	<script src="/bootstrap/docs/assets/js/jquery.js"></script>

<script type="text/javascript" src="/hunstudy/right_move_script.js"></script>

    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
		<script>
	function searchgiche(){
		var new_win = window.open("http://www.hq.af.mil:9999/AfPortal/10/board2/test.jsp",'search','width=770px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	</script>
	<script>
	function Print_popup(){
		var new_window = window.open("Camera_Print",'print','width=1000px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	</script>

<script type="text/javascript">

var xmlHttp;

function createXMLHttpRequest() {
    if (window.ActiveXObject) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    } 
    else if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
}
function advk(advk_today) {
    createXMLHttpRequest();
    
    var queryString = "http://oper2.hq.af.mil:8888/advk0/advk0e/mgt/advk0_mgt_budae_daytoday_pro.html?public_date=" + advk_today;
    xmlHttp.onreadystatechange = handleStateChange;
    xmlHttp.open("GET", queryString, true);
    xmlHttp.send(null);
}

function handleStateChange() {
    if(xmlHttp.readyState == 4) {
        if(xmlHttp.status == 200) {
           ;
        }
    }
}

function advk0i(advk_today){
		var url= "http://oper2.hq.af.mil:8888/advk0/advk0e/mgt/advk0_mgt_budae_daytoday_pro.html?public_date=" + advk_today;
		var new_window = window.open(url,'advk','width=500px,height=900px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
}

function advk0(advk_today, number){
		for(i=0 ; i< number ; i++){
			advk(advk_today);
		}
	}

</script>

<script type="text/javascript"> 
function viewSchedule(office, src) {
	var src= src;
	var office = office;
    var url = "http://48.2.160.99:7885/hunstudy/test/schedule.php?office="+ office + "&src=" +src +  "&ts=" + new Date().getTime();
	showSchedule.location.href =url;
}
function refreshCalendar(AccDay) {
    var AccYear = document.getElementById("AccYear").value;
    var AccMonth = document.getElementById("AccMonth").value;

	var AccDay = AccDay;
    if(AccYear == "" || AccMonth == "") {
        clearModelsList();
        return;
    }
   
    var url = "http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_base.jsp?" 
        + createQueryString(AccYear, AccMonth, AccDay) + "&ts=" + new Date().getTime();

	showACC.location.href =url;
        
    
}
function refreshCalendar2(AccDay) {
    var AccYear = document.getElementById("AccYear").value;
    var AccMonth = document.getElementById("AccMonth").value;

	var AccDay = 1;
    if(AccYear == "" || AccMonth == "") {
        clearModelsList();
        return;
    }
    
    var url = "http://48.2.160.99:7885/hunstudy/index.php/inform/makeCalendar2?" 
        + createQueryString(AccYear, AccMonth, AccDay) + "&ts=" + new Date().getTime();

	location.href =url;
        
    
}

 

function createQueryString(AccYear, AccMonth, AccDay) {
    var queryString = "year=" + AccYear + "&month=" + AccMonth + "&day=" + AccDay;
    return queryString;
}

</script>
<script>
function fncSetTop(today){
	var obj = document.getElementById('divFm');
	//기본값 120   하루에 22씩
	var tmp=today*21;
	obj.scrollTop=120+tmp;

	var obj2 = document.getElementById('divFm2');
	//기본값 120   하루에 22씩
	var tmp=today*21;
	obj2.scrollTop=120+tmp;
}
</script>
<script>
function auto_flash(){
	this.location.href = './ACC';
	
}
</script>

<script language="JavaScript">
	function AccWrite(num){
		formName = "Accform"+num;
		//alert(formName);
		document.forms[formName].target = "showACC";
		document.forms[formName].submit();
	}
</script>

<script>
	$(document).ready(function(){
		$("#fadeIn").mouseover(function(){
			$("#fadeTarget").fadeIn(1000);
		});
	});

	$(document).ready(function(){
		$("#fadeOut").mouseover(function(){
			$("#fadeTarget").fadeOut(1000);
		});
	});
</script>

 <script type="text/javascript">
        var xmlHttp1;

        function createXMLHttpRequest() {
            if (window.ActiveXObject) {
                xmlHttp1 = new ActiveXObject("Microsoft.XMLHTTP");
            } 
            else if (window.XMLHttpRequest) {
                xmlHttp1 = new XMLHttpRequest();                
            }
        }
        
        function doStart() {
            createXMLHttpRequest();
            var url = "http://48.2.160.99:7885/hunstudy/index.php/inform/camera";
            xmlHttp1.open("GET", url, true);
            xmlHttp1.onreadystatechange = startCallback;
            xmlHttp1.send(null);
        }

        function startCallback() {
            if (xmlHttp1.readyState == 4) {
                if (xmlHttp1.status == 200) {                    
                    refreshTime();
                }
            }
        }
        

        function refreshTime(){
            var time_span = document.getElementById("time");
            var time_val = time_span.innerHTML;

            var int_val = parseInt(time_val);
            var new_int_val = int_val - 1;
            
            if (new_int_val > -1) {
                setTimeout("refreshTime()", 1000);
                time_span.innerHTML = new_int_val;                
            } else {
                time_span.innerHTML = 120;
				this.location.href = './ACC';
            }
        }
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
			<li class=active><a href='ACC'>ACC</a></li>
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

			  
			<li><a href='Camera'>Camera</a></li>
			<li><a href='Phone'>Phone</a></li>
			<li><a href='links'>Link</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
	  <div align="right" style='position: fixed;
  right: 0;
  left: 90%;
  top:98%;
  z-index: 1030;
  margin-bottom: 0;
  width:200px;height:20px;background:#3d3d3d;color:#fff;text-align:center; border:2px;'>next reflash time is <span id="time">180</span></div>
<div class="container">
<div class="row">
			<div class="span1">
            
			 <ul class="nav nav-pills nav-stacked"><br>
					<li class="active"><a href="#home"" data-toggle="tab">&nbsp&nbsp&nbspACC&nbsp&nbsp&nbsp</a></li><br>
					<li ><a href="#sangwhang" data-toggle="tab">Schedule</a></li><br>
					<li ><a href="#bonbap" data-toggle="tab">본청식단</a></li ><br>
					<li ><a href="#threebap" data-toggle="tab">&nbsp&nbsp3식당&nbsp&nbsp&nbsp</a></li ><br>
					<li ><a href="#errorilzi" data-toggle="tab">장애일지</a></li ><br>
					<li ><a href="#gicheWiki" data-toggle="tab">기체위키</a></li >
					<li ><a href="#advk" data-toggle="tab">증명서</a></li >
				</ul>	
			
			</div>
			
			
			<?
	$y=explode("-",$calendardate); // 들어온 날짜를 년,월,일로 분할해 변수로 저장합니다.
								$a_Y=$y[0]; // 지정된 년도 
								$a_m=$y[1]; // 지정된 월
								$a_d=$y[2]; // 지정된 요일
								
								$aa= "year=".$a_Y."&month=".$a_m."&day=".$a_d;
			?>
			<div class="span10">
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="home">

			  <br>
				<div class="span8">
					<div class="container">
					<div class="span2">
						<select id="AccYear" onchange="refreshCalendar2(<?=$a_d?>);" class="span1">
							<?
							 $tmpY=date("Y");
							 for($tmp=$tmpY-3;$tmp<=$tmpY+3;$tmp++){
								 if($tmp==$a_Y){
									 echo "<option value=";
									 echo $a_Y;
									 echo " selected>";
									 echo $tmp;
									 echo "</option>";
								}
								else{
									 echo "<option value=";
									 echo $tmp;
									 echo ">";
									 echo $tmp;
									 echo "</option>";
								}
						}
						?>
						</select>
						
						<select id="AccMonth" onchange="refreshCalendar2(<?=$a_d?>);" class="span1">
							 <?
							 for($tmp=1;$tmp<=12;$tmp++){
								 if($tmp==$a_m){
									 echo "<option value=";
									 echo $a_m;
									 echo " selected>";
									 echo $tmp;
									 echo "</option>";
								}
								else{
									 echo "<option value=";
									 echo $tmp;
									 echo ">";
									 echo $tmp;
									 echo "</option>";
								}
						}
						?>
						</select>
					</div>
					
					<div id="quotes-hide" style="margin-left:190px;margin-top:-18px;width: 550px ;height: 45px;overflow: hidden" >
    					<div id="quotes-slide" style="width: 820px">
							<div class="span9" id="Calendar"><? crd(date($calendardate)); ?></div>
						</div>
					</div>

					</div>	
					
					
					<IFRAME id="showACC" src="http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_base.jsp?<? echo $aa;?>" frameborder="0" width="1200" height="850"></iframe>
					</div>
					<table>
					<td id="fadeIn">보이기</td><td></td>
					<td id="fadeOut">숨기기</td>
					</table>
					<div id="fadeTarget" class="span1" style="display:none;"><br>
					<?	echo date("d",time()); ?>일
					<a href="#" onClick='javascript:AccWrite(1);'><span class="label label-success">6시 시간동기화</span></a>
					<a href="#" onClick='javascript:AccWrite(2);'><span class="label">6시 infoM1</span></a>
					<a href="#" onClick='javascript:AccWrite(3);'><span class="label">12시 50분 infoM1</span></a>
					<a href="#" onClick='javascript:AccWrite(4);'><span class="label label-success">16시 시간동기화</span></a>
					<a href="#" onClick='javascript:AccWrite(5);'><span class="label label-info">16시 공관 네트워크 이상없음</span></a>

					</div>
					
					<form name="Accform1" method='post' action='http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main_save.jsp?workdate=<?	echo date("Ymd",time()); ?>' accept-charset='euc-kr'>
						<input class="hidden" name="hours" value="06">
						<input class="hidden" name="minutes" value="00">
						<input class="hidden" name="content" value='시간 동기화 상태 이상 없음'>
					</form>
					<form name="Accform2" method='post' action='http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main_save.jsp?workdate=<?	echo date("Ymd",time()); ?>' accept-charset='euc-kr'>
						<input class="hidden" name="hours" value="06">
						<input class="hidden" name="minutes" value="00">
						<input class="hidden" name="content" value='정책복지1,2(HQ0905,HQ0906) InfoM1 재시작 [요청 : 상사 김건우]'>
					</form>
					<form name="Accform3" method='post' action='http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main_save.jsp?workdate=<?	echo date("Ymd",time()); ?>' accept-charset='euc-kr'>
						<input class="hidden" name="hours" value="12">
						<input class="hidden" name="minutes" value="50">
						<input class="hidden" name="content" value='정책복지1,2(HQ0905,HQ0906) InfoM1 재시작 [요청 : 상사 김건우]'>
					</form>
					<form name="Accform4" method='post' action='http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main_save.jsp?workdate=<?	echo date("Ymd",time()); ?>' accept-charset='euc-kr'>
						<input class="hidden" name="hours" value="16">
						<input class="hidden" name="minutes" value="00">
						<input class="hidden" name="content" value='시간 동기화 상태 이상 없음'>
					</form>
					<form name="Accform5" method='post' action='http://www3.hq.af.mil:9999/alhz0/app/worknote/worknote_main_save.jsp?workdate=<?	echo date("Ymd",time()); ?>' accept-charset='euc-kr'>
						<input class="hidden" name="hours" value="16">
						<input class="hidden" name="minutes" value="00">
						<input class="hidden" name="content" value='참모 총장/차장 공관 인터넷/인트라넷 이상없음'>
					</form>
	<div class="span10"><br><br><br><br><br></div>
              </div>

			  <div class="tab-pane fade in active" id="sangwhang">
			
			  <? $today=date("d")-2;?>
			  <div class="span2"><h3>상황근무</h><a href="http://oper.hq.af.mil:9999/ah400/manage/ERListManageAction.af?method=ERListInsertForm&ercode=R239&auth=0" target="_blank"><small>more</small></a></div>
				<div class="span7"><br>
					<div id='divFm' style='width:700px; height:65px; overflow-x:hidden; overflow-y:hidden;'>
						<IFRAME src="http://oper.hq.af.mil:9999/ah400/manage/ERListManageAction.af?method=ERListInsertForm&ercode=R239&auth=0" frameborder="0" width="700" height="850" scrolling='no' onLoad='fncSetTop(<?=$today;?>);'></iframe>
					</div>
				</div>
			  <div class="span2"><h3>당직사관</h><a href="http://oper.hq.af.mil:9999/ah400/manage/ERListManageAction.af?method=ERListInsertForm&ercode=R238&auth=0" target="_blank"><small>more</small></a></div>
				<div class="span7"><br>
					<div id='divFm2' style='width:700px; height:65px; overflow-x:hidden; overflow-y:hidden;'>
						<IFRAME src="http://oper.hq.af.mil:9999/ah400/manage/ERListManageAction.af?method=ERListInsertForm&ercode=R238&auth=0" frameborder="0" width="700" height="850" scrolling='no' onLoad='fncSetTop(<?=$today;?>);'></iframe>
					</div>
				</div>
				


				
				 <div class="span9">

                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                      # 스케줄 리스트. 
                    </a>
                  </div>
                  <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
						<ul id="giche_list">
							<?	mkList(shell_exec('find /data/NAS_Guest/스케쥴/기체반'));	?>
						</ul>
						<ul id="jungbo_list">
							<?	mkList(shell_exec('find /data/NAS_Guest/스케쥴/정보실'));	?>
						</ul>
						<ul id="sanghwang_list">
							<?	mkList(shell_exec('find /data/NAS_Guest/스케쥴/상황실'));	?>
						</ul>
                    </div>
                  </div>
                </div>
            <div id="schedule_main">
			<IFRAME src ="" id="showSchedule" frameborder="0" width="1000" height="700" border="1"></iframe>
			</div>
			
			</div>
				
	<?/*	<div class="span10">
			<div class="accordion" id="accordion2">
                <div class="accordion-group">
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                      # 스케줄 등록방법. 
                    </a>
                  </div>
                  <div id="collapseTwo" class="accordion-body collapse">
                    <div class="accordion-inner">
						그 달의 스케줄을 한셀로 열기.<br>
						2. 파일-> 다른이름으로 저장하기<br>
						3. X:\gicheBackup\gichework안에 파일형식 인터넷문서 (*.html;*.htm) 파일이름 schedule.html으로 변경 후 저장.
                    </div>
                  </div>
                </div>
              </div> 
			<IFRAME src="/data/NAS_Guest/gicheBackup/gichework/schedule.html" frameborder="0" width="1500" height="700"></iframe>
		</div>*/?>
              </div>

              <div class="tab-pane fade" id="bonbap">
                <IFRAME src=" http://www1.army.mil:7094/kfmenu/list.do#BB" frameborder="0" width="1100" height="900"></iframe>
              </div>
              <div class="tab-pane fade" id="threebap">
				<IFRAME src="http://www.wg20.af.mil:8000/dining/menu_view.php?board=byung" frameborder="0" width="900" height="850" align="center"></iframe>
              </div>
			  <div class="tab-pane fade" id="errorilzi">
			  <br>
				<IFRAME src="http://www3.hq.af.mil:9999/alhz0/app/troublenote/troublenote_base.jsp" frameborder="0" width="1100" height="850" leftmargin="200"></iframe>
              </div>
			  <div class="tab-pane fade" id="gicheWiki">
				<IFRAME src="http://48.2.160.99:7885/wiki/index.php/%EB%8C%80%EB%AC%B8" frameborder="0" width="950" height="850" leftmargin="200"></iframe>
              </div>

			  <div class="tab-pane fade" id="advk">
			  <? $advk0i_today=date("Ymd");
				 $advk0i_yesterday=date("Ym").date("d")-1;
				 ?>
				<br><br>
				<div class="span7">
				<IFRAME src="http://oper2.hq.af.mil:8888/advk0/advk0e/mgt/advk0_mgt_budae_daytoday.html" frameborder="0" width="900" height="850" ></iframe>
				</div>
				 <div class="span1 offset1">
				<a href="#" onClick='javascript:advk0(<?=$advk0i_yesterday;?>, 20);'><span class="label label-success">어제 증명서x20</span></a><br>
				<a href="#" onClick='javascript:advk0i(<?=$advk0i_yesterday;?>);'><span class="label label-success">어제 증명서 확인</span></a><br>
				<a href="#" onClick='javascript:advk0(<?=$advk0i_today;?>, 20);'><span class="label label-info">증명서x20</span></a><br>
				<a href="#" onClick='javascript:advk0i(<?=$advk0i_today;?>);'><span class="label label-info">증명서 확인</span></a>
				</div>
              </div>
			  
           </div></div>

	
</font>
	</div>
    </div>

	<!-- /container -->

   
<IFRAME src="http://www3.hq.af.mil:9999/alhz0/main/bsp_pas.jsp?userid=1&password=1" frameborder="0" width="10" height="10" ></iframe>

  </body>

</html>
