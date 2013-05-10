<div class="produkty form">
<?php echo $this->Form->create('Produkt'); ?>
	<fieldset>
		<legend><?php echo __('Edit Produkt'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('cena_netto', array( 'label' => 'Cena netto', 'default' => '0.00' ));
		echo $this->Form->input('cena_brutto', array( 'label' => 'Cena brutto', 'default' => '0.00', 'disabled' => true ));
		echo $this->Form->input('ilosc', array( 'label' => 'Ilość', 'default' => '0' ));
		echo $this->Form->input('vat_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Produkt.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Produkt.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vat'), array('controller' => 'vat', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vat'), array('controller' => 'vat', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
