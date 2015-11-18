<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
	<link href="/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/css/docs.css" rel="stylesheet">
    <link href="/bootstrap/docs/assets/js/google-code-prettify/prettify.css" rel="stylesheet">
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
		<script>
	function searchgiche(){
		var new_win = window.open("http://www.hq.af.mil:9999/AfPortal/10/board2/test.jsp",'search','width=770px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	</script>
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

<script type="text/javascript">
        var xmlHttp1;
		var mode=0;
		var num=1;

        function createXMLHttpRequest() {
            if (window.ActiveXObject) {
                xmlHttp1 = new ActiveXObject("Microsoft.XMLHTTP");
            } 
            else if (window.XMLHttpRequest) {
                xmlHttp1 = new XMLHttpRequest();                
            }
        }
        
        function doStart(num) {
			
            createXMLHttpRequest();
            var url = "http://48.2.160.99:7885/hunstudy/index.php/inform/DayCheck?page_number=" + num;
            xmlHttp1.open("GET", url, true);
			if(num%2 == 0){
				xmlHttp1.onreadystatechange = startCallback;
			}
			else {
				xmlHttp1.onreadystatechange = startCallback2;
			}
            xmlHttp1.send(null);
        }

        function startCallback() {
            if (xmlHttp1.readyState == 4) {
                if (xmlHttp1.status == 200) {  
					response();
                }
            }
        }
		function startCallback2() {
            if (xmlHttp1.readyState == 4) {
                if (xmlHttp1.status == 200) {  
					response2();
                }
            }
        }
		function response(){
			var responseDiv = document.getElementById("serverResponse");
			var responseTexta = document.createTextNode(xmlHttp1.responseText);	
			//if(responseDiv.hasChildNodes()) {
			//	responseDiv.removeChild(responseDiv.childNodes[0]);
			//}
			//responseDiv.innerHTML = xmlHttp1.responseText;
			//alert(typeof(xmlHttp1.responseText));
			
			checkmain2.location.href=xmlHttp1.responseText;
		}
		function response2(){
			var responseDiv = document.getElementById("serverResponse2");
			var responseTexta = document.createTextNode(xmlHttp1.responseText);	
			//if(responseDiv.hasChildNodes()) {
			//	responseDiv.removeChild(responseDiv.childNodes[0]);
			//}
			//responseDiv.innerHTML = xmlHttp1.responseText;
			//alert(typeof(xmlHttp1.responseText));
			checkmain.location.href=xmlHttp1.responseText;
		}

		function refreshTime(){
            var time_span = document.getElementById("FirstPage");
            var time_val = time_span.innerHTML;

            var int_val = parseInt(time_val);
            var new_int_val = int_val ;
						
            if(mode == "1"){
				if (new_int_val < 212) {
					setTimeout("refreshTime()", 500);
					time_span.innerHTML = new_int_val; 
					NextPage();
				} else {
					mode = 0;
				}
			}
			
        }
		function NextPage(){
			var time_span = document.getElementById("FirstPage");
			var time_val = time_span.innerHTML;
			var int_val = parseInt(time_val);
            var new_int_val = int_val + 1;
            time_span.innerHTML = new_int_val;

			switch (int_val)
			{
				case 1:		num=0; $('#navigation li:eq('+ num+ ')').addClass('selected'); 					break;
				case 9:		num=0; $('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected'); 					break;
				case 15: num=1;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 21: num=2;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 27: num=3;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 33: num=4;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 39: num=5;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 45: num=6;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 51: num=7;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 57:num=8;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break; //10
				case 63: num=9;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 69:num=10;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 75: num=11;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 81: num=12;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 87:num=13;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 93:num=14;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 99: num=15;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 105: num=16;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 111: num=17;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break; //20
				case 117: num=18;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 121:num=19;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 125: num=20;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 129: num=21;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 133: num=22;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 137:num=23;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 141:  num=24;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 145:   num=25;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 148:   num=26;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 151:   num=27;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break; //30
				case 155:   num=28;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 157:   num=29;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 161:   num=30;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 165:   num=31;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 167:  num=32;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 171:   num=33;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 175:   num=34;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 177:   num=35;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 181:   num=36;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 185:   num=37;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 189:   num=38;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break; //40
				case 193:   num=39;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 196:   num=40;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 199:   num=41;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 200:   num=42;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 203:   num=43;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 207:   num=44;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 208:   num=45;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 210:   num=46;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 213:   num=47;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 214:   num=48;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 215:   num=49;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 216:   num=50;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 217:   num=51;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 218:   num=52;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 219:   num=53;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 220:  num=54;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 221:   num=55;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				case 222:  num=56;
					$('#navigation li:eq('+ num+ ')').addClass('complete');  num++ ; $('#navigation li:eq('+ num+ ')').addClass('selected');  break;
				default :  break;
			
			}
			doStart(new_int_val);	
		}
		function PrevPage(){
			var time_span = document.getElementById("FirstPage");
			var time_val = time_span.innerHTML;
			var int_val = parseInt(time_val);
            var new_int_val = int_val - 1;
            time_span.innerHTML = new_int_val;
			doStart(new_int_val);	
		}
		function StartCheck(){
			mode = 1;
			refreshTime();
		}
		function PauseCheck(){
			mode = 0;
		}

		function SetPage(pageNum){
			var time_span = document.getElementById("FirstPage");
			time_span.innerHTML = pageNum;
			mode = 0;
			
			doStart(pageNum);	
		}


</script>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript">
	$('#navigation li').live('click',function(){
		$('#navigation li').removeClass('selected');
		$(this).addClass('selected');
	})
</script>
<style type="text/css">
	#navigation li{
		list-style:none;
		font-size:9px;
	}
	#navigation {
		cursor:pointer;
	}
	#navigation .selected{
		background-color:red;
		color:white;
	}
	#navigation .complete{
		background-color:green;
		color:white;
	}
