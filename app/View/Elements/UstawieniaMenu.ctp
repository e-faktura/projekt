<?php
		$tabs = array(
			'ustawienia' => 'Główne',
			'uzytkownicy' => 'Użytkownicy',
			'role' => 'Role',
			'jednostki' => 'Jednostki',
			'sposoby_platnosci' => 'Sposoby płatności',
			'statusy' => 'Statusy',
			'typy' => 'Typy',
			'vat' => 'Vat',
		);
	?>
	
	
	<ul class="nav nav-tabs">
		<?php
			foreach( $tabs as $cont => $tab ){
				echo '<li'.(( $this->params['controller'] == $cont ) ? ' class="active"' : '').'>'.$this->Html->link($tab, array( 'controller' => $cont, 'action' => 'index' ) ).'</li>';
			}
		?>
	</ul>