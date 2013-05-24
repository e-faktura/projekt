<style type="text/css">
	<?php
		
		if( isset($statusy) && !empty($statusy) ){
			foreach ($statusy as $status) {
				
			
	?>
	
	.btn-stat<?php echo $status['Status']['id']; ?>.active{
	  color: rgba(255, 255, 255, 0.75);
	}
	.btn-stat<?php echo $status['Status']['id']; ?> {
	  color: #ffffff;
	  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
	  background-color: <?php echo $status['Status']['kolor']; ?>;
	  background-image: -moz-linear-gradient(top, <?php echo $status['Status']['kolor']; ?>, <?php echo $status['Status']['kolor']; ?>);
	  background-image: -webkit-gradient(linear, 0 0, 0 100%, from(<?php echo $status['Status']['kolor']; ?>), to(<?php echo $status['Status']['kolor']; ?>));
	  background-image: -webkit-linear-gradient(top, <?php echo $status['Status']['kolor']; ?>, <?php echo $status['Status']['kolor']; ?>);
	  background-image: -o-linear-gradient(top, <?php echo $status['Status']['kolor']; ?>, <?php echo $status['Status']['kolor']; ?>);
	  background-image: linear-gradient(to bottom, <?php echo $status['Status']['kolor']; ?>, <?php echo $status['Status']['kolor']; ?>);
	  background-repeat: repeat-x;
	  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='<?php echo $status['Status']['kolor']; ?>', endColorstr='<?php echo $status['Status']['kolor']; ?>', GradientType=0);
	  border-color: <?php echo $status['Status']['kolor']; ?> <?php echo $status['Status']['kolor']; ?> <?php echo $status['Status']['kolor']; ?>;
	  border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
	  *background-color: <?php echo $status['Status']['kolor']; ?>;
	  /* Darken IE7 buttons by default so they stand out more given they won't have borders */

	  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
	}
	.btn-stat<?php echo $status['Status']['id']; ?>:hover,
	.btn-stat<?php echo $status['Status']['id']; ?>:focus,
	.btn-stat<?php echo $status['Status']['id']; ?>:active,
	.btn-stat<?php echo $status['Status']['id']; ?>.active,
	.btn-stat<?php echo $status['Status']['id']; ?>.disabled,
	.btn-stat<?php echo $status['Status']['id']; ?>[disabled] {
	  color: #ffffff;
	  background-color: <?php echo $status['Status']['kolor']; ?>;
	  *background-color: <?php echo $status['Status']['kolor']; ?>;
	}
	.btn-stat<?php echo $status['Status']['id']; ?>:active,
	.btn-stat<?php echo $status['Status']['id']; ?>.active {
	  background-color: <?php echo $status['Status']['kolor']; ?> \9;
	}
	.btn-group.open .btn-stat<?php echo $status['Status']['id']; ?>.dropdown-toggle {
	  background-color: <?php echo $status['Status']['kolor']; ?>;
	}
	.btn-stat<?php echo $status['Status']['id']; ?> .caret{
	  border-top-color: #ffffff;
	  border-bottom-color: #ffffff;
	}
	
	<?php
			}
		}
	?>
</style>