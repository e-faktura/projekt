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
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="lp">1.</td>
									<td class="nazwa_produktu"><?php echo $this->Form->input('produkt', array( 'label' => false )); ?></td>
									<td class="ilosc"><?php echo $this->Form->input('ilosc', array( 'label' => false )); ?></td>
									<td class="jednostka"><?php echo $this->Form->input('jednostka', array( 'label' => false )); ?></td>
									<td class="cena_netto"><?php echo $this->Form->input('cena_netto', array( 'label' => false )); ?></td>
									<td class="stawka_vat"><?php echo $this->Form->input('vat', array( 'label' => false )); ?></td>
									<td class="kwota_netto"><?php echo $this->Form->input('kwota_netto', array( 'label' => false )); ?></td>
									<td class="kwota_vat"><?php echo $this->Form->input('kwota_vat', array( 'label' => false )); ?></td>
									<td class="kwota_brutto"><?php echo $this->Form->input('kwota_brutto', array( 'label' => false )); ?></td>
									<button id="b1" onClick="addFormField()" class="btn btn-info" type="button">+</button>
								</tr>
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
		width: 215px;
	}
	
</style>

<script type="text/javascript">
var i = 1;
$("#b1").click(function() {
    $("tbody tr:first").clone().find("input").each(function() {
        $(this).val('').attr('id', function(_, id) { return id + i });
    }).end().appendTo("table");
    i++;
});
</script>


