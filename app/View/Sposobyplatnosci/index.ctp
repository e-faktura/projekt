<?php
	// pr($sposobyplatnosci);
?>
<div class="sposobyplatnosci index">
	<h2>Sposoby płatności</h2>
	
	<?php echo $this->Html->link('Nowy sposób płatności', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($sposobyplatnosci as $sposobplatnosci): ?>
	<tr>
		<td><?php echo h($sposobplatnosci['Sposobplatnosci']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($sposobplatnosci['Sposobplatnosci']['nazwa']), array('action' => 'edit', $sposobplatnosci['Sposobplatnosci']['id'])); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $sposobplatnosci['Sposobplatnosci']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $sposobplatnosci['Sposobplatnosci']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $sposobplatnosci['Sposobplatnosci']['id']), array( 'escape' => false ), __('Are you sure you want to delete # %s?', $sposobplatnosci['Sposobplatnosci']['id'])); ?>
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

