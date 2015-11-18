<?
	$CamList = array("공본", "작사","공사","교육사","1비","3비","5비","8비","10비","11비", "15비", "16비", "17비", "18비", "19비", "20비", "복지단", "7전대", "38전대", "28전대",
						"정보교육대대", "팔공", "망일", "의상", "제주", "백령", "일월", "용문", "수리", "황병","화악", "팽성", "성거", "금오", "울릉", "거진", "대성", "파평", "별립", "해운대",
						"성주", "김해", "울산", "비인", "군산","무등산", "나주", "포항", "안중", "당진", "안성", "대천", "강릉", "화악", "춘천", "진천", "수성", "황병", "남양", "김포", 
						"영종(H)", "덕정(H)", "법원", "벽제", "운천", "영종(N)", "여주", "우면", "군자", "검단");
	$CamLocation = array("운항통제소, 본청 통신탑","작사 청사","성무 타워","장교교육대대(수문)","타워, 경비2소대, 2-11초소, 캠핑장","타워, 와룡초소","타워, 단본부","3-10초소, 4-9초소(섬강교)","ALT앞 수문, 타워","타워, 110정비중대"
						,"타워, 경비3소대","관사 16동, 활주로 종단 배수로","구타워, 7시험소","섬석천 상류, 하시동천 하류","타워, E-주기장","후문, POL","단본부 별관 옥상","통건대대 철탑","영외탄약고, ALT 비상활주로
","체육관"
						,"대대본부","타워 난간","작전지역 정상","타워 난간","안테나 철탑","타워 난간","초소 옥상","통신주 상단","장비실 옥상","M/W 철탑","타워 난간"
						,"레이더 전개지","장비실 옥상","타워 난간","작전지역 초소 옥상","옹벽 상단","장비실 옥상","대대본부 지붕","장비실 옥상","CWAR 쉘터 앞","신축생활관 지붕","본관 옥상"
						,"사격장 법면 앞","'A' 저장고","통합사무실 지붕","작전대기실 옆","'A'조종함 지붕","BCC 옆","B저장고 앞","포대본부 앞 전신주","시설반 상단, LCHR#6 하단 전신","레이더파크 난간, 탄약고 뒷편"
						,"사통대기실 상단","정비실","구 생활관 법면","정문초소 상단","발전실 옥상","포대 통제소 전면","생활관 옆 보호펜스","LCHR #6 하단 전신주","수송부 경계등 지주","발전실 지붕","식당 뒤편"
						,"LCHR #2 하단","레이다 파크","8번 경계등 상단","사통지역 MTR 측면","구발칸 5포지역","통합사무실 옥상","5번발사대 뒷편");


	for($i=0 ; $i<70 ; $i++){
		$Cam7status[$i] = "O";
		$Cam18status[$i] = "O";
	}

	foreach($time_7->result() as $item):
			for($i=0 ; $i<70 ; $i++){
				if( $item->location == $CamList[$i]){
					$Cam7status[$i] = "X";
				}
			}
	 endforeach; 

	 	foreach($time_18->result() as $item):
			for($i=0 ; $i<70 ; $i++){
				if( $item->location == $CamList[$i]){
					$Cam18status[$i] = "X";
				}
			}
	 endforeach; 
?>
 
<html>

<head>
	<style type="text/css">
			th {background-color: #BDBDBD;  font-size:12px; text-align:center; line-height:120%;}
			tr,td { font-size:9px; text-align:center; line-height:120%;}
	</style>
</head>
<body>
<center><font size=5><b>
<br><br>IT기반 재해‧재난 네트워크 카메라 설치현황(총 88대)</center></font>
<font size="2">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp일 자  :  <? 
			$today=time();
			if(date("H",$today) <= 8) //8시 전까진 어제꺼 인쇄.
			{
				$today=mktime(7,00,00,date("m",$today),date("d",$today)-1,date("y",$today));
				echo date("Y.  m.  d", $today);
			}
			else
			{
				echo date("Y.  m.  d", $today);
			}
 ?></font>
<table align="center" cellspacing="0" cellpadding="0" border=1>

<thead>
	<tr><th rowspan="2" colspan='2' width="100">구분</th><th rowspan="2" width="70">부대</th><th colspan="2" width="260">설치현황</th><th  colspan="2" width="60">상태</th><th rowspan="2" width="150">비고</th></tr>
	<tr><th width="50">수량</th><th width="210">설치위치</th><th width="40">7시</th><th width="40">18시</th></tr></thead>
<tbody>
<? 
	for($i=0 ; $i < 70 ; $i++){
			echo "<tr>";
		switch($i){
			case 0:	
					echo "<td colspan='2' bgcolor=white>공본(2)</td>";
					break;
			case 1:
					echo "<td rowspan='3' colspan='2' bgcolor=white>사령부<br>(3)</td>";
					break;
			case 4:
					echo "<td rowspan='12' colspan='2' bgcolor=white>비행단<br>(26)</td>";
					break;
			case 16:
					echo "<td rowspan='5' colspan='2' bgcolor=white>독립 <br>전대급<br>(6)</td>";
					break;
			case 21:
					echo "<td rowspan='18' colspan='2' bgcolor=white>방공관제<br>대대<br>(18)</td>";
					break;
			case 39:
					echo "<td rowspan='31' bgcolor=white>방공<br>포대<br>(32)</td>";
					echo "<td rowspan='9' bgcolor=white>1여단<br>(9)</td>";
					break;
			case 48:
					echo "<td rowspan='10' bgcolor=white>2여단<br>(12)</td>";
					break;
			case 58:
					echo "<td rowspan='12' bgcolor=white>3여단<br>(12)</td>";
					break;
			
			default :
				break;
		}
		echo "<td>";
		echo $CamList[$i];
		echo "</td><td>";
		switch($i){
			case 0:	
				echo "2";	break;
			case 4	:
				echo "4";	break;
			case 5	:
				echo "2";	break;
			case 6	:
				echo "2";	break;
			case 7	:
				echo "2";	break;
			case 8	:
				echo "2";	break;
			case 9	:
				echo "2";	break;
			case 10	:
				echo "2";	break;
			case 11	:
				echo "2";	break;
			case 12	:
				echo "2";	break;
			case 13	:
				echo "2";	break;
			case 14	:
				echo "2";	break;
			case 15	:
				echo "2";	break;
			case 18	:
				echo "2";	break;
			case 50:
				echo "2";	break;
			case 51:
				echo "2";	break;
			default :
				echo "1";	break;
				break;
		}

		echo "</td><td>";
		echo $CamLocation[$i]; 

		echo "</td><td>";
		echo $Cam7status[$i]; 
		echo "</td><td>";
		echo $Cam18status[$i]; 
		echo "</td><td> &nbsp</td></tr>";
	}
?>

</tbody>
</font>
</table>



</body>
</html>

