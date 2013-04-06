<div class="uzytkownicy index">
	<h2><?php echo __('Uzytkownicy'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('rola_id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('haslo'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uzytkownicy as $uzytkownik): ?>
	<tr>
		<td><?php echo h($uzytkownik['Uzytkownik']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($uzytkownik['Rola']['id'], array('controller' => 'role', 'action' => 'view', $uzytkownik['Rola']['id'])); ?>
		</td>
		<td><?php echo h($uzytkownik['Uzytkownik']['nazwa']); ?>&nbsp;</td>
		<td><?php echo h($uzytkownik['Uzytkownik']['login']); ?>&nbsp;</td>
		<td><?php echo h($uzytkownik['Uzytkownik']['haslo']); ?>&nbsp;</td>
		<td><?php echo h($uzytkownik['Uzytkownik']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $uzytkownik['Uzytkownik']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uzytkownik['Uzytkownik']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uzytkownik['Uzytkownik']['id']), null, __('Are you sure you want to delete # %s?', $uzytkownik['Uzytkownik']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Uzytkownik'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Role'), array('controller' => 'role', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rola'), array('controller' => 'role', 'action' => 'add')); ?> </li>
	</ul>
</div>
