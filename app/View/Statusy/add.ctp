<div class="statusy form">
<?php echo $this->Form->create('Status'); ?>
	<fieldset>
		<legend>Dodawanie nowego statusu</legend>
	<?php
		echo $this->Form->input('nazwa');
		echo $this->Form->input('kolor', array( 'type' => 'color' ));
	?>
	</fieldset>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';">Anuluj</button>
	</div>
	
<?php echo $this->Form->end(); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Statusy'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Statusy'), array('controller' => 'statusy', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Status'), array('controller' => 'statusy', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Faktury'), array('controller' => 'faktury', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Faktura'), array('controller' => 'faktury', 'action' => 'add')); ?> </li>
	</ul>
</div>
