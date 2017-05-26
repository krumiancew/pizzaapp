<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; height: 800px" >
            <div class="container-fluid">
			
			
				<?php
				
					
				
								
				
				
				
				
				
				
				
				?>
			
			
			
			
			
			
			
			
			
			
			
			
			
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Zamknięcie dnia</h2>
						
						<?php
								

								$data = $ln->whatdata($nazwa_restauracji);  
								
									
									if (!$data){
												echo ('
													
														<div class="alert alert-info" role="alert">
														  <strong>Tak jest - dzień został zakończony!</strong> 
														  </div>
														<a href="index.php?page=raports">
															<button type="button" class="btn btn-warning">Przejdż do rozliczenia</button>
														</a>	
														
												');
									}			
									else {
											$_SESSION['day'] = $data[0]['data'];
												echo ('
												<a href="index.php?page=close&dayclose">
													<button type="button" class="btn btn-info">Zakończ dzień -  '.$data[0]['dzien'].', '.$data[0]['data'].' </button>
												</a>	
												');									
										
									}						

			










						?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->