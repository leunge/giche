<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link herf="/var/www/bootstrap/css/bootstrap.min.css" rel"stylesheet" media="screen">

</head>
<body>
<h1>
helloworld!! 
<?
	$today=time();
$test=mktime(00,00,00,date("m",$today)-1,date("d",$today),date("y",$today));
echo date("N",$test);
?>
</h1>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="/var/www/bootstrap/js/bootstrap.min.js"></script>

</div>
<div class="row">
	<div class="span4">a</div>
	<div class="span3 offset2">c</div>
	<div class="span5">b</div>
</div>



</body>
</html>

