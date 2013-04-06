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

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
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

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>			
</head>
<body>
    <div class="container">
      <div class="masthead">
        <h3 class="muted" "><font id="logo_e">e</font><font id="logo_text">-Faktura</font></h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="/projekt">Home</a></li>
                <li><a href="/projekt/faktury">Faktury</a></li>
                <li><a href="/projekt/klienci">Kontrachenci</a></li>
                <li><a href="/projekt/produkty">Magazyn</a></li>
                <li><a href="#">Ustawienia</a></li>
                <li><a href="#">Kontakt</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
