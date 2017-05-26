<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; height: 800px" >
            <div class="container-fluid">
						<?php	
						
							if (isset($_GET['id'])){
								$zamid=$_GET['id'];
									
								}
							
							$_SESSION['idzam'] = $zamid;
							
							$zamowienie = $ln->pokazzamowienie($nazwa_restauracji, $zamid);
							
							$kierowcy = $ln->ilukierowcow($nazwa_restauracji);
						
							
							
							
							
							
						?>
						
						
						
						
						
						
						
				<div class="row">
                    <div class="col-lg-12">	
						<h3 class="page-header">Realizacja zamówienia - wybierz kierowcę</h3>	
					</div>
				</div>			
                <div class="row">
                    <div class="col-lg-12">
					
					
						<form >
					
							<?php
							
							
								$x=0;
								while (isset($kierowcy[$x]['id'])){
									 
									
								
										echo ('
												<div class="form-check">
												<label class="form-check-label">
													<p class="text-muted"><input type="radio" class="form-check-input" name="driver" id="optionsRadios2" value="'.$kierowcy[$x]['nazwa'].'">
													'.$kierowcy[$x]['nazwa'].'
												  </p></label>
												</div>
											');
										$x++;	
								}
							?>		
							<button type="submit" class="btn btn-info">Przyjęcie zamówienia</button> 
							
						</form>	
							
							

                        <h2 class="page-header"></h2>
						
						
						
						
											<div class="container-fluid">
	
											<div class="text-center" style="width: 100%">
													<?php
														
													

																

																 echo ('<h3>'.ucfirst($_SESSION['zalogowany']))?> Zamówienie #<?php echo ($zamid).'</h3>';
																 echo ($zamowienie[0]['godzina'].', '.$zamowienie[0]['data']);
														?>
												</div>
		
	
												
													<div class="row">
														<div class="col-md-12">
															<?php
		





												echo ('	
												
													
																<div class="notice notice-warning">
																	<i class="glyphicon glyphicon-user "></i>
																	'.$zamowienie[0]['numer'].'</br>'
																	.$zamowienie[0]['typ'].' '.ucfirst($zamowienie[0]['adres']).' '.$zamowienie[0]['adresnumer'].' m.'.$zamowienie[0]['mieszkanie'].', '.ucfirst($zamowienie[0]['miasto']).'
																	</br>
																	'.$zamowienie[0]['uwagi'].'
																	</br>'.$zamowienie[0]['platnosc'].'
																</div>
																
																
															
												');		

					?>
									
							</div>
							<div class="row">
							<div class="col-md-12">
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
																	  
																			for ($i=0; $i<100; $i++) {
																				
																				if (isset($zamowienie[$i]['nazwa']))	{	
																				echo ('
																					<tr>
																					  <th scope="row">'.($i+1).'</th>
																					  <td>'.$zamowienie[$i]['nazwa'].'</td>
																					  <td>'.$zamowienie[$i]['cena'].'</td>							  							
																					</tr>
																				');
																				

																				
																			}	
																				
																				
																			}
																				echo ('					
																	  </tbody>
																	  <thead>
																		<tr>
																		  <th></th>
																		  <th></th>
																		  <th>Suma: '.$zamowienie[0]['suma'].'</th>
																		  
																		</tr>
																	  </thead>		
																'); ?>
								</table>																										
																																	
																				</div>
							</div>














	
	
	
	
	
	
	
	
	
	
	
	
	
		
						
						
						
						
						
						
						
						
						
						
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->