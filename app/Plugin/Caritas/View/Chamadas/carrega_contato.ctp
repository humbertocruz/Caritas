<table>
<tr>
	<td>
	<?php echo $contato['Contato']['nome']; ?>
	</td>
</tr>
<tr>
	<td>
	<?php foreach($contato['ContatosFone'] as $fones) { ?>
		<?php echo $fones['fone'].'<br>'; ?>
	<?php } ?>
	</td>
</tr>
<tr>
	<td>
	Emails
	</td>
</tr>
<tr>
	<td>
	Cargos
	</td>
</tr>
</table>
