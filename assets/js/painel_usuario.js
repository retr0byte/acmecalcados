$(document).ready(function(){
	$('.sub-menu-adm').hide();
	$('#oi').click(function(){
		$('.sub-menu-adm').toggle();
		if($('.sub-menu-adm').is(':visible')) {
			$(this).find('.altera').removeClass('voltar').addClass('girar');
			$('.sub-menu-adm').show();
		}
		else {
			$(this).find('.altera').removeClass('girar').addClass('voltar');
			$('.sub-menu-adm').hide();
		}		
	});


    var aurl = window.location.pathname;
	$('.itens-lateral li a[href$="'+aurl+'"]').parents('li').addClass('active');
			
});