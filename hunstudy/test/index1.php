<?
	/****************************************************************************
	 * 내가 생각해도 이 코드는 일관성도 없고 가독성이 떨어짐.. 다음 개발자에게 애도를 ㅠㅠ
	 ****************************************************************************/

	///// Giche Log /////
	$fp = fopen("log/index.log", "a");
	if (isset($_SERVER['HTTP_REFERER'])) {
		$refer = $_SERVER['HTTP_REFERER'];
	} else {
		$refer = "";
	}
	fwrite($fp, date("Y")."-".date("m")."-".date("s")." ".date("H").":".date("i").":".date("s")." | ".$_SERVER['REMOTE_ADDR']." | ".$_SERVER['HTTP_USER_AGENT']." | ".$refer."\n");
	fclose($fp);
?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=1024">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7, IE=9">
	<meta http-equiv="Cache-Control" content="no-cache">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" content="0">
	
	<title>OP Board</title>
	<link rel="stylesheet" href="/css/minibootstrap.css?_<?=filemtime('css/minibootstrap.css')?>" type="text/css">
	<link id="globalheader-stylesheet" rel="stylesheet" href="./css/navigation.css?_<?=filemtime('css/navigation.css')?>" type="text/css">

	<link rel="stylesheet" href="./css/base.css?_<?=filemtime('css/base.css')?>" type="text/css">
	<link rel="stylesheet" href="./css/main.css?_<?=filemtime('css/main.css')?>" type="text/css">
<script>
postfix = "20121124";
</script>

<link id="globalheader-enhanced-stylesheet" rel="stylesheet" href="./css/enhanced.css" type="text/css">
	
<!-- old body header -->



<!-- GLOBAL JQUERY 1.7 -->
<!--<script src="./js/jquery.js" type="text/javascript" charset="utf-8"></script>-->
<script src="./js/jquery-1.8.2.js" type="text/javascript" charset="utf-8"></script>

<!-- global JS -->
<script src="./js/global.js?_<?=filemtime('js/global.js')?>" type="text/javascript" charset="utf-8"></script>

<!-- NAVIGATION -->
<script src="./js/navigation.js?_<?=filemtime('js/navigation.js')?>" type="text/javascript" charset="utf-8"></script>
<script src="./js/globalnav.js?_<?=filemtime('js/globalnav.js')?>" type="text/javascript" charset="utf-8"></script>

<!-- TOOLBAR -->
<link rel="stylesheet" href="./css/toolbar.css?_<?=filemtime('css/toolbar.css')?>" type="text/css">

<!-- Slidy -->
<script src="./js/slides.jquery.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./js/slides.min.jquery.js" type="text/javascript" charset="utf-8"></script>


<!-- OP CHAT -->
<link rel="stylesheet" href="/chat/css/chat.css?_<?=filemtime('chat/css/chat.css')?>" type="text/css">
<link rel="stylesheet" href="/chat/css/chat-responsive.css?_<?=filemtime('chat/css/chat-responsive.css')?>" type="text/css">
<script src="/chat/js/chat.js?_<?=filemtime('chat/js/chat.js')?>" type="text/javascript" charset="utf-8"></script>

<!-- Jquery-ui -->
<link href="/css/smoothness/jquery-ui-1.9.1.custom.css" rel="stylesheet">
<script src="/js/jquery-ui-1.9.1.custom.min.js?_3"></script>

</head>
<body class="iphone overview responsive" id="overview">

<!-- Check Login -->
<script type="text/javascript">
	var error_code = getError();
		
	function getError() {
		var ref = document.location.href;
		var strArr = ref.split("?");
		if (strArr[1]) {
			strArr = strArr[1].split("&");
			strArr = strArr[0].split("=");
			return strArr[1];
		}
	}
	function emergency() {
		alert("원활한 이용을 위해 권장하지 않는 접속입니다. 꼭 필요할시에만 사용 해주시기 바랍니다.");
		loginCheck('/frame.html', error_code);
	}
	if ($.browser.msie == true) {
		$('body').append("<div class='center'><h1>IE는 지원하지 않습니다.</h1><br><a href='http://48.2.160.99:7885/data/NAS_Guest/Setup/ETC/ChromeStandaloneSetup.exe'>Chrome Download</a><br><br><a href='javascript:emergency();'>긴급 접속</a></div>");
	} else {
		loginCheck('/frame.html', error_code);
	}
</script>

</body>
</html>