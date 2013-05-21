<div class="pozycje index">
	<h2><?php echo __('Pozycje'); ?></h2>
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('faktura_id'); ?></th>
			<th><?php echo $this->Paginator->sort('produkt_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ilosc'); ?></th>
			<th><?php echo $this->Paginator->sort('jednostka_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pozycje as $pozycja): ?>
	<tr>
		<td><?php echo h($pozycja['Pozycja']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pozycja['Faktura']['id'], array('controller' => 'faktury', 'action' => 'view', $pozycja['Faktura']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($pozycja['Produkt']['id'], array('controller' => 'produkty', 'action' => 'view', $pozycja['Produkt']['id'])); ?>
		</td>
		<td><?php echo h($pozycja['Pozycja']['ilosc']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pozycja['Jednostka']['id'], array('controller' => 'jednostki', 'action' => 'view', $pozycja['Jednostka']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pozycja['Pozycja']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pozycja['Pozycja']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pozycja['Pozycja']['id']), null, __('Are you sure you want to delete # %s?', $pozycja['Pozycja']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="pagination">
		<ul>
			<?php
				echo $this->Paginator->prev('&lt; ' . __('previous'), array('tag' => 'li', 'escape' => false), '<span>&lt; ' . __('previous').'</span>', array('class' => 'disabled', 'tag' => 'li', 'escape' => false ));
				echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'span'));
				echo $this->Paginator->next(__('next') . ' &gt;', array('tag' => 'li', 'escape' => false), '<span>'.__('next') . ' &gt;</span>', array('class' => 'disabled', 'tag' => 'li', 'escape' => false));
			?>
		</ul>
	</div>
</div>

