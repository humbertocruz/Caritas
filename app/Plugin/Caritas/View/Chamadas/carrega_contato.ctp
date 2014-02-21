<table>
<tr>
	<td>
	<?php foreach($contato['ContatosFone'] as $fones) { ?>
		<?php echo $fones['fone'].'<br>'; ?>
	<?php } ?>
	</td>
</tr>
<tr>
	<td>
	<?php foreach($contato['ContatosEmail'] as $emails) { ?>
		<?php echo $emails['email'].'<br>'; ?>
	<?php } ?>
	</td>
</tr>
<tr>
	<td>
	Cargos
	</td>
</tr>
</table>
