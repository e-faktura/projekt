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
							echo $this->Form->input('numer', array( 'default' => $numer, 'disabled' => true, 'required' => false ));
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
								
							</tfoot>
							
							<tbody>
								
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
					<div class="span2" style="text-align:right"><h3>Do zapłaty:</h3></div>
					<div class="span4"><h3><span id="do_zaplaty">0.00</span> zł</h3></div>
					
					<div class="span4 offset2">
						<?php echo $this->Form->input('termin_platnosci', array( 'label' => 'Termin płatności', 'type' => 'date', 'dateFormat' => 'DMY', 'separator' => '', 'orderYear' => 'asc', 'minYear' => (((int)date('Y')) - 5 ), 'maxYear' => (((int)date('Y')) + 5 ) )); ?>
					</div>
				</div>
				
				<div class="row-fluid">
					<div class="span2" style="text-align:right"><h3>Słownie:</h3></div>
					<div class="span10"><h3><span id="do_zaplaty_slownie">zero zł 00/100</span></h3></div>
				</div>
		
				
				<div class="form-actions">
					<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Zapisz</button>
					<button type="button" class="btn" onClick="document.location = '<?php echo $this->Html->url( array('action' => 'index')) ?>';"><i class="icon-remove"></i> Anuluj</button>
				</div>
				
			
			</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>

<?php echo $this->element('FakturaAdd.css'); ?>

<?php echo $this->element('FakturaAdd.js', array( 'vat_json' => $vat_json, 'jednostki_json' => $jednostki_json )); ?>




