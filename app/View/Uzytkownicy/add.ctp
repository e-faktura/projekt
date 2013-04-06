<div class="uzytkownicy form">
<?php echo $this->Form->create('Uzytkownik'); ?>
	<fieldset>
		<legend><?php echo __('Add Uzytkownik'); ?></legend>
	<?php
		echo $this->Form->input('rola_id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('login');
		echo $this->Form->input('haslo');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uzytkownicy'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Role'), array('controller' => 'role', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rola'), array('controller' => 'role', 'action' => 'add')); ?> </li>
	</ul>
</div>
