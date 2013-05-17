<div class="klienci index">
	<h2><?php echo __('Klienci'); ?></h2>
	
	<?php echo $this->Html->link('Nowy klient', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th><?php echo $this->Paginator->sort('adres'); ?></th>
			<th><?php echo $this->Paginator->sort('nip'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('telefon'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($klienci as $klient): ?>
	<tr>
		<td><?php echo h($klient['Klient']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($klient['Klient']['nazwa'], array('action' => 'edit', $klient['Klient']['id'])); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['adres']); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['nip']); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['email']); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['telefon']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $klient['Klient']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $klient['Klient']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $klient['Klient']['id']), null, __('Are you sure you want to delete # %s?', $klient['Klient']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Klient'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('controller' => 'klienci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Klient'), array('controller' => 'klienci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
