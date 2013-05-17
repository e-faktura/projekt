<div class="klienci form">
<?php echo $this->Form->create('Klient'); ?>
	<fieldset>
		<legend>Edycja danych klienta: <?php echo $this->request->data['Klient']['nazwa']; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nazwa');
		echo $this->Form->input('adres');
		
		$disable_nip = false;
		if( !empty($this->request->data['Klient']['nip']) ){
			$disable_nip = true;
			echo $this->Form->hidden('nip');
		}
		
		echo $this->Form->input('nip', array( 'label' => 'NIP', 'disabled' => $disable_nip ));
		echo $this->Form->input('email');
		echo $this->Form->input('telefon');
	?>
	</fieldset>
<?php
	
	echo $this->Form->submit('Zapisz', array( 'after' => $this->Html->link('Anuluj', array('action' => 'index'), array( 'class' => 'btn btn-primary') )));
	
	echo $this->Form->end();
	
?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Klient.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Klient.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('controller' => 'klienci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Klient'), array('controller' => 'klienci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
