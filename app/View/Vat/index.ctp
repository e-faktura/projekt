<div class="vat index">
	<h2>Stawki VAT</h2>
	
	<?php echo $this->Html->link('Nowa stawka VAT', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('nazwa', 'Stawka'); ?></th>
			<th><?php echo $this->Paginator->sort('wartosc', 'Wartość'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vat as $vat): ?>
	<tr>
		
		<td><?php echo $this->Html->link(h($vat['Vat']['nazwa']), array('action' => 'edit', $vat['Vat']['id'])); ?>&nbsp;</td>
		<td><?php echo h($vat['Vat']['wartosc']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $vat['Vat']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $vat['Vat']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $vat['Vat']['id']), array( 'escape' => false, 'class' => 'btn btn-danger btn-small' ), __('Are you sure you want to delete # %s?', $vat['Vat']['id'])); ?>
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

