<div class="statusy view">
<h2><?php  echo __('Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($status['Status']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($status['ParentStatus']['id'], array('controller' => 'statusy', 'action' => 'view', $status['ParentStatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($status['Status']['nazwa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Status'), array('action' => 'edit', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Status'), array('action' => 'delete', $status['Status']['id']), null, __('Are you sure you want to delete # %s?', $status['Status']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Statusy'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statusy'), array('controller' => 'statusy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Status'), array('controller' => 'statusy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Faktury'); ?></h3>
	<?php if (!empty($status['Faktura'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Numer'); ?></th>
		<th><?php echo __('Data Wystawienia'); ?></th>
		<th><?php echo __('Data Sprzedazy'); ?></th>
		<th><?php echo __('Typ Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Klient Id'); ?></th>
		<th><?php echo __('Sposob Platnosci Id'); ?></th>
		<th><?php echo __('Termin Platnosci'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($status['Faktura'] as $faktura): ?>
		<tr>
			<td><?php echo $faktura['id']; ?></td>
			<td><?php echo $faktura['parent_id']; ?></td>
			<td><?php echo $faktura['numer']; ?></td>
			<td><?php echo $faktura['data_wystawienia']; ?></td>
			<td><?php echo $faktura['data_sprzedazy']; ?></td>
			<td><?php echo $faktura['typ_id']; ?></td>
			<td><?php echo $faktura['status_id']; ?></td>
			<td><?php echo $faktura['klient_id']; ?></td>
			<td><?php echo $faktura['sposob_platnosci_id']; ?></td>
			<td><?php echo $faktura['termin_platnosci']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'faktury', 'action' => 'view', $faktura['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'faktury', 'action' => 'edit', $faktura['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'faktury', 'action' => 'delete', $faktura['id']), null, __('Are you sure you want to delete # %s?', $faktura['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Statusy'); ?></h3>
	<?php if (!empty($status['ChildStatus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($status['ChildStatus'] as $childStatus): ?>
		<tr>
			<td><?php echo $childStatus['id']; ?></td>
			<td><?php echo $childStatus['parent_id']; ?></td>
			<td><?php echo $childStatus['nazwa']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'statusy', 'action' => 'view', $childStatus['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'statusy', 'action' => 'edit', $childStatus['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'statusy', 'action' => 'delete', $childStatus['id']), null, __('Are you sure you want to delete # %s?', $childStatus['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Status'), array('controller' => 'statusy', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
