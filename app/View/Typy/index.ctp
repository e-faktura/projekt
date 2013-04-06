<div class="typy index">
	<h2><?php echo __('Typy'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($typy as $typ): ?>
	<tr>
		<td><?php echo h($typ['Typ']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($typ['ParentTyp']['id'], array('controller' => 'typy', 'action' => 'view', $typ['ParentTyp']['id'])); ?>
		</td>
		<td><?php echo h($typ['Typ']['nazwa']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $typ['Typ']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $typ['Typ']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $typ['Typ']['id']), null, __('Are you sure you want to delete # %s?', $typ['Typ']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Typ'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Typy'), array('controller' => 'typy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Typ'), array('controller' => 'typy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
