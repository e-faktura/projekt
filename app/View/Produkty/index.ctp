<div class="produkty index">
	<h2><?php echo __('Produkty'); ?></h2>
	
	<?php echo $this->Html->link('Nowy produkt', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th><?php echo $this->Paginator->sort('cena_netto'); ?></th>
			<th><?php echo $this->Paginator->sort('cena_brutto'); ?></th>
			<th><?php echo $this->Paginator->sort('vat_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($produkty as $produkt): ?>
	<tr>
		<td><?php echo h($produkt['Produkt']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($produkt['Produkt']['nazwa'], array('action' => 'edit', $produkt['Produkt']['id'])); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['cena_netto']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['cena_brutto']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Vat']['nazwa']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $produkt['Produkt']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $produkt['Produkt']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $produkt['Produkt']['id']), array( 'escape' => false ), __('Are you sure you want to delete # %s?', $produkt['Produkt']['id'])); ?>
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

