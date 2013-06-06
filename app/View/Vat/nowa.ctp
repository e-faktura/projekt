<div class="vat form">
<?php echo $this->Form->create('Vat'); ?>
	<fieldset>
		<legend>Dodawanie nowej stawki VAT</legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('wartosc', array( 'label' => 'Wartość', 'default' => '0.00', 'min' => '0.00', 'max' => '1.00', 'step' => '0.01' ));
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
	</div>
	
<?php echo $this->Form->end(); ?>
</div>

