<link rel="stylesheet" href="/message/schedule/schedule.css?_<?=filemtime('./schedule.css')?>">
<script src="/bootstrap/docs/assets/js/jquery.js"></script>
<link href="/bootstrap/docs/assets/css/bootstrap.css" rel="stylesheet">

<div id="schedule_main">
<font color=black>
<?php
function subCol($col, $i) {
	// @ 64
	while ($i--) {
		$lastCol = substr($col, -1, 1);
		if (ord($lastCol)-1 == 64 && strlen($col) != 1) {
			$col = substr($col, 0, strlen($col)-2);
			$col = $col."Z";
		} else if (ord($lastCol)-1 == 64 && strlen($col) == 1) {
			$col = 0;
		} else {
			$col = substr($col, 0, strlen($col)-1);
			$col = $col.chr(ord($lastCol)-1);
			
		}
	}
	return $col;
}
$excel_src = $_REQUEST['src'];
$office = $_REQUEST['office'];

error_reporting(E_ALL);
set_time_limit(0);

/** Include path **/
define('PHPExcelRoot', '../../excel/');
/** PHPExcel_IOFactory */
include PHPExcelRoot.'Classes/PHPExcel/IOFactory.php';


//$inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2007';
//	$inputFileType = 'Excel2003XML';
//	$inputFileType = 'OOCalc';
//	$inputFileType = 'Gnumeric';

$arr_excel_src = explode("/", $excel_src);
$src_name = array_pop($arr_excel_src);
$src_post = explode(".", $src_name);
$src_post = $src_post[1];

switch ($src_post) {
	case "xlsx":
		$inputFileType = 'Excel2007';
		$inputFileName = $excel_src;
		break;
	case "xls":
		$inputFileType = 'Excel5';
		$inputFileName = $excel_src;
		break;
	default:
		echo "<br><br><center><h2>잘못된 입력입니다.</h2></center>";
		break;
}
//$inputFileName = PHPExcelRoot.'Documentation/Examples/Reader/sampleData/example1.xls';

//echo $inputFileName.'<br>';
//echo 'Loading file using IOFactory with a defined reader type of ',$inputFileType,'<br />';
$objReader = PHPExcel_IOFactory::createReader($inputFileType);
if($office=="giche"){
	$tmp=explode(".",$src_name); //띄어쓰기를 기준으로 이름을 받는다.
	$name=$tmp[0];
	$tmp=explode(date("Y"),$name);
	$name=$tmp[1];
}
else if($office=="sanghwang"){
	$tmp=explode(".",$src_name); //띄어쓰기를 기준으로 이름을 받는다.
	$name=$tmp[0];
	$name=$name%100;
}
else if($office=="jungbo"){
	$tmp=explode(".",$src_name); //띄어쓰기를 기준으로 이름을 받는다.
	$name=$tmp[0];
	$tmp=explode("월",$name);
	$name=$tmp[0];
}
$time=mktime(01,00,00,$name,01,date("Y"));

echo date("Ymd",$time);
echo 'Loading '.$src_name.'<br />';
$objReader->setLoadAllSheets();
$objPHPExcel = $objReader->load($inputFileName);


class MyReadFilter implements PHPExcel_Reader_IReadFilter
{
	private $_startRow = 0;
	private $_endRow = 0;
	private $_columns = array();

	public function __construct($startRow, $endRow, $columns) {
		$this->_startRow	= $startRow;
		$this->_endRow		= $endRow;
		$this->_columns		= $columns;
	}

	public function readCell($column, $row, $worksheetName = '') {
		if ($row >= $this->_startRow && $row <= $this->_endRow) {
			if (in_array($column,$this->_columns)) {
				return true;
			}
		}
		return false;
	}
}

$filterSubset = new MyReadFilter(1,30,range('A','AZ'));


echo '<hr />';

echo $objPHPExcel->getSheetCount(),' worksheet',(($objPHPExcel->getSheetCount() == 1) ? '' : 's'),' loaded<br /><br />';
$loadedSheetNames = $objPHPExcel->getSheetNames();
$objReader->setReadFilter($filterSubset);
foreach($loadedSheetNames as $sheetIndex => $loadedSheetName) {
	echo $sheetIndex,' -> ',$loadedSheetName,'<br />';
}
$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);

