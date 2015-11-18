<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>LG&Sort</title>
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

	<style type="text/css">
		.column { width: 170px; float: left; padding-bottom: 100px; }
		.portlet { margin: 0 1em 1em 0; }
		.portlet-header { margin: 0.3em; padding-bottom: 4px; padding-left: 0.2em; }
		.portlet-header .ui-icon { float: right; }
		.portlet-content { padding: 0.4em; }
		.ui-sortable-placeholder { border: 1px dotted black; visibility: visible !important; height: 50px !important; }
		.ui-sortable-placeholder * { visibility: hidden; }
		#debug {width:300px; height:300px; border:solid 1px; position:absolute; top:600px;}
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
	<script type="text/javascript" src="/js/test/jquery.js"></script>
	<script type="text/javascript" src="/js/test/ui.core.js"></script>
	<script type="text/javascript" src="/js/test/ui.sortable.js"></script>
	<script type="text/javascript" src="/js/test/ui.rearrange.js"></script>
	<script type="text/javascript" src="/js/test/jquery.cookie.js"></script>
	<script type="text/javascript">
	$(function() {
		Rearrange(); //쿠키값 추출후 화면 재배열

		$(".column").sortable({
			connectWith: '.column'
		});

		$(".portlet").addClass("ui-widget ui-widget-content ui-helper-clearfix ui-corner-all")
			.find(".portlet-header")
				.addClass("ui-widget-header ui-corner-all")
				.prepend('<span class="ui-icon ui-icon-plusthick"></span>')
				.end()
			.find(".portlet-content");

		$(".portlet-header .ui-icon").click(function() {
			$(this).toggleClass("ui-icon-minusthick");
			$(this).parents(".portlet:first").find(".portlet-content").toggle();
		});

		$(".column").disableSelection();

	});
