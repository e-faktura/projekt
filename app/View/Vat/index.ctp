<div class="vat index">
	<h2>Stawki VAT</h2>
	
	<?php echo $this->Html->link('Nowa stawka VAT', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa', 'Stawka'); ?></th>
			<th><?php echo $this->Paginator->sort('wartosc', 'Wartość'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vat as $vat): ?>
	<tr>
		<td><?php echo h($vat['Vat']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($vat['Vat']['nazwa']), array('action' => 'edit', $vat['Vat']['id'])); ?>&nbsp;</td>
		<td><?php echo h($vat['Vat']['wartosc']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $vat['Vat']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $vat['Vat']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $vat['Vat']['id']), array( 'escape' => false ), __('Are you sure you want to delete # %s?', $vat['Vat']['id'])); ?>
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

