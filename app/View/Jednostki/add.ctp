<div class="jednostki form">
<?php echo $this->Form->create('Jednostka'); ?>
	<fieldset>
		<legend>Dodawanie nowej jednostki miary</legend>
	<?php
		echo $this->Form->input('nazwa');
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';">Anuluj</button>
	</div>
	
<?php echo $this->Form->end(); ?>
</div>

