<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>PizzaApp - aplikacja dla Pizzerii, Restauracji</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="../media/styleniebieskietlo.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

		





















	





    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Rejestracja</h3>
                    </div>
                    <div class="panel-body"  >
                        <form role="form" action="registercode.php?action" method="post" autocomlete="on">
                            <fieldset>
								<form role="form" action="register.php?action=code" method="post" autocomlete="off">
										<div class="form-group">
											<div class="row">
												<div class="col-lg-8">														
													<input class="form-control" placeholder="Kod Promocyjny" name="kodpromo" type="text" value="">
												</div>	
												<div class="col-lg-4">		
													<input type="submit" class="btn btn-warning btn-block" value="Użyj kodu" />
												</div>
											</div>
										</div>
									</form>
							
							
							
							
							
							
							
							
                                
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me" required>Zapoznałem się z <a href="#">Regulaminem Serwisu</a>
                                    </label>
													
									
									
                                </div>-->
								
									<?php
		
			

														require_once('../media/engine.php');

														$ln = new listaNumerow();

													if (isset($_GET['action'])){
														
														
														if($_POST['kodpromo'] == 'RKS86XQ'){
															echo ('
																			<div style="color:blue; text-align: center;">
																			Kod prawidłowy - 6 miesięcy Gratis!
																			</div>
																			</br>																
																		');	
															$_SESSION['kodpromo'] = $_POST['kodpromo'];		
														}
														else{
															echo ('
																			<div style="color:red; text-align: center;">
																			Kod nieprawidłowy
																			</div>
																			</br>																
																		');	
															$_SESSION['kodpromo'] = $_POST['kodpromo'];				
														}
														
														
														
														
														
														
														
													}
														


														

													?>
                                <!-- Change this to a button or input when using this as a form -->
								<form role="form" action="register.php" method="post" autocomlete="off">	
									<input type="submit" class="btn btn-lg btn-primary btn-block" value="Przejdź do Rejestracji" />
									<input type="hidden" name="kodzik" value="<?php echo $_SESSION['kodpromo']; ?>">
								</form>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
