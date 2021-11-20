$(document).ready(function(){
    $('#tchau').click(function(){
        $('#ul_bar').toggle();
        if($('#ul_bar').is(':visible')) {
            $('#ul_bar').show();
            $('#ul_bar').css('display', 'flex');
        }
        else {
            $('#ul_bar').hide();
        }        
    });
            
});