$(document).ready(function(){
	$('.p-faq').hide();
	$('.faqItem').click(function(){
		$(this).find('.p-faq').toggle();
		$(this).show();
		if($(this).find('.p-faq').is(':visible')) {
			$(this).find('.altera').removeClass('voltar').addClass('girar');
			$('.p-faq').hide();
			$(this).find('.p-faq').show();
		}
		else {
			$(this).find('.altera').removeClass('girar').addClass('voltar');
			
			$(this).find('.p-faq').hide();
		}	
	});
				
});