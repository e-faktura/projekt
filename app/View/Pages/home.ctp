<div style="display:none">
	<?php

	if (!Configure::read('debug')):
		throw new NotFoundException();
	endif;
	App::uses('Debugger', 'Utility');
	?>
	<h2><?php echo __d('cake_dev', 'Release Notes for CakePHP %s.', Configure::version()); ?></h2>
	<p>
		<a href="http://cakephp.org/changelogs/<?php echo Configure::version(); ?>"><?php echo __d('cake_dev', 'Read the changelog'); ?> </a>
	</p>
	<?php
	if (Configure::read('debug') > 0):
		Debugger::checkSecurityKeys();
	endif;
	?>
	<p id="url-rewriting-warning" style="background-color:#e32; color:#fff;">
		<?php echo __d('cake_dev', 'URL rewriting is not properly configured on your server.'); ?>
		1) <a target="_blank" href="http://book.cakephp.org/2.0/en/installation/url-rewriting.html" style="color:#fff;">Help me configure it</a>
		2) <a target="_blank" href="http://book.cakephp.org/2.0/en/development/configuration.html#cakephp-core-configuration" style="color:#fff;">I don't / can't use URL rewriting</a>
	</p>
	<p>
	<?php
		if (version_compare(PHP_VERSION, '5.2.8', '>=')):
			echo '<span class="notice success">';
				echo __d('cake_dev', 'Your version of PHP is 5.2.8 or higher.');
			echo '</span>';
		else:
			echo '<span class="notice">';
				echo __d('cake_dev', 'Your version of PHP is too low. You need PHP 5.2.8 or higher to use CakePHP.');
			echo '</span>';
		endif;
	?>
	</p>
	<p>
		<?php
			if (is_writable(TMP)):
				echo '<span class="notice success">';
					echo __d('cake_dev', 'Your tmp directory is writable.');
				echo '</span>';
			else:
				echo '<span class="notice">';
					echo __d('cake_dev', 'Your tmp directory is NOT writable.');
				echo '</span>';
			endif;
		?>
	</p>
	<p>
		<?php
			$settings = Cache::settings();
			if (!empty($settings)):
				echo '<span class="notice success">';
					echo __d('cake_dev', 'The %s is being used for core caching. To change the config edit APP/Config/core.php ', '<em>'. $settings['engine'] . 'Engine</em>');
				echo '</span>';
			else:
				echo '<span class="notice">';
					echo __d('cake_dev', 'Your cache is NOT working. Please check the settings in APP/Config/core.php');
				echo '</span>';
			endif;
		?>
	</p>
	<p>
		<?php
			$filePresent = null;
			if (file_exists(APP . 'Config' . DS . 'database.php')):
				echo '<span class="notice success">';
					echo __d('cake_dev', 'Your database configuration file is present.');
					$filePresent = true;
				echo '</span>';
			else:
				echo '<span class="notice">';
					echo __d('cake_dev', 'Your database configuration file is NOT present.');
					echo '<br/>';
					echo __d('cake_dev', 'Rename APP/Config/database.php.default to APP/Config/database.php');
				echo '</span>';
			endif;
		?>
	</p>
	<?php
	if (isset($filePresent)):
		App::uses('ConnectionManager', 'Model');
		try {
			$connected = ConnectionManager::getDataSource('default');
		} catch (Exception $connectionError) {
			$connected = false;
			$errorMsg = $connectionError->getMessage();
			if (method_exists($connectionError, 'getAttributes')) {
				$attributes = $connectionError->getAttributes();
				if (isset($errorMsg['message'])) {
					$errorMsg .= '<br />' . $attributes['message'];
				}
			}
		}
	?>
	<p>
		<?php
			if ($connected && $connected->isConnected()):
				echo '<span class="notice success">';
		 			echo __d('cake_dev', 'Cake is able to connect to the database.');
				echo '</span>';
			else:
				echo '<span class="notice">';
					echo __d('cake_dev', 'Cake is NOT able to connect to the database.');
					echo '<br /><br />';
					echo $errorMsg;
				echo '</span>';
			endif;
		?>
	</p>
	<?php endif; ?>
	<?php
		App::uses('Validation', 'Utility');
		if (!Validation::alphaNumeric('cakephp')) {
			echo '<p><span class="notice">';
				echo __d('cake_dev', 'PCRE has not been compiled with Unicode support.');
				echo '<br/>';
				echo __d('cake_dev', 'Recompile PCRE with Unicode support by adding <code>--enable-unicode-properties</code> when configuring');
			echo '</span></p>';
		}
	?>

	<p>
		<?php
			if (CakePlugin::loaded('DebugKit')):
				echo '<span class="notice success">';
					echo __d('cake_dev', 'DebugKit plugin is present');
				echo '</span>';
			else:
				echo '<span class="notice">';
					echo __d('cake_dev', 'DebugKit is not installed. It will help you inspect and debug different aspects of your application.');
					echo '<br/>';
					echo __d('cake_dev', 'You can install it from %s', $this->Html->link('github', 'https://github.com/cakephp/debug_kit'));
				echo '</span>';
			endif;
		?>
	</p>
</div>
</p>
    <div id="myCarousel" class="carousel slide">
    <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Carousel items -->
    <div class="carousel-inner">
    	<div class="active item">
    	<img src="http://www.automatycznafaktura.pl/upload/rotator/2_rotator_image_path_img1.jpg" alt="">
          <p class="lead" id="napis">Proste w użyciu.</p>
    	</div>

    	<div class="item">
    	<img src="http://www.automatycznafaktura.pl/upload/rotator/3_rotator_image_path_img2.jpg" alt="">
          <p class="lead" id="napis">Slajd 2 Napis.</p>
    	</div>

	<div class="item">
    	<img src="http://www.automatycznafaktura.pl/upload/rotator/4_rotator_image_path_img3.jpg">
	  <p class="lead" id="napis">Slajd 3 Napis.</p>
	</div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>

<hr>

<div class="row-fluid">
        <div class="span4">
          	<h2 class="muted">Srebrny</h2>
		<p><span class="label">POPULAR</span></p>
			<ul>
				<li>10 users</li>
				<li>Unlimited access</li>
				<li>3TB of space</li>
				<li>E-mail support</li>
			</ul>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
		<hr>
		<h3>$15.99 / month</h3>
		<hr>
		<p><a class="btn btn-large" href="#"><i class="icon-ok"></i> Wybierz pakiet</a></p>
        </div>
        <div class="span4">
          	<h2 class="text-warning">Brązowy</h2>
		<p><span class="label label-success">POPULAR</span></p>
			<ul>
				<li>20 users</li>
				<li>Unlimited access with no limits</li>
				<li>5TB of space</li>
			</ul>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
		<hr>
		<h3>$10.99 / month</h3>
		<hr>
		<p><a class="btn btn-success btn-large" href="#"><i class="icon-ok"></i> Wybierz pakiet</a></p>
       </div>
        <div class="span4">
          	<h2 class="text-info">Ekonomiczny</h2>
		<p><span class="label label-info">BUDGET</span></p>
			<ul>
				<li>10 users</li>
				<li>5TB of space</li>
			</ul>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
		<hr>
		<h3>$8.99 / month</h3>
		<hr>
		<p><a class="btn btn-info btn-large" href="#"><i class="icon-ok"></i> Wybierz pakiet</a></p>
        </div>
      </div>

<script>
        !function ($) {
          $(function(){
            $('.carousel').carousel()
          })
        }(window.jQuery)
</script>
