$(document).ready(function(){
	
	$('input[type=checkbox]').tzCheckbox({labels:['깨끗','아직']});




	$('#chkAll').click(function () {
		$('#list').fadeOut(1000);	
	});

});