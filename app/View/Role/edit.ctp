<div class="role form">
<?php echo $this->Form->create('Rola'); ?>
	<fieldset>
		<legend><?php echo __('Edit Rola'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rola.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rola.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Role'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Uzytkownicy'), array('controller' => 'uzytkownicy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uzytkownik'), array('controller' => 'uzytkownicy', 'action' => 'add')); ?> </li>
	</ul>
</div>
