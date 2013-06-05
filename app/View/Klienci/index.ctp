<div class="klienci index">
	<h2><?php echo __('Klienci'); ?></h2>
	
	<?php echo $this->Html->link('Nowy klient', array('action' => 'nowy'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	

	

	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				
				<th><?php echo $this->Paginator->sort('nazwa'); ?></th>
				<th><?php echo $this->Paginator->sort('adres'); ?></th>
				<th><?php echo $this->Paginator->sort('nip'); ?></th>
				<th><?php echo $this->Paginator->sort('email'); ?></th>
				<th><?php echo $this->Paginator->sort('telefon'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
	<?php foreach ($klienci as $klient): ?>
	<tr>
		
		<td><?php echo $this->Html->link($klient['Klient']['nazwa'], array('action' => 'edycja', $klient['Klient']['id'])); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['adres']); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['nip']); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['email']); ?>&nbsp;</td>
		<td><?php echo h($klient['Klient']['telefon']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $klient['Klient']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edycja', $klient['Klient']['id'])); ?>
			<?php echo $this->Form->postLink('<i class="icon-trash"></i> Usuń', array('action' => 'usuniecie', $klient['Klient']['id']), array( 'escape' => false, 'class' => 'btn btn-danger btn-small' ), __('Are you sure you want to delete # %s?', $klient['Klient']['id'])); ?>
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

