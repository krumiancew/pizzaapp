<!DOCTYPE html>
<html lang="en">

<head>

     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>PizzaApp - aplikacja dla Pizzerii, Restauracji</title>
	
	<!-- jQuery -->
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Druk -->
	<link rel="Stylesheet" media="print" type="text/css" href="../media/print.css" />
	
	<!-- Druk -->
	<link rel="Stylesheet"  type="text/css" href="../media/custom.css" />

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="../media/custom.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	

</head>

<body onload="window.print();">

   
	<div class="container-fluid">
	
		<div class="text-left" style="width: 100%">
				<?php
				
				
				
					session_start();
					
					include("../media/mysqlconstruct.php");
					
					$nazwa_restauracji = $_SESSION['zalogowany'];
					
					$logo = $ln->pokazlogo($nazwa_restauracji);
					
					if(!($logo[0]['logo']=='')){
						echo('
							<div class="text-left" style="width: 100%">	
								<div class="logodiv" style="width: 30% !important;">
									<img src="../'.$logo[0]['logo'].'" alt="Logo" />     
								</div>	
							</div>
						');
					}
					
					?>
					
					<div class="text-center" style="width: 100%">
					
					
					<?php
						
							if (isset($_GET['id'])){
								$zamid=$_GET['id'];
									
								}
							
							$zamowienie = $ln->pokazzamowienie($_SESSION['zalogowany'], $zamid);
							
							
							
					
				

							

							 echo ('<h3>'.ucfirst($_SESSION['zalogowany']))?> Zamówienie # <?php echo ($zamowienie[0]['idzamowienia'].'</h3>');
							 echo ($zamowienie[0]['godzina'].', '.$zamowienie[0]['data']);
					?>
			</div>
		
	
	
		<div class="row">
			<div class="col-md-12">
				<?php
		
	
		
		
		
		
																										echo ('	
																														
																													<div class="notice notice-warning">
																														<i class="glyphicon glyphicon-user "></i>
																														'.$zamowienie[0]['numer'].'</br>'
																														.$zamowienie[0]['typ'].' '.ucfirst($zamowienie[0]['adres']).' '.$zamowienie[0]['adresnumer'].' m.'.$zamowienie[0]['mieszkanie'].', '.ucfirst($zamowienie[0]['miasto']).'
																														</br>
																														'.$zamowienie[0]['uwagi'].'
																														</br>'.$zamowienie[0]['platnosc'].'
																													</div>	
																										
																										');		
		
		
		
		
		
		
	
	?>
					
			</div>
			<div class="row">
			<div class="col-md-12">
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
																															  
																																	for ($i=0; $i<100; $i++) {
																																		
																																		if (isset($zamowienie[$i]['nazwa']))	{	
																																		echo ('
																																			<tr>
																																			  <th scope="row">'.($i+1).'</th>
																																			  <td>'.$zamowienie[$i]['nazwa'].'</td>
																																			  <td>'.$zamowienie[$i]['cena'].'</td>							  							
																																			</tr>
																																		');
																																		

																																		
																																	}	
																																		
																																		
																																	}
																																		echo ('					
																															  </tbody>
																															  <thead>
																																<tr>
																																  <th></th>
																																  <th></th>
																																  <th>Suma: '.$zamowienie[0]['suma'].'</th>
																																  
																																</tr>
																															  </thead>		
																														'); ?>
				</table>																										
																													
																</div>
			</div>
		
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<div class="text-center" style="width: 100%">
																	
	<?php																	
	 echo ('<h3>PizzaApp.pl</h3>');
	 echo ('<h5>Program do Pizzerii</h5>');
	 echo ('<a href="../index.php"   class="displayoff">	
				<button type="button" class="btn btn-primary displayoff">Strona Główna</button>
				</a>')
	?>	
	</div>	
	
</body>

</html>
