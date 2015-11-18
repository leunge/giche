<?
	function Camera_detail($location){
			$sql = "select * from camera_detail where name='$location'";
			$result = mysql_query($sql) or die (mysql_error());
			$detail=mysql_result($result,0,2);
			$detail1=mysql_result($result,0,3);
			$detail2=mysql_result($result,0,4);
			$detail3=mysql_result($result,0,5);
			echo "(";
			echo $detail;
			echo ")";

		}

		function Camera_detail2($location){
			$sql = "select * from camera_detail where name='$location'";
			$result = mysql_query($sql) or die (mysql_error());
			$detail=mysql_result($result,0,2);
			$detail1=mysql_result($result,0,3);
			$detail2=mysql_result($result,0,4);
			$detail3=mysql_result($result,0,5);
			if($detail1==NULL){
				if($detail2==NULL){	echo $detail3;}
				else{ echo $detail2;}
		}
			else {echo $detail1;}
			

		}
?>


<html>

<head></head>
<body>

재난재해 IP카메라 현황<br><br>

<!--<table>
<tr><td>08:00</td><td><? echo 83-($num0+$num8); ?>/83</td></tr>
<tr><td>14:00</td><td><? echo 83-($num0+$num8+$num11); ?>/83</td></tr>
<tr><td>17:00</td><td><? echo 83-($num0+$num8+$num11+$num14); ?>/83</td></tr>
<tr><td>20:00</td><td><? echo 83-($num0+$num8+$num11+$num14+$num17); ?>/83</td></tr>
<tr><td>23:00</td><td><? echo 83-($num0+$num8+$num11+$num14+$num17+$num20); ?>/83</td></tr>
<tr><td>02:00</td><td><? echo 83-($num0+$num8+$num11+$num14+$num17+$num20+$num23); ?>/83</td></tr>
<tr><td>05:00</td><td><? echo 83-($num0+$num8+$num11+$num14+$num17+$num20+$num23+$num2); ?>/83</td></tr>
<? $number=83-$num0-$num8-$num11-$num14-$num17-$num20-$num23-$num2-$num5; ?>
</table>-->
<table>
<?
		$today=time();
		$Hour=date("H",$today);
		if($Hour >= 11 && $Hour < 14){
					echo "<tr><td>08:00</td><td>";
					echo 88-($num0);
					echo "/88</td></tr>";
					echo "<tr><td>11:00</td><td>";
					echo 88-($num8);
					echo "/88</td></tr>";
		}
		else if($Hour >= 14 && $Hour < 17){
					echo "<tr><td>08:00</td><td>";
					echo 88-($num0);
					echo "/88</td></tr>";
					echo "<tr><td>11:00</td><td>";
					echo 88-($num8);
					echo "/88</td></tr>";
					echo "<tr><td>14:00</td><td>";
					echo 88-($num11);
					echo "/88</td></tr>";
		}
		else if($Hour >= 17 && $Hour < 20){
					echo "<tr><td>08:00</td><td>";
					echo 88-($num0);
					echo "/88</td></tr>";
					echo "<tr><td>11:00</td><td>";
					echo 88-($num8);
					echo "/88</td></tr>";
					echo "<tr><td>14:00</td><td>";
					echo 88-($num11);
					echo "/88</td></tr>";
					echo "<tr><td>17:00</td><td>";
					echo 88-($num14);
					echo "/88</td></tr>";
		}
		else if($Hour >= 20 && $Hour <= 23){
					echo "<tr><td>08:00</td><td>";
					echo 88-($num0);
					echo "/88</td></tr>";
					echo "<tr><td>11:00</td><td>";
					echo 88-($num8);
					echo "/88</td></tr>";
					echo "<tr><td>14:00</td><td>";
					echo 88-($num11);
					echo "/88</td></tr>";
					echo "<tr><td>17:00</td><td>";
					echo 88-($num14);
					echo "/88</td></tr>";
					echo "<tr><td>20:00</td><td>";
					echo 88-($num17);
					echo "/88</td></tr>";
		}
		else if($Hour >= 0 && $Hour < 2){
					echo "<tr><td>08:00</td><td>";
					echo 88-($num0);
					echo "/88</td></tr>";
					echo "<tr><td>11:00</td><td>";
					echo 88-($num8);
					echo "/88</td></tr>";
					echo "<tr><td>14:00</td><td>";
					echo 88-($num11);
					echo "/88</td></tr>";
					echo "<tr><td>17:00</td><td>";
					echo 88-($num14);
					echo "/88</td></tr>";
					echo "<tr><td>20:00</td><td>";
					echo 88-($num17);
					echo "/88</td></tr>";
					echo "<tr><td>23:00</td><td>";
					echo 88-($num20);
					echo "/88</td></tr>";
		}
		else if($Hour >= 2 && $Hour < 5){
					echo "<tr><td>08:00</td><td>";
					echo 88-($num0);
					echo "/88</td></tr>";
					echo "<tr><td>11:00</td><td>";
					echo 88-($num8);
					echo "/88</td></tr>";
					echo "<tr><td>14:00</td><td>";
					echo 88-($num11);
					echo "/88</td></tr>";
					echo "<tr><td>17:00</td><td>";
					echo 88-($num14);
					echo "/88</td></tr>";
					echo "<tr><td>20:00</td><td>";
					echo 88-($num17);
					echo "/88</td></tr>";
					echo "<tr><td>23:00</td><td>";
					echo 88-($num20);
					echo "/88</td></tr>";
					echo "<tr><td>02:00</td><td>";
					echo 88-($num23);
					echo "/88</td></tr>";
		}
		else if($Hour >= 5 && $Hour < 11){
					echo "<tr><td>08:00</td><td>";
					echo 88-($num0);
					echo "/88</td></tr>";
					echo "<tr><td>11:00</td><td>";
					echo 88-($num8);
					echo "/88</td></tr>";
					echo "<tr><td>14:00</td><td>";
					echo 88-($num11);
					echo "/88</td></tr>";
					echo "<tr><td>17:00</td><td>";
					echo 88-($num14);
					echo "/88</td></tr>";
					echo "<tr><td>20:00</td><td>";
					echo 88-($num17);
					echo "/88</td></tr>";
					echo "<tr><td>23:00</td><td>";
					echo 88-($num20);
					echo "/88</td></tr>";
					echo "<tr><td>02:00</td><td>";
					echo 88-($num23);
					echo "/88</td></tr>";
					echo "<tr><td>05:00</td><td>";
					echo 88-($num2);
					echo "/88</td></tr>";
		}



