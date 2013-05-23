<?php
	// pr($vat);
?>
<div class="row-fluid">
	<div class="span12">
		<?php echo $this->Form->create('Faktura'); ?>
			<fieldset>
				<legend>Nowa faktura</legend>
				
				<div class="row-fluid">
					<div class="span4">
						<?php echo $this->Form->input('typ_id'); ?>
					</div>
					
					<div class="span4 offset4">
						<?php echo $this->Form->input('data_wystawienia', array( 'label' => 'Data wystawienia', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) )); ?>
					</div>
					
				</div>
				
				<div class="row-fluid">
					<div class="span4">
						<?php
							echo $this->Form->input('numer', array( 'default' => $numer, 'disabled' => true ));
							echo $this->Form->input('numer', array( 'default' => $numer, 'type' => 'hidden' ));
						?>
					</div>
					<div class="span4 offset4">
						<?php echo $this->Form->input('data_sprzedazy', array( 'label' => 'Data sprzedaży', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) )); ?>
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span4">
						<?php echo $this->Form->input('klient_id'); ?>
					</div>
					<div class="span4 offset4">
						<?php echo $this->Form->input('status_id'); ?>
					</div>
				</div>
				
				<h3>Pozycje</h3>
								
				<div class="row-fluid">
					<div class="span12">
						<table class="table table-striped table-bordered table-hover table-condensed pozycje" >
							<thead>
								<tr>
									<th class="lp">Lp.</th>
									<th class="nazwa_produktu">Nazwa produktu</th>
									<th class="ilosc">Ilość</th>
									<th class="jednostka">Jm</th>
									<th class="cena_netto">Cena netto</th>
									<th class="stawka_vat">VAT</th>
									<th class="kwota_netto">Kwota netto</th>
									<th class="kwota_vat">Kwota VAT</th>
									<th class="kwota_brutto">Kwota brutto</th>
									<th class="usun">Usuń</th>
								</tr>
							</thead>
							
							<tfoot>
								<tr>
									<td colspan="10"></td>
								</tr>
								<tr>
									<td colspan="6" style="font-weight:bold;text-align:right;">Razem:</td>
									<td><input type="text" disabled="disabled" value="0.00" id="suma_netto"></td>
									<td><input type="text" disabled="disabled" value="0.00" id="suma_vat"></td>
									<td><input type="text" disabled="disabled" value="0.00" id="suma_brutto"></td>
									<td>&nbsp;</td>
								</tr>
								
								<?php
									
									foreach( $vat as $v ){
								?>
										<tr style="display: none;" id="suma_vat_<?php echo $v['Vat']['id']; ?>">
											<td colspan="6" style="font-weight:bold;text-align:right;">VAT <?php echo $v['Vat']['nazwa']; ?></td>
											<td><input type="text" disabled="disabled" value="0.00" class="suma_netto"></td>
											<td><input type="text" disabled="disabled" value="0.00" class="suma_vat"></td>
											<td><input type="text" disabled="disabled" value="0.00" class="suma_brutto"></td>
											<td>&nbsp;</td>
										</tr>
								
								<?php
									}
									
								?>
								
								
							</tfoot>
							
							<tbody>
								<?php
									/* echo '<tr style="display:none">
													<td class="lp"></td>
													<td class="nazwa_produktu">
														<?php echo $this->Form->input('Faktura.Pozycja.0.produkt_id', array( 'type' => 'hidden' )); ?>
														<?php echo $this->Form->input('Faktura.Ignore.nazwa_produktu', array('type' => 'search', 'label' => false, 'id' => 'autocomplete', 'class' => 'typeahead', 'autocomplete' => 'off', 'data-provide' => 'typeahead') ); ?>
													</td>
													<td class="ilosc"><?php echo $this->Form->input('Faktura.Pozycja.0.ilosc', array( 'label' => false )); ?></td>
													<td class="jednostka"><?php echo $this->Form->input('Faktura.Pozycja.0.jednostka', array( 'label' => false )); ?></td>
													<td class="cena_netto"><?php echo $this->Form->input('Faktura.Ignore.cena_netto', array( 'label' => false )); ?></td>
													<td class="stawka_vat"><?php echo $this->Form->input('Faktura.Ignore.vat', array( 'label' => false )); ?></td>
													<td class="kwota_netto"><?php echo $this->Form->input('Faktura.Ignore.kwota_netto', array( 'label' => false )); ?></td>
													<td class="kwota_vat"><?php echo $this->Form->input('Faktura.Ignore.kwota_vat', array( 'label' => false )); ?></td>
													<td class="kwota_brutto"><?php echo $this->Form->input('Faktura.Ignore.kwota_brutto', array( 'label' => false )); ?></td>
												</tr>'; */
								?>
							</tbody>
						</table>
					</div>
				</div>
				
				
				
				<div class="row-fluid">
					<div class="span4 offset8">
						<?php echo $this->Form->input('sposob_platnosci_id', array( 'label' => 'Sposób płatności')); ?>
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span6">
						<h3>Do zapłaty: <span id="do_zaplaty">0.00</span> zł</h3>
					</div>
					
					<div class="span4 offset2">
						<?php echo $this->Form->input('termin_platnosci', array( 'label' => 'Termin płatności', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) )); ?>
					</div>
				</div>
		
				
				<div class="form-actions">
					<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
					<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
				</div>
				
			
			</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<button id="test">Nowa pozycja</button>

