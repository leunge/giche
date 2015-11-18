<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>GicheWork</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/css/docs.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
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


	 <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bootstrap/docs/assets/js/jquery.js"></script>
    <script src="/bootstrap/docs/assets/js/google-code-prettify/prettify.js"></script>
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
	<script>
	
	function searchgiche(){
		var new_win = window.open("http://www.hq.af.mil:9999/AfPortal/10/board2/test.jsp",'search','width=770px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
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

function CleanSaveone(number) {
    createXMLHttpRequest();
	var number = number;
    
    var queryString = "http://48.2.160.99:7885/hunstudy/index.php/inform/saveone_clean?";
    queryString = queryString + "number=" + number + "&timeStamp=" + new Date().getTime();
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
  </head>

  
  <body data-spy="scroll" data-target=".bs-docs-sidebar">
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
			<li class=active><a href='In'>&nbsp&nbspStart</a></li>
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
			 <li><a href='Camera'>Camera</a></li>
			 <li><a href='Phone'>Phone</a></li>
			 <li><a href='links'>Link</a></li>
		

              
            </ul>
          </div><!--/.nav-collapse -->
        </div>

      </div>
    </div>


<!-- Subhead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <div class="container">
    <h1>GICHE WORK</h1>
	추가 예정 사항 작업.장애 기록(수정).txt, OJT 체크박스식으로, 청소도.<br>
	미완성 : 전달 검색기능, 시간별 알람기능.<br>
	전달 게시판 어떻게 만들어야할지 모르겠음.<br>
	월말 작업 및 OJT 입력시 X:\gicheBackup\gichework 참고할 것.
    <p class="lead"></p>
  </div>
</header>


  <div class="container">

    <!-- Docs nav
    ================================================== -->
    <div class="row">
      <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav">
          <li><a href="#giche"><i class="icon-chevron-right"></i> 기체반 현황</a></li>
          <li><a href="#Pass"><i class="icon-chevron-right"></i> Pass</a></li>
          <li><a href="#otherIP"><i class="icon-chevron-right"></i> 예하부대 IP</a></li>
		  <li><a href="#Work"><i class="icon-chevron-right"></i> 작업, 장애기록</a></li>
          <li><a href="#OJT"><i class="icon-chevron-right"></i> OJT</a></li>
          <li><a href="#vacation"><i class="icon-chevron-right"></i> 휴가 스케줄</a></li>
		  <li><a href="#clean"><i class="icon-chevron-right"></i> 주말청소</a></li>
        </ul>

      </div>


      <div class="span9">



        <!-- Typography
        ================================================== -->
        <section id="giche">
          <div class="page-header">
		  <br>
            <h1>기체반현황</h1>
          </div>
		  <div class="row" >
		  <div class="span4">
				<div class="alert"><center>
					<font color=black><p> ◎  사병식당 운영시간 ◎</p>
					------------------------------<br>
					<p>하절기
					<p>조식 (평일) 06:15~07:30 (휴일) 06:30~08:00<br>
					중식 (평일) 11:15~13:00 (휴일) 11:15~13:00<br>
					석식 (평일) 16:30~18:00 (휴일) 16:30~18:00<br><br>
					<p>동절기</p>
					<p>조식 (평일) 06:45~08:00 (휴일) 07:00~08:30<br>
					중식 (평일) 11:15~13:00 (휴일) 11:20~13:00<br>
					석식 (평일) 17:00~18:30 (휴일) 17:00~18:30<br>
					<br>
					<p>         ◎  간부식당 운영시간 ◎</p>
					------------------------------<br>
					<p>하절기 (3-육군,4-공군 공통)</p>
					조식 (평일) 06:30~07:40 (휴일) 07:00~08:00<br>
					중식 (평일) 11:30~12:30 (휴일) 12:00~13:00<br>
					석식(3식) (평일) 17:00~18:30 (휴일) 17:00~18:00<br>
					<br><br>
					<p>동절기 (3-육군,4-공군 공통)</p>
					조식 (평일) 07:00~08:10 (휴일) 07:30~08:30<br>
					4중식 (평일) 11:30~12:30 (휴일) 12:00~13:00<br>
					석식(3식) (평일) 17:30~19:00 (휴일) 17:30~18:30</p>
			  </font>
			  </div>
		</div>

		<div class="span4">
			<div class="alert">
					<center>
					<font color=black> <p>기체반 자전거 현황<br>
					------------------------------</p>
					<p>1. 09/12/15 남문 비밀번호   3666 (X)<br>
					2. 10/05/31 서문 비밀번호   6236, 3667(X)<br>
					<br>
					12/12/31 생활관 비밀번호 3666, 3667 (새거)</p></font>
			</div>
		</div>

		<div class="span4">
			<div class="alert">
					<center>
				
					<font color=black> <p><? echo date("m");?>월 c4i 키값 변경일<br>
					<?
		  $fp=fopen("/data/NAS_Guest/gicheBackup/gichework/c4ik.txt","r");
		  $sz=filesize("/data/NAS_Guest/gicheBackup/gichework/c4ik.txt");
		  $fr=fread($fp,$sz);
		  fclose($fp);
		  echo $fr;
		  ?>
			</div>
		</div>




	</div>


      </section>



        <!-- Code
        ================================================== -->
        <section id="Pass">
          <div class="page-header">
            <h1>Password</h1>
          </div>
     <div data-spy="scroll" data-target="#navbarExample" data-offset="0" class="scrollspy-example">
		  <pre><? 
		  $fp=fopen("/data/NAS_Guest/gicheBackup/gichework/Pass.txt","r");
		  $sz=filesize("/data/NAS_Guest/gicheBackup/gichework/Pass.txt");
		  $fr=fread($fp,$sz);
		  fclose($fp);
		  echo $fr;
		  ?></pre>
		    </div>
       
        </section>



        <!-- IP
        ================================================== -->
        <section id="otherIP">
          <div class="page-header">
            <h1>예하부대IP</h1>
          </div>

		 <div class="row" >
					<div class="alert alert-info span2">
							국본(직) 및 기관	1.1<br>
							육군	16.1<br>
							해군	32.1<br>
							공군	48.1<br>
							<br>
							작전사령부	54.1<br>
							교육사령부	52.1<br>
							군수사령부	50.1<br>
							방공포병사령부	54.1<br>
							남부전투사령부	54.6<br>
							공군사관학교	48.1<br>
							합동군사대학교	26.144<br>
							방공포병학교	56.5<br>
							보라매수련원	48.1<br>
							공지합동작전학교	54.4<br>						
							<br>
							국방부	1.1<br>
							한미연합사	8.145<br>
							육군본부	16.1<br>
							해군본부	32.1<br>
							해병대사령부	40.1<br>
							국방대학교	8.112<br>
						</div>
						<div class="alert alert-info span2">
							제1전비	54.2<br>
							제3훈비	52.2<br>
							제5전비	54.3<br>
							제8전비	54.4<br>
							제10전비	54.5<br>
							제11전비	54.6<br>
							제15혼비	54.7<br>
							제16전비	54.8<br>
							제17전비	54.9<br>
							제18전비	54.1<br>
							제19전비	54.11<br>
							제20전비	54.12<br>
							제30단	54.1<br>					
							<br>
							6전대	54.9<br>
							7전대	48.9<br>
							29전대	54.9<br>
							32전대	54.6<br>
							35전대	54.7<br>
							36전대	54.4<br>
							37전대	54.1<br>
							38전대	54.13<br>
							39전대	54.5<br>
							52전대	54.2<br>
							60전대	50.1<br>
							73전대	48.7<br>
						</div>
						<div class="alert alert-info span2">
							복지단	48.3<br>
							항안단	48.9<br>
							중관단	48.3.4<br>
							1여단	56.5<br>
							2여단	56.3<br>
							3여단	56.4<br>
							교재창	48.1<br>
							40창	50.1<br>
							41창	54.3<br>
							42창	54.12<br>
							81창	50.1<br>
							82창	54.12<br>
							83창	50.1<br>
							85창	54.3<br>
							86창	54.12<br>
							항공기술연구소	50.1<br>
						</div>
		  </div>
        </section>

		<!-- 작업, 장애기록
        ================================================== -->
		<section id="Work">
          <div class="page-header">
            <h1>작업, 장애기록</h1>
 <div data-spy="scroll" data-target="#navbarExample" data-offset="0" class="scrollspy-example">
		  <pre>
          <? 
		  $fp=fopen("/data/NAS_Guest/gicheBackup/gichework/work.txt","r");
		  $sz=filesize("/data/NAS_Guest/gicheBackup/gichework/work.txt");
		  $fr=fread($fp,$sz);
		  fclose($fp);
		  echo $fr;
		  ?>
			</pre>
		    </div>
       
        </section>

		<!-- OJT LIST -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 id="myModalLabel">OJT List</h3>
            </div>
            <div class="modal-body">
 <? 
		  $fp=fopen("/data/NAS_Guest/gicheBackup/gichework/OJT_list.txt","r");
		  $sz=filesize("/data/NAS_Guest/gicheBackup/gichework/OJT_list.txt");
		  $fr=fread($fp,$sz);
		  fclose($fp);
		  echo $fr;
		  ?>
            </div>
            <div class="modal-footer">
              <button class="btn" data-dismiss="modal">Close</button>
            </div>
          </div>


        <!-- 신병 OJT
        ================================================== -->
        <section id="OJT">
          <div class="page-header">
            <h1>OJT</h1>
          </div>
<ul class="the-icons clearfix">
          <h2><a href="#" class="tooltip-test" title="click right icon. Popup OJT list">신병 OJT</a><font align=right><a data-toggle="modal" href="#myModal" class="btn btn-link dropdown-toggle"><li><i class="icon-th-list"></i></li></a></font></h2>
			</ul>
		  <div class="control-group info">
				<form name='myForm' method='post' action='New_start_Insert'> 
					<input type=hidden name=type value="3">
					<textarea name=OJT rows="20" class="input-block-level"><? foreach($ojt->result() as $item): ?><?=$item->memo?><? endforeach; ?></textarea>
					<button type=submit class="btn btn-info dropdown-toggle">
						<h3>Write</h>
					</button>	
				</form>
          
         
        </section>


        <!-- 휴가 입력
        ================================================== -->
        <section id="vacation">
          <div class="page-header">
            <h1>휴가입력<br></h1>
          </div>
				<div class="control-group error">
				<form name='myForm' method='post' action='New_start_Insert'> 
					<input type=hidden name=type value="2">
					<textarea name=vacation rows="20" class="input-block-level"><? foreach($vacation->result() as $item): ?><?=$item->memo?><? endforeach; ?></textarea>
					<button type=submit class="btn btn-danger dropdown-toggle">
						<h3>Write</h>
					</button>	
				</form>
			</div>
       
        </section>


		
        <!-- 주말청소
        ================================================== -->
        <section id="clean">
          <div class="page-header">
            <h1>주말청소</h1>
          </div>
          <form name='cleanForm' method='post' action='clean_Insert'>
 
<table class="table table-striped">
<?
		$tmparray = array("","공기 청정기	:","지하 3층	:","휴게실	:","휴게실 바닥	:","사무실	:","사무실	바닥	:","상황실	:","상황실 바닥	:","산소 발생기	:","쓰레기 : ");
		foreach($clean2->result() as $item):
		

		$num=$item->no-6;
		if( $num%2==1) {echo "<tr>";}
			echo "<td width=10>";
			if($item->subject ==1 ) {echo "<a href='#' onClick='javascript:CleanSaveone(".$num.");'><input type='checkbox' name='clean".$num."' id='list' value='1' data-on='ON' data-off='OFF' checked/></a></td><td>".$tmparray[$num]."</td><td><input type='text' name='name".$num."' class='input-small' value='".$item->memo."'></td>";}
			else {echo "<a href='#' onClick='javascript:CleanSaveone(".$num.");'><input type='checkbox' name='clean".$num."' value='1' id='list' data-on='ON' data-off='OFF'/></a></td><td>".$tmparray[$num]."</td><td><input type='text' name='name".$num."' class='input-small' value='".$item->memo."'></td>";}
		if( $num%2==0) {echo "</tr>";}
		endforeach;
 ?><td></td><td> </td><td> </td><td> </td><td><a href="del_clean"><button type="button" class="btn btn-large btn-primary disabled">delete</button>	</a> </td><td><button type=submit class="btn btn-success btn-mini">
						<h3>Write</h>
					</button>	
</form></td>
</table>
<textarea name=cleana rows="5" class="input-block-level"><? foreach($clean->result() as $item): ?><?=$item->memo?><? endforeach; ?></textarea>

        </section>




<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  

 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> 

      </div>
    </div>

  </div>

	<!-- /container -->

<link rel="stylesheet" type="text/css" href="/hunstudy/application/models/jquery.tzCheckbox/jquery.tzCheckbox.css" />
<script src="/hunstudy/jquery.min.js"></script>
<script src="/hunstudy/application/models/jquery.tzCheckbox/jquery.tzCheckbox.js"></script>
<script src="/hunstudy/application/models/checkbox.js"></script>


  </body>
</html>
