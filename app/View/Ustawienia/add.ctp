<div class="ustawienia form">
<?php echo $this->Form->create('Ustawienie'); ?>
	<fieldset>
		<legend><?php echo __('Add Ustawienie'); ?></legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('wartosc', array( 'label' => 'Wartość' ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

