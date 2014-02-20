$(document).ready(function(){
	$('#Chamadainst_forn').change(function(){
		if (this.value == 1) {
			// Seleciona Instituicao
			$('#Chamadainstituicao_id').parent().show();
			$('#Chamadafornecedor_id').parent().hide();
			$('#Chamadainstituicao_id').removeAttr('disabled');
			$('#Chamadafornecedor_id').attr('disabled','disabled');
		} else {
			// Seleciona Fornecedor
			$('#Chamadainstituicao_id').parent().hide();
			$('#Chamadafornecedor_id').parent().show();
			$('#Chamadafornecedor_id').removeAttr('disabled');
			$('#Chamadainstituicao_id').attr('disabled','disabled');
		}
	});

	$('#Chamadaestado_id').change(function(){
		$.ajax({
			'url':'/caritas/chamadas/carrega_cidades/'+this.value,
			'success':function(data) {
				$('#Chamadacidade_id').html(data);
			}
		});
	});
	
	$('#Chamadacidade_id').change(function(){
		$.ajax({
			'url':'/caritas/chamadas/carrega_instituicoes/'+this.value,
			'success':function(data) {
				$('#Chamadainstituicao_id').html(data);
			}
		});
		$.ajax({
			'url':'/caritas/chamadas/carrega_fornecedores/'+this.value,
			'success':function(data) {
				$('#Chamadafornecedor_id').html(data);
			}
		});
	});
	
	$('#Chamadainstituicao_id').change(function(){
		$.ajax({
			'url':'/caritas/chamadas/carrega_contatos/'+this.value,
			'success':function(data) {
				$('#Chamadacontato_id').html(data);
			}
		});
		$.ajax({
			'url':'/caritas/chamadas/carrega_historico/'+this.value,
			'success':function(data) {
				$('#historico-title').html('Histórico da Instituição');
				$('#historico').html(data);
			}
		});
	});
	$('#Chamadafornecedor_id').change(function(){
		$.ajax({
			'url':'/caritas/chamadas/carrega_contatos_forn/'+this.value,
			'success':function(data) {
				$('#Chamadacontato_id').html(data);
			}
		});
		$.ajax({
			'url':'/caritas/chamadas/carrega_historico_forn/'+this.value,
			'success':function(data) {
				$('#historico-title').html('Histórico do Fornecedor');	
				$('#historico').html(data);
			}
		});
	});
	
	$('#Chamadacontato_id').change(function(){
		$.ajax({
			'url':'/caritas/chamadas/carrega_contato/'+this.value,
			'success':function(data) {
				$('#contato-box').html(data);
			}
		});
	});
	
	// Belongs URL
	$('.btn-belongs').click(function(){
		data = $(this).parents('form').serialize();
		url = '/'+$(this).data('plugin')+$(this).data('url');
		belongsFormId = encodeURIComponent($(this).parents('form').attr('id'));
		belongsFormUrl = encodeURIComponent($(this).parents('form').attr('action'));
		$.ajax({
			'url': url,
			'method':'post',
			'data':data+'&data%5BBelongsFormId%5D='+belongsFormId+'&data%5BBelongsFormUrl%5D='+belongsFormUrl,
			'success':function(data) {
				location.href=url;
			}
		});
	});
	
});