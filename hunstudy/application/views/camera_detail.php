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
	function popup(){
		var new_win = window.open("http://weather.hq.af.mil:8080/wxhq08/apache/isnw/isn02main.html",'new','width=1000px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	</script>
	<script>
	function Print_popup(){
		var new_window = window.open("Camera_Print",'print','width=1000px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	</script>
	<script>
	function mail_popup(){
		var new_window = window.open("Camera_mail",'print','width=1000px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
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
			<li><a href='In'>&nbsp&nbspStart</a></li>
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
	<br>
<div class="container">
	<div class="span12">
		<div class="tooltip-demo">
			<ul class="nav nav-pills">
			<li><a href="Camera">Camera</a></li>
			<li ><a href="http://48.2.160.41/public/checklogin.htm?username=prtgadmin&password=rlcpqks%2301&guiselect=radio&loginurl=48.2.160.40/group.htm?id=0 " target="_blank">PRTG</a></li>
			<li ><a href="#" onClick='javascript:popup();'>Weather</a></li >
			<li ><a href="#" onClick='javascript:Print_popup();'>Print</a></li >
			<li ><a href="#" onClick='javascript:mail_popup();'>Email</a></li >
			<li class="active" ><a href='Camera_detail'>카메라 번호</a></li >
			</ul>
		</div>
	</div>

	
	<div class="row">
	<font size=2>

		<div class="span8">
		<div class="alert alert-success">
		<form name='myForm' method='post' action='Camera_dwrite'>
				<div class="span6">
				<div class="control-group success">
					<input class="input-small" name="name" type="text" placeholder="부대명">
					<input class="input-small" name="location" type="text" placeholder="상세위치">
					<input class="input-small" name="phone3" type="text" placeholder="정비 번호">
					<input class="input-small" name="phone1" type="text" placeholder="운영 번호">
					<input class="input-small" name="phone2" type="text" placeholder="일과후 번호">
					<input class="hidden" name="no" value=0>
				</div>
				</div>
				<div class="span1"><button type=submit class="btn btn-primary btn-success">Write</button></div>
				<br>
		</form>
		</div>
		</div>
	<? $check=1; ?>
	<div class="span6" >
	<ul class="the-icons clearfix">
	<table class="table">
			<thead>
              <tr>
                <th><h4>부대명</th>
                <th><h4>상세위치</th>
				<th><h4>정비</th>
				<th><h4>운영</th>
                <th><h4>일과후</th>

              </tr>
            </thead>
			<tbody>
			<?foreach($query1->result() as $item): ?>
			<? if($check%2==1){ echo "<tr class=warning>";}
				else {echo "<tr class=info>";}

				$check=$check+1;
			?>
                 <form name='myForm' method='post' action='Camera_dwrite'>
				 <?
				 echo "<td width=30><input class=input-small name=name type=text value=";
				 echo $item->name;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=location type=text value=";
				 echo $item->location;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=phone3 type=text value=";
				 echo $item->phone3;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=phone1 type=text value=";
				 echo $item->phone1;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=phone2 type=text value=";
				 echo $item->phone2;
				 echo "></td>";
				 ?>
				 <input class="hidden" name="no" value=<? echo $item->no; ?>>
				 <td width=40>
				 <i class="icon-wrench" ><button type="submit" class="btn btn-link"></button></i>
				 <a href='cam_dDelete?no=<?echo $item->no;?>'><i class="icon-remove"></i></a>
				 </td>
				 <!--<button type="button" class="close" data-dismiss="alert">x</button>--></form></tr>
			<? endforeach; ?>
			</tbody>
			</table>
		</ul>
		</div>

	
    <div class="span5 offset1" >
	<ul class="the-icons clearfix">
	<table class="table">
			<thead>
              <tr>
                <th><h4>부대명</th>
                <th><h4>상세위치</th>
				<th><h4>정비</th>
				<th><h4>운영</th>
                <th><h4>일과후</th>

              </tr>
            </thead>
			<tbody>
			<?foreach($query2->result() as $item): ?>
			<? if($check%2==1){ echo "<tr class=warning>";}
				else {echo "<tr class=info>";}

				$check=$check+1;
			?>
                 <form name='myForm' method='post' action='Camera_dwrite'>
				 <?
				 echo "<td width=30><input class=input-small name=name type=text value=";
				 echo $item->name;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=location type=text value=";
				 echo $item->location;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=phone3 type=text value=";
				 echo $item->phone3;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=phone1 type=text value=";
				 echo $item->phone1;
				 echo "></td>";
				 echo "<td width=30><input class=input-small name=phone2 type=text value=";
				 echo $item->phone2;
				 echo "></td>";
				 ?>
				 <input class="hidden" name="no" value=<? echo $item->no; ?>>
				 <td width=40>
				 <i class="icon-wrench" ><button type="submit" class="btn btn-link"></button></i>
				 <a href='cam_dDelete?no=<?echo $item->no;?>'><i class="icon-remove"></i></a>
				 </td>
				 <!--<button type="button" class="close" data-dismiss="alert">x</button>--></form></tr>
			<? endforeach; ?>
			</tbody>
			</table>
		</ul>
		</div>

	</font>
	</div>
	
</div>

	<!-- /container -->

   

  </body>

</html>
