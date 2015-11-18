<html><head>
<title>GicheWork</title>

<script type='text/javascript' src='/js/jquery.js'></script>
		<script type='text/javascript' src='/js/jquery-ui.min.js'></script>
		<link rel='stylesheet' rev='stylesheet' href='/hunstudy/application/models/postic.css'>
<SCRIPT>///////////////// ¥‹√‡≈∞. ////////////////////
		$(document).keyup(function(event){
			if(event.keyCode==18){
				$(document).keyup(function(event){

					if(event.keyCode==49){
						mainFrame.window.open("http://48.2.147.139:8080/JungJeonPlace/main.do");
					}
					else if(event.keyCode==50){
						mainFrame.window.open("http://48.2.160.99:7885/");
					}
					else if(event.keyCode==51){
						mainFrame.location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/In";
					}
					else if(event.keyCode==52){
						mainFrame.location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/ACC";
					}
					else if(event.keyCode==53){
						mainFrame.location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/lists";
					}
					else if(event.keyCode==54){
						mainFrame.location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/Camera";
					}
					else if(event.keyCode==55){
						mainFrame.location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/Phone";
					}
					else if(event.keyCode==56){
						mainFrame.location.href="http://48.2.160.99:7885/hunstudy/index.php/inform/links";
					}	
					return;
				});
				return;
			}
			
		}); </SCRIPT>
<script type="text/javascript">
        function doStart() {
			var t_hour = document.getElementById("t_hour").value;
			var t_min = document.getElementById("t_min").value;
			var t_sec = document.getElementById("t_sec").value;
			
			var time_span = document.getElementById("time");
			var time_val = time_span.innerHTML;
			
			time_span.innerHTML = t_hour*3600 + t_min*60 + t_sec*1;

			var time_span2 = document.getElementById("lasttime");
			var time_val2 = time_span2.innerHTML;

			time_span2.innerHTML = createString(t_hour,t_min, t_sec);

            refreshTime();
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
                timeout();
            }

        }
        
		function timeout(){
			$('div#overlay').show();
			alert("Time's up! ");
		}

		function createString(hour, minute, sec) {
			var queryString = "";
			if( hour != 0){
				var queryString = hour + "hour " + queryString ;
			}
			if( minute != 0 ){
				var queryString =  queryString + minute + "minutes ";
			}
			if( sec != 0 ){
				var queryString = queryString + sec + "second" ;
			}
		return queryString;
}


    </script>
</head>
<body onLoad=setTimeout('auto_flash()',1000z);><input type='button' value='Add' id='btn-addNote' />
    
	<div id='overlaya'>

			<div id='alarm-dialog'>

				<h2>Set alarm after</h2>

				<label class='hours'>
					Hours
					<input id='t_hour' type='number' value='0' min='0' />
				</label>

				<label class='minutes'>
					Minutes
					<input id='t_min' type='number' value='0' min='0' />
				</label>

				<label class='seconds'>
					Seconds
					<input id='t_sec' type='number' value='0' min='0' />
				</label>

				    <br>

    Alarm will shows after <span id="time">0</span> seconds.


				<div class='button-holder'>
					<a id='alarm-set' class='button blue' onclick="doStart();">Set</a>
					<a id='alarm-clear' class='button red'>Close</a>
				</div>

				<a class='close'></a>

			</div>

		</div>


<div id='overlay'>
			<div id='time-is-up'>
				<br><br><br><br><font size="9"><b>Time's up!</b><br></font><font size="3">
			    Next alarm time is <span id="lasttime">0</span> after!	</font><br><br>
				<div id='button-holder'>
					<a id='onemore' class='button blue' onclick="doStart();">Again</a>
					<a id='closewin' class='button red'>Close</a>
				</div>
			</div>
		</div>


		<input type='button' value='Del All' id='btn-delAllNote' /><input type='button' value='timer' id='btn-timer' />
			<iFRAME id ="mainFrame" src='/hunstudy/index.php/inform/lists' frameborder='0' width='100%' height='100%' >
		</iFRAME>
		
			<div id='board'>

			</div>
		
		<script type='text/javascript' src='/hunstudy/application/models/posticscripts.js'></script>
		
		</body></html>
