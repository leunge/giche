<?
	echo('<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">');
	echo("<script type='text/javascript' src='/js/jquery.js'></script>");
//	echo("<div id='div_result'><ul id='result'></ul></div>");
	echo("<textarea style='width:100%; height:100%;' id='result'></textarea>");
		//document.getElementById("testTextarea").value = "Loading....";
	//				$('#result').append('<li>".$type." : ".$title."</li>');
	$i = 0;
	function SendIt($targetDATA, $type, $title, $j) {
			$HTMLDATA = "<script>function f_".$j."() {
				$.ajax({
				type: 'POST',
				url: '/xe/index.php',
				dataType: 'xml',
				contentType: 'text/plain',
				data: ".$targetDATA.",
				complete: function(request, status, error) {
					str_result = $('#result').val();
					$('#result').val('".$type.":".$title."\\n'+str_result);
					f_".($j+1)."();
				}
			});
		}</script>";
		echo $HTMLDATA;
	}
	function endIt(){
		header("location: ./lists");
	}

		$newBoardName = "ilzi";
		$newBoardURL = "/xe/index.php?mid=".$newBoardName;

		$documentDATA['memo']= $memo;
		$documentDATA['subject']=$writetime;
		$documentDATA['name']='root';
	
		$documentDATA['memo'] = preg_replace("/[\\\]/", "\/", $documentDATA['memo']);
		$documentDATA['memo'] = preg_replace("/\"/", "&quot", $documentDATA['memo']);
		$documentDATA['memo'] = preg_replace("/'/", "&apos", $documentDATA['memo']);
		$documentDATA['memo'] = preg_replace("/\n/", "<br>", $documentDATA['memo']);
		$documentDATA['memo'] = preg_replace("/<script/", "", $documentDATA['memo']);
		$documentDATA['memo'] = preg_replace("/<\/script/", "", $documentDATA['memo']);
			
		$documentDATA['subject'] = preg_replace("/\"/", "&quot", $documentDATA['subject']);
		$documentDATA['subject'] = preg_replace("/'/", "&apos", $documentDATA['subject']);
		$documentDATA['subject'] = preg_replace("/\n/", "<br>", $documentDATA['subject']);
		$documentDATA['subject'] = preg_replace("/<script/", "", $documentDATA['subject']);
		$documentDATA['subject'] = preg_replace("/<\/script/", "", $documentDATA['subject']);
	
		$DATA = "\"<?xml version='1.0' encoding='utf-8' ?>\\n";
		$DATA .= "<methodCall>\\n";
		$DATA .= "<params>\\n";
		$DATA .= "<_filter><![CDATA[insert]]></_filter>\\n";
		$DATA .= "<error_return_url><![CDATA[".$newBoardURL."&act=dispBoardWrite]]></error_return_url>\\n";
		$DATA .= "<act><![CDATA[procBoardInsertDocument]]></act>\\n";
		$DATA .= "<mid><![CDATA[".$newBoardName."]]></mid>\\n";
		$DATA .= "<content><![CDATA[".$documentDATA['memo']."]]></content>\\n";
		$DATA .= "<nick_name><![CDATA[".$documentDATA['name']."]]></nick_name>\\n";
		$DATA .= "<password><![CDATA[1234]]></password>\\n";
		$DATA .= "<title><![CDATA[".$documentDATA['subject']."]]></title>\\n";
		$DATA .= "<comment_status><![CDATA[ALLOW]]></comment_status>\\n";
		$DATA .= "<allow_trackback><![CDATA[Y]]></allow_trackback>\\n";
		$DATA .= "<status><![CDATA[PUBLIC]]></status>\\n";
		$DATA .= "<_saved_doc_message><![CDATA[자동 저장된 글이 있습니다. 복구하시겠습니까?\\n";
		$DATA .= "글을 다 쓰신 후 저장하시면 자동 저장 본은 사라집니다.]]></_saved_doc_message>\\n";
		$DATA .= "<module><![CDATA[board]]></module>\\n";
		$DATA .= "</params>\\n";
		$DATA .= "</methodCall>\"";

		SendIt($DATA ,'Backup complete name=', $documentDATA['subject'], $i);
		$i++;
		
	echo("<script>f_0();</script>");
?>

<html><body onLoad=setTimeout('window.close()',20);>
<IFRAME src=http://48.2.160.99:7885/xe/index.php?mid=free&act=dispMemberLogout frameborder=0 width=10 height=10></iframe>
</body></html>