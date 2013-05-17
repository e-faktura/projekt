<div class="faktury index">
	<h2><?php echo __('Faktury'); ?></h2>
	
	<?php echo $this->Html->link('Nowa faktura', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('numer'); ?></th>
				<th><?php echo $this->Paginator->sort('data_wystawienia'); ?></th>
				<th><?php echo $this->Paginator->sort('typ_id'); ?></th>
				<th><?php echo $this->Paginator->sort('status_id'); ?></th>
				<th><?php echo $this->Paginator->sort('klient_id'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php foreach ($faktury as $faktura): ?>
			<tr>
				<td><?php echo h($faktura['Faktura']['id']); ?>&nbsp;</td>
				<td><?php echo h($faktura['Faktura']['numer']); ?>&nbsp;</td>
				<td><?php echo h($faktura['Faktura']['data_wystawienia']); ?>&nbsp;</td>
				<td><?php echo h($faktura['Typ']['nazwa']); ?></td>
				<td><?php echo h($faktura['Status']['nazwa']); ?></td>
				<td><?php echo h($faktura['Klient']['nazwa']); ?></td>
				<td class="actions">
					<?php //echo $this->Html->link(__('View'), array('action' => 'view', $faktura['Faktura']['id'])); ?>
					<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $faktura['Faktura']['id'])); ?>
					<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $faktura['Faktura']['id']), null, __('Are you sure you want to delete # %s?', $faktura['Faktura']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Faktura'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Typy'), array('controller' => 'typy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Typ'), array('controller' => 'typy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statusy'), array('controller' => 'statusy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statusy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('controller' => 'klienci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Klient'), array('controller' => 'klienci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sposoby Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sposob Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
