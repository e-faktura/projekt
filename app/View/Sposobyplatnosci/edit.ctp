<div class="sposobyplatnosci form">
<?php echo $this->Form->create('Sposobplatnosci'); ?>
	<fieldset>
		<legend>Edycja sposobu płatności: <?php echo $this->request->data['Sposobplatnosci']['nazwa']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
	</div>
	
<?php echo $this->Form->end(); ?>
</div>

