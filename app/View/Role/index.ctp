<div class="role index">
	<h2><?php echo __('Role'); ?></h2>
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($role as $rola): ?>
	<tr>
		<td><?php echo h($rola['Rola']['id']); ?>&nbsp;</td>
		<td><?php echo h($rola['Rola']['nazwa']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rola['Rola']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rola['Rola']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rola['Rola']['id']), null, __('Are you sure you want to delete # %s?', $rola['Rola']['id'])); ?>
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

