<?php
	
	if( AuthComponent::user() ){
	
		$tabs = array(
			'ustawienia' => '<i class="icon-globe"></i> Główne',
			'uzytkownicy' => '<i class="icon-user"></i> Użytkownicy',
			// 'role' => '<i class="icon-eye-close"></i> Role',
			'jednostki' => '<i class="icon-tasks"></i> Jednostki miary',
			'sposoby_platnosci' => '<i class="icon-briefcase"></i> Sposoby płatności',
			'statusy' => '<i class="icon-th-list"></i> Statusy faktur',
			'typy' => '<i class="icon-tags"></i> Typy faktur',
			'vat' => '<i class="icon-shopping-cart"></i> Stawki VAT',
		);
	?>
	
	
	<ul class="nav nav-tabs">
		<?php
			foreach( $tabs as $cont => $tab ){
				echo '<li'.(( $this->params['controller'] == $cont ) ? ' class="active"' : '').'>'.$this->Html->link($tab, array( 'controller' => $cont, 'action' => 'index' ), array( 'escape' => false) ).'</li>';
			}
		?>
	</ul>

<?php } ?>