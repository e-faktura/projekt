<div class="typy view">
<h2><?php  echo __('Typ'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($typ['Typ']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($typ['Typ']['nazwa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Typ'), array('action' => 'edit', $typ['Typ']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Typ'), array('action' => 'delete', $typ['Typ']['id']), null, __('Are you sure you want to delete # %s?', $typ['Typ']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Typy'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Typ'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Typy'), array('controller' => 'typy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Typ'), array('controller' => 'typy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Faktury'); ?></h3>
	<?php if (!empty($typ['Faktura'])): ?>
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
		foreach ($typ['Faktura'] as $faktura): ?>
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
	<h3><?php echo __('Related Typy'); ?></h3>
	<?php if (!empty($typ['ChildTyp'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($typ['ChildTyp'] as $childTyp): ?>
		<tr>
			<td><?php echo $childTyp['id']; ?></td>
			<td><?php echo $childTyp['parent_id']; ?></td>
			<td><?php echo $childTyp['nazwa']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'typy', 'action' => 'view', $childTyp['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'typy', 'action' => 'edit', $childTyp['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'typy', 'action' => 'delete', $childTyp['id']), null, __('Are you sure you want to delete # %s?', $childTyp['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Typ'), array('controller' => 'typy', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