/*
<tr><td>08:00</td><td><? echo 86-($num0); ?>/86</td></tr>
<tr><td>11:00</td><td><? echo 86-($num8); ?>/86</td></tr>
<tr><td>14:00</td><td><? echo 86-($num11); ?>/86</td></tr>
<tr><td>17:00</td><td><? echo 86-($num14); ?>/86</td></tr>
<tr><td>20:00</td><td><? echo 86-($num17); ?>/86</td></tr>
<tr><td>23:00</td><td><? echo 86-($num20); ?>/86</td></tr>
<tr><td>02:00</td><td><? echo 86-($num23); ?>/86</td></tr>
<tr><td>05:00</td><td><? echo 86-($num2); ?>/86</td></tr>
*/
?>
</table>
<?/* echo $num0;echo "<br>";
	echo $num8;echo "<br>";
	echo $num11;echo "<br>";
	echo $num14;echo "<br>";
	echo $num17;echo "<br>";
	echo $num20;echo "<br>";
	echo $num23;echo "<br>";
	echo $num2;echo "<br>";
	echo $num5;echo "<br>";
	*/?>
<? $number=88-$total_num; ?>
<br>
총 대수 : 88대
정상운영 : <? echo $number; ?>대<br><br><br>

※ 미운영(<? echo $total_num; ?>대) <br><br>

<table>

<?foreach($query_err->result() as $item): 
			echo "<tr><td><font size=2>";
			echo $item->location;
			Camera_detail($item->location);
			echo "</td><td><font size=2>";
		  echo $item->memo;
		  echo "</td><td><font size=2>&nbsp";
		  echo $item->person;
		  echo "</td><td><font size=2>";
		  if($item->phone==NULL){Camera_detail2($item->location);}
		  else{echo $item->phone;}
		  echo "</td></font></tr>";
 endforeach; ?>
 </table>


 </body>
 </html>