</style>

  </head>




  <body data-spy="scroll" data-target=".bs-docs-sidebar">

<div align="right" style='position: fixed;
  right: 0;
  left: 90%;
  top:98%;
  z-index: 1030;
  margin-bottom: 0;
  width:200px;height:20px;background:#3d3d3d;color:#fff;text-align:center; border:2px;'>page number is <span id="FirstPage">0</span></div>
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

			  
			<li><a href='Camera'>Camera</a></li>
			<li><a href='Phone'>Phone</a></li>
			<li><a href='links'>Link</a></li>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>

      </div>
    </div>
</div>
<div class="container-fluid">

<div id="serverResponse"></div>
<div id="controller" style='position: fixed;  left: 3%; top:90%;'>
<button type="button" class="btn btn-success" onClick='javascript:PrevPage();'>◁◁</button>
<button type="button" class="btn btn-success" onClick='javascript:StartCheck();'>▶</button>
<button type="button" class="btn btn-success" onClick='javascript:PauseCheck();'>||</button>
<button type="button" class="btn btn-success" onClick='javascript:NextPage();'>▷▷</button><span id="PresentPage"></span>
<div>
<div id="CheckLiskt" style='position: fixed;  left: 1%; top:7%;'>
<font size="2">
<div class="alert" style='width:210px' >
<ul id="navigation">
<table><tr>
<td id="check_1"><li onClick='javascript:SetPage(1);'><input type="checkbox">&nbsp 비서실</li></td>   	
<td id="check_2"><li onClick='javascript:SetPage(9);'><input type="checkbox">&nbsp 감찰실</li></td></tr><tr> 
<td id="check_3"><li onClick='javascript:SetPage(15);'><input type="checkbox">&nbsp정책실</li>	</td>
<td id="check_4"><li onClick='javascript:SetPage(21);'><input type="checkbox">&nbsp정훈공보실</li></td></tr><tr> 
<td id="check_5"><li onClick='javascript:SetPage(27);'><input type="checkbox">&nbsp 법무실		</li></td> 
<td id="check_6"><li onClick='javascript:SetPage(33);'><input type="checkbox">&nbsp 군종실		</li></td></tr><tr> 
<td id="check_7"><li onClick='javascript:SetPage(39);'><input type="checkbox">&nbsp 전력기참부	</li></td>
<td id="check_8"><li onClick='javascript:SetPage(45);'><input type="checkbox">&nbsp 인참부		</li></td></tr><tr> 
<td id="check_9"><li onClick='javascript:SetPage(51);'><input type="checkbox">&nbsp 정작부	</li></td> 
<td id="check_10"><li onClick='javascript:SetPage(57);'><input type="checkbox">&nbsp 군참부		</li></td></tr><tr> 
<td id="check_11"><li onClick='javascript:SetPage(63);'><input type="checkbox">&nbsp 정보화 기획실	</li></td> 
<td id="check_12"><li onClick='javascript:SetPage(69);'><input type="checkbox">&nbsp FX평가단	 </li></td></tr><tr> 
<td id="check_13"><li onClick='javascript:SetPage(75);'><input type="checkbox">&nbsp 기무부대	</li></td>
<td id="check_14"><li onClick='javascript:SetPage(81);'><input type="checkbox">&nbsp 연구단		</li></td></tr><tr> 
<td id="check_15"><li onClick='javascript:SetPage(87);'><input type="checkbox">&nbsp 헌병단	</li></td> 
<td id="check_16"><li onClick='javascript:SetPage(93);'><input type="checkbox">&nbsp 역사기록단	</li></td></tr><tr> 
<td id="check_17"><li onClick='javascript:SetPage(99);'><input type="checkbox">&nbsp 중전소	</li></td> 
<td id="check_18"><li onClick='javascript:SetPage(105);'><input type="checkbox">&nbsp 전력지원단</li></td></tr><tr> 
<td id="check_19"><li onClick='javascript:SetPage(111);'><input type="checkbox">&nbsp 비행표준단</li></td> 
<td id="check_20"><li onClick='javascript:SetPage(117);'><input type="checkbox">&nbsp 기상단		</li></td></tr><tr> 
<td id="check_21"><li onClick='javascript:SetPage(121);'><input type="checkbox">&nbsp 근무지원단	</li></td>
<td id="check_22"><li onClick='javascript:SetPage(125);'><input type="checkbox">&nbsp 전자규정	</li></td></tr><tr> 
<td id="check_23"><li onClick='javascript:SetPage(129);'><input type="checkbox">&nbsp 지식관리</li></td> 
<td id="check_24"><li onClick='javascript:SetPage(133);'><input type="checkbox">&nbsp CERT		</li></td></tr><tr> 
<td id="check_25"><li onClick='javascript:SetPage(137);'><input type="checkbox">&nbsp 대대급		</li></td>
<td id="check_26"><li onClick='javascript:SetPage(141);'><input type="checkbox">&nbsp 국회업무	 </li></td></tr><tr> 
<td id="check_27"><li onClick='javascript:SetPage(145);'><input type="checkbox">&nbsp 상용장비</li>	</td>
<td id="check_28"><li onClick='javascript:SetPage(148);'><input type="checkbox">&nbsp 표준업무 	</li></td></tr><tr>
<td id="check_29"><li onClick='javascript:SetPage(151);'><input type="checkbox">&nbsp 일과보고 </li></td> 
<td id="check_30"><li onClick='javascript:SetPage(155);'><input type="checkbox">&nbsp 성과관리	</li></td> </tr><tr>
<td id="check_31"><li onClick='javascript:SetPage(157);'><input type="checkbox">&nbsp 주요업무	</li> </td> 
<td id="check_32"><li onClick='javascript:SetPage(161);'><input type="checkbox">&nbsp 커뮤니티 </li></td></tr><tr> 
<td id="check_33"><li onClick='javascript:SetPage(165);'><input type="checkbox">&nbsp 여군관장 	</li></td>
<td id="check_34"><li onClick='javascript:SetPage(167);'><input type="checkbox">&nbsp 제언	</li></td></tr><tr>
<td id="check_35"><li onClick='javascript:SetPage(171);'><input type="checkbox">&nbsp 지상사격 	</li></td> 
<td id="check_36"><li onClick='javascript:SetPage(175);'><input type="checkbox">&nbsp PIMS	</li></td> </tr><tr> 
<td id="check_37"><li onClick='javascript:SetPage(177);'><input type="checkbox">&nbsp 보직열람	</li></td>
<td id="check_38"><li onClick='javascript:SetPage(181);'><input type="checkbox">&nbsp 진급관리	</li></td> </tr><tr> 
<td id="check_39"><li onClick='javascript:SetPage(185);'><input type="checkbox">&nbsp 리더십 	</li></td>
<td id="check_40"><li onClick='javascript:SetPage(189);'><input type="checkbox">&nbsp 정비지원	</li></td> </tr><tr> 
<td id="check_41"><li onClick='javascript:SetPage(193);'><input type="checkbox">&nbsp 군관사 숙소 	</li></td>
<td id="check_42"><li onClick='javascript:SetPage(196);'><input type="checkbox">&nbsp 휴가출장	 </li></td> </tr><tr> 
<td id="check_43"><li onClick='javascript:SetPage(199);'><input type="checkbox">&nbsp 시간외 근무 	</li></td>
<td id="check_44"><li onClick='javascript:SetPage(200);'><input type="checkbox">&nbsp 수송배차	</li></td></tr><tr> 
<td id="check_45"><li onClick='javascript:SetPage(203);'><input type="checkbox">&nbsp 공감	</li></td>
<td id="check_46"><li onClick='javascript:SetPage(207);'><input type="checkbox">&nbsp 설문조사</li></td></tr> <tr>
<td id="check_47"><li onClick='javascript:SetPage(208);'><input type="checkbox">&nbsp 통합검색</li></td>
<td id="check_48"><li onClick='javascript:SetPage(210);'><input type="checkbox">&nbsp 독서사랑</li></td></tr>
<tr> <td>링크들</td></tr><tr>
<td id="check_49"><li onClick='javascript:SetPage(213);'><input type="checkbox">&nbsp 전화번호</li></td>
<td id="check_50"><li onClick='javascript:SetPage(214);'><input type="checkbox">&nbsp 관련사이트</li></td> </tr><tr> 
<td id="check_51"><li onClick='javascript:SetPage(215);'><input type="checkbox">&nbsp 번역체계</li></td>
<td id="check_52"><li onClick='javascript:SetPage(216);'><input type="checkbox">&nbsp jfkn</li></td></tr><tr> 
<td id="check_53"><li onClick='javascript:SetPage(217);'><input type="checkbox">&nbsp 멀티미디어</li></td>
<td id="check_54"><li onClick='javascript:SetPage(218);'><input type="checkbox">&nbsp 문자메세지</li></td></tr><tr> 
<td id="check_55"><li onClick='javascript:SetPage(219);'><input type="checkbox">&nbsp 국방인사</li></td>
<td id="check_56"><li onClick='javascript:SetPage(220);'><input type="checkbox">&nbsp 온나라</li></td></tr><tr> 
<td id="check_57"><li onClick='javascript:SetPage(221);'><input type="checkbox">&nbsp 출입통제</li>
<td id="check_58"><li onClick='javascript:SetPage(222);'><input type="checkbox">&nbsp 급여포털</li></tr>
</table>
</ul>
<br>
</div>

</font>
</div>
<?	/*		
	http://www.oc.af.mil:8021/alw10/mz/mc.page?RPK=416bc6673601017045801f425db667ab


http://www3.hq.af.mil:9999/alw30/total_10_index.html
http://www3.hq.af.mil:9999/alw30/board/view/img_view.jsp?uniq_num=201309130000003
http://48.2.1.115/dimos/template/1/mod/new_mod.asp
http://48.2.1.115/dimos/template/1/viewer/new_MOD_viewer.asp?Item_ID=MI131101082341&CLIP_ID=00000000000000

http://48.2.1.202/Main/Index.Asp





<a href=# onclick=history.back()>
history.go(-2)
*/?>
<IFRAME id="checkmain" src="http://www.hq.af.mil:9999/AfPortal/new/portal_main.jsp" frameborder="1" width="45%" height="850" style='position: fixed;  left: 15%; top:7%;'></iframe>
<IFRAME id="checkmain2" src="http://www.hq.af.mil:9999/AfPortal/mainA153.jsp" frameborder="1" width="43%" height="850" style='position: fixed;  left: 55%; top:7%;'></iframe>
	
</div>


	<!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  

  </body>

</html>