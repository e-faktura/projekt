<div class="faktury index">
	<h2><?php echo __('Faktury'); ?></h2>
	
	<?php echo $this->Html->link('Nowa faktura', array('action' => 'add'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
		 

	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('id'); ?></th>
				<th><?php echo $this->Paginator->sort('numer'); ?></th>
				<th><?php echo $this->Paginator->sort('data_wystawienia'); ?></th>
				<th><?php echo $this->Paginator->sort('typ_id'); ?></th>
				<th><?php echo $this->Paginator->sort('status_id'); ?></th>
				<th><?php echo $this->Paginator->sort('klient_id'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		<?php foreach ($faktury as $faktura): ?>
			<tr>
				<td><?php echo h($faktura['Faktura']['id']); ?>&nbsp;</td>
				<td><?php echo h($faktura['Faktura']['numer']); ?>&nbsp;</td>
				<td><?php echo h($faktura['Faktura']['data_wystawienia']); ?>&nbsp;</td>
				<td><?php echo h($faktura['Typ']['nazwa']); ?>&nbsp;</td>
				<td><span class="label" style="background-color: <?php echo $faktura['Status']['kolor']; ?>"><?php echo h($faktura['Status']['nazwa']); ?></span>&nbsp;</td>
				<td><?php echo h($faktura['Klient']['nazwa']); ?>&nbsp;</td>
				<td class="actions">
					<?php //echo $this->Html->link(__('View'), array('action' => 'view', $faktura['Faktura']['id'])); ?>
					<?php echo $this->Html->link('<i class="icon-edit"></i> Edytuj', array('action' => 'edit', $faktura['Faktura']['id']), array( 'escape' => false )); ?>
					<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $faktura['Faktura']['id']), null, __('Are you sure you want to delete # %s?', $faktura['Faktura']['id'])); ?>
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
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

