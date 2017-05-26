

<!-- Page Content -->
       
                        
						
						
						
						
						
						
						
										  <div class="container" style="background-color: #ffffff; height: 800px" >
										 
										 
										 
										 
										 <?php
		
					
				
				$data = $ln->whatdata($nazwa_restauracji);
				
				
				$akt_dzien = $data[0]['dzien'];
				$akt_data = $data[0]['data'];
				$akt_stan = $data[0]['stan'];
				
				
				$_SESSION['x'] = 1;
				$_SESSION['suma'] = 0;
				
				
				
		
?>



<?php
			
				if (isset($_GET['check'])){
					
				$numer = $_POST['numer'];
				
				$_SESSION['number'] = $_POST['numer'];
				  
				  
				 $ile_zgloszen = $ln->checknumber($numer); 
				 
				 
				 
				 
				 
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
			
			
			
			
			
			
			
		
				
				
				$ile_adresow = $ln->ileadresow($numer);
				
				
				
			
			
			?>
										 
										 
										 
										 
										 
										 
										 
										 
										 
										 
										 
										 
										 
										 
											<div class="row">
												<div class="col-lg-12">
													<h1 class="page-header">Nowe zamówienie</h1>
													
												</div>
												<!-- /.col-lg-12 -->
											</div>
											<!-- /.row -->
											<div class="row">
												<div class="col-lg-12">
													
														
														<div class="panel-body">
															<div class="row">
																<div class="col-lg-6">
																<div class="panel panel-default">
																	<div class="panel-heading">
																		Dodaj Nowy Adres
																	</div>
																	 <div class="panel-body">
																		
																		<div class="form-group">
																			
																				<label for="disabledSelect">Numer</label>
																				<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['number'] ?>" disabled>
																			
																		</div>
																	<form action="index.php?page=neworder-cart" method="post">	
																		<div class="form-group">
																			<label>Adres </label>
																			<input class="form-control" placeholder="np. ul. Solidarności 38a m.127" name="adrespost">
																		</div>
																		<div class="form-group">
																			<label>Miasto </label>
																			<input class="form-control" placeholder="np. Poznań" name="miastopost">
																		</div>
																		
																		<button type="submit" class="btn btn-default">Gotowe</button>
																		
																	</form>
																	</div>
																</div>
																</div>
																<!-- /.col-lg-6 (nested) -->
																<div class="col-lg-6">
																	
																	
																			

																						
																								
																						
																							<?php
																									  
																								if ($ile_adresow > 0){
																									
																									
																									echo ('
																									
																									
																									<div class="panel panel-default">
																									<div class="panel-heading">
																										Wybierz adres z bazy
																									</div>
																									 <div class="panel-body">
																	
																									
																									
																									');
																									
																									
																									
																									$adresy = $ln->pobierzadresy($numer);
																									
																									
																									
																									
																									
																										
																									

																									for ($i=0; $i<$ile_adresow; $i++){
																									
																										echo ('
																											<form action="index.php?page=neworder-cart&numer='.$numer.'&adres='.$adresy[$i]['adres'].'&miasto='.$adresy[$i]['miasto'].'" method="post">
																												<button type="submit" class="btn  btn-default  btn-block">'.ucfirst($adresy[$i]['adres']).', '.$adresy[$i]['miasto'].'</button>
																											</form>	
																											</br>
																									
																						
																										');
																									}
																									
																									
																									
																								}	
																								else {
																									
																									
																									
																									
																									
																									
																									
																								}	  
																									  
																							
																						
																						
																									
																								 
																							?>
																							</div>	
																						</div>


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
										</div>
										<!-- /#page-wrapper -->
						
						
				
  




			
			
			
			
			
		
		
		
		
		
		

		
		
		
		

	

			
			
			
			

	








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