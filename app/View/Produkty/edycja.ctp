<div class="produkty form">
<?php echo $this->Form->create('Produkt'); ?>
	<fieldset>
		<legend>Edycja danych produktu: <?php echo $this->request->data['Produkt']['nazwa']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('cena_netto', array( 'label' => 'Cena netto', 'default' => '0.00', 'min' => '0.00' ));
		echo $this->Form->input('cena_brutto', array( 'label' => 'Cena brutto', 'default' => '0.00', 'disabled' => true ));
		echo $this->Form->input('vat_id');
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
	</div>
<?php
	
	// echo $this->Form->submit('Zapisz', array( 'after' => $this->Html->link('Anuluj', array('action' => 'index'), array( 'class' => 'btn btn-primary') )));
	
	echo $this->Form->end();
	
?>

</div>


<?php
	echo $this->element('UpdateCenaBrutto.js', array('vat_json' => $vat_json));
?>