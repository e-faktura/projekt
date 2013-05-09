<div class="klienci view">
<h2><?php  echo __('Klient'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($klient['Klient']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($klient['Klient']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adres'); ?></dt>
		<dd>
			<?php echo h($klient['Klient']['adres']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nip'); ?></dt>
		<dd>
			<?php echo h($klient['Klient']['nip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($klient['Klient']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefon'); ?></dt>
		<dd>
			<?php echo h($klient['Klient']['telefon']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Klient'), array('action' => 'edit', $klient['Klient']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Klient'), array('action' => 'delete', $klient['Klient']['id']), null, __('Are you sure you want to delete # %s?', $klient['Klient']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Klient'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('controller' => 'klienci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Klient'), array('controller' => 'klienci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Faktury'); ?></h3>
	<?php if (!empty($klient['Faktura'])): ?>
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
		foreach ($klient['Faktura'] as $faktura): ?>
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
	<h3><?php echo __('Related Klienci'); ?></h3>
	<?php if (!empty($klient['ChildKlient'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th><?php echo __('Adres'); ?></th>
		<th><?php echo __('Nip'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Telefon'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($klient['ChildKlient'] as $childKlient): ?>
		<tr>
			<td><?php echo $childKlient['id']; ?></td>
			<td><?php echo $childKlient['parent_id']; ?></td>
			<td><?php echo $childKlient['nazwa']; ?></td>
			<td><?php echo $childKlient['adres']; ?></td>
			<td><?php echo $childKlient['nip']; ?></td>
			<td><?php echo $childKlient['email']; ?></td>
			<td><?php echo $childKlient['telefon']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'klienci', 'action' => 'view', $childKlient['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'klienci', 'action' => 'edit', $childKlient['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'klienci', 'action' => 'delete', $childKlient['id']), null, __('Are you sure you want to delete # %s?', $childKlient['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Klient'), array('controller' => 'klienci', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