<style type="text/css">
	
	.input.date select[name$="[day]"]{
		width: 46px;
	}
	
	.input.date select[name$="[month]"]{
		width: 103px;
	}
	
	.input.date select[name$="[year]"]{
		width: 62px;
	}
	
	#FakturaStatusId, #FakturaSposobPlatnosciId{
		width: 211px;
	}
	
	table.pozycje select{
		width: auto;
	}
	
	table.pozycje input{
		width: 50px;
	}
	
	.lp{
		width: auto;
	}
	
	.nazwa_produktu input{
		width: 215px !important;
	}
	
	.ui-autocomplete-loading {
		background: white url('/projekt/img/ajax-loader.gif') right center no-repeat;
	}
	
	table.pozycje input, table.pozycje select{
		margin: 0;
	}
	
</style>

<script type="text/javascript">

	$(document).ready(function() {
		
		var vat_json = <?php echo $vat_json; ?>;
		var jednostki_json = <?php echo $jednostki_json; ?>;
		var Pozycje = { 'lp': 1, 'nast': 1, 'pz': {}, 'sumy': {} };
	
	
		function update_wyliczenia(pozycja){
						
			var kwota_netto = parseFloat($('#FakturaPozycja'+ pozycja +'ProduktCenaNetto').val()) * parseFloat($('#FakturaPozycja'+ pozycja +'Ilosc').val());
			$('#FakturaIgnore'+ pozycja +'KwotaNetto').val(kwota_netto.toFixed(2));
			
			var kwota_vat = parseFloat(vat_json.wartosci[$('#FakturaPozycja'+ pozycja +'ProduktVatId').val()]) * kwota_netto;
			$('#FakturaIgnore'+ pozycja +'KwotaVat').val(kwota_vat.toFixed(2));
			
			var kwota_brutto = (parseFloat(vat_json.wartosci[$('#FakturaPozycja'+ pozycja +'ProduktVatId').val()])+1) * kwota_netto;
			$('#FakturaIgnore'+ pozycja +'KwotaBrutto').val(kwota_brutto.toFixed(2));
			
			Pozycje.pz[pozycja]['kwota_netto'] = kwota_netto;
			Pozycje.pz[pozycja]['kwota_vat'] = kwota_vat;
			Pozycje.pz[pozycja]['kwota_brutto'] = kwota_brutto;
			
			update_sumy();
			
			console.log(Pozycje);
			
		}
		
		
		function update_sumy(){
			
			var suma = { 'kwota_netto': 0, 'kwota_vat': 0, 'kwota_brutto': 0, 'vat' : {}};
			
			for( i in Pozycje.pz ){
				suma.kwota_netto = suma.kwota_netto + Pozycje.pz[i].kwota_netto;
				suma.kwota_vat = suma.kwota_vat + Pozycje.pz[i].kwota_vat;
				suma.kwota_brutto = suma.kwota_brutto + Pozycje.pz[i].kwota_brutto;
				
				var vat_id = Pozycje.pz[i].vat_id;
				
				if( suma.vat.hasOwnProperty(Pozycje.pz[i].vat_id) == false ) suma.vat[vat_id] = {'kwota_netto': 0, 'kwota_vat': 0, 'kwota_brutto': 0,};
				
				suma.vat[vat_id].kwota_netto = suma.vat[vat_id].kwota_netto + Pozycje.pz[i].kwota_netto;
				suma.vat[vat_id].kwota_vat = suma.vat[vat_id].kwota_vat + Pozycje.pz[i].kwota_vat;
				suma.vat[vat_id].kwota_brutto = suma.vat[vat_id].kwota_brutto + Pozycje.pz[i].kwota_brutto;
				
			}
			
			$('#suma_netto').val(suma.kwota_netto.toFixed(2));
			$('#suma_vat').val(suma.kwota_vat.toFixed(2));
			$('#suma_brutto').val(suma.kwota_brutto.toFixed(2));
			
			for( i in suma.vat ){
				var $row = $('#suma_vat_'+ i);
				
				$row.find('.suma_netto').val(suma.vat[i].kwota_netto.toFixed(2));
				$row.find('.suma_vat').val(suma.vat[i].kwota_vat.toFixed(2));
				$row.find('.suma_brutto').val(suma.vat[i].kwota_brutto.toFixed(2));
								
			}
			
			for( i in vat_json.wartosci ){
				var $row = $('#suma_vat_'+ i);
				if( suma.vat.hasOwnProperty(i) ) {
					$row.show();
				}
				else {
					$row.hide();
				}
			}
			
			$('#do_zaplaty').html(suma.kwota_brutto.toFixed(2));
			
			Pozycje.sumy = suma;
			
		}
		
		
		function update_values(id, pozycja){
			$.getJSON('/projekt/produkty/view/'+id, function(prod){
				// console.log(prod);
				
				var vat = prod.Vat;
				var produkt = prod.Produkt;
				
				// var $poz = $('#poz_'+ pozycja);
				
				Pozycje.pz[pozycja] = produkt;
								
				$('#FakturaPozycja'+ pozycja +'ProduktId').val(id);
								
				$('#FakturaPozycja'+ pozycja +'ProduktCenaNetto').val(produkt.cena_netto);
				
				$('#FakturaPozycja'+ pozycja +'ProduktVatId').val(produkt.vat_id);
				
				update_wyliczenia(pozycja);
				
				
				
			});
		}
		
		function dodaj_pozycje(){
			
			var html ='<tr id="poz_'+ Pozycje.lp +'">'+
				'<td class="lp">'+ Pozycje.nast +'.</td>'+
				'<td class="nazwa_produktu">'+
				'	<input type="hidden" name="data[Faktura][Pozycja]['+ Pozycje.lp +'][produkt_id]" id="FakturaPozycja'+ Pozycje.lp +'ProduktId"/>'+
				'	<div class="input search">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][nazwa_produktu]" id="FakturaIgnore'+ Pozycje.lp +'NazwaProduktu" class="typeahead" autocomplete="off" data-provide="typeahead" type="search"/>'+
				'	</div>'+
				'</td>'+
				'<td class="ilosc">'+
				'	<div class="input number">'+
				'		<input name="data[Faktura][Pozycja]['+ Pozycje.lp +'][ilosc]" step="any" type="number" id="FakturaPozycja'+ Pozycje.lp +'Ilosc" value="1"/>'+
				'	</div>'+
				'</td>'+
				'<td class="jednostka">'+
				'	<div class="input select">'+
				'		<select name="data[Faktura][Pozycja]['+ Pozycje.lp +'][jednostka]" id="FakturaPozycja'+ Pozycje.lp +'Jednostka">'+
				'			'+ gen_options( jednostki_json ) +''+
				'		</select>'+
				'	</div>'+
				'</td>'+
				'<td class="cena_netto">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Pozycja]['+ Pozycje.lp +'][Produkt][cena_netto]" type="text" id="FakturaPozycja'+ Pozycje.lp +'ProduktCenaNetto"/>'+
				'	</div>'+
				'</td>'+
				'<td class="stawka_vat">'+
				'	<div class="input select">'+
				'		<select name="data[Faktura][Pozycja]['+ Pozycje.lp +'][Produkt][vat_id]" id="FakturaPozycja'+ Pozycje.lp +'ProduktVatId">'+
				'			'+ gen_options( vat_json.nazwy ) +''+
				'		</select>'+
				'	</div>'+
				'</td>'+
				'<td class="kwota_netto">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][kwota_netto]" type="text" id="FakturaIgnore'+ Pozycje.lp +'KwotaNetto" value="0.00" disabled="disabled"/>'+
				'	</div>'+
				'</td>'+
				'<td class="kwota_vat">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][kwota_vat]" type="text" id="FakturaIgnore'+ Pozycje.lp +'KwotaVat" value="0.00" disabled="disabled"/>'+
				'	</div>'+
				'</td>'+
				'<td class="kwota_brutto">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][kwota_brutto]" type="text" id="FakturaIgnore'+ Pozycje.lp +'KwotaBrutto" value="0.00" disabled="disabled"/>'+
				'	</div>'+
				'</td>'+
				'<td class="usun">'+
				'	<a href="#" class="btn btn-danger"><i class="icon-trash"></i></a>'+
				'</td>'+
				'</tr>';
			
			$(html).data('pozycja', Pozycje.lp).appendTo('table > tbody');
			
			
			$('#FakturaIgnore'+ Pozycje.lp +'NazwaProduktu').autocomplete({
				source: "/projekt/produkty/index",
				minLength: 2,
				autoFocus: true,
				select: function( event, data ) {
					// console.log(data);
					// console.log(event);
					// console.log($(event.target).data('pozycja'));
					var pozycja = $(event.target).parent().parent().parent().data('pozycja');
					update_values(data.item.id, pozycja);
					
					dodaj_pozycje();
					
					// return false;
				}
			});
			
			$('#FakturaPozycja'+ Pozycje.lp +'Ilosc, #FakturaPozycja'+ Pozycje.lp +'ProduktCenaNetto, #FakturaPozycja'+ Pozycje.lp +'ProduktVatId').off('input').on('input',null, {'pozycja': Pozycje.lp }, function(e){
				
					update_wyliczenia(e.data.pozycja);
				
			});
			
			
			Pozycje.lp = Pozycje.lp + 1;
			Pozycje.nast = Pozycje.nast + 1;
		}
		
		dodaj_pozycje();
		
		
		function gen_options( src ){
			var out = '';
			for( i in src ){
				out+='<option value="'+ i +'">'+ src[i] +'</option>';
			}
			return out;
		}
		
		
		
		$('table.pozycje > tbody').off('click').on('click', 'tr > td.usun > a', function(e){
			e.preventDefault();
			var $tr = $(this).parent().parent();
			var pozycja = $tr.data('pozycja');
			
			$tr.remove();
			
			
			// Pozycje.lp = Pozycje.lp - 1;
			Pozycje.nast = Pozycje.nast - 1;
			
			// console.log(Pozycje);
			
			delete Pozycje.pz[pozycja];
			
			update_sumy();
			
			$('table.pozycje > tbody > tr').each(function(i, e){
				$(e).find('.lp').html((i+1)+'.');
				
			});
			
			console.log(Pozycje);
			
		});
		
		$('#test').on('click', function(e){
			e.preventDefault();
			
			dodaj_pozycje();
			
			// $.getJSON('/projekt/produkty/index', {'term': 'prod'}, function(response){
				
			// 	console.log(response);
				
			// })
			
		});
		
	});
</script>


