

<!-- Page Content -->
       
                        
						
						
						
						
						
						
						
										 <div class="container" style="background-color: #ffffff; height: 800px" >
										 
										 
										 
										 
										 <div class="panel-body printoff">
										 <div class="alert alert-info printoff">
											Zamówienie zostało utworzone <a href="index.php" class="alert-link">Powrót</a>.
										</div>
										</div>
										 
										 
										 
										 
										 <?php
		
					
				
				$data = $ln->whatdata($nazwa_restauracji);
				
				
				$akt_dzien = $data[0]['dzien'];
				$akt_data = $data[0]['data'];
				$akt_stan = $data[0]['stan'];
				
				
				
				
				
				$_SESSION['aktdata'] = $akt_data;
				
				
				
				
				
				
				
				
				
				
				
				
				$_SESSION['platnosc'] = $_POST['platnosc'];
				
				
				
				//DODANIE ZAMOWIENIA
				
				$odpowiedz_numer_zamowienia = $ln->numer_zamowienia($nazwa_restauracji);
				$numer_zamowienia = $odpowiedz_numer_zamowienia[0]['max(idzamowienia)'];
								
				
				
				for ($i=1; $i<$_SESSION['x']; $i++){
									
					$ln->dodajprodukty($_SESSION['produkt'.$i.''],$_SESSION['cena'.$i.''],$nazwa_restauracji, $numer_zamowienia);
									
				}
				
				$ln->dodaj_klienta($_SESSION['number'],$_SESSION['adres'],$_SESSION['miasto'],$nazwa_restauracji, $_SESSION['uwagi'], $_SESSION['typ'], $_SESSION['adresnumer'], $_SESSION['mieszkanie']);
				
				$odpowiedz_numer_klienta = $ln->numer_klienta($nazwa_restauracji);
				$numer_klienta = $odpowiedz_numer_klienta[0]['max(idklienta)'];
				
				
				
				$date = date("Y-m-d");
				
				date_default_timezone_set("Europe/Warsaw");
				$time = date("G:i");
				
				$_SESSION['aktczas'] = $time;
				
				$status = 'Niedostarczone';
				$ln->dodajzamowienie($numer_klienta,$_SESSION['platnosc'], $_SESSION['suma'],$akt_data, $time, $nazwa_restauracji, $status);
				
				//DODANIE ZAMOWIENIA DO OGOLNEJ BAZY
				$ln->dodaj_adres($_SESSION['number'],$_SESSION['adres'],$_SESSION['miasto'],$nazwa_restauracji, $_SESSION['uwagi'], $_SESSION['typ'], $_SESSION['adresnumer'], $_SESSION['mieszkanie']);
				
				//KONIEC DODANIE ZAMOWIENIA
				
				$_SESSION['numerzamowienia'] = $numer_zamowienia;
				
				
		
?>

<!--MODAL-->

<div class="modal fade " id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog bordernone">
		<div class="modal-content  bordernone" id="modal1">
			<div class="modal-header ">
				<button type="button" class="close " data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel"><?php echo (ucfirst($nazwa_restauracji))?> - Zamówienie nr #<?php echo ($numer_zamowienia+1)?></h4>
				<h6 class="modal-title" id="myModalLabel"><?php echo ($akt_data.', '.$time)?></h6>
				<div class="modal-footer ">
				<a href ="index.php" class="">
				<button type="button" class="btn btn-default " >Close</button>
				</a>
				<a href="pages/print.php"   class="">	
				<button type="button" class="btn btn-primary ">Drukuj zamówienie</button>
				</a>
			</div>
			</div>
			
			<div class="modal-body">
										 
										 
										 
										 
										 
										 
										 
										
											<!-- /.row -->
											<div class="row">
												<div class="col-lg-12">
												
																		
													
														
														<div class="panel-body">
															<div class="row">
																<div class="col-lg-12 width-30">
																													
																																													
																								
																											
																									<?php	
																											
																										
																										
																								echo ('	
																												<div class="notice notice-warning">
																														<i class="glyphicon glyphicon-user "></i>
																														'.$_SESSION['number'].'</br>'
																														.$_SESSION['typ'].' '.ucfirst($_SESSION['adres']).' '.$_SESSION['adresnumer'].' m.'.$_SESSION['mieszkanie'].', '.ucfirst($_SESSION['miasto']).'
																														</br>
																														'.$_SESSION['uwagi'].'
																														</br>'.$_SESSION['platnosc'].'
																													</div>
																								');																												
																									


																										
																										
																									?>			
																											
																										
																										
																			
				
																	
																</div>
																
																<!-- /.col-lg-6 (nested) -->
																<div class="col-lg-12 width-70">
																	
																		
																		<table class="table">
																														<?php echo ('	  
																															  <thead>
																																<tr>
																																  <th>#</th>
																																  <th>Produkt</th>
																																  <th>Cena</th>
																																  
																																</tr>
																															  </thead>
																															  <tbody>');
																															  
																																	for ($i=1; $i<$_SESSION['x']; $i++){
																																		echo ('
																																			<tr>
																																			  <th scope="row">'.$i.'</th>
																																			  <td>'.$_SESSION['produkt'.$i.''].'</td>
																																			  <td>'.$_SESSION['cena'.$i.''].'</td>							  							
																																			</tr>
																																		');
																																	}
																																		echo ('					
																															  </tbody>
																															  <thead>
																																<tr>
																																  <th></th>
																																  <th></th>
																																  <th>Suma: '.$_SESSION['suma'].'</th>
																																  
																																</tr>
																															  </thead>		
																														'); ?>
																													
																</div>
																<!-- /.col-lg-6 (nested) -->
															</div>
															<!-- /.row (nested) -->
														</div>
														<!-- /.panel-body -->
													</div>
													<!-- /.panel -->
												</div>
												<!-- /.col-lg-12 -->
											</div>
											<!-- /.row -->
										</div>
										<!-- /#page-wrapper -->
						
						
				
  


								

			
			
			
			
			
							</div>
			
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
			
	<!--MODAL-->		
			
		
		
		
		
		
		

		
		

			
			
			
			

	








	<!-- Modal Onload -->
	<script type="text/javascript">
    $(window).load(function(){
        $('#myModal').modal('show');
    });
	</script>








   












                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->