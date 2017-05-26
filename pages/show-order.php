<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; height: 800px" >
            <div class="container-fluid">
						<?php	
						
							if (isset($_GET['id'])){
								$zamid=$_GET['id'];
									
								}
							
							$zamowienie = $ln->pokazzamowienie($nazwa_restauracji, $zamid);
							
							
							
							
							
						?>
						
						
						
						
						
						
						
						
						
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Podgląd zamówienia</h2>
						
						
						
						
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














	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="text-left" style="width: 100%">
	
	<a href="pages/hist-print.php?id=<?php echo $zamid; ?>">
		<button type="button" class="btn btn-info" >Drukuj</button>
	</a>																
	<a href="index.php">
		<button type="button" class="btn btn-warning" >Powrót</button>
	</a>
	</div>	
						
						
						
						
						
						
						
						
						
						
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->