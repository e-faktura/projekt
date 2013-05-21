<?php
	// print_r($this->request->data);
?>
<div class="faktury form">
<?php echo $this->Form->create('Faktura'); ?>
	<fieldset>
		<legend><?php echo __('Edit Faktura'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('numer', array( 'disabled' => true ));
		echo $this->Form->input('data_wystawienia', array( 'label' => 'Data wystawienia', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
		echo $this->Form->input('data_sprzedazy', array( 'label' => 'Data sprzedaży', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
		echo $this->Form->input('typ_id');
		echo $this->Form->input('status_id');
		echo $this->Form->input('klient_id');
		echo $this->Form->input('sposob_platnosci_id', array( 'label' => 'Sposób płatności'));
		echo $this->Form->input('termin_platnosci', array( 'label' => 'Termin płatności', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

