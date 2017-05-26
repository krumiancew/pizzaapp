<!-- Page Content -->
        <div class="container" style="background-color: #ffffff; height: 800px" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Rozpocznij nowy dzień</h1>
						
						<?php
							
						?>
						
						
						
						<form action="index.php?newday" method="post">	
							<div class="col-lg-6">
							<div class="form-group row">
							  <select class="form-control" name="dzien">
							  <option value="Poniedziałek">Poniedziałek</option>
							  <option value="Wtorek">Wtorek</option>
							  <option value="Środa">Środa</option>
							  <option value="Czwartek">Czwartek</option>
							  <option value="Piątek">Piątek</option>
							  <option value="Sobota">Sobota</option>
							  <option value="Niedziela">Niedziela</option>
							</select>
							</div>
							<div class="form-group row">
							  <label for="example-date-input" class="col-2 col-form-label">Date</label>
							  <div class="col-10">
								<input class="form-control" type="date" value="<?php echo date("Y-m-d"); ?>" id="example-date-input" name="data">
							  </div>
							</div>
							<div class="form-group row">
							<button type="submit" class="btn btn-primary">Potwierdzam</button>
							</div>
							</div>
						</form>
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
					
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->