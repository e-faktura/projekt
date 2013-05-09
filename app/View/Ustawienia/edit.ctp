<div class="ustawienia form">
<?php echo $this->Form->create('Ustawienie'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ustawienie'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('wartosc', array( 'label' => 'Wartość' ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ustawienie.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ustawienie.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ustawienia'), array('action' => 'index')); ?></li>
	</ul>
</div>
