<div class="uzytkownicy index">
	<h2>Użytkownicy</h2>
	
	<?php echo $this->Html->link('Nowy użytkownik', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
			<th><?php echo $this->Paginator->sort('login'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('rola_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($uzytkownicy as $uzytkownik): ?>
	<tr>
		
		<td><?php echo $this->Html->link(h($uzytkownik['Uzytkownik']['nazwa']), array('action' => 'edit', $uzytkownik['Uzytkownik']['id'])); ?>&nbsp;</td>
		<td><?php echo h($uzytkownik['Uzytkownik']['login']); ?>&nbsp;</td>
		<td><?php echo h($uzytkownik['Uzytkownik']['email']); ?>&nbsp;</td>
		<td><?php echo h($uzytkownik['Rola']['nazwa']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $uzytkownik['Uzytkownik']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $uzytkownik['Uzytkownik']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'delete', $uzytkownik['Uzytkownik']['id']), array( 'escape' => false, 'class' => 'btn btn-danger btn-small' ), __('Are you sure you want to delete # %s?', $uzytkownik['Uzytkownik']['id'])); ?>
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

