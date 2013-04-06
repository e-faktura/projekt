<div class="ustawienia form">
<?php echo $this->Form->create('Ustawienie'); ?>
	<fieldset>
		<legend><?php echo __('Add Ustawienie'); ?></legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('wartosc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ustawienia'), array('action' => 'index')); ?></li>
	</ul>
</div>
