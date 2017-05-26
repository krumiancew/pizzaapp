

<!-- Page Content -->
 <div class="container" style="background-color: #ffffff; height: 800px" >
	<?php
		$data = $ln->whatdata($nazwa_restauracji);
		$akt_dzien = $data[0]['dzien'];
		$akt_data = $data[0]['data'];
		$akt_stan = $data[0]['stan'];			
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
						<form action="index.php?page=neworder-sent" method="post">																										
							<?php	

																								echo ('	
																								
																									
																												<ul class="list-group ">
																												  
																												  <li class="list-group-item">Numer: '.$_SESSION['number'].'</li>
																												  <li class="list-group-item">Adres: '.$_SESSION['adres'].', '.$_SESSION['miasto'].'</li>
																												  <li class="list-group-item">
																													<select class="form-control" name="platnosc">
																													  <option selected>Gotówka</option>
																													  <option>Kartą Płatniczą</option>
																													  <option>Zapłacone Pyszne.pl</option>
																													  <option>Zapłacone Skubacz.pl</option>
																													  <option>Zapłacone PizzaPortal.pl</option>
																													  <option>Zapłacone Własny System</option>
																													</select>
																												  </li>
																												 <li class="list-group-item">
																												  <button class="btn btn-primary" type="submit">Potwierdzam zamówienie</button>
																												  </li>
																												</ul>
																												
																											<div class="notice notice-warning">
        <strong>Notice</strong> notice-warning
    </div>
																								
																								');																												
																							
							?>																		
						</form>																																		
					</div>																
					<!-- /.col-lg-6 (nested) -->
					<div class="col-lg-6">
						<div class="panel panel-default">
							<div class="panel-heading">
								Zamówienie
							</div>
							<div class="panel-body">
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






























