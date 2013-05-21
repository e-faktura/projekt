<div class="role form">
<?php echo $this->Form->create('Rola'); ?>
	<fieldset>
		<legend><?php echo __('Add Rola'); ?></legend>
	<?php
		echo $this->Form->input('nazwa');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

