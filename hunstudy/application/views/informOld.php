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
	<script>
	function searchgiche(){
		var new_win = window.open("http://www.hq.af.mil:9999/AfPortal/10/board2/test.jsp",'search','width=770px,height=650px,toolbar=no,status=no,menubar=no,scrollbars=no,resizable=no,location=no');
	}
	</script>
<SCRIPT>///////////////// ¥‹√‡≈∞. ////////////////////
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

  
	<font size=2>
	<div class="container-fluid">

		<? if($modify==1){echo "<form name='myForm' method='post' action='Inform_Modifyok?no=";
						  echo $_GET['no'];
						  echo "'>";}
			else { echo "<form name='myForm' method='post' action='Inform_Insert'>";}
			?>
		
			<div class="navbar-inner">  
				<br><textarea name=memo rows="5" class="input-block-level"><? if($modify==1){echo $memo;} ?></textarea>
				<div class=span3><input type=radio name=type value=2 checked> OLD <input type=radio name=type value=3 > Important</div>
	
				<div class="span4 offset6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a class="btn" href="#">Plus</a> <input type=submit value="Write" class="btn"></div>
				<br><br>
			</div>
			<? if($modify==1){ echo "<input type=hidden name=wtime value=";
							   echo $writetime;
							   echo ">";
				}
				else {echo "";}
			?>
		</form>
      <!-- Example row of columns -->

		<div class="span3"><h4>Description</div>
		<div class="span offset3"><h4>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Time</div>
		<br><br>
		<div>
		<ul class="the-icons clearfix">
			<?foreach($query->result() as $item): ?>
			<?$date=date("m/d",$item->writetime);
				$lastdate=date("m/d",$item->lasttime);?>
				<?$number=$item->no?>
                 <pre><table><tr>
					<td width=690 valign="top"><?=$item->memo?></td>
					<td width="20"></td>	
					<td width=60 valign="top"><?
						echo "<center><a href=#><i class=icon-backward></i></a><a href=Tchange_I?no=";
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
					?></td></tr></table></pre> 
			<? endforeach; ?>
		</ul>
	</div>
	





</font>

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
