<?php
	// pr($ustawienia);
?>
<div class="ustawienia index">
	<?php echo $this->Form->create(false); ?>
	
	<?php
		echo $this->Form->hidden('Ustawienie.0.id', array( 'value' => $ustawienia[1]['id']) );
		echo $this->Form->input('Ustawienie.0.wartosc', array('label'=> $ustawienia[1]['nazwa'], 'type' => 'textarea', 'value' => $ustawienia[1]['wartosc'], 'escape' => false));
	?>
	
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
		<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
