<?php
	// pr($faktura);
	
	$r = '<br>';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		some title
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->css('bootstrap.pdf', null, array('fullBase' => true) );
	?>
	<style type="text/css">
		td{
			vertical-align: top;
		}
		
	</style>
	
	
</head>
<body>
	<div class="container-fluid">
		
		<div class="row-fluid">
			<div class="span12">
				<h1><?php echo $faktura['Typ']['nazwa'].' nr: '.$faktura['Faktura']['numer'];	?></h1>
				<hr>
			</div>
		</div>
		
		<div class="row-fluid">
			<div class="span4 offset8" style="text-align:right">
				<p>Data wystawienia: <?php echo $this->Time->format('d-m-Y', $faktura['Faktura']['data_wystawienia']); ?><br>
					Data sprzedaży: <?php echo $this->Time->format('d-m-Y', $faktura['Faktura']['data_sprzedazy']); ?></p>
			</div>
		</div>
		
		
		<div class="row-fluid">
			<div class="span12">
				<table style="width: 100%">
					<tr>
						<td style="width:50%">
							<h3>Sprzedawca:</h3>
							<blockquote><?php echo nl2br($sprzedawca['Ustawienie']['wartosc']); ?></blockquote>
						</td>
						<td>
							<h3>Nabywca:</h3>
							<blockquote>
								<?php
									echo $faktura['Klient']['nazwa'].$r;
									echo nl2br($faktura['Klient']['adres']).$r;
									if( !empty($faktura['Klient']['nip'])) echo 'NIP:'.$faktura['Klient']['nip'].$r;
								?>
							</blockquote>
						</td>
					</tr>
				</table>
				
				<hr>
				
				<table class="table table-striped table-bordered table-hover table-condensed" >
					<thead>
						<tr>
							<th>Lp.</th>
							<th>Nazwa produktu</th>
							<th>Ilość</th>
							<th>Jm</th>
							<th>Cena netto</th>
							<th>VAT</th>
							<th>Kwota netto</th>
							<th>Kwota VAT</th>
							<th>Kwota brutto</th>
						</tr>
					</thead>
					
					<tfoot>
						<tr>
							<td colspan="10"></td>
						</tr>
						<tr>
							<td colspan="6" style="font-weight:bold;text-align:right;">Razem:</td>
							<td>0.00</td>
							<td>0.00</td>
							<td>0.00</td>
							
						</tr>
					</tfoot>
					
					<tbody>
						
					</tbody>
					
				</table>
				
				
				
			</div>
		</div>
		
		
	
	
	
	</div>
	

</body>
</html>
