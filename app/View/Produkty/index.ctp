<div class="produkty index">
	<h2><?php echo __('Produkty'); ?></h2>
	
	<?php echo $this->Html->link('Nowy produkt', array('action' => 'nowy'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				
				<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
				<th><?php echo $this->Paginator->sort('cena_netto'); ?></th>
				<th><?php echo $this->Paginator->sort('cena_brutto'); ?></th>
				<th><?php echo $this->Paginator->sort('vat_id'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
	<?php foreach ($produkty as $produkt): ?>
	<tr>
		
		<td><?php echo $this->Html->link($produkt['Produkt']['nazwa'], array('action' => 'edycja', $produkt['Produkt']['id'])); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['cena_netto']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Produkt']['cena_brutto']); ?>&nbsp;</td>
		<td><?php echo h($produkt['Vat']['nazwa']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $produkt['Produkt']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edycja', $produkt['Produkt']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'usuniecie', $produkt['Produkt']['id']), array( 'escape' => false, 'class' => 'btn btn-danger btn-small' ), __('Are you sure you want to delete # %s?', $produkt['Produkt']['id'])); ?>
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

