<?php
	// print_r($this);
?>
<div class="faktury form">
	<?php echo $this->Form->create('Faktura'); ?>
		<fieldset>
			<legend>Nowa faktura</legend>
		<?php
			echo $this->Form->input('numer', array( 'default' => $numer, 'disabled' => true ));
			echo $this->Form->input('numer', array( 'default' => $numer, 'type' => 'hidden' ));
			echo $this->Form->input('data_wystawienia', array( 'label' => 'Data wystawienia', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
			echo $this->Form->input('data_sprzedazy', array( 'label' => 'Data sprzedaży', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
			echo $this->Form->input('typ_id');
			echo $this->Form->input('status_id');
			echo $this->Form->input('klient_id');
			echo $this->Form->input('sposob_platnosci_id', array( 'label' => 'Sposób płatności'));
			echo $this->Form->input('termin_platnosci', array( 'label' => 'Termin płatności', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
		?>
		</fieldset>
	

		<table class="table table-striped table-bordered table-hover table-condensed" class="table table-bordered">
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
				<td><?php echo $this->Form->input('produkt', array( 'label' => false )); ?></td>
				<td><?php echo $this->Form->input('ilosc', array( 'label' => false )); ?></td>
				<td><?php echo $this->Form->input('jednostka', array( 'label' => false )); ?></td>
				<td><?php echo $this->Form->input('cena_netto', array( 'label' => false )); ?></td>
				<td><?php echo $this->Form->input('vat', array( 'label' => false )); ?></td>
				<td><?php echo $this->Form->input('kwota_netto', array( 'label' => false )); ?></td>
				<td><?php echo $this->Form->input('kwota_vat', array( 'label' => false )); ?></td>
				<td><?php echo $this->Form->input('kwota_brutto', array( 'label' => false )); ?></td>
			</tr>
		</table>
	
		<div class="form-actions">
			<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
			<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
		</div>
	<?php echo $this->Form->end(); ?>
</div>


