<div class="uzytkownicy form">
<?php echo $this->Form->create('Uzytkownik'); ?>
	<fieldset>
		<legend><?php echo __('Edit Uzytkownik'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rola_id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('login');
		echo $this->Form->input('haslo', array( 'label' => 'Hasło' ));
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Uzytkownik.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Uzytkownik.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Uzytkownicy'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Role'), array('controller' => 'role', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rola'), array('controller' => 'role', 'action' => 'add')); ?> </li>
	</ul>
</div>