$row = count($sheetData);
$col = count($sheetData[1]);
$i = 1;
$old_index = -1;
$scriptData = "";
$inc_col = 1;
//echo "<h1>".$sheetData[3][chr(ord('C'))]."</h1>";
echo "<table id='".$office."' border='1'>";
while($i <= $row) {
	echo "<tr id='r".$i."'>";
	foreach($sheetData[$i] as $sheetIndex => $fieldData) {
		if (getType($fieldData) == "string" && $fieldData == "" && $sheetIndex != "A") {
					if ($office == "sanghwang" && $i > 5 && $i <11) {
				
					$trim_fieldData = trim($fieldData);
					for($j=0 ; $j < 25 ; $j++)
					{
						if (preg_match("/전역/", $sheetData[$i][subCol($sheetIndex, $j)])) {
							$inc_col++;
							$k=1;
						} 
					}

					if ($sheetData[$i][subCol($sheetIndex, 1)] == "N") {
						$tdInfo = "off";
						echo "<td  class='".$sheetIndex." ".$tdInfo."'>".$trim_fieldData. "</td>";
					} else if (preg_match("/연가/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;
					} else if (preg_match("/위로/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;
					} else if (preg_match("/포상/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;
					} else if (preg_match("/휴가/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;					
					} else if (preg_match("/외박/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;	
					}  else if (preg_match("/외박/", $sheetData[$i][subCol($sheetIndex, 2)])) {
						$inc_col++;	
					}else if (preg_match("/미실시/", $sheetData[$i][subCol($sheetIndex, 2)])) {
						$inc_col++;	
					}else if (preg_match("/전역/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;
					} else if (preg_match("/가점/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;
					} else if (preg_match("/관장/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;
					} else if (preg_match("/시험/", $sheetData[$i][subCol($sheetIndex, 1)])) {
						$inc_col++;
					}else {
						$tdInfo = "sangoff";
						if($k ==0){
						echo "<td  class='".$sheetIndex." ".$tdInfo."'>".$trim_fieldData. "</td>";
						}
					}
					$k=0;
					
					
					

				// original
				} else {
					$inc_col++;
				}
		} else {
			if ($inc_col > 1) {
				$scriptData .= "$('#r".$i." > .".$old_index."').attr('colspan', ".$inc_col.");";
				$inc_col = 1;
			}
			$old_index = $sheetIndex;
			$trim_fieldData = trim($fieldData);
			switch($trim_fieldData) {
				case "일자\n\n\n\n\n 근무자":
				case "외박조":
				case "일자 근무자":
					$tdInfo = "opname";
					break;
				case "주":
					$tdInfo = "day";
					break;
				case "야":
				case "N":
					$tdInfo = "night";
					break;
				case "0off0":
					$trim_fieldData="off";
					$tdInfo = "sangoff";
					break;

				case "off":
					if ($sheetData[$i][subCol($sheetIndex, 1)] == "야") {
						$tdInfo = "off";
					} else {
						$tdInfo = "sangoff";
					}
					break;
				default:
					if (preg_match("/연가/", $fieldData)) {
						$tdInfo = "vacation";
					} else if (preg_match("/위로/", $fieldData)) {
						$tdInfo = "vacation";
					} else if (preg_match("/포상/", $fieldData)) {
						$tdInfo = "vacation";
					} else if (preg_match("/휴가/", $fieldData)) {
						$tdInfo = "vacation";						
					} else if ("외박" == $fieldData) {
						$tdInfo = "vacation";
					}else if (preg_match("/전역/", $fieldData)) {
						$tdInfo = "vacation";
					}else if (preg_match("/가점/", $fieldData)) {
						$tdInfo = "vacation";
					} else if (preg_match("/관장/", $fieldData)) {
						$tdInfo = "vacation";
					} else if (preg_match("/시험/", $fieldData)) {
						$tdInfo = "vacation";
					} else {
						$tdInfo = "";
					}
					break;
			}
			//요일 설정//
			if($i==5){
				if($office=="giche" || $office=="sanghwang"){
					if($sheetIndex != "B"){
						$temp = $trim_fieldData+date("N",$time);
						if($temp%7==0)
							$tdInfo = "sat";
						else if($temp%7==1)
							$tdInfo = "sun";
					}
				}
			}
			else if($i==7){
				if($office=="jungbo"){
					if($sheetIndex != "B"){
						$temp = $trim_fieldData+date("N",$time);
						if($temp%7==0)
							$tdInfo = "sat";
						else if($temp%7==1)
							$tdInfo = "sun";
					}
				}
			}
			//요일설정 끝// 

			echo "<td  class='".$sheetIndex." ".$tdInfo."'>".$trim_fieldData. "</td>"; //기록.
		}//ELSE 끝
		
	} //FOREARCH 한칸 끝. 
	if ($inc_col > 1) {
		$scriptData .= "$('#r".$i." > .".$old_index."').attr('colspan', ".$inc_col.");";
		$inc_col = 1;
	} //COLSPAN으로 묶어줌. 
	echo "</tr>";
	$i++;
} //한줄 끝 WHILE을 다음단계로. 
echo "</table>";
echo "<script>".$scriptData."</script>";

//var_dump($sheetData);


?></font>
</div>