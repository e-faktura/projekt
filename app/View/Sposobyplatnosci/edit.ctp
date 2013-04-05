<div class="sposobyplatnosci form">
<?php echo $this->Form->create('Sposobplatnosci'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sposobplatnosci'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Sposobplatnosci.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Sposobplatnosci.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sposobyplatnosci'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Sposoby Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Sposob Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
