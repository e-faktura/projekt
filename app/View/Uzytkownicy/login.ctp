<div class="uzytkownicy form">
	<h2>Logowanie</h2>
	<?php
		echo $this->Form->create('Uzytkownik', array('url' => array('controller' => 'uzytkownicy', 'action' => 'login')));
		echo $this->Form->input('Uzytkownik.login');
		echo $this->Form->input('Uzytkownik.haslo', array( 'type' => 'password', 'label' => 'Hasło' ));
	?>
	
	<div class="form-actions">
		<button type="submit" class="btn btn-primary">Zaloguj się</button>
	</div>
	
	<?php
		echo $this->Form->end();
	?>

</div>