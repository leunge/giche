<!DOCTYPE html>
<html lang="ko" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	<meta name="Generator" content="XpressEngine" />
<!-- TITLE -->
	<title>LINK</title>
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
			 <li class=active><a href='links'>Link</a></li>

              
            </ul>
          </div><!--/.nav-collapse -->
        </div>

      </div>
    </div>

	</div>
	<br>
<div class="container">
<h1>
<a href="http://www3.hq.af.mil:9999/alhz0/main/bso_pass.jsp?userid=1&password=1" target="_blank"><div class="alert"> ACC </div></a>
<a href="http://48.2.160.99:7885/" target="_blank"><div class="alert alert-error"> OPboard </div></a></h>
<a href="http://48.2.147.139:8080/JungJeonPlace/main.do" target="_blank"><div class="alert alert-success">중전마루</div>
<a href='viewNAC' target="_blank"><div class="alert alert-info">NAC</div>
<a href="http://48.2.1.15/iseefamily" target="_blank"><div class="alert ">GESM</div></a>


<br>
<!--<a href="http://48.2.1.182:7900/login.do?action=login&id=admin&x=36&y=41&password=rlcpqks%2301/" target="_blank">jennifer7900<br>
<a href="http://48.2.1.182:7901/login.do?action=login&id=admin&x=36&y=41&password=rlcpqks%2301/" target="_blank">jennifer7901<br>
<a href="http://48.2.1.240/html/guest/login.html" target="_blank">watchall<br>-->
</div>

	<!-- /container -->

   

  </body>

</html>
