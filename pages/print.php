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
					
							

							 echo ('<h3>'.ucfirst($_SESSION['zalogowany']))?> Zamówienie nr #<?php echo (($_SESSION['numerzamowienia']+1).'</h3>');
							 echo ($_SESSION['aktczas'].', '.$_SESSION['aktdata']);
							 
					?>
					
					</div>
					
					
							
							
								
								
							
							
							
		
		
	
	
		<div class="row">
			<div class="col-md-12">
				<?php
		
	
		
		
		
		
																										echo ('	
																										
																											
																														<div class="notice notice-warning">
																														<i class="glyphicon glyphicon-user "></i>
																														'.$_SESSION['number'].'</br>'
																														.$_SESSION['typ'].' '.ucfirst($_SESSION['adres']).' '.$_SESSION['adresnumer'].' m.'.$_SESSION['mieszkanie'].', '.ucfirst($_SESSION['miasto']).'
																														</br>
																														'.$_SESSION['uwagi'].'
																														</br>'.$_SESSION['platnosc'].'
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
				</table>																										
																													
																</div>
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
