$(document).ready(function(){
	$('#ul_bar').hide();
	$('#tchau').click(function(){
		$('#ul_bar').toggle();
		if($('#ul_bar').is(':visible')) {
			$('#ul_bar').show();
		}
		else {
			$('#ul_bar').hide();
		}		
	});
			
});