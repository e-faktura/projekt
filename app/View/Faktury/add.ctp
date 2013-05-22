<?php
	// pr($this->request);
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
					<div class="span4 offset8">
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

<button id="test">test</button>

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
	
</style>

<script type="text/javascript">
	$(document).ready(function() {
		
		var vat = <?php echo $vat_json; ?>;
		var jednostki = <?php echo $jednostki_json; ?>;
		var Pozycje = { 'lp': 1 };
	
		
		function update_values(id){
			$.getJSON('/projekt/produkty/view/'+id, function(response){
				console.log(response);
			});
		}
		
		function dodaj_pozycje(){
			
			var html ='<tr class="poz_'+ Pozycje.lp +'">'+
				'<td class="lp">'+ Pozycje.lp +'.</td>'+
				'<td class="nazwa_produktu">'+
				'	<input type="hidden" name="data[Faktura][Pozycja]['+ Pozycje.lp +'][produkt_id]" id="FakturaPozycja'+ Pozycje.lp +'ProduktId"/>'+
				'	<div class="input search">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][nazwa_produktu]" id="FakturaIgnore'+ Pozycje.lp +'NazwaProduktu" class="typeahead" autocomplete="off" data-provide="typeahead" type="search"/>'+
				'	</div>'+
				'</td>'+
				'<td class="ilosc">'+
				'	<div class="input number">'+
				'		<input name="data[Faktura][Pozycja]['+ Pozycje.lp +'][ilosc]" step="any" type="number" id="FakturaPozycja'+ Pozycje.lp +'Ilosc"/>'+
				'	</div>'+
				'</td>'+
				'<td class="jednostka">'+
				'	<div class="input select">'+
				'		<select name="data[Faktura][Pozycja]['+ Pozycje.lp +'][jednostka]" id="FakturaPozycja'+ Pozycje.lp +'Jednostka">'+
				'			'+ gen_options( jednostki ) +''+
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
				'			'+ gen_options( vat ) +''+
				'		</select>'+
				'	</div>'+
				'</td>'+
				'<td class="kwota_netto">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][kwota_netto]" type="text" id="FakturaIgnore'+ Pozycje.lp +'KwotaNetto"/>'+
				'	</div>'+
				'</td>'+
				'<td class="kwota_vat">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][kwota_vat]" type="text" id="FakturaIgnore'+ Pozycje.lp +'KwotaVat"/>'+
				'	</div>'+
				'</td>'+
				'<td class="kwota_brutto">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Ignore]['+ Pozycje.lp +'][kwota_brutto]" type="text" id="FakturaIgnore'+ Pozycje.lp +'KwotaBrutto"/>'+
				'	</div>'+
				'</td>'+
				'<td class="usun">'+
				'	<a href="#" class="btn btn-danger"><i class="icon-trash"></i></a>'+
				'</td>'+
				'</tr>';
			
			$(html).appendTo('table > tbody');
			
			
			$('#FakturaIgnore'+ Pozycje.lp +'NazwaProduktu').autocomplete({
				source: "/projekt/produkty/index",
				minLength: 2,
				autoFocus: true,
				select: function( event, data ) {
					console.log(data);
					return false;
				}
			});
			
			Pozycje.lp = Pozycje.lp + 1;
		}
		
		dodaj_pozycje();
		
		
		
		
		function gen_options( src ){
			var out = '';
			for( i in src ){
				out+='<option value="'+ i +'">'+ src[i] +'</option>';
			}
			return out;
		}
		
		
		
		$('table.pozycje > tbody').on('click', 'tr > td.usun > a', function(e){
			e.preventDefault();
			$(this).parent().parent().remove();
			Pozycje.lp = Pozycje.lp - 1;
			
		});
		
		$('#test').on('click', function(e){
			e.preventDefault();
			
			// dodaj_pozycje();
			
			$.getJSON('/projekt/produkty/index', {'term': 'prod'}, function(response){
				
				console.log(response);
				
			})
			
		});
		
	});
</script>


