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
	$('.maskedinput').datepicker({
		forceParse: false,
		'format': 'dd/mm/yyyy'
	}).mask('99/99/9999');
	$('.mask_cpf').mask('999.999.999-99');
	$('.mask_tel').mask('(99) 9999?-9999');
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