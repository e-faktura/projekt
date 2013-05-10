<div class="faktury view">
<h2><?php  echo __('Faktura'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($faktura['Faktura']['id']); ?>
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
			<?php echo h($faktura['Typ']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($faktura['Status']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Klient'); ?></dt>
		<dd>
			<?php echo h($faktura['Klient']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sposob Platnosci'); ?></dt>
		<dd>
			<?php echo h($faktura['SposobPlatnosci']['nazwa']); ?>
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
	<h3>Pozycje</h3>

	<?php if (!empty($faktura['Pozycja'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Lp.</th>
		<th>Produkt</th>
		<th>Ilosc</th>
		<th>Jednostka</th>
		<th>Cena netto</th>
		<th>Cena brutto</th>
	</tr>
	<?php
		$i = 1;
		foreach ($faktura['Pozycja'] as $pozycja): ?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $pozycja['Produkt']['nazwa']; ?></td>
			<td><?php echo $pozycja['ilosc']; ?></td>
			<td><?php echo $pozycja['Jednostka']['nazwa']; ?></td>
			<td><?php echo $pozycja['Produkt']['cena_netto'] ?></td>
			<td><?php echo $pozycja['Produkt']['cena_brutto'] ?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
