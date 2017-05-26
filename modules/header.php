<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PizzaApp - aplikacja dla Pizzerii, Restauracji</title>
	
	<!-- jQuery -->
	 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Druk -->
	<link rel="Stylesheet" media="print" type="text/css" href="media/print.css" />
	
	<!-- Druk -->
	<link rel="Stylesheet"  type="text/css" href="media/custom.css" />

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="media/custom.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	
	
	
	
	
	 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>

    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	
	<!--AJAX-->
	
	
	
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	
	
	
	
	
	
	<!--/AJAX-->
	
	
	
	
	
	



</head>

<body>
	
	
<?php
error_reporting(E_ALL ^ E_NOTICE);

									
									
									

								$nowydzien = $ln->whatdata($nazwa_restauracji);

		
								if (empty($nowydzien)){
									if (isset($_GET['newday'])){
										
										
										$ln->newday($_POST['data'], $_POST['dzien'], 1, $nazwa_restauracji);
										
									}	
								}


								
								
							$data = $ln->whatdata($nazwa_restauracji);  	
								
								if (isset($_GET['dayclose'])){
								
								
							
								$ln->usun_dzien_z_bazy($nazwa_restauracji,$data[0]['dzien'],$data[0]['data']); 
							
								
								}
								
								
							$ilednikonto = $ln->waznosc_konta($nazwa_restauracji);
												
?>






   <nav class="navbar navbar-default navbar-inverse" style="margin-bottom: 0;" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand active" href="index.php?page=activation"><?php echo $_SESSION['zalogowany'].' - aktywne do '.$ilednikonto; ?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="index.php?page=dashboard">Pulpit</a></li>
		
        
		
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          
        </div>
		
		
		
		<?php
								$data = $ln->whatdata($nazwa_restauracji);  
								
								
									
									if (!$data){
												echo ('
													
														<a href="index.php?page=newday">
														<button type="button" class="btn btn-default">Nowy Dzień</button>
														</a>
												');
									}			
									else {
										
												echo ('
													<a href="index.php?page=neworder">
													<button type="button" class="btn btn-default">Nowe zamówienie</button>
													</a>
												');									
										
									}
							
							
							
				
				
				
							
							
							
							?>
		
		
	
		
		
        
      </form>
	  
	  
	  <ul class="nav navbar-nav navbar-right">
	  
					
      <ul class="nav navbar-nav navbar-right">
		
	    <?php if($data) {echo ('<li><a href="index.php?page=close">Koniec - '.$data[0]['dzien'].', '.$data[0]['data'].'</a></li>');} ?>
		
        <li class="dropdown">
         
		  <li><a href="index.php?page=raports">Raporty</a></li>
		  <li><a href="index.php?page=properties">Ustawienia</a></li>
		  <li><a href="index.php?page=help">Pomoc</a></li>
        <li class="dropdown">
          <a  href="index.php?logout"><b>Wyloguj</b> </a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								Login via
								<div class="social-buttons">
									<a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
									<a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> Twitter</a>
								</div>
                                or
								 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>
											 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="exampleInputPassword2">Password</label>
											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>
										</div>
										<div class="form-group">
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
										</div>
										<div class="checkbox">
											 <label>
											 <input type="checkbox"> keep me logged-in
											 </label>
										</div>
								 </form>
							</div>
							<div class="bottom text-center">
								New here ? <a href="#"><b>Join Us</b></a>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
