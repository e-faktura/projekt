<div class="produkty form">
<?php echo $this->Form->create('Produkt'); ?>
	<fieldset>
		<legend>Dodawanie nowego produktu</legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('cena_netto', array( 'label' => 'Cena netto', 'default' => '0.00' ));
		echo $this->Form->input('cena_brutto', array( 'label' => 'Cena brutto', 'default' => '0.00', 'disabled' => true ));
		echo $this->Form->input('vat_id');
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';">Anuluj</button>
	</div>
<?php
	
	// echo $this->Form->submit('Zapisz', array( 'after' => $this->Html->link('Anuluj', array('action' => 'index'), array( 'class' => 'btn btn-primary') )));
	
	echo $this->Form->end();
	
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Produkty'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vat'), array('controller' => 'vat', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vat'), array('controller' => 'vat', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>

<?php
	echo $this->element('UpdateCenaBrutto.js', array('vat_json' => $vat_json));
?>