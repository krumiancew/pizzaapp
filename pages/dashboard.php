<!-- Page Content -->
<?php 

							if (isset($_GET['driver'])){
								
								$ln->zmienstatuszam($nazwa_restauracji, $_SESSION['idzam'], $_GET['driver']);
							
							
							
							
							
							}
							
							
							
						
							if (isset($_GET['delivered'])){
								$zam_dost_id=$_GET['delivered'];
								
									
								}
							
							
							
						//Pokazywanie mapy gdy nie ma aktywnego dnia
								
							
							
							
							
							if(!empty($data[0]['data'])){
								$akt_dzien = $data[0]['dzien'];
								$akt_data = $data[0]['data'];
								$akt_stan = $data[0]['stan'];
								
								$zam_nierozw = $ln->pokaznierozw($nazwa_restauracji, $akt_data);
								
								//print_r($zam_nierozw);
						
								$zam_nierozw_ilosc = $ln->liczbarekordownierozw($nazwa_restauracji, $akt_data);
								
								
								
								
							
							}
							else{
								$data = '2017-01-01';								
								$zam_nierozw = $ln->pokaznierozw($nazwa_restauracji, $data);
								$zam_nierozw_ilosc = $ln->liczbarekordownierozw($nazwa_restauracji, $data);
								
							}
							
							
							$adresrest = $ln->adresrestauracji($nazwa_restauracji);
							
							
							
							
					//Powitalny Modal		
							
							
					if (isset($_GET['tutorial'])){
					 echo ('
					 
							<div class="modal fade" id="PowitalnyModal" role="dialog">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h3 class="modal-title">Witaj w aplikacji PizzaApp.pl</h3>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
									  <p> Oto Pulpit Twojej Restauracji - możesz wprowadzać i drukować zamówienia z logo Twojej Restauracji.
									  W usprawnieniu obsługi zamówień pomoże Ci mapa na której będą widoczne wszystkie oczekujące zamówienia.
									  </br>
									  <p>
										<p><b>Dodawanie Menu</b></br>
										 W zakładce Ustawienia/Menu możesz usunąć "testowe" menu oraz dodać własne.</p>
										 <p><b>Dodawanie Kierowców </b></br>
										 W zakładce Ustawienia/Kierowcy możesz dodać dostawców, którzy będą rozwozić zamówienia.</p>
										 <p><b>Dodawanie Logo </b></br>
										 W zakładce Ustawienia/Dane Restauracji możesz wgrać logo restauracji, które będzie widoczne na wydruku</p>
											
										<p><b>Nowe zamówienie </b></br>
										 1.Przejdź do zakładki "Nowy dzień" i wybierz datę, a nastepnie naciśnij "Potwierdź"</br>
										 2.Naciśniej przycisk "Nowe zamówienie".</br>
										 3.Podaj numer telefonu klienta.</br>
										 4.Wybierz adres klienta z podpowiedzi lub wprowadź nowy adres.</br>
										 5.Dodaj produkty do zamówienia.</br>
										 6.Wybierz metodę płatności, a następnie naciśnij "Potwierdź zamówienie".</br>
										 </p>	
										 
										 <p><b>Wydruk zamówień</b></br>
										 1. Wydruk zamówień może odbywać na dowolnym urządzeniu.</br>
										 2. Zalecamy wydruk na standardowej drukarce komputerowej - format papieru A5.</br>
										 3. Zalecany układ wydruku - pionowy.
										
										 </p>
										
									  </div>
									  <div class="modal-footer">
										
										<button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">OK</button>
										 
										
									  </div>
									</div>
								  </div>
								</div>');								 
				
					 }	

?>





			


        
           
			<div class="row">
				<div class="col-lg-12">
				
					 
						<div id="map" style="height: 600px " ></div>
						<script>
						var map, infoWindow;
						  function initMap() {

							var map = new google.maps.Map(document.getElementById('map'), {
							  zoom: 11,
							  
							});
							//infoWindow = new google.maps.InfoWindow;
							// Try HTML5 geolocation.
							/*
											if (navigator.geolocation) {
											  navigator.geolocation.getCurrentPosition(function(position) {
												var pos = {
												  lat: position.coords.latitude,
												  lng: position.coords.longitude
												};

												//infoWindow.setPosition(pos);
												//infoWindow.setContent('Restauracja.');
												//infoWindow.open(map);
												map.setCenter(pos);
											  }, function() {
												handleLocationError(true, infoWindow, map.getCenter());
											  });
											} else {
											  // Browser doesn't support Geolocation
											  handleLocationError(false, infoWindow, map.getCenter());
											}


											function handleLocationError(browserHasGeolocation, infoWindow, pos) {
											infoWindow.setPosition(pos);
											infoWindow.setContent(browserHasGeolocation ?
																  'Error: The Geolocation service failed.' :
																  'Error: Your browser doesn\'t support geolocation.');
											infoWindow.open(map);
											}
							*/
							var geocoder = new google.maps.Geocoder();
							var trafficLayer = new google.maps.TrafficLayer();
							trafficLayer.setMap(map);
						
						
						//Marker na pozycję restauracji
						
						$( document ).ready(function() {
						  geocodeAddressRest(geocoder, map);
						});
						
					 function geocodeAddressRest(geocoder, resultsMap) {
						var address = "<?php echo ($adresrest[0]['adres'].', '.$adresrest[0]['miasto']); ?>";
						geocoder.geocode({'address': address}, function(results, status) {
						  if (status === 'OK') {
							map.setCenter(results[0].geometry.location);
							var marker = new google.maps.Marker({
							  map: resultsMap,
							  position: results[0].geometry.location,
							  icon: 'images/restaurant.png'
							});
						  } 
						});
						}
						
						//Marker na pozycję restauracji koniec
						
						
						
						<?php
						for ($i=0; $i<$zam_nierozw_ilosc; $i++){
								echo ('	
											$( document ).ready(function() {
											setTimeout(function(){geocodeAddress'.$i.'(geocoder, map)}, ('.$i.'000)/20);  	
											  
											
											});
									 ');
						}
						?>		
						  }

						  
						<?php
						for ($i=0; $i<$zam_nierozw_ilosc; $i++){
								echo ("	
								
								  function geocodeAddress".$i."(geocoder, resultsMap) {
									var address = '".$zam_nierozw[$i]['typ'].' '.$zam_nierozw[$i]['adres'].' '.$zam_nierozw[$i]['adresnumer'].', '.$zam_nierozw[$i]['miasto']."';
									geocoder.geocode({'address': address}, function(results, status) {
									  if (status === 'OK') {
										  
										  
										
										
										
										var infowindow = new google.maps.InfoWindow({
												  content: '#".$zam_nierozw[$i]['idzamowienia'].' - '.$zam_nierozw[$i]['typ'].' '.$zam_nierozw[$i]['adres'].' '.$zam_nierozw[$i]['adresnumer'].', '.$zam_nierozw[$i]['miasto'].
																	"'
												});		
										
										
										var marker = new google.maps.Marker({
										  map: resultsMap,
										  position: results[0].geometry.location,
										  icon: 'images/pizzaria.png'
										  
										});		
																				
										
										 marker.addListener('click', function() {
												  infowindow.open(map, marker);
												});		
										
										
										
										
										
										
										
									  } 
										
									});
								  }
								  
								  
								  
						 ");
						}
						?>		  
						  
						  
						  
						  
						</script>
						<script async defer
						src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD7OR4hOth8C1XXeAjRbXIpul5SR1uDbeI&callback=initMap">
						</script>
									
				
				</div>	
			</div>
			
                <div class="row">
				
				<?php
								
									

									echo('
				
				
                    <div class="col-lg-8">
					 <div class="panel panel-info" style="min-height: 355px;">
                        <div class="panel-heading">
                            W trakcie realizacji
                        </div>
                        <div class="panel-body">
                        
						
						
						
						<table class="table">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>ID</th>
									  <th>Godzina</th>
									  <th>Czas</th>
									  <th>Numer telefonu</th>
									  <th>Adres</th>
									  <th>Płatność</th>
									  <th>Suma</th>
									  <th></th>
									  <th></th>
									  
									</tr>
								  </thead>
								 
								  
								  
								  
								  <tbody>');
								  
								  
								  
								  
								 
								  
								  for ($i=0; $i<$zam_nierozw_ilosc; $i++) {
									echo ('
									
									<tr>
									
									  <th scope="row">'.($i+1).'</th>
									  <td>'.$zam_nierozw[$i]['idzamowienia'].' </td>
									  <td>'.$zam_nierozw[$i]['godzina'].' </td>
									  <td><div>'.$ln->obliczczas($zam_nierozw[$i]['godzina']).'</div></td>
									  <td>'.$zam_nierozw[$i]['numer'].'</td>
									  <td>'.$zam_nierozw[$i]['typ'].' '.$zam_nierozw[$i]['adres'].' '.$zam_nierozw[$i]['adresnumer'].'</td>
									  <td>'.$zam_nierozw[$i]['platnosc'].'</td>
									  <td>'.$zam_nierozw[$i]['suma'].'</td>
									  <td>
										<a href ="index.php?page=show-order&id='.$zam_nierozw[$i]['idzamowienia'].'" class="">
											<button type="button" class="btn btn-info btn-circle"><span class="glyphicon glyphicon-search"></span>
											</button>
										</a>
									  </td>
									   <td>
										<a href ="index.php?page=delivered&id='.$zam_nierozw[$i]['idzamowienia'].'" class="">
												<button type="button" class="btn btn-warning btn-circle"><span class="glyphicon glyphicon-ok"></span>
											</button>
										</a>
									  </td>
									 
									</tr>
									
									');	
								  }
								  echo ('  
								  </tbody>
								</table>');
						


						
						
						
							

						
						 
						echo ('	 
						</div>
                    </div>
						
						
                    </div>
					<div class="col-lg-4">
					<div class="panel panel-info" style="-min-height: 300px;">
                        <div class="panel-heading">
                            Panel
                        </div>
                        <div class="panel-body">
						
						');
											
						 
						 
						 if(isset($akt_data)){
						
						 $utarg = $ln->obliczutarg($nazwa_restauracji, $akt_data);
														
							
							$zamowienia_dzisiaj = $ln->showorders($nazwa_restauracji, $akt_data);
							
						
							$zamowienia_dzisiaj_ilosc = $ln->liczbarekordow($nazwa_restauracji, $akt_data);
							

							$utarggot = $ln->obliczutarggotowka($nazwa_restauracji, $akt_data);

							
							$utargon = $utarg-$utarggot;
						 }
						 else{
							 $utarg = 0;
														
							
							$zamowienia_dzisiaj = 0;
							
						
							$zamowienia_dzisiaj_ilosc = 0;
							

							$utarggot = 0;

							
							$utargon = 0;
							 
							 
							 
						 }
						 
								echo ('
								
								
								
                    
												<div class="row">
													<div class="col-lg-6 col-md-6">
														<div class="panel panel-primary">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-shopping-cart fa-2x"></i>
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
													<div class="col-lg-6 col-md-6">
														<div class="panel panel-green">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-child fa-2x"></i>
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
													<div class="col-lg-6 col-md-6">
														<div class="panel panel-yellow">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-money fa-2x"></i>
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
													<div class="col-lg-6 col-md-6">
														<div class="panel panel-red">
															<div class="panel-heading">
																<div class="row">
																	<div class="col-xs-3">
																		<i class="fa fa-credit-card fa-2x"></i>
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
						 
					?>	
						 
						 
						 <!-- Modal Onload -->
	<script type="text/javascript">
    $(window).load(function(){
        $('#PowitalnyModal').modal('show');
    });
	</script>
						</div>
					</div>
					</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
				
				
				
				
				
				
				
				
				
				
				
				
				
				
        