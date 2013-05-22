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
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('efaktura');
		
		echo $this->Html->script('jquery');
		echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
				
		<div class="row-fluid">
			
			<div class="span8">
				<div id="naglowek">
					<h3 class="muted">
						<span id="logo_e">e</span><span id="logo_text">-Faktura</span><span id="info">Twoje faktury online</span>
					</h3>
				</div>
			</div>
			
			<div class="span4">
				<div id="login_info">
					<?php if(AuthComponent::user()){ ?>
						Zalogowano jako: <?php echo $this->Html->link( AuthComponent::user('nazwa'), array('controller'=>'uzytkownicy', 'action'=>'logout'), array('title'=>'Wyloguj') ); ?>
					<?php } else { ?>
						<?php echo $this->Html->link( 'Zaloguj się', array('controller'=>'uzytkownicy', 'action'=>'login') ); ?>
					
					<?php } ?>
				</div>
			</div>
			
		</div>
		
		<div class="row-fluid">
			
			<div class="span12">
				<div class="navbar">
					<div class="navbar-inner">
						<div class="container">
							<ul class="nav">
								<?php
									
									$ustawienia = array();
									if(AuthComponent::user()){
										$ustawienia = array( 'ustawienia', 'uzytkownicy', 'role', 'jednostki', 'sposoby_platnosci', 'statusy', 'typy', 'vat');
									}
									
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
		</div>
		
		<?php
			if( in_array($this->params['controller'], $ustawienia) ){
		?>
				<div class="row-fluid">
					<div class="span12">
						<?php echo $this->element('UstawieniaMenu'); ?>
					</div>
				</div>
		<?php
			}
		?>
		
		<?php
			echo $this->Session->flash('flash', array( 'params' => array( 'class' => 'alert') ));
			echo $this->Session->flash('auth', array( 'params' => array( 'class' => 'alert alert-error') ));
		?>
		
		
		<!--
		<div class="row-fluid">
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
			<div class="span1"></div>
		</div>
		
		<style type="text/css">.span1{background-color: gray;}</style>
	 	-->
		
		<div class="row-fluid">
			<div class="span12">
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
		
		
	
	</div>
	
	<footer class="container-fluid">
		<p class="muted">Copyright &copy; 2013 e-Faktura</p>
	</footer>

	<?php
		// echo $this->element('sql_dump');
	?>

</body>
</html>
