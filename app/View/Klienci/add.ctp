<div class="klienci form">
<?php echo $this->Form->create('Klient'); ?>
	<fieldset>
		<legend><?php echo __('Add Klient'); ?></legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('adres');
		echo $this->Form->input('nip');
		echo $this->Form->input('email');
		echo $this->Form->input('telefon');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Klienci'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Klienci'), array('controller' => 'klienci', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Klient'), array('controller' => 'klienci', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
