

<!-- Page Content -->
       
                        
						
						
						
						
						
						
						
										  <div class="container" style="background-color: #ffffff; height: 800px" >
										 
										 
										 
										 
										 <?php
		
					
				
				$data = $ln->whatdata($nazwa_restauracji);
				
				
				$akt_dzien = $data[0]['dzien'];
				$akt_data = $data[0]['data'];
				$akt_stan = $data[0]['stan'];
				
				
				
				
				
				
				
				
				if (empty($_GET['adres'])){
					
					$_SESSION['adres'] = $_POST['adrespost'];
					
				}
				else{
					$_SESSION['adres'] = $_GET['adres'];
					
				}
					
				if (empty($_GET['miasto'])){
					
					$_SESSION['miasto'] = $_POST['miastopost'];
					
				}
				else{
					$_SESSION['miasto'] = $_GET['miasto'];
					
				}
				
				
				
				
		
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
																			Zamówienie
																		</div>
																		<div class="panel-body">
																	 
																	 
																	 
																					
	
	
																				<form action="index.php?page=neworder-cart&add" class="form-inline" method="post">
																					  <label class="sr-only" for="inlineFormInput">Name</label>
																					  <input type="text" class="form-control mb-4 mr-sm-4 mb-sm-0" id="inlineFormInput" name="produkt" >

																					  <label class="sr-only" for="inlineFormInputGroup">Username</label>
																					  <div class="input-group mb-2 mr-sm-2 mb-sm-0">
																						<div class="input-group-addon">$</div>
																						<input type="text" class="form-control" id="inlineFormInputGroup" name="cena">
																					  </div>


																					  <button type="submit" class="btn btn-primary">Submit</button>
																				</form>
																																				 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																	 
																		</div>
																		
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Zamówienie
				</div>
				<div class="panel-body">
				<div class="container" style="width:500px;">  
                <h3 align="center">Autocomplete textbox using jQuery, PHP and MySQL</h3><br />  
                <label>Enter Country Name</label>  
                <input type="text" name="country" id="country" class="form-control" placeholder="Podaj produkt" />  
                <div id="countryList"></div>  
           </div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				</div>
			</div>
			
		</div>
																
																<!-- /.col-lg-6 (nested) -->
																<div class="col-lg-6">
																	<div class="panel panel-default">
																	<div class="panel-heading">
																		Dane klienta
																	</div>
																	 <div class="panel-body"> 							


																		<div class="form-group">
																			
																				<label for="disabledSelect">Numer</label>
																				<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_SESSION['number'] ?>" disabled>
																			
																		</div>
																	<form action="index.php?page=neworder" method="post">	
																		<div class="form-group">
																			<label>Adres </label>
																			<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo ucfirst($_SESSION['adres']) ?>" disabled>
																		</div>
																		<div class="form-group">
																			<label>Miasto </label>
																			<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo ucfirst($_SESSION['miasto']) ?>" disabled>
																		</div>
																		
																		<button type="submit" class="btn btn-default">Zmień Dane</button>
																		
																	</form>			
																																						
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
																	
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