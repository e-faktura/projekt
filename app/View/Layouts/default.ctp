<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', '-faktura');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap-responsive');
		echo $this->Html->css('efaktura');
		
		echo $this->Html->script('jquery');
		echo $this->Html->script('bootstrap-transition');
		echo $this->Html->script('bootstrap-carousel');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<div class="masthead">
			
			<h3 class="muted">
				<span id="logo_e">e</span><span id="logo_text">-Faktura</span><span id="info">Twoje faktury online</span>
			</h3>
			
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<?php
								
								$ustawienia = array( 'ustawienia', 'uzytkownicy', 'role', 'jednostki', 'sposoby_platnosci', 'statusy', 'typy', 'vat');
								
								echo '<li';
								if ( strpos($title_for_layout, 'Home') === 0 )
									echo ' class="active"';
								echo '>'.$this->Html->link('<i class="icon-home"></i> '.__('Home'), '/', array('escape' => false)).'</li>';
								
								echo '<li';
								if ( $this->params['controller'] == 'faktury' )
									echo ' class="active"';
								echo '>'.$this->Html->link('<i class="icon-file"></i> Faktury', array('controller' => 'faktury', 'action' => 'index'), array('escape' => false)).'</li>';
								
								echo '<li';
								if ( $this->params['controller'] == 'klienci' )
									echo ' class="active"';
								echo '>'.$this->Html->link('<i class="icon-user"></i> Klienci', array('controller' => 'klienci', 'action' => 'index'), array('escape' => false)).'</li>';

								echo '<li';
								if ( $this->params['controller'] == 'produkty' )
									echo ' class="active"';
								echo '>'.$this->Html->link('<i class="icon-barcode"></i> Produkty', array('controller' => 'produkty', 'action' => 'index'), array('escape' => false)).'</li>';
								
								echo '<li';
								if ( in_array($this->params['controller'], $ustawienia) )
									echo ' class="active"';
								echo '>'.$this->Html->link('<i class="icon-wrench"></i> Ustawienia', array('controller' => 'ustawienia', 'action' => 'index'), array('escape' => false)).'</li>';
							?>
						</ul>
					</div>
				</div>
			</div><!-- /.navbar -->
		</div>

		<div id="content">
			<?php
				if( in_array($this->params['controller'], $ustawienia) ){
					echo $this->element('UstawieniaMenu');
				}
			?>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
	</div>
		<div id="footer">
			<div class="container">
        		  <p class="muted credit"> Copyright © 2013 e-Faktura</p>
      			</div>
		</div>
	<?php
		// echo $this->element('sql_dump');
	?>
</body>
</html>
