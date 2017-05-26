<!-- Page Content -->
							<?php
								
				
				
								
													
								if (isset($_GET['day'])){
									$akt_data = $_POST['data'];
									
								}	
								else if(isset($_SESSION['day'])){
									$akt_data = $_SESSION['day'];
									
									unset($_SESSION['day']);
								}
								else if(!empty($data = $ln->whatdata($nazwa_restauracji))){
									$akt_data = $akt_data = $data[0]['data'];
									
									
								}
								else{
									
									$ostatnidzien = $ln->sprawdzostatnidzien($nazwa_restauracji);
									
									$akt_data = $ostatnidzien[0]['data'];
									
									
								}
								
								
							if (isset($_GET['nday'])){
									$akt_data = $_GET['nday'];
									
								}	

							if(isset($akt_data)){
							$ilukierowcowunik = $ln->ilukierowcowunik($nazwa_restauracji,$akt_data);
							
							}		
							

							if (isset($_GET['driver'])){
									$akt_driver = $_GET['driver'];
									
									
									
									
									
								}	
							
							
								




								
							?>
         <div class="container" style="background-color: #ffffff; min-height: 800px" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Raport Dobowy 
						
						<?php 
						
							if(isset($akt_driver)){
								echo (' '.$akt_driver);
								}
						?>
						
						</h2>	
						
						
						
						
					
						
						
						
						
						
						
						
						
						
						
						
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				 <!-- /.row -->
				 
            
			
			
			<div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-body">
						<form action="index.php?page=raports&day" method="post">	
							
							<div class="col-lg-4">
							
							  
							 
								<input class="form-control" type="date" value="<?php 
								
									if (isset($akt_data)){
									
									echo $akt_data;
								}
								else{
								
								echo date("Y-m-d"); 
								}
								?>" id="example-date-input" name="data">
							 
							</div>
							<div class="col-lg-6">
							<div class="form-group-row">
							<button type="submit" class="btn btn-primary">Pokaż</button>
							</div>
							</div>
							
						</form>
						</div>
						
                        </div>
						
							
								
							<?php
							
							
							
							if (isset($akt_driver)){
								$utarg = $ln->obliczutarg_kier($nazwa_restauracji, $akt_data, $akt_driver);
														
							
								$zamowienia_dzisiaj = $ln->showorders_kier($nazwa_restauracji, $akt_data, $akt_driver);
								
								
								
							
								$zamowienia_dzisiaj_ilosc = $ln->liczbarekordow_kier($nazwa_restauracji, $akt_data, $akt_driver);
								

								$utarggot = $ln->obliczutarggotowka_kier($nazwa_restauracji, $akt_data, $akt_driver);

								
								$utargon = $utarg-$utarggot;
								
								
								
								
								
							}
							else{
							
							$utarg = $ln->obliczutarg($nazwa_restauracji, $akt_data);
														
							
							$zamowienia_dzisiaj = $ln->showorders($nazwa_restauracji, $akt_data);
							
						
							$zamowienia_dzisiaj_ilosc = $ln->liczbarekordow($nazwa_restauracji, $akt_data);
							

							$utarggot = $ln->obliczutarggotowka($nazwa_restauracji, $akt_data);

							
							$utargon = $utarg-$utarggot;
							}
							echo ('
							
							
						
						
						

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
							
                                <li ><a href="index.php?page=raports&nday='.$akt_data.'">Wszystkie</a>
                                </li>
								');
								
								
								
								$q=0;	
								while(isset($ilukierowcowunik[$q]['status'])){
								
								
								$utargkierowcy[$q] = $ln->obliczutargkierowcy($nazwa_restauracji, $akt_data, $ilukierowcowunik[$q]['status']);
								
								
								
								
							
								echo ('	
                                <li><a href="index.php?page=raports&driver='.$ilukierowcowunik[$q]['status'].'&nday='.$akt_data.'">'.$ilukierowcowunik[$q]['status'].'</a>
                                </li>
								');
							
								
								$q++;		
                            } 
                                
								
								echo ('
								
								
								
                      </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4></h4>
                                    
												<div class="row">
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-primary">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-shopping-cart fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge">'.$utarg.'</div>
																		
																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Utarg</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-green">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-child fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge">'.$zamowienia_dzisiaj_ilosc.'</div>

																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Ilość zamówień</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-yellow">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-money fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge">'.$utarggot.'</div>
																		
																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Gotówka</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-red">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-credit-card fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge">'.$utargon.'</div>
																		
																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Bezgotówkowo</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
												</div>
												
						');
							
						
						

								
								
								
							
							
							
							
							
						
						
						
						

									

									echo('<table class="table">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>ID</th>
									  <th>Godzina</th>
									  <th>Data</th>
									  <th>Numer telefonu</th>
									  <th>Adres</th>
									  <th>Płatność</th>
									  <th>Dostarczył</th>
									  <th>Suma</th>
									  
									</tr>
								  </thead>
								 
								  
								  
								  
								  <tbody>');
								  
								  
								  
								  
								 if(isset($akt_data)){ 
								  
								  for ($i=0; $i<$zamowienia_dzisiaj_ilosc; $i++) {
									echo ('
									<tr>
									  <th scope="row">'.($i+1).'</th>
									  <td>'.$zamowienia_dzisiaj[$i]['idzamowienia'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['godzina'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['data'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['numer'].'</td>
									 <td>'.$zamowienia_dzisiaj[$i]['typ'].' '.$zamowienia_dzisiaj[$i]['adres'].' '.$zamowienia_dzisiaj[$i]['adresnumer'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['platnosc'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['status'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['suma'].'</td>
									  <td>
										<a href ="index.php?page=show-order&id='.$zamowienia_dzisiaj[$i]['idzamowienia'].'" class="">
											<button type="button" class="btn btn-info btn-circle"><span class="glyphicon glyphicon-search"></span>
											</button>
										</a>
									  </td>
									  
									</tr>
									');	
								  }
								  echo ('  
								  </tbody>
								</table>');
								 }	
								echo ('
												
								</div>');
								
								$q=0;
								while(isset($ilukierowcowunik[$q]['status'])){
									
									
									
									echo ('
											<div class="tab-pane fade" id="'.$ilukierowcowunik[$q]['status'].'">
											
											
										
											

										
												
												 <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4></h4>
                                    
												<div class="row">
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-primary">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-shopping-cart fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge"></div>
																		
																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Utarg</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-green">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-child fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge">'.$zamowienia_dzisiaj_ilosc.'</div>

																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Ilość zamówień</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-yellow">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-money fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge">'.$utarggot.'</div>
																		
																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Gotówka</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
													<div class="col-lg-3 col-md-6">
														<div class="panel panel-red">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-credit-card fa-5x"></i>
																	</div>
																	<div class="col-xs-9 text-right">
																		<div class="huge">'.$utargon.'</div>
																		
																	</div>
																</div>
															</div>
															<a href="#">
																<div class="panel-footer">
																	<span class="pull-right">Bezgotówkowo</span>
																	
																	<div class="clearfix"></div>
																</div>
															</a>
														</div>
													</div>
												</div>
												
												
						');
							
						
						

								
								
								
							
							
							
							
							
						
						
						
						

									

									echo('<table class="table">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Godzina</th>
									  <th>Data</th>
									  <th>Numer telefonu</th>
									  <th>Adres</th>
									  <th>Płatność</th>
									  <th>Dostarczył</th>
									  <th>Suma</th>
									  
									</tr>
								  </thead>
								 
								  
								  
								  
								  <tbody>');
								  
								  
								  
								  
								 if(isset($akt_data)){ 
								  
								  for ($i=0; $i<$zamowienia_dzisiaj_ilosc; $i++) {
									echo ('
									<tr>
									  <th scope="row">'.($i+1).'</th>
									  <td>'.$zamowienia_dzisiaj[$i]['godzina'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['data'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['numer'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['adres'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['platnosc'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['status'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['suma'].'</td>
									  <td>
										<a href ="index.php?page=show-order&id='.$zamowienia_dzisiaj[$i]['idzamowienia'].'" class="">
											<button type="button" class="btn btn-info btn-circle"><span class="glyphicon glyphicon-search"></span>
											</button>
										</a>
									  </td>
									  
									</tr>
									');	
								  }
								  echo ('  
								  </tbody>
								</table>');
								 }	
												
										
										
										
										
										
										
										
										
										
										
										
										
										
									echo ('			
											</div>
									');	
									$q++;		
                                }
								echo ('
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
					</div>
        </div>
		
		');
		
		?>
		
        <!-- /#page-wrapper -->