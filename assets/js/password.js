$(document).ready(function(){
	$('#bt_pass').click(function(){
		
		if($('#bt_pass').hasClass('fa-eye-slash')) {
			$(this).removeClass('fa-eye-slash').addClass('fa-eye');
			$('input[type="password"]').prop('type', 'text');
		}
		else if($('#bt_pass').hasClass('fa-eye')){
			$(this).removeClass('fa-eye').addClass('fa-eye-slash');
			$('input[type="text"]').prop('type', 'password');
		}		
	});
				
});