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
			
			echo $detail2;
			echo "&nbsp";
			

		}
?>


<html>

<head></head>
<body>

[제목] <br><br>

<font size=2>재해재난 통제카메라 운영상태 보고(<? echo date("m.d");?> 06시)</font><br><br>

[내용]<br><br>

<textarea name=OJT rows="20" cols="100">필승!

재해재난 통제카메라 운영상태 보고드립니다.

<? $number=88-$total_num;
	$count=0;	
	if($total_num==0){ echo "총 88대 중 88대 정상 운영중입니다.";}
	else{
echo "총 88대 중";
echo $number; 
echo "대 정상 운영중이며, ";
echo $total_num; 
echo "대 감시 불가한 상태입니다. ";
echo "\n";
echo "* 미운영 : ";
echo $total_num; ?>대 (<?
foreach($query_err->result() as $item): 
			if($count==0){ echo " ";}
			else{ echo ", ";}
			$location = preg_replace("/비2/", "비", $item->location);
			$location = preg_replace("/황병2/", "황병", $location);
			$location = preg_replace("/화악2/", "화악", $location);
			$location = preg_replace("/안성2/", "안성", $location);
			$location = preg_replace("/대천2/", "대천", $location);
			echo $location;
			Camera_detail($item->location);
			$count++;

 endforeach; 
 echo ")";

	}?>
 

필승!



---------------------------------------------------------------
재난재해 통제체계 문서 파일 붙여넣기
<?
foreach($query_err->result() as $item): 
			echo "* ";
			$location = preg_replace("/비2/", "비", $item->location);
			$location = preg_replace("/황병2/", "황병", $location);
			$location = preg_replace("/화악2/", "화악", $location);
			$location = preg_replace("/안성2/", "안성", $location);
			$location = preg_replace("/대천2/", "대천", $location);
			echo $location;
			Camera_detail($item->location);
			echo " : ";
			echo $item->memo;
			echo "\n";

 endforeach; 

 ?></textarea>






 </body>
 </html>