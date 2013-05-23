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
		th {
			background-color: #F9F9F9;
		}
		.cena{
			text-align: right !important;
		}
		
		h1,h2,h3{
			font-family: 'dejavu serif'
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
				
				<table class="table table-bordered table-condensed" >
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
					<tbody>
						<?php
							$i = 1;
							$suma = array('kwota_netto' => 0, 'kwota_vat' => 0, 'kwota_brutto' => 0);
							$vat = array();
							$total = 0;
							
							foreach( $faktura['Pozycja'] as $pozycja ){
								
								if( !isset( $vat[$pozycja['Produkt']['vat_id']] ) ) $vat[$pozycja['Produkt']['vat_id']] = array('kwota_netto' => 0, 'kwota_vat' => 0, 'kwota_brutto' => 0, 'nazwa' => $pozycja['Produkt']['Vat']['nazwa'] );
								
						?>
							<tr>
								<td><?php echo $i++; ?>.</td>
								<td><?php echo $pozycja['Produkt']['nazwa'] ?></td>
								<td><?php echo $pozycja['ilosc']; ?></td>
								<td><?php echo $pozycja['Jednostka']['nazwa']; ?></td>
								<td class="cena"><?php echo $pozycja['Produkt']['cena_netto'].' zł'; ?></td>
								<td><?php echo $pozycja['Produkt']['Vat']['nazwa']; ?></td>
								<td class="cena">
									<?php
										$kwota_netto = ((float)$pozycja['Produkt']['cena_netto'])*((float)$pozycja['ilosc']);
										echo number_format($kwota_netto, 2, '.', ' ').' zł';
										$suma['kwota_netto'] = $suma['kwota_netto'] + $kwota_netto;
										$vat[$pozycja['Produkt']['vat_id']]['kwota_netto'] = $vat[$pozycja['Produkt']['vat_id']]['kwota_netto'] + $kwota_netto;
									?>
								</td>
								<td class="cena">
									<?php
										$kwota_vat = $kwota_netto * ((float)$pozycja['Produkt']['Vat']['wartosc']);
										echo number_format($kwota_vat, 2, '.', ' ').' zł';
										$suma['kwota_vat'] = $suma['kwota_vat'] + $kwota_vat;
										$vat[$pozycja['Produkt']['vat_id']]['kwota_vat'] = $vat[$pozycja['Produkt']['vat_id']]['kwota_vat'] + $kwota_vat;
									?>
								</td>
								<td class="cena">
									<?php
										$kwota_brutto = $kwota_netto * (((float)$pozycja['Produkt']['Vat']['wartosc'])+1);
										echo number_format($kwota_brutto, 2, '.', ' ').' zł';
										$suma['kwota_brutto'] = $suma['kwota_brutto'] + $kwota_brutto;
										$vat[$pozycja['Produkt']['vat_id']]['kwota_brutto'] = $vat[$pozycja['Produkt']['vat_id']]['kwota_brutto'] + $kwota_brutto;
										
										$total = $total + $kwota_brutto;
									?>
								</td>
							</tr>
						<?php
							}
						?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="10"></td>
						</tr>
						<?php
							foreach( $vat as $v ){
						?>
								<tr>
									<td colspan="6" style="font-weight:bold;text-align:right;">VAT <?php echo $v['nazwa']; ?></td>
									<td class="cena"><?php echo number_format($v['kwota_netto'], 2, '.', ' ').' zł'; ?></td>
									<td class="cena"><?php echo number_format($v['kwota_vat'], 2, '.', ' ').' zł'; ?></td>
									<td class="cena"><?php echo number_format($v['kwota_brutto'], 2, '.', ' ').' zł'; ?></td>
								</tr>
						<?php
							}
						?>
						
						<tr>
							<td colspan="10"></td>
						</tr>
						
						<tr>
							<td colspan="6" style="font-weight:bold;text-align:right;">Razem:</td>
							<td class="cena"><?php echo number_format($suma['kwota_netto'], 2, '.', ' ').' zł'; ?></td>
							<td class="cena"><?php echo number_format($suma['kwota_vat'], 2, '.', ' ').' zł'; ?></td>
							<td class="cena"><?php echo number_format($suma['kwota_brutto'], 2, '.', ' ').' zł'; ?></td>
						</tr>
					</tfoot>
				</table>
				
				<br>
				
				<table style="width: 100%">
					<tr>
						<td style="width: 25%">&nbsp;</td>
						<td style="width: 25%">&nbsp;</td>
						<td style="width: 25%">
							Sposób płatności: <?php echo $this->Time->format('d-m-Y', $faktura['SposobPlatnosci']['nazwa']); ?>
						</td>
						<td style="width: 25%">
							Termin płatności: <?php echo $this->Time->format('d-m-Y', $faktura['Faktura']['termin_platnosci']); ?>
						</td>
					</tr>
				</table>
				
				<br>
				<br>
				
				<h2>Do zapłaty: <?php echo number_format($total, 2, '.', ' '); ?> zł</h2>
				
			</div>
		</div>
		
		
	
	
	
	</div>
	

</body>
</html>
