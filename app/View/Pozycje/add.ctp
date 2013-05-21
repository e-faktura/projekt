<div class="pozycje form">
<?php echo $this->Form->create('Pozycja'); ?>
	<fieldset>
		<legend><?php echo __('Add Pozycja'); ?></legend>
	<?php
		echo $this->Form->input('faktura_id');
		echo $this->Form->input('produkt_id');
		echo $this->Form->input('ilosc', array( 'label' => 'Ilość' ));
		echo $this->Form->input('jednostka_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