</script>
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
          <a class="brand" href="#">Project name</a>
          <div class="nav-collapse collapse">
            <ul class="nav">

              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Information <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href='list_New'>New</a></li>
                  <li><a href='list_Old'>Old</a></li>
                  <li><a href='list_Important'>Important</a></li>
                  <li class="divider"></li>
                  <li><a href="a">search</a></li>
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
<font size=2>
<div class="row">
	<div class="span8 offset2">
		<form name='myForm' method='post' action='Inform_Insert'>
		<div class="navbar-inner">  
			<br><textarea name=memo rows="5" class="input-block-level"></textarea>
			<?if($type==1) {echo "<div class=span2><input type=radio name=type value=1 checked> NEW <input type=radio name=type value=2> OLD <input type=radio name=type value=3 > Important</div>";}
			else if($type==2) {echo"<div class=span2><input type=radio name=type value=1 > NEW <input type=radio name=type value=2 checked> OLD <input type=radio name=type value=3 > Important</div>";}
			else if($type==3) {echo"<div class=span2><input type=radio name=type value=1 > NEW <input type=radio name=type value=2> OLD <input type=radio name=type value=3 checked> Important</div>";}?>
			<div class="span2 offset3">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn" href="#">Plus</a> <input type=submit value="Write" class="btn"></div><br><br>
		</div></form>
		

			<!-- Example row of columns -->
		<div class="span3"><h4>Description</div><div class="span offset3"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Time</div><br>
				<br>
		<div id="column1" class="column span8">		
				
				<?foreach($query->result() as $item): ?>
				<?	$date=date("m/d",$item->writetime);
					$lastdate=date("m/d",$item->lasttime);?>
				<?$number=$item->no?>
			         <div  id=N<?=$item->no?> class="portlet">
					 <pre><table ><td width=690 valign="top"><?=$item->memo?></td><td width="20"></td>	
					 <td width=60 valign="top"><ul class="the-icons clearfix"><?
					if($inform_type==1) {
					echo "<center><i class=icon-backward></i><a href=Tchange_I?no=";
					echo $number;
					echo "&type=1><i class=icon-plus-sign></i></a><a href=Tchange_O?no=";
					echo $number;
					echo "&type=1><i class=icon-forward></i></a><center>";
					?><span class="label label-info"><?echo $date;?></span><?
					echo "<br><a href=Inform_Modify?no=";
					echo $number;
					echo "&type=1><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
					echo $number;
					echo "&type=1><i class=icon-remove></i></a>";
					?><span class="label label-success"><?
					echo $lastdate;
					echo "</span>";
					}
	
					if($inform_type==2) {
					echo "<center><a href=Tchange_N?no=";
					echo $number;
					echo "&type=2><i class=icon-backward></i></a><a href=Tchange_I?no=";
					echo $number;
					echo "&type=2><i class=icon-plus-sign></i></a><i class=icon-forward></i><center>";
					?><span class="label label-info"><?echo $date;?></span><?
					echo "<br><a href=Inform_Modify?no=";
					echo $number;
					echo "&type=2><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
					echo $number;
					echo "&type=2><i class=icon-remove></i></a>";
					?><span class="label label-success"><?
					echo $lastdate;
					echo "</span>";
					}
	
					if($inform_type==3) {
					echo "<center><a href=Tchange_N?no=";
					echo $number;
					echo "&type=3><i class=icon-backward></i></a><i class=icon-plus-sign></i><a href=Tchange_O?no=";
					echo $number;
					echo "&type=3><i class=icon-forward></i></a><center>";
					?><span class="label label-info"><?echo $date;?></span><?
					echo "<br><a href=Inform_Modify?no=";
					echo $number;
					echo "&type=3><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
					echo $number;
					echo "&type=3><i class=icon-remove></i></a>";
					?><span class="label label-success"><?
					echo $lastdate;
					echo "</span>";
					}
					?></ul></td></table></pre>
			</div>  
			<? endforeach; ?>
			
		</div>
	</div>	
	<div class="span8">
	<div id="column1" class="column span8">
      <!-- Example row of columns -->
		
    	<?foreach($array->result() as $item): ?>
		<?$date=date("m/d",$item->writetime);
		  $lastdate=date("m/d",$item->lasttime);?>
		<?$number=$item->no?>
                 <pre><table><td width=690 valign="top"><?=$item->memo?></td><td width="20"></td>	
				 <td width=60 valign="top"><ul class="the-icons clearfix"><?
				if($inform_type==1) {
				echo "<center><i class=icon-backward></i><a href=Tchange_I?no=";
				echo $number;
				echo "&type=1><i class=icon-plus-sign></i></a><a href=Tchange_O?no=";
				echo $number;
				echo "&type=1><i class=icon-forward></i></a><center>";
				?><span class="label label-info"><?echo $date;?></span><?
				echo "<br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=1><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=1><i class=icon-remove></i></a>";
				?><span class="label label-success"><?
				echo $lastdate;
				echo "</span>";
				}

				if($inform_type==2) {
				echo "<center><a href=Tchange_N?no=";
				echo $number;
				echo "&type=2><i class=icon-backward></i></a><a href=Tchange_I?no=";
				echo $number;
				echo "&type=2><i class=icon-plus-sign></i></a><i class=icon-forward></i><center>";
				?><span class="label label-info"><?echo $date;?></span><?
				echo "<br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=2><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=2><i class=icon-remove></i></a>";
				?><span class="label label-success"><?
				echo $lastdate;
				echo "</span>";
				}

				if($inform_type==3) {
				echo "<center><a href=Tchange_N?no=";
				echo $number;
				echo "&type=3><i class=icon-backward></i></a><i class=icon-plus-sign></i><a href=Tchange_O?no=";
				echo $number;
				echo "&type=3><i class=icon-forward></i></a><center>";
				?><span class="label label-info"><?echo $date;?></span><?
				echo "<br><a href=Inform_Modify?no=";
				echo $number;
				echo "&type=3><i class=icon-wrench></i></a><a href=Inform_Delete?no=";
				echo $number;
				echo "&type=3><i class=icon-remove></i></a>";
				?><span class="label label-success"><?
				echo $lastdate;
				echo "</span>";
				}
				?></ul></td></table></pre>      
		<? endforeach; ?>      

		  
	</div>
	</div>
<div>

</div>
</font>

</body>

</html>