<div class="pozycje form">
<?php echo $this->Form->create('Pozycja'); ?>
	<fieldset>
		<legend><?php echo __('Edit Pozycja'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('faktura_id');
		echo $this->Form->input('produkt_id');
		echo $this->Form->input('ilosc');
		echo $this->Form->input('jednostka_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Pozycja.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Pozycja.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('controller' => 'jednostki', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jednostka'), array('controller' => 'jednostki', 'action' => 'add')); ?> </li>
	</ul>
</div>
