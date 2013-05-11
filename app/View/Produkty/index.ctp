<div class="produkty index">
	<h2><?php echo __('Produkty'); ?></h2>
	
	<?php echo $this->Html->link('Nowy produkt', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th><?php echo $this->Paginator->sort('cena_netto'); ?></th>
			<th><?php echo $this->Paginator->sort('cena_brutto'); ?></th>
			<th><?php echo $this->Paginator->sort('ilosc'); ?></th>
			<th><?php echo $this->Paginator->sort('vat_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produkty as $produkt): ?>
	<tr>
		<td><?php echo h($produkt['Produkt']['id']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['nazwa']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['cena_netto']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['cena_brutto']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['ilosc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($produkt['Vat']['nazwa'], array('controller' => 'vat', 'action' => 'view', $produkt['Vat']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $produkt['Produkt']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $produkt['Produkt']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $produkt['Produkt']['id']), null, __('Are you sure you want to delete # %s?', $produkt['Produkt']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Produkt'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vat'), array('controller' => 'vat', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vat'), array('controller' => 'vat', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
