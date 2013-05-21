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

