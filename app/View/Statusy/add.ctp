<div class="statusy form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend>Dodawanie nowego statusu</legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('kolor', array( 'type' => 'color' ));
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
	</div>
	
<?php echo $this->Form->end(); ?>
</div>

