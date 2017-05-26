<?php

				session_start();

				if (isset($_GET['logout'])){
								unset($_SESSION['zalogowany']);	
								session_destroy;
									
								}	
			
				if (isset($_SESSION['zalogowany'])) {	
					$nazwa_restauracji =  ($_SESSION['zalogowany']);
				}
				else {
					header('Location: pages/login.php');
					
				}          
?>