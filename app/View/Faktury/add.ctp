<?php
	// print_r($this);
?>
<div class="faktury form">
	<?php echo $this->Form->create('Faktura'); ?>
		<fieldset>
			<legend><?php echo __('Add Faktura'); ?></legend>
		<?php
			echo $this->Form->input('numer', array( 'default' => $numer, 'disabled' => true ));
			echo $this->Form->input('data_wystawienia', array( 'label' => 'Data wystawienia', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
			echo $this->Form->input('data_sprzedazy', array( 'label' => 'Data sprzedaży', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
			echo $this->Form->input('typ_id');
			echo $this->Form->input('status_id');
			echo $this->Form->input('klient_id');
			echo $this->Form->input('sposob_platnosci_id', array( 'label' => 'Sposób płatności'));
			echo $this->Form->input('termin_platnosci', array( 'label' => 'Termin płatności', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
		?>
		</fieldset>
	

		<table class="table table-bordered">
			<tr>
				<th>Lp.</th>
				<th>Nazwa produktu</th>
				<th>Ilość</th>
				<th>Jm</th>
				<th>Cena netto</th>
				<th>VAT</th>
				<th>Kwota netto</th>
				<th>Kwota VAT</th>
				<th>Kwota brutto</th>
			</tr>
			<tr>
				<td>1.</td>
				<td><?php echo $this->Form->input('produkt'); ?></td>
				<td><?php echo $this->Form->input('ilosc'); ?></td>
				<td><?php echo $this->Form->input('jednostka'); ?></td>
				<td><?php echo $this->Form->input('cena_netto'); ?></td>
				<td><?php echo $this->Form->input('vat'); ?></td>
				<td><?php echo $this->Form->input('kwota_netto'); ?></td>
				<td><?php echo $this->Form->input('kwota_vat'); ?></td>
				<td><?php echo $this->Form->input('kwota_brutto'); ?></td>
			</tr>
		</table>
	
	<?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Faktury'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Typy'), array('controller' => 'typy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Typ'), array('controller' => 'typy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Statusy'), array('controller' => 'statusy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Status'), array('controller' => 'statusy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('controller' => 'klienci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Klient'), array('controller' => 'klienci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sposoby Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sposob Platnosci'), array('controller' => 'sposoby_platnosci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pozycje'), array('controller' => 'pozycje', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pozycja'), array('controller' => 'pozycje', 'action' => 'add')); ?> </li>
	</ul>
</div>
