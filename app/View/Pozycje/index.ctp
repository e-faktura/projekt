<div class="pozycje index">
	<h2><?php echo __('Pozycje'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('faktura_id'); ?></th>
			<th><?php echo $this->Paginator->sort('produkt_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ilosc'); ?></th>
			<th><?php echo $this->Paginator->sort('jednostka_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pozycje as $pozycja): ?>
	<tr>
		<td><?php echo h($pozycja['Pozycja']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pozycja['Faktura']['id'], array('controller' => 'faktury', 'action' => 'view', $pozycja['Faktura']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pozycja['Produkt']['id'], array('controller' => 'produkty', 'action' => 'view', $pozycja['Produkt']['id'])); ?>
		</td>
		<td><?php echo h($pozycja['Pozycja']['ilosc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pozycja['Jednostka']['id'], array('controller' => 'jednostki', 'action' => 'view', $pozycja['Jednostka']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pozycja['Pozycja']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pozycja['Pozycja']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pozycja['Pozycja']['id']), null, __('Are you sure you want to delete # %s?', $pozycja['Pozycja']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Pozycja'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('controller' => 'jednostki', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jednostka'), array('controller' => 'jednostki', 'action' => 'add')); ?> </li>
	</ul>
</div>
