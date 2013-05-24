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
			$('#do_zaplaty_slownie').html( kwota_slownie(suma.kwota_brutto) );
			
			
			Pozycje.sumy = suma;
			
		}
		
		
		function update_values(id, pozycja){
			$.getJSON('<?php echo $this->Html->url(array('controller'=>'produkty', 'action'=>'view')); ?>/'+id,function(prod){
				
				var produkt = prod.Produkt;
				
				Pozycje.pz[pozycja] = produkt;
								
				$('#FakturaPozycja'+ pozycja +'ProduktId').val(id);
				
				$('#FakturaPozycja'+ pozycja +'ProduktParentId').val(produkt.parent_id);
				
				
				$('#FakturaPozycja'+ pozycja +'ProduktCenaNetto').val(produkt.cena_netto);
				
				$('#FakturaPozycja'+ pozycja +'ProduktVatId').val(produkt.vat_id);
				
				update_wyliczenia(pozycja);
				
				
				
			});
		}
		
		function dodaj_pozycje(){
			
			var html ='<tr id="poz_'+ Pozycje.lp +'">'+
				'<td class="lp">'+ Pozycje.nast +'.</td>'+
				'<td class="nazwa_produktu">'+
				'	<input type="hidden" name="data[Faktura][Pozycja]['+ Pozycje.lp +'][Produkt][parent_id]" id="FakturaPozycja'+ Pozycje.lp +'ProduktParentId"/>'+
				'	<input type="hidden" name="data[Faktura][Pozycja]['+ Pozycje.lp +'][Produkt][id]" id="FakturaPozycja'+ Pozycje.lp +'ProduktId"/>'+
				'	<div class="input search">'+
				'		<input name="data[Faktura][Pozycja]['+ Pozycje.lp +'][Produkt][nazwa]" id="FakturaIgnore'+ Pozycje.lp +'NazwaProduktu" class="typeahead" autocomplete="off" data-provide="typeahead" type="search" placeholder="Wpisz nazwę produktu"/>'+
				'	</div>'+
				'</td>'+
				'<td class="ilosc">'+
				'	<div class="input number">'+
				'		<input name="data[Faktura][Pozycja]['+ Pozycje.lp +'][ilosc]" step="any" type="number" min="0.0", id="FakturaPozycja'+ Pozycje.lp +'Ilosc" value="1"/>'+
				'	</div>'+
				'</td>'+
				'<td class="jednostka">'+
				'	<div class="input select">'+
				'		<select name="data[Faktura][Pozycja]['+ Pozycje.lp +'][jednostka_id]" id="FakturaPozycja'+ Pozycje.lp +'Jednostka">'+
				'			'+ gen_options( jednostki_json ) +''+
				'		</select>'+
				'	</div>'+
				'</td>'+
				'<td class="cena_netto">'+
				'	<div class="input text">'+
				'		<input name="data[Faktura][Pozycja]['+ Pozycje.lp +'][Produkt][cena_netto]" type="text" id="FakturaPozycja'+ Pozycje.lp +'ProduktCenaNetto" value="0.00"/>'+
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
				source: "<?php echo $this->Html->url(array('controller'=>'produkty', 'action'=>'index')); ?>",
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
			
			$('#FakturaPozycja'+ Pozycje.lp +'Ilosc, #FakturaPozycja'+ Pozycje.lp +'ProduktCenaNetto, #FakturaPozycja'+ Pozycje.lp +'ProduktVatId').off('input').on('input', null, {'pozycja': Pozycje.lp }, function(e){
				
					update_wyliczenia(e.data.pozycja);
				
			});
			
			$('#FakturaPozycja'+ Pozycje.lp +'ProduktCenaNetto').off('blur.efaktura').on('blur.efaktura', null, {'pozycja': Pozycje.lp }, function(e){
				
				$(this).val( parseFloat($(this).val()).toFixed(2) );
				
			});
			
			// $('#FakturaIgnore'+ Pozycje.lp +'NazwaProduktu').off('blur.efaktura').on('blur.efaktura', null, {'pozycja': Pozycje.lp }, function(e){
				
			// 	var $poz = $('#poz_'+ (Pozycje.lp));
				
			// 	if( $poz.length == 0 && $(this).val() != '' ){
			// 		dodaj_pozycje();
			// 	}
			// 	else if($poz.length > 0 && $(this).val() != '' && $poz.val() == ''){
			// 		usun_pozycje(Pozycje.lp);
			// 	}
			// });
			
			
			Pozycje.lp = Pozycje.lp + 1;
			Pozycje.nast = Pozycje.nast + 1;
			
			
			// console.log(Pozycje);
		}
				
		function usun_pozycje(pozycja){
			
			$('#poz_'+pozycja).remove();
						
			// Pozycje.lp = Pozycje.lp - 1;
			Pozycje.nast = Pozycje.nast - 1;
			
			// console.log(Pozycje);
			
			delete Pozycje.pz[pozycja];
			
			update_sumy();
			
			$('table.pozycje > tbody > tr').each(function(i, e){
				$(e).find('.lp').html((i+1)+'.');
				
			});
			
			console.log(Pozycje);
			
		}
		
		
		$('table.pozycje > tbody').off('click').on('click', 'tr > td.usun > a', function(e){
			e.preventDefault();
			var $tr = $(this).parent().parent();
			var pozycja = $tr.data('pozycja');
			
			usun_pozycje(pozycja);
			
		});
		
		$('#test').on('click', function(e){
			e.preventDefault();
			
			dodaj_pozycje();
			
			// $.getJSON('/projekt/produkty/index', {'term': 'prod'}, function(response){
				
			// 	console.log(response);
				
			// })
			
		});
		
		function gen_options( src ){
			var out = '';
			for( i in src ){
				out+='<option value="'+ i +'">'+ src[i] +'</option>';
			}
			return out;
		}
		
		
		dodaj_pozycje();
		
		
		function kwota_slownie( kwota ){
			
			if( !kwota ) kwota = 0.0;
			
			kwota = (parseFloat(kwota)).toFixed(2);
			kwota = kwota.split('.');
			
			return slowa(kwota[0]) +' zł '+ kwota[1] +'/100';
		}
		
		
		function slowa( liczba ){
		   
		   var jednosci = ["", " jeden", " dwa", " trzy", " cztery", " pięć", " sześć", " siedem", " osiem", " dziewięć"];
		   var nascie = ["", " jedenaście", " dwanaście", " trzynaście", " czternaście", " piętnaście", " szesnaście", " siedemnaście", " osiemnaście", " dziewietnaście"];
		   var dziesiatki = ["", " dziesięć", " dwadzieścia", " trzydzieści", " czterdzieści", " pięćdziesiąt", " sześćdziesiąt", " siedemdziesiąt", " osiemdziesiąt", " dziewięćdziesiąt"];
		   var setki = ["", " sto", " dwieście", " trzysta", " czterysta", " pięćset", " sześćset", " siedemset", " osiemset", " dziewięćset"];
		   var grupy = [
		      ["" ,"" ,""],
		      [" tysiąc" ," tysiące" ," tysięcy"],
		      [" milion" ," miliony" ," milionów"],
		      [" miliard"," miliardy"," miliardów"],
		      [" bilion" ," biliony" ," bilionów"],
		      [" biliard"," biliardy"," biliardów"],
		      [" trylion"," tryliony"," tryliardów"]];
		    
		   if (!isNaN(liczba)){
		   	
		      var wynik = '';
		      var znak = '';
		      if (liczba == 0)
		         wynik = "zero";
		      if (liczba < 0) {
		         znak = "minus";
		         liczba = liczba;
		      }
		      
		      var g = 0;
		      while (liczba > 0) {
		         var s = Math.floor((liczba % 1000)/100);
		         var n = 0;
		         var d = Math.floor((liczba % 100)/10);
		         var j = Math.floor(liczba % 10);
		         if (d == 1 && j>0) {
		            n = j;
		            d = 0;
		            j = 0;
		         }

		         var k = 2;
		         if (j == 1 && s+d+n == 0)
		            k = 0;
		         if (j == 2 || j == 3 || j == 4)
		            k = 1;
		         if (s+d+n+j > 0)
		            wynik = setki[s]+dziesiatki[d]+nascie[n]+jednosci[j]+grupy[g][k]+wynik;

		         g++;
		         liczba = Math.floor(liczba/1000);
		      }
		      return znak + wynik;
		   }
		   else  {
		     
		  }
		  return false;
		}
		
	});
</script>