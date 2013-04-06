<div class="pozycje view">
<h2><?php  echo __('Pozycja'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pozycja['Pozycja']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Faktura'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pozycja['Faktura']['id'], array('controller' => 'faktury', 'action' => 'view', $pozycja['Faktura']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Produkt'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pozycja['Produkt']['id'], array('controller' => 'produkty', 'action' => 'view', $pozycja['Produkt']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ilosc'); ?></dt>
		<dd>
			<?php echo h($pozycja['Pozycja']['ilosc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Jednostka'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pozycja['Jednostka']['id'], array('controller' => 'jednostki', 'action' => 'view', $pozycja['Jednostka']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pozycja'), array('action' => 'edit', $pozycja['Pozycja']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pozycja'), array('action' => 'delete', $pozycja['Pozycja']['id']), null, __('Are you sure you want to delete # %s?', $pozycja['Pozycja']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Produkty'), array('controller' => 'produkty', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Produkt'), array('controller' => 'produkty', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jednostki'), array('controller' => 'jednostki', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Jednostka'), array('controller' => 'jednostki', 'action' => 'add')); ?> </li>
	</ul>
</div>
