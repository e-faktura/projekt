<?php
	// pr($sposobyplatnosci);
?>
<div class="sposobyplatnosci index">
	<h2>Sposoby płatności</h2>
	
	<?php echo $this->Html->link('Nowy sposób płatności', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
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
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $sposobplatnosci['Sposobplatnosci']['id']), array( 'escape' => false, 'class' => 'btn btn-danger btn-small' ), __('Are you sure you want to delete # %s?', $sposobplatnosci['Sposobplatnosci']['id'])); ?>
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
	<div class="pagination">
		<ul>
			<?php
				echo $this->Paginator->prev('&lt; ' . __('previous'), array('tag' => 'li', 'escape' => false), '<span>&lt; ' . __('previous').'</span>', array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
				echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'span'));
				echo $this->Paginator->next(__('next') . ' &gt;', array('tag' => 'li', 'escape' => false), '<span>'.__('next') . ' &gt;</span>', array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
			?>
		</ul>
	</div>
</div>

