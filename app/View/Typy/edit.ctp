<div class="typy form">
<?php echo $this->Form->create('Typ'); ?>
	<fieldset>
		<legend><?php echo __('Edit Typ'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('nazwa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Typ.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Typ.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Typy'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Typy'), array('controller' => 'typy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Typ'), array('controller' => 'typy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
