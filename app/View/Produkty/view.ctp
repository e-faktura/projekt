<div class="produkty view">
<h2><?php  echo __('Produkt'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($produkt['Produkt']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($produkt['Produkt']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cena Netto'); ?></dt>
		<dd>
			<?php echo h($produkt['Produkt']['cena_netto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ilosc'); ?></dt>
		<dd>
			<?php echo h($produkt['Produkt']['ilosc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vat'); ?></dt>
		<dd>
			<?php echo $this->Html->link($produkt['Vat']['id'], array('controller' => 'vat', 'action' => 'view', $produkt['Vat']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Produkt'), array('action' => 'edit', $produkt['Produkt']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Produkt'), array('action' => 'delete', $produkt['Produkt']['id']), null, __('Are you sure you want to delete # %s?', $produkt['Produkt']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produkt'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vat'), array('controller' => 'vat', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vat'), array('controller' => 'vat', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Pozycje'); ?></h3>
	<?php if (!empty($produkt['Pozycja'])): ?>
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
		foreach ($produkt['Pozycja'] as $pozycja): ?>
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
<div class="related">
	<h3><?php echo __('Related Produkty'); ?></h3>
	<?php if (!empty($produkt['ChildProdukt'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th><?php echo __('Cena Netto'); ?></th>
		<th><?php echo __('Ilosc'); ?></th>
		<th><?php echo __('Vat Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($produkt['ChildProdukt'] as $childProdukt): ?>
		<tr>
			<td><?php echo $childProdukt['id']; ?></td>
			<td><?php echo $childProdukt['parent_id']; ?></td>
			<td><?php echo $childProdukt['nazwa']; ?></td>
			<td><?php echo $childProdukt['cena_netto']; ?></td>
			<td><?php echo $childProdukt['ilosc']; ?></td>
			<td><?php echo $childProdukt['vat_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produkty', 'action' => 'view', $childProdukt['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produkty', 'action' => 'edit', $childProdukt['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produkty', 'action' => 'delete', $childProdukt['id']), null, __('Are you sure you want to delete # %s?', $childProdukt['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
