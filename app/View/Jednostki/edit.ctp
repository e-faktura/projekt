<div class="jednostki form">
<?php echo $this->Form->create('Jednostka'); ?>
	<fieldset>
		<legend><?php echo __('Edit Jednostka'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Jednostka.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Jednostka.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('controller' => 'jednostki', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Jednostka'), array('controller' => 'jednostki', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
