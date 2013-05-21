<div class="vat form">
<?php echo $this->Form->create('Vat'); ?>
	<fieldset>
		<legend>Edycja stawki VAT: <?php echo $this->request->data['Vat']['nazwa']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('wartosc', array( 'label' => 'Wartość', 'default' => '0.00' ));
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
	</div>
	
<?php echo $this->Form->end(); ?>
</div>

