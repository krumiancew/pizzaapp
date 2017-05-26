<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; min-height: 800px" >
            <div class="container-fluid">
				<div class="row">
				 <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills justify-content-center">
                                <li ><a href="index.php?page=properties" >Dane restauracji</a>
                                </li>
                                <li class="active"><a href="index.php?page=drivers" >Kierowcy</a>
                                </li>
                                <li><a href="index.php?page=menu" >Menu</a>
                                </li>
                                <!--<li><a href="#settings-pills" data-toggle="tab">Settings</a>
                                </li>-->
                            </ul>
				<h4 class="page-header">Lista kierowców</h4>
                    <div class="col-lg-4">
					
					
					<h1></h1>
					
						<form action="index.php?page=drivers&add" method="post">
							<div class="form-group row">
							  <label for="example-date-input" class="col-2 col-form-label">Kierowca</label>
							  
								<input class="form-control" type="text" value="" id="example-date-input" name="driver" required>
							 
							</div>
							
							<div class="form-group row">
							<button type="submit" class="btn btn-warning">Dodaj kierowcę</button>
							
							</div>
						</form>	
					</div>
				</div>	
                <div class="row">
                    <div class="col-lg-6">
                        
						<?php
						
						if (isset($_GET['delete'])){
						$nazwakierowcy=$_GET['delete'];
						$ln->usunkierowce($nazwakierowcy,$nazwa_restauracji);		
						}
						
						if (isset($_GET['add'])){
						
						$ln->dodajkierowce($_POST['driver'],$nazwa_restauracji);		
						}
						
						
						
						
						$kierowcy = $ln->ilukierowcow($nazwa_restauracji);
						$liczbamenu = $ln->liczbamenu($nazwa_restauracji);
						
						
						
						
						
						?>
						
						
						<?php

									

									echo('<table class="table ">
										  <thead>
											<tr>
											  <th>#</th>
											  <th>Kierowca</th>									  
											  <th></th>
											  
											  
											</tr>
										  </thead>
										 
										  
										  
										  
										  <tbody>
									');
								  

								  
								$x=0;
								while (isset($kierowcy[$x]['id'])){
									
													echo ('
												<tr>
												  <th scope="row">'.($x+1).'</th>
												  <td>'.$kierowcy[$x]['nazwa'].'</td>												 
												  <td><a href="index.php?page=drivers&delete='.$kierowcy[$x]['nazwa'].'">Usun</a></td>
												  
												</tr>
												');
										$x++;	
								}
								  echo ('  
								  </tbody>
								</table>');
								 	
						?> 	
						
						
						
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->