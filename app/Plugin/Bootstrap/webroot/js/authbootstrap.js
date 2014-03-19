 $(document).ready(function(){
	//console.log('jQuery Ready...');
	form_auto = $('.form-autosubmit');
	form_auto.submit();
	$('.btn-popover').popover({
		'html':true,
		'placement':'left',
		'content': $('.filter-panel').html(),
		'title':'Filtros'
	});
	$('.maskedinput').each(function(){
		console.log();
		$(this).mask($(this).data('mask'));
	});
	//.tooltip({
	//	'placement':'top',
	//});
		
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
	
	// Auto tab show
	$('.nav-tabs a[href='+document.location.hash+']').tab('show');
});