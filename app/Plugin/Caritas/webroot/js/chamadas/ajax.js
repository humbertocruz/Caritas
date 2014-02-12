$(document).ready(function(){
	$('.Chamadainst_forn').find(':input').change(function(){
		if (this.value == 1) {
			$('#Chamadainstituicao_id').removeAttr('disabled');
			$('#Chamadafornecedor_id').attr('disabled','disabled');
		} else {
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
});