<div class="row-fluid">
	<div class="span10 offset1">
		<div id="myCarousel" class="carousel slide">
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>
			<!-- Carousel items -->
			<div class="carousel-inner">
				<div class="active item">
					<?php echo $this->Html->image('slider_1.jpg'); ?>
					<p class="lead napis">Bezpieczeństwo</p>
				</div>

				<div class="item">
					<?php echo $this->Html->image('slider_2.jpg'); ?>
					<p class="lead napis">Innowacja</p>
				</div>

				<div class="item">
					<?php echo $this->Html->image('slider_3.jpg'); ?>
					<p class="lead napis">Rzetelność</p>
				</div>
			</div>
			<!-- Carousel nav -->
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		</div>
	</div>
</div>

<hr>

<div class="row-fluid" style="display:none">
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

<script type="text/javascript">

	$(document).ready(function() {
		$('.carousel').carousel()
	});

</script>
