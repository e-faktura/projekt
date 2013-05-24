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
				<td><?php echo date('d.m.Y', strtotime($faktura['Faktura']['data_wystawienia'])); ?>&nbsp;</td>
				<td><?php echo h($faktura['Typ']['nazwa']); ?>&nbsp;</td>
				
				<td>
					<!-- <span class="label" style="background-color: <?php echo $faktura['Status']['kolor']; ?>"><?php echo h($faktura['Status']['nazwa']); ?></span>&nbsp; -->
					<style type="text/css">
							.btn-stat<?php echo $faktura['Status']['id']; ?>.active{
							  color: rgba(255, 255, 255, 0.75);
							}
							.btn-stat<?php echo $faktura['Status']['id']; ?> {
							  color: #ffffff;
							  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
							  background-color: <?php echo $faktura['Status']['kolor']; ?>;
							  background-image: -moz-linear-gradient(top, <?php echo $faktura['Status']['kolor']; ?>, <?php echo $faktura['Status']['kolor']; ?>);
							  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $faktura['Status']['kolor']; ?>), to(<?php echo $faktura['Status']['kolor']; ?>));
							  background-image: -webkit-linear-gradient(top, <?php echo $faktura['Status']['kolor']; ?>, <?php echo $faktura['Status']['kolor']; ?>);
							  background-image: -o-linear-gradient(top, <?php echo $faktura['Status']['kolor']; ?>, <?php echo $faktura['Status']['kolor']; ?>);
							  background-image: linear-gradient(to bottom, <?php echo $faktura['Status']['kolor']; ?>, <?php echo $faktura['Status']['kolor']; ?>);
							  background-repeat: repeat-x;
							  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $faktura['Status']['kolor']; ?>', endColorstr='<?php echo $faktura['Status']['kolor']; ?>', GradientType=0);
							  border-color: <?php echo $faktura['Status']['kolor']; ?> <?php echo $faktura['Status']['kolor']; ?> <?php echo $faktura['Status']['kolor']; ?>;
							  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
							  *background-color: <?php echo $faktura['Status']['kolor']; ?>;
							  /* Darken IE7 buttons by default so they stand out more given they won't have borders */

							  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
							}
							.btn-stat<?php echo $faktura['Status']['id']; ?>:hover,
							.btn-stat<?php echo $faktura['Status']['id']; ?>:focus,
							.btn-stat<?php echo $faktura['Status']['id']; ?>:active,
							.btn-stat<?php echo $faktura['Status']['id']; ?>.active,
							.btn-stat<?php echo $faktura['Status']['id']; ?>.disabled,
							.btn-stat<?php echo $faktura['Status']['id']; ?>[disabled] {
							  color: #ffffff;
							  background-color: <?php echo $faktura['Status']['kolor']; ?>;
							  *background-color: <?php echo $faktura['Status']['kolor']; ?>;
							}
							.btn-stat<?php echo $faktura['Status']['id']; ?>:active,
							.btn-stat<?php echo $faktura['Status']['id']; ?>.active {
							  background-color: <?php echo $faktura['Status']['kolor']; ?> \9;
							}
							.btn-group.open .btn-stat<?php echo $faktura['Status']['id']; ?>.dropdown-toggle {
							  background-color: <?php echo $faktura['Status']['kolor']; ?>;
							}
							.btn-stat<?php echo $faktura['Status']['id']; ?> .caret{
							  border-top-color: #ffffff;
							  border-bottom-color: #ffffff;
							}
							
						</style>
					
					<div class="btn-group">
						<a class="btn btn-mini btn-stat<?php echo $faktura['Status']['id']; ?> dropdown-toggle" data-toggle="dropdown" href="#">
							<?php echo $faktura['Status']['nazwa']; ?>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<?php
								foreach( $statusy as $id => $status ){
									echo '<li>'.$this->Form->postLink($status, array('action' => 'edit', $faktura['Faktura']['id'], $id )).'</li>';
								}
							?>
						</ul>
					</div>
					
				
				</td>
				
				<td><?php echo h($faktura['Klient']['nazwa']); ?>&nbsp;</td>
				<td class="actions">
					<?php echo $this->Html->link('<i class="icon-eye-open"></i> Podgląd', array('action' => 'view', $faktura['Faktura']['id']), array( 'escape' => false, 'class' => 'btn btn-primary btn-small' )); ?>
					<?php //echo $this->Html->link('<i class="icon-edit"></i> Edytuj', array('action' => 'edit', $faktura['Faktura']['id']), array( 'escape' => false, 'class' => 'btn btn-primary btn-small' )); ?>
					<?php echo $this->Html->link('<i class="icon-file"></i> PDF', array('action' => 'view', 'ext' => 'pdf', $faktura['Faktura']['id'], 'dompdf', 'faktura-'.str_replace('/', '-', $faktura['Faktura']['numer'])), array( 'escape' => false, 'class' => 'btn btn-primary btn-small' )); ?>
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

