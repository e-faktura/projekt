<div class="jednostki view">
<h2><?php  echo __('Jednostka'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($jednostka['Jednostka']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Jednostka'); ?></dt>
		<dd>
			<?php echo $this->Html->link($jednostka['ParentJednostka']['id'], array('controller' => 'jednostki', 'action' => 'view', $jednostka['ParentJednostka']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nazwa'); ?></dt>
		<dd>
			<?php echo h($jednostka['Jednostka']['nazwa']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Jednostka'), array('action' => 'edit', $jednostka['Jednostka']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Jednostka'), array('action' => 'delete', $jednostka['Jednostka']['id']), null, __('Are you sure you want to delete # %s?', $jednostka['Jednostka']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jednostka'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('controller' => 'jednostki', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Jednostka'), array('controller' => 'jednostki', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Jednostki'); ?></h3>
	<?php if (!empty($jednostka['ChildJednostka'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Nazwa'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($jednostka['ChildJednostka'] as $childJednostka): ?>
		<tr>
			<td><?php echo $childJednostka['id']; ?></td>
			<td><?php echo $childJednostka['parent_id']; ?></td>
			<td><?php echo $childJednostka['nazwa']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'jednostki', 'action' => 'view', $childJednostka['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'jednostki', 'action' => 'edit', $childJednostka['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'jednostki', 'action' => 'delete', $childJednostka['id']), null, __('Are you sure you want to delete # %s?', $childJednostka['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Jednostka'), array('controller' => 'jednostki', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Pozycje'); ?></h3>
	<?php if (!empty($jednostka['Pozycja'])): ?>
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
		foreach ($jednostka['Pozycja'] as $pozycja): ?>
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
