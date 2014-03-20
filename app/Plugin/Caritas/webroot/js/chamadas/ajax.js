$(document).ready(function(){
	
	$('#tipoTab a').click(function(){
		if ($(this).attr('href') == '#tipo_inst') {
			$('#Chamadainst_forn').val(1);
		} else {
			$('#Chamadainst_forn').val(2);
		}
	});
	
	$('#ChamadaEstadoId').change(function(){
		// Apaga Combos
		$('#ChamadaInstituicaoId').html('');
		$('#ChamadaFornecedorId').html('');
		$('#ChamadaContatoId').html('');
		$('#historico').html('');
		$('#contato-box').html('');
		// End
		$('#ChamadaCidadeId').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_cidades/'+this.value,
			'success':function(data) {
				$('#ChamadaCidadeId').html(data).popover('destroy');
			}
		});
	});
	
	$('#ChamadaCidadeId').change(function(){
		// Apaga Combos
		$('#ChamadaFornecedorId').html('');
		$('#ChamadaContatoId').html('');
		$('#historico').html('');
		$('#contato-box').html('');
		// End
		$('#ChamadaInstituicaoId').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_instituicoes/'+this.value,
			'success':function(data) {
				$('#ChamadaInstituicaoId').html(data).popover('destroy');
			}
		});
		$.ajax({
			'url':'/caritas/chamadas/carrega_fornecedores/'+this.value,
			'success':function(data) {
				$('#ChamadaFornecedorId').html(data);
			}
		});
	});
	
	$('#ChamadaInstituicaoId').change(function(){
		// Apaga Combos
		$('#contato-box').html('');
		// End
		$('#ChamadaContatoId').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_contatos/'+this.value,
			'success':function(data) {
				$('#ChamadaContatoId').html(data).popover('destroy');
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
	$('#ChamadaFornecedorId').change(function(){
		// Apaga Combos
		$('#contato-box').html('');
		$('#ChamadaContatoId').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		$.ajax({
			'url':'/caritas/chamadas/carrega_contatos_forn/'+this.value,
			'success':function(data) {
				$('#ChamadaContatoId').html(data).popover('destroy');
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
	
	$('#ChamadaContatoId').change(function(){
		$('#contato-box').popover({
			'placement':'top',
			'title':'Aguarde',
			'content':'Carregando dados...'
		}).popover('show');
		if ($('#Chamadainst_forn').val() == 1) {
			inst_forn_value = $('#ChamadaInstituicaoId').val();
		} else {
			inst_forn_value = $('#ChamadaFornecedorId').val();
		}
		$.ajax({
			'url':'/caritas/chamadas/carrega_contato/'+this.value+'/'+$('#Chamadainst_forn').val()+'/'+inst_forn_value,
			'success':function(data) {
				$('#contato-box').html(data).popover('destroy');
				//$(".mask-fone").inputmask("(99) 9999[9]-9999");
			}
		});
		$('#contato-novo').removeClass('disabled');
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