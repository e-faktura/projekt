<div class="jednostki index">
	<h2><?php echo __('Jednostki'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($jednostki as $jednostka): ?>
	<tr>
		<td><?php echo h($jednostka['Jednostka']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($jednostka['ParentJednostka']['id'], array('controller' => 'jednostki', 'action' => 'view', $jednostka['ParentJednostka']['id'])); ?>
		</td>
		<td><?php echo h($jednostka['Jednostka']['nazwa']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $jednostka['Jednostka']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $jednostka['Jednostka']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $jednostka['Jednostka']['id']), null, __('Are you sure you want to delete # %s?', $jednostka['Jednostka']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Jednostka'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('controller' => 'jednostki', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Jednostka'), array('controller' => 'jednostki', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
