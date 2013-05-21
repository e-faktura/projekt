<div class="klienci form">
<?php echo $this->Form->create('Klient'); ?>
	<fieldset>
		<legend>Dodawanie nowego klienta</legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('adres');
		echo $this->Form->input('nip', array( 'label' => 'NIP' ));
		echo $this->Form->input('email');
		echo $this->Form->input('telefon');
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';">Anuluj</button>
	</div>
<?php
	
	// echo $this->Form->submit('Zapisz', array( 'after' => $this->Html->link('Anuluj', array('action' => 'index'), array( 'class' => 'btn btn-primary') )));
	
	echo $this->Form->end();
	
?>
</div>

