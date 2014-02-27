$(document).ready(function(){
	
	$('#tipoTab a').click(function(){
		if ($(this).attr('href') == '#tipo_inst') {
			$('#Chamadainst_forn').val(1);
		} else {
			$('#Chamadainst_forn').val(2);
		}
	});
	
	$('#Chamadaestado_id').change(function(){
		// Apaga Combos
		$('#Chamadainstituicao_id').html('');
		$('#Chamadafornecedor_id').html('');
		$('#Chamadacontato_id').html('');
		$('#historico').html('');
		$('#contato-box').html('');
		// End
		$('#Chamadacidade_id').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_cidades/'+this.value,
			'success':function(data) {
				$('#Chamadacidade_id').html(data).popover('destroy');
			}
		});
	});
	
	$('#Chamadacidade_id').change(function(){
		// Apaga Combos
		$('#Chamadafornecedor_id').html('');
		$('#Chamadacontato_id').html('');
		$('#historico').html('');
		$('#contato-box').html('');
		// End
		$('#Chamadainstituicao_id').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_instituicoes/'+this.value,
			'success':function(data) {
				$('#Chamadainstituicao_id').html(data).popover('destroy');
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
		// Apaga Combos
		$('#contato-box').html('');
		// End
		$('#Chamadacontato_id').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_contatos/'+this.value,
			'success':function(data) {
				$('#Chamadacontato_id').html(data).popover('destroy');
			}
		});
		$('#historico-title').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_historico/'+this.value,
			'success':function(data) {
				$('#historico-title').html('Histórico da Instituição').popover('destroy');
				$('#historico').html(data);
			}
		});
	});
	$('#Chamadafornecedor_id').change(function(){
		// Apaga Combos
		$('#contato-box').html('');
		$('#Chamadacontato_id').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_contatos_forn/'+this.value,
			'success':function(data) {
				$('#Chamadacontato_id').html(data).popover('destroy');
			}
		});
		$('#historico-title').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_historico_forn/'+this.value,
			'success':function(data) {
				$('#historico-title').html('Histórico do Fornecedor').popover('destroy');	
				$('#historico').html(data);
			}
		});
	});
	
	$('#Chamadacontato_id').change(function(){
		$('#contato-box').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_contato/'+this.value,
			'success':function(data) {
				$('#contato-box').html(data).popover('destroy');
				$(".mask-fone").inputmask("(99) 9999[9]-9999");
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