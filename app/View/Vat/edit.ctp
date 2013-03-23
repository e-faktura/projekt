<div class="vat form">
<?php echo $this->Form->create('Vat'); ?>
	<fieldset>
		<legend><?php echo __('Edit Vat'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('parent_id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('wartosc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vat.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Vat.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vat'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vat'), array('controller' => 'vat', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Vat'), array('controller' => 'vat', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
	</ul>
</div>
