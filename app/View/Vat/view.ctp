<div class="vat view">
<h2><?php  echo __('Vat'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vat['Vat']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Vat'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vat['ParentVat']['id'], array('controller' => 'vat', 'action' => 'view', $vat['ParentVat']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($vat['Vat']['nazwa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wartosc'); ?></dt>
		<dd>
			<?php echo h($vat['Vat']['wartosc']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vat'), array('action' => 'edit', $vat['Vat']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vat'), array('action' => 'delete', $vat['Vat']['id']), null, __('Are you sure you want to delete # %s?', $vat['Vat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vat'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vat'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vat'), array('controller' => 'vat', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Vat'), array('controller' => 'vat', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Produkty'); ?></h3>
	<?php if (!empty($vat['Produkt'])): ?>
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
		foreach ($vat['Produkt'] as $produkt): ?>
		<tr>
			<td><?php echo $produkt['id']; ?></td>
			<td><?php echo $produkt['parent_id']; ?></td>
			<td><?php echo $produkt['nazwa']; ?></td>
			<td><?php echo $produkt['cena_netto']; ?></td>
			<td><?php echo $produkt['ilosc']; ?></td>
			<td><?php echo $produkt['vat_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'produkty', 'action' => 'view', $produkt['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'produkty', 'action' => 'edit', $produkt['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'produkty', 'action' => 'delete', $produkt['id']), null, __('Are you sure you want to delete # %s?', $produkt['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Vat'); ?></h3>
	<?php if (!empty($vat['ChildVat'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th><?php echo __('Wartosc'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($vat['ChildVat'] as $childVat): ?>
		<tr>
			<td><?php echo $childVat['id']; ?></td>
			<td><?php echo $childVat['parent_id']; ?></td>
			<td><?php echo $childVat['nazwa']; ?></td>
			<td><?php echo $childVat['wartosc']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'vat', 'action' => 'view', $childVat['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'vat', 'action' => 'edit', $childVat['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'vat', 'action' => 'delete', $childVat['id']), null, __('Are you sure you want to delete # %s?', $childVat['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Vat'), array('controller' => 'vat', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
