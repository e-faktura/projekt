<div class="sposobyplatnosci view">
<h2><?php  echo __('Sposobplatnosci'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sposobplatnosci['Sposobplatnosci']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Sposob Platnosci'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sposobplatnosci['ParentSposobPlatnosci']['id'], array('controller' => 'sposoby_platnosci', 'action' => 'view', $sposobplatnosci['ParentSposobPlatnosci']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($sposobplatnosci['Sposobplatnosci']['nazwa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sposobplatnosci'), array('action' => 'edit', $sposobplatnosci['Sposobplatnosci']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sposobplatnosci'), array('action' => 'delete', $sposobplatnosci['Sposobplatnosci']['id']), null, __('Are you sure you want to delete # %s?', $sposobplatnosci['Sposobplatnosci']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sposobyplatnosci'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sposobplatnosci'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sposoby Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Sposob Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Faktury'); ?></h3>
	<?php if (!empty($sposobplatnosci['Faktura'])): ?>
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
		foreach ($sposobplatnosci['Faktura'] as $faktura): ?>
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
	<h3><?php echo __('Related Sposoby Platnosci'); ?></h3>
	<?php if (!empty($sposobplatnosci['ChildSposobPlatnosci'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($sposobplatnosci['ChildSposobPlatnosci'] as $childSposobPlatnosci): ?>
		<tr>
			<td><?php echo $childSposobPlatnosci['id']; ?></td>
			<td><?php echo $childSposobPlatnosci['parent_id']; ?></td>
			<td><?php echo $childSposobPlatnosci['nazwa']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sposoby_platnosci', 'action' => 'view', $childSposobPlatnosci['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sposoby_platnosci', 'action' => 'edit', $childSposobPlatnosci['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sposoby_platnosci', 'action' => 'delete', $childSposobPlatnosci['id']), null, __('Are you sure you want to delete # %s?', $childSposobPlatnosci['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Sposob Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
