/*
*/

function mostrar(){
	$(".backLoader").css("display", "block");
}

function ocultar(){
	$(".backLoader").removeClass("display", "block");
	$(".backLoader").css("display", "none");
}



function mostrar_alert(mensaje){
	$('#txt_error_desc').html('');
	
	// Velocidad Fade
	var v = 200;
	
	$('#alert_mail').slideDown('fast', function() {
		$('#txt_error_desc').html(mensaje);
	});
}

function ocultar_alert(){
	// Velocidad Fade
	var v = 200;		
	
	$('#alert_mail').slideUp(v);
}
