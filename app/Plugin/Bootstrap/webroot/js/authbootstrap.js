 $(document).ready(function(){
	//console.log('jQuery Ready...');
	form_auto = $('.form-autosubmit');
	form_auto.submit();
	console.log('ok');
	$('.btn-popover').popover({
		'html':true,
		'placement':'left',
		'content': $('.filter-panel').html(),
		'title':'Filtros'
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
});