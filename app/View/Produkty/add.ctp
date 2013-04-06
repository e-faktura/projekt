<div class="produkty form">
<?php echo $this->Form->create('Produkt'); ?>
	<fieldset>
		<legend><?php echo __('Add Produkt'); ?></legend>
	<?php
		echo $this->Form->input('parent_id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('cena_netto');
		echo $this->Form->input('ilosc');
		echo $this->Form->input('vat_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
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
