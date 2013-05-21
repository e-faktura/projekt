<div class="statusy index">
	<h2><?php echo __('Statusy'); ?></h2>
	
	<?php echo $this->Html->link('Nowy status', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th>Podgląd</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($statusy as $status): ?>
	<tr>
		<td><?php echo h($status['Status']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($status['Status']['nazwa']), array('action' => 'edit', $status['Status']['id'])); ?>&nbsp;</td>
		<td><span class="label" style="background-color: <?php echo $status['Status']['kolor']; ?>"><?php echo h($status['Status']['nazwa']); ?></span>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $status['Status']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $status['Status']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $status['Status']['id']), array( 'escape' => false ), __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?>
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

