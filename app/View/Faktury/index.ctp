<div class="faktury index">
	<?php echo $this->element('FakturaIndex.css', array( 'statusy' => $statusy )); ?>
	
	<h2><?php echo __('Faktury'); ?></h2>
	
	<?php echo $this->Html->link('Nowa faktura', array('action' => 'nowa'), array( 'class' => 'btn btn-primary btn-large' )); ?>
	
		 

	<table class="table table-striped table-bordered table-hover table-condensed" cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				
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
				
				<td><?php echo h($faktura['Faktura']['numer']); ?>&nbsp;</td>
				<td><?php echo $this->Time->format('d-m-Y', $faktura['Faktura']['data_wystawienia']); ?>&nbsp;</td>
				<td><?php echo h($faktura['Typ']['nazwa']); ?>&nbsp;</td>
				
				<td>
					<div class="btn-group">
						<a class="btn btn-mini btn-stat<?php echo $faktura['Status']['id']; ?> dropdown-toggle" data-toggle="dropdown" href="#">
							<?php echo $faktura['Status']['nazwa']; ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<?php
								foreach( $statusy as $status ){
									echo '<li>'.$this->Form->postLink($status['Status']['nazwa'], array('action' => 'edycja', $faktura['Faktura']['id'], $status['Status']['id'] )).'</li>';
								}
							?>
						</ul>
					</div>
				</td>
				
				<td><?php echo h($faktura['Klient']['nazwa']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link('<i class="icon-eye-open"></i> Podgląd', array('action' => 'podglad', $faktura['Faktura']['id']), array( 'escape' => false, 'class' => 'btn btn-primary btn-small' )); ?>
					<?php echo $this->Html->link('<i class="icon-file"></i> PDF', array('action' => 'pdf', 'ext' => 'pdf', $faktura['Faktura']['id'], 'faktura-'.str_replace('/', '-', $faktura['Faktura']['numer'])), array( 'escape' => false, 'class' => 'btn btn-primary btn-small' )); ?>
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

