<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; min-height: 800px" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Historia zamówień</h1>
						
						
						<?php
						
							if(!empty($data[0]['data'])){
								$akt_dzien = $data[0]['dzien'];
								$akt_data = $data[0]['data'];
								$akt_stan = $data[0]['stan'];
								
								$zamowienia_dzisiaj = $ln->showorders($nazwa_restauracji, $akt_data);
						
								$zamowienia_dzisiaj_ilosc = $ln->liczbarekordow($nazwa_restauracji, $akt_data);
							
							}
							
							
							
						?>
						
						
						<?php

									

									echo('<table class="table">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Godzina</th>
									  <th>Data</th>
									  <th>Numer telefonu</th>
									  <th>Adres</th>
									  <th>Płatność</th>
									  <th>Suma</th>
									  
									</tr>
								  </thead>
								 
								  
								  
								  
								  <tbody>');
								  
								  
								  
								  
								 if(!empty($data[0]['data'])){ 
								  
								  for ($i=0; $i<$zamowienia_dzisiaj_ilosc; $i++) {
									echo ('
									<tr>
									  <th scope="row">'.($i+1).'</th>
									  <td>'.$zamowienia_dzisiaj[$i]['godzina'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['data'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['numer'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['adres'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['platnosc'].'</td>
									  <td>'.$zamowienia_dzisiaj[$i]['suma'].'</td>
									  
									</tr>
									');	
								  }
								  echo ('  
								  </tbody>
								</table>');
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