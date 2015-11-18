<html>
<head>
<title> New Document </title>
<script type="text/javascript" src="http://48.2.1.21/mc/dwr/interface/JsAjaxDwrUtils.js?version=1"></script>
<script>
function init() {
	loginAction.submit();

}

</script>
</head>
<body onload="javascript:init();">
<form id="loginAction" action=http://48.2.1.49/mc/faces/frontpage.jsp method="post">
<!--<form action=http://48.2.1.49/mc/faces/adminlogin.jsp method="post">-->
<!--
<form action="48.2.1.49/mc/faces/adminlogin.jsp" type="post">-->
<!--	<label id="useridlabel" for="userid" class="LblLev2Txt" style="color:#ffffff;">아 이 디 </label>-->

	<input type="hidden" name="folder" value="ics"></input>
	<input type="hidden" name="framePage" value="frame.jsp"></input>
	<input type="hidden" name="selectedTree" value="_APP_LIST"></input>
	<input type="hidden" name="selectedPage" value="mediaAppMgmt.jsp"></input>
	<input type="hidden" name="appstatus" value="0"></input>
	<input type="hidden" name="apptype" value="3"></input>
	<input type="hidden" size="20" id="userId" name="userid" class="TxtFld" value="afhq3">
	<input type="hidden" size="20" id="passwd" name="passwd" class="TxtFld" value="5^uzgify!">
<!--	<input type="checkbox" id="forceLogin" name="forceLogin" class="TxtFld" value="" checked>-->
	<input id="dologin" name="dologin" class="Btn3" alt="관리자로 로그인합니다." type="submit">
<form>

  
</body>
</html>
