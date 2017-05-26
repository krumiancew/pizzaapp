<!-- Page Content -->
										 <div class="container" style="background-color: #ffffff; min-height: 800px" >
										 <?php
				$data = $ln->whatdata($nazwa_restauracji);
				$akt_dzien = $data[0]['dzien'];
				$akt_data = $data[0]['data'];
				$akt_stan = $data[0]['stan'];
				
				
				if (empty($_SESSION['adres'])){
						if (empty($_POST['adrespost'])){
							$_SESSION['adres'] = $_GET['adres'];
						}
						else {
							$_SESSION['adres'] = $_POST['adrespost'];
						}
				}	
				if (empty($_SESSION['miasto'])){
						if (empty($_POST['miastopost'])){
							$_SESSION['miasto'] = $_GET['miasto'];
						}
						else {
							$_SESSION['miasto'] = $_POST['miastopost'];
						}
				}
				if (!isset($_SESSION['uwagi'])){
					
					$_SESSION['uwagi'] = '';
				} 
				if(isset($_POST['uwagi'])){
					$_SESSION['uwagi'] = ($_POST['uwagi']);
				}
				if(isset($_GET['uwagi'])){
					$_SESSION['uwagi'] = ($_GET['uwagi']);
				}
				
				
				if(isset($_POST['typ'])){
					$_SESSION['typ'] = ($_POST['typ']);
				}
				if(isset($_GET['typ'])){
					$_SESSION['typ'] = ($_GET['typ']);
				}
				
				if(isset($_POST['adresnumer'])){
					$_SESSION['adresnumer'] = ($_POST['adresnumer']);
				}
				if(isset($_GET['adresnumer'])){
					$_SESSION['adresnumer'] = ($_GET['adresnumer']);
				}
				
				if (!isset($_SESSION['mieszkanie'])){					
					$_SESSION['mieszkanie'] = '';
				}
				if(isset($_POST['mieszkanie'])){
					$_SESSION['mieszkanie'] = ($_POST['mieszkanie']);
				}
				if(isset($_GET['mieszkanie'])){
					$_SESSION['mieszkanie'] = ($_GET['mieszkanie']);
				}	
?>
											<div class="row">
												<div class="col-lg-12">
													<h1 class="page-header">Nowe zamówienie</h1>
												</div>
												<!-- /.col-lg-12 -->
											</div>
											<div class="row">
													<div class="col-lg-8">
														<div class="col-lg-7">
																																							
																							<?php	
																								echo ('	
																												<div class="notice notice-warning">
																														<i class="glyphicon glyphicon-user "></i>
																														'.$_SESSION['number'].'</br>'
																														.$_SESSION['typ'].' '.ucfirst($_SESSION['adres']).' '.$_SESSION['adresnumer'].',m.'.$_SESSION['mieszkanie'].', '.ucfirst($_SESSION['miasto']).'
																														</br>
																														'.$_SESSION['uwagi'].'
																													</div>
																								');																												
																							?>																		
						</div>																																									
					</div>
					<form action="index.php?page=neworder-sent"  method="post">
					<div class="col-lg-2">
							<select class="form-control" name="platnosc" required>
							  
							  <option value="">Płatność</option>
							  <option value="Gotówka">Gotówka</option>
							  <option value="Kartą Płatniczą">Kartą Płatniczą</option>
							  
							  <option value="Zapłacone Pyszne.pl">Zapłacone Pyszne.pl</option>
							  <option value="Zapłacone Skubacz.pl">Zapłacone Skubacz.pl</option>
							  <option value="Zapłacone PizzaPortal.pl">Zapłacone PizzaPortal.pl</option>
							  <option value="Zapłacone Własny System">Zapłacone Własny System</option>
							</select>
					</div>
					<div class="col-lg-2">
					<button class="btn btn-primary" type="submit">Potwierdź zamówienie</button>
					</div>
					</form>			
												<!-- /.col-lg-12 -->
											</div>
											</hr>
											<!-- /.row -->
											<div class="row">
												<div class="col-lg-12">
														<div class="panel-body">
															<div class="row">
																<div class="col-lg-6">
																		<div class="panel-body">
																			<div class="row">
																					<div class="col-lg-6">
																						<form action="index.php?page=neworder-cart&add"  method="post">
																						<input type="text" name="danie" id="country" class="form-control" placeholder="Wpisz produkt" autocomplete="off" required autofocus>
																						<div id="countryList" class="primary text"></div>																
																					</div>																			 
																					<div class="col-lg-4">	
																						<button class="btn btn-primary" type="submit">Dodaj</button>
																						 <a href="index.php?page=neworder-cart&delete">
																							<button class="btn btn-warning" type="button">Usuń</button>
																						 </a>	
																						</form>											
																					</div>
																			</div>	
																		<?php
																					if (isset($_GET['delete'])){
																							$produkt = $_SESSION['produkt'.($_SESSION['x']-1).''];
																							$cena = $ln->checkprice($nazwa_restauracji,$produkt);
																							$_SESSION['cena'.($_SESSION['x']).''] = $cena;
																							$_SESSION['suma'] = $_SESSION['suma'] - $cena;
																							if 	($_SESSION['suma']<0) {
																								$_SESSION['suma'] = 0;
																							}
																							unset($_SESSION['produkt'.$_SESSION['x'].'']);
																							unset($_SESSION['cena'.$_SESSION['x'].'']);
																							$_SESSION['x']--;
																					}	
																					if (isset($_GET['add'])){
																							$_SESSION['produkt'.$_SESSION['x'].''] = $_POST['danie'];
																							$produkt = $_SESSION['produkt'.$_SESSION['x'].''];
																							$cena = $ln->checkprice($nazwa_restauracji,$produkt);
																							$_SESSION['cena'.$_SESSION['x'].''] = $cena;
																							$_SESSION['x']++;
																							$_SESSION['suma'] = $_SESSION['suma'] + $cena;
																					}
																				?>
				</div>
																		</div>
																<!-- /.col-lg-6 (nested) -->
																<div class="col-lg-6">
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
																					  <th>
																					  </th>
																					  <th>Suma: '.$_SESSION['suma'].'</th>
																					</tr>
																				  </thead>		
																			'); ?>
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