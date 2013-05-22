<div class="typy index">
	<h2><?php echo __('Typy'); ?></h2>
	
	<?php echo $this->Html->link('Nowy typ', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($typy as $typ): ?>
	<tr>
		<td><?php echo h($typ['Typ']['id']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link(h($typ['Typ']['nazwa']), array('action' => 'edit', $typ['Typ']['id'])); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $typ['Typ']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $typ['Typ']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $typ['Typ']['id']), array( 'escape' => false, 'class' => 'btn btn-danger btn-small' ), __('Are you sure you want to delete # %s?', $typ['Typ']['id'])); ?>
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

