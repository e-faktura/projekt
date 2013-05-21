<div class="uzytkownicy form">
<?php echo $this->Form->create('Uzytkownik'); ?>
	<fieldset>
		<legend>Edycja użytkownika: <?php echo $this->request->data['Uzytkownik']['nazwa']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('login');
		echo $this->Form->input('haslo', array( 'label' => 'Hasło', 'type' => 'password' ));
		echo $this->Form->input('email');
		echo $this->Form->input('rola_id');
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';">Anuluj</button>
	</div>
	
<?php echo $this->Form->end(); ?>
</div>

