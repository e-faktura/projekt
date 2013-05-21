<div class="klienci form">
<?php echo $this->Form->create('Klient'); ?>
	<fieldset>
		<legend>Edycja danych klienta: <?php echo $this->request->data['Klient']['nazwa']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('adres');
		
		$disable_nip = false;
		if( !empty($this->request->data['Klient']['nip']) ){
			$disable_nip = true;
			echo $this->Form->hidden('nip');
		}
		
		echo $this->Form->input('nip', array( 'label' => 'NIP', 'disabled' => $disable_nip ));
		echo $this->Form->input('email');
		echo $this->Form->input('telefon');
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"><i class="icon-ok"></i> Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
	</div>
<?php
	
	// echo $this->Form->submit('Zapisz', array( 'after' => $this->Html->link('Anuluj', array('action' => 'index'), array( 'class' => 'btn btn-primary') )));
	
	echo $this->Form->end();
	
?>
</div>

