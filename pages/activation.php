<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; height: 800px" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Wybór pakietu </h1>
						  <div class="row">
							<div class="col-lg-4">
							
							<form action="https://secure.tpay.com" method="post" accept-charset="utf-8">
								<div class="form-group">
								<label for="exampleSelect1">Pakiety</label>
								<select name="kwota" class="form-control" id="exampleSelect1">
										  <option value="468.00">Przedłużam na rok - 468 zł</option>
										  <option value="59.00">Przedłużam na miesiąc - 59 zł</option>
										  
										</select>
							  </div>
							  <div class="form-check">
								<label class="form-check-label">
								  <input type="checkbox" class="form-check-input" required>
								  Akceptuję regulamin

								</label>
							  </div>
							  <h2></h2>
							  <button type="submit" class="btn btn-primary">Przejdż do płatności</button>
							  
							 
							  
							  
							  
							  
										<input type="hidden" name="id" value="9351">
										
										<input type="hidden" name="opis" value="<?php echo $_SESSION['zalogowany']; ?>">
										
										<input type="hidden" name="pow_url" value="http://www.panel.pizzaapp.pl/">
										
										
										
										
							  
							</form>
							  
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