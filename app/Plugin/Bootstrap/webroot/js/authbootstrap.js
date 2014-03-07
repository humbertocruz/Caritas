$(document).ready(function(){
	//console.log('jQuery Ready...');
	form_auto = $('.form-autosubmit');
	form_auto.submit();
	
	
	// Configura Escolha do Projeto
	$('#EscolhaProjetoId').change(function(){
		$(this).parent().submit();
	});
	
	// Teclas de Atalho
	
	/*
	$(document).on('keypress', null, 'c', function(){
		location.href = '/caritas/chamadas/add'	
	}
	);
	*/
});