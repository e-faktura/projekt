<?php
	if( isset($vat_json) && !empty($vat_json) ){
?>
	<script type="text/javascript">
		$(document).ready(function() {
			
			var vat = <?php echo $vat_json; ?>;
			
			$('#ProduktCenaNetto').off('input').on('input', UpdateCenaBrutto);
			$('#ProduktVatId').off('change').on('change', UpdateCenaBrutto);
			
			
			function UpdateCenaBrutto(){
				var cena_netto = $('#ProduktCenaNetto').val();
				
				if( parseFloat(cena_netto) >= 0.00 ){
					var selcted_vat = $('#ProduktVatId').val();
					
					var cena_brutto = ((parseFloat(vat[selcted_vat])+1) * parseFloat(cena_netto)).toFixed(2);
					
					$('#ProduktCenaBrutto').val(cena_brutto);
				}
			}
			
			UpdateCenaBrutto();
			
		});
	</script>
<?php } ?>