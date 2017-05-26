<?php
		
					
				
				$data = $ln->whatdata($nazwa_restauracji);
				
				
				$akt_dzien = $data[0]['dzien'];
				$akt_data = $data[0]['data'];
				$akt_stan = $data[0]['stan'];
				
				$_SESSION['x'] = 1;
				$_SESSION['suma'] = 0;
				
				
				unset($_SESSION['adres']);
				unset($_SESSION['miasto']);
				unset($_SESSION['uwagi']);
				unset($_POST['mieszkanie']);
				unset($_SESSION['mieszkanie']);
				unset($_SESSION['adresnumer']);		
				
		
?>


<?php
			
				if (isset($_GET['check'])){
					
					
					
				$numer = $_POST['numer'];
				
				$_SESSION['number'] = $_POST['numer'];
				  
				  
				 $ile_zgloszen = $ln->checknumber($numer); 
				 
				 $ile_adresow = $ln->ileadresow($numer);
				 
				 
				 
				 if ($ile_zgloszen > 0) {
					 
					 echo ('
					 
							<div class="modal fade" id="myModal" role="dialog">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title">Uwaga! Nieuczciwy klient</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<p>Podany numer telefonu widnieje w naszej bazie nieuczciwyklient.pl</br>
										Realizujesz zamówienie na własne ryzyko!</p>
										<p>Ilość zgłoszeń: '.$ile_zgloszen.'</p>
									  </div>
									  <div class="modal-footer">
										
										<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">OK</button>
										 
										
									  </div>
									</div>
								  </div>
								</div>');								 
				 }	
				
					
					
				}	
			
			
			
			
			
			
			
		
				
				
				
				
				
				
			
			
			?>


<!-- Page Content -->
       
                        
						
						
						
						
						
						
						
										 <div class="container" style="background-color: #ffffff; height: 800px" >
											<div class="row">
												<div class="col-lg-12">
												
													<h1 class="page-header">Nowe zamówienie</h1>
													
												</div>
												<!-- /.col-lg-12 -->
											
												<div class="col-lg-12">
													
														<div class="panel-body">
															<div class="row">
																<div class="col-lg-6">

																	<div class="form-group">
																	<form action="index.php?page=neworder&check" method="post">
																		
																		<div class="form-group">
																			<label>Podaj Numer Telefonu </label>
																			<input class="form-control" placeholder="601 602 603" name="numer" autofocus>
																		</div>
																		
																		
																		<button type="submit" class="btn btn-warning">Sprawdź</button>
																		
																	</form>
																	</div>
																	
																	<!-- /.col-lg-6 (nested) -->
																
																	
																	
																			

																						
																								
																						
																							<?php
																								
																							if 	(isset($ile_adresow)){	
																								if ($ile_adresow > 0){
																									
																									
																									
																									
																									$adresy = $ln->pobierzadresy($numer);
																									
																									
																									
																									
																									
																										
																									

																									for ($i=0; $i<$ile_adresow; $i++){
																									
																										echo ('
																										
																											
																											
																											<a href="index.php?page=neworder-cart&numer='.$numer.'&adres='.$adresy[$i]['adres'].'&miasto='.$adresy[$i]['miasto'].'&uwagi='.$adresy[$i]['uwagi'].'&typ='.$adresy[$i]['typ'].'&adresnumer='.$adresy[$i]['adresnumer'].'&mieszkanie='.$adresy[$i]['mieszkanie'].'" >
																											<div class="notice notice-warning">
																														<i class="glyphicon glyphicon-user "></i>
																														'
																														.$adresy[$i]['typ'].' '.ucfirst($adresy[$i]['adres']).' '.$adresy[$i]['adresnumer'].' m.'.$adresy[$i]['mieszkanie'].', '.ucfirst($adresy[$i]['miasto']).'
																														</br>
																														'.$adresy[$i]['uwagi'].'
																														
																													</div>
																											</a>
																										');
																									}
																									
																									
																									
																								}	
																								else {
																									
																									
																									
																									
																									
																									
																									
																								}	  
																							}	  
																							
																						
																						
																									
																								 
																							?>
																							
																	
																	
																	
																</div>
																<!-- /.col-lg-6 (nested) -->
																<div class="col-lg-6">
																	
											
											<!-- /.row -->
											<div class="row">
												<div class="col-lg-12">
													
																
																		
																<div class="col-lg-12">
																
																	<?php
																		
																		
																		
																	
																		if (isset($_GET['check'])){ 
																		
																		
																		
																		$miastorest = $ln->miastorest($nazwa_restauracji);
																		
																			echo ('
																						<div class="form-group">
																							
																								<label for="disabledSelect">Dodaj inny adres</label>
																								<input class="form-control" id="disabledInput" type="text" placeholder="'.$_SESSION['number'].'" disabled>
																							
																						</div>
																					<form action="index.php?page=neworder-cart" method="post">	
																						
																						<div class="form-group">
																						<div class="row">
																						
																						  <div class="col-lg-3">
																							
																								<label>Typ</label>
																								<select class="form-control" name="typ" required>
																									<option value="Ulica">Ulica</option>
																									<option value="Osiedle">Osielde</option>
																									<option value="Plac">Plac</option>
																									<option value="Aleja">Aleja</option>
																									<option value="Rondo">Rondo</option>
																								</select>
																							</div>
																						 <div class="col-lg-6">
																						  <label>Adres </label>
																							<input type="text" class="form-control" name="adrespost" placeholder="Słowiańska">
																						  </div>
																						  <div class="col-lg-3">
																						   <label>Numer </label>
																							<input type="text" class="form-control" name="adresnumer" placeholder="5a">
																						  </div>
																						</div>
																						</div>
																						
																						<div class="form-group">
																							<div class="row">
																								 <div class="col-lg-3">
																								   <label>Mieszkanie </label>
																									<input type="text" class="form-control" name="mieszkanie"placeholder="127">
																								  </div>
																								<div class="col-lg-5">
																									<label>Miasto </label>
																									<input class="form-control" value="'.$miastorest.'" name="miastopost" required>
																								</div>
																								<div class="col-lg-3">
																									<label>Gotowe</label>
																									<button type="submit" class="btn btn-primary">Dodaj Nowy Adres</button>
																							
																								</div>
																							</div>
																						</div>
																						
																						<div class="form-group">
																							<label>Uwagi </label>
																							<input class="form-control" placeholder="klatka A, piętro 9, nazwa firmy" name="uwagi">
																						</div>
																						
																						
																						
																					</form>
																			');			
																		
																		
																																					}
																	?>
																</div>
																						


																					
																																						
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	</div>
																	
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