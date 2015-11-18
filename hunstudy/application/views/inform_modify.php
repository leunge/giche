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

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </li>
        
          
			<?
				if($inform_type==1) {echo "<li class=active><a href='list_New'>New</a></li>
              <li><a href='list_Old'>Old</a></li>
              <li><a href='list_Important'>Important</a></li>";}
				else if($inform_type==2) {echo "<li><a href='list_New'>&nbsp&nbspNew</a></li>
              <li class=active><a href='list_Old'>Old</a></li>
              <li><a href='list_Important'>Important</a></li>";}
			  else if($inform_type==3) {echo"<li><a href='list_New'>New</a></li>
              <li ><a href='list_Old'>Old</a></li>
              <li class=active><a href='list_Important'>Important</a></li>";}
			?>
              
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container-fluid">

	<font size=2>
	<div class="row">
	<div class="span8 offset2">
	
	<form name='myForm' method='post' action='Inform_Modifyok?no=<?echo $_GET['no'];?>'>
	<div class="navbar-inner">  
	<br><textarea name=memo rows="5" class="input-block-level"><?=$memo?></textarea>
 <?if($type==1) {echo "<div class=span2><input type=radio name=type value=1 checked> NEW <input type=radio name=type value=2> OLD <input type=radio name=type value=3 > Important</div>";}
	else if($type==2) {echo"<div class=span2><input type=radio name=type value=1 > NEW <input type=radio name=type value=2 checked> OLD <input type=radio name=type value=3 > Important</div>";}
	else if($type==3) {echo"<div class=span2><input type=radio name=type value=1 > NEW <input type=radio name=type value=2> OLD <input type=radio name=type value=3 checked> Important</div>";}?>
<div class="span2 offset3">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn" href="#">Plus</a> <input type=submit value="Write" class="btn"></div><br><br></div><input type=hidden name=wtime value="<? echo $writetime;?>"></form>

      <!-- Example row of columns -->
<ul class="the-icons clearfix">
<table width="600" class="table ">
            <colgroup>
              <col class="span1">
              <col class="span3">
            </colgroup>
            <thead>
              <tr>
                <th>Description</th>
                <th>&nbsp Time</th>
              </tr>
            </thead>
            <tbody>
		<?foreach($query->result() as $item): ?>
		<?$date=date("m/d",$item->writetime);?>
		<?$number=$item->no?>
			<tr>
				<td width=500>
                 <pre bgcolor=white><?=$item->memo?></pre>
                </td>
                <td width=30>
				<?
				if($inform_type==1) {
				echo "<center><i class=icon-backward></i><a href=Tchange_I?no=";
				echo $number;
				echo "&type=1><i class=icon-plus-sign></i></a><a href=Tchange_O?no=";
				echo $number;
				echo "&type=1><i class=icon-forward></i></a><center><span class=label label-info>";
				echo $date;
				echo "</span><br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=1><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=1><i class=icon-remove></i></a>";}

				if($inform_type==2) {
				echo "<center><a href=Tchange_N?no=";
				echo $number;
				echo "&type=2><i class=icon-backward></i></a><a href=Tchange_I?no=";
				echo $number;
				echo "&type=2><i class=icon-plus-sign></i></a><i class=icon-forward></i><center><span class=label label-info>";
				echo $date;
				echo "</span><br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=2><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=2><i class=icon-remove></i></a>";}

				if($inform_type==3) {
				echo "<center><a href=Tchange_N?no=";
				echo $number;
				echo "&type=3><i class=icon-backward></i></a><i class=icon-plus-sign></i><a href=Tchange_O?no=";
				echo $number;
				echo "&type=3><i class=icon-forward></i></a><center><span class=label label-info>";
				echo $date;
				echo "</span><br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=3><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=3><i class=icon-remove></i></a>";}
				?>
				</td>

            </tr>
		<? endforeach; ?>
          </tbody>
          </table>
		  </ul>
	</div>

		<div class="span8">
      <!-- Example row of columns -->
<ul class="the-icons clearfix">
<table width="600" class="table ">
            <colgroup>
              <col class="span1">
              <col class="span3">
            </colgroup>
    	<?foreach($array->result() as $item): ?>
	<?$date=date("m/d",$item->writetime);?>
		<?$number=$item->no?>
			<tr>
				<td width=500>
                 <pre bgcolor=white><?=$item->memo?></pre>
                </td>
                <td width=30>
				<?
				if($inform_type==1) {
				echo "<center><a href=Tchange_N?no=";
				echo $number;
				echo "&type=1><i class=icon-backward></i></a><a href=Tchange_I?no=";
				echo $number;
				echo "&type=1><i class=icon-plus-sign></i></a><a href=Tchange_O?no=";
				echo $number;
				echo "&type=1><i class=icon-forward></i></a><center><span class=label label-info>";
				echo $date;
				echo "</span><br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=1><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=1><i class=icon-remove></i></a>";}

				if($inform_type==2) {
				echo "<center><a href=Tchange_N?no=";
				echo $number;
				echo "&type=2><i class=icon-backward></i></a><a href=Tchange_I?no=";
				echo $number;
				echo "&type=2><i class=icon-plus-sign></i></a><a href=Tchange_O?no=";
				echo $number;
				echo "&type=2><i class=icon-forward></i></a><center><span class=label label-info>";
				echo $date;
				echo "</span><br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=2><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=2><i class=icon-remove></i></a>";}

				if($inform_type==3) {
				echo "<center><a href=Tchange_N?no=";
				echo $number;
				echo "&type=3><i class=icon-backward></i></a><a href=Tchange_I?no=";
				echo $number;
				echo "&type=3><i class=icon-plus-sign></i></a><a href=Tchange_O?no=";
				echo $number;
				echo "&type=3><i class=icon-forward></i></a><center><span class=label label-info>";
				echo $date;
				echo "</span><br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=3><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=3><i class=icon-remove></i></a>";}
				?>
				</td>

            </tr>
		<? endforeach; ?>
          
          </table>
		  </ul>
	</div>


</font>
    </div>
	<!-- /container -->

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

  </body>
</html>
