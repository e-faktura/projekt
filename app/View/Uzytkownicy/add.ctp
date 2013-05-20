<div class="uzytkownicy form">
<?php echo $this->Form->create('Uzytkownik'); ?>
	<fieldset>
		<legend>Dodawanie nowego użytkownika</legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('login');
		echo $this->Form->input('haslo', array( 'label' => 'Hasło', 'type' => 'password'));
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uzytkownicy'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Role'), array('controller' => 'role', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rola'), array('controller' => 'role', 'action' => 'add')); ?> </li>
	</ul>
</div>
