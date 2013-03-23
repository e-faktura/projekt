<div class="faktury view">
<h2><?php  echo __('Faktura'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($faktura['Faktura']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Faktura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($faktura['ParentFaktura']['id'], array('controller' => 'faktury', 'action' => 'view', $faktura['ParentFaktura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numer'); ?></dt>
		<dd>
			<?php echo h($faktura['Faktura']['numer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Wystawienia'); ?></dt>
		<dd>
			<?php echo h($faktura['Faktura']['data_wystawienia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Data Sprzedazy'); ?></dt>
		<dd>
			<?php echo h($faktura['Faktura']['data_sprzedazy']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Typ'); ?></dt>
		<dd>
			<?php echo $this->Html->link($faktura['Typ']['id'], array('controller' => 'typy', 'action' => 'view', $faktura['Typ']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($faktura['Status']['id'], array('controller' => 'statusy', 'action' => 'view', $faktura['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Klient'); ?></dt>
		<dd>
			<?php echo $this->Html->link($faktura['Klient']['id'], array('controller' => 'klienci', 'action' => 'view', $faktura['Klient']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sposob Platnosci'); ?></dt>
		<dd>
			<?php echo $this->Html->link($faktura['SposobPlatnosci']['id'], array('controller' => 'sposoby_platnosci', 'action' => 'view', $faktura['SposobPlatnosci']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Termin Platnosci'); ?></dt>
		<dd>
			<?php echo h($faktura['Faktura']['termin_platnosci']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Faktura'), array('action' => 'edit', $faktura['Faktura']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Faktura'), array('action' => 'delete', $faktura['Faktura']['id']), null, __('Are you sure you want to delete # %s?', $faktura['Faktura']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Faktury'); ?></h3>
	<?php if (!empty($faktura['ChildFaktura'])): ?>
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
		foreach ($faktura['ChildFaktura'] as $childFaktura): ?>
		<tr>
			<td><?php echo $childFaktura['id']; ?></td>
			<td><?php echo $childFaktura['parent_id']; ?></td>
			<td><?php echo $childFaktura['numer']; ?></td>
			<td><?php echo $childFaktura['data_wystawienia']; ?></td>
			<td><?php echo $childFaktura['data_sprzedazy']; ?></td>
			<td><?php echo $childFaktura['typ_id']; ?></td>
			<td><?php echo $childFaktura['status_id']; ?></td>
			<td><?php echo $childFaktura['klient_id']; ?></td>
			<td><?php echo $childFaktura['sposob_platnosci_id']; ?></td>
			<td><?php echo $childFaktura['termin_platnosci']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'faktury', 'action' => 'view', $childFaktura['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'faktury', 'action' => 'edit', $childFaktura['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'faktury', 'action' => 'delete', $childFaktura['id']), null, __('Are you sure you want to delete # %s?', $childFaktura['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pozycje'); ?></h3>
	<?php if (!empty($faktura['Pozycja'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Faktura Id'); ?></th>
		<th><?php echo __('Produkt Id'); ?></th>
		<th><?php echo __('Ilosc'); ?></th>
		<th><?php echo __('Jednostka Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($faktura['Pozycja'] as $pozycja): ?>
		<tr>
			<td><?php echo $pozycja['id']; ?></td>
			<td><?php echo $pozycja['faktura_id']; ?></td>
			<td><?php echo $pozycja['produkt_id']; ?></td>
			<td><?php echo $pozycja['ilosc']; ?></td>
			<td><?php echo $pozycja['jednostka_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pozycje', 'action' => 'view', $pozycja['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pozycje', 'action' => 'edit', $pozycja['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pozycje', 'action' => 'delete', $pozycja['id']), null, __('Are you sure you want to delete # %s?', $pozycja['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
