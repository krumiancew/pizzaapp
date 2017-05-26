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
                        <form role="form" action="register.php?action=register" method="post" autocomlete="on">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="login" type="email" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Hasło" name="haslo" type="password" value="" required>
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Powtórz Hasło" name="haslo2" type="password" value="" required>
                                </div>
								 <div class="form-group">
                                    <input class="form-control" placeholder="Nazwa Restauracji" name="restauracja" type="text" value="" required>
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Adres Restauracji" name="adres" type="adress" value=""required>
                                </div>
								 <div class="form-group">
                                    <input class="form-control" placeholder="Miasto" name="miasto" type="text" value=""required>
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Telefon Restauracji" name="telefon" type="phonenumber" value="">
                                </div>
								<h4><a href="registercode.php">Posiadam kod promocyjny <?php if(isset($_POST['kodzik'])){echo ' - '.$_POST['kodzik'];}?></a></h4>
								
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me" required>Zapoznałem się z <a href="#">Regulaminem Serwisu</a>
                                    </label>
													
									
									
                                </div>-->
								
									<?php
		
			

														require_once('../media/engine.php');

														$ln = new listaNumerow();
										
														if (isset($_POST['kodzik'])){
															$kodzik = $_POST['kodzik'];															
														}

														if (isset($_GET['action'])){
															switch($_GET['action'])	{

																case 'register':
																
																	$checklogin = $ln->sprawdzlogin($_POST['login']);
																	
																
																
																	if (!($_POST['haslo'] == $_POST['haslo2'])) {
																	echo ('
																	<div style="color:red; text-align: center;">
																	Podane hasła muszą być identyczne!
																	</div>
																	</br>																
																	');
																	}
																	else if ($ln->sprawdzrest($_POST['restauracja']) == 1)
																	{
																		echo ('
																			<div style="color:red; text-align: center;">
																			Nazwa Restauracji jest już zajęta!
																			</div>
																			</br>																
																		');											
																	}
																	else if ($checklogin[0]['login']== ($_POST['login']))
																	{
																		echo ('
																			<div style="color:red; text-align: center;">
																			Wybrany login jest już zajęty!
																			</div>
																			</br>																
																		');											
																	}
																	else{
																	$ln->zarejestruj($_POST['login'],$_POST['haslo'],ucfirst($_POST['restauracja']),$_POST['miasto'],$_POST['adres'],$_POST['telefon'], $_POST['code']);
																	}

																	break;
															}





														}

													?>
                                <!-- Change this to a button or input when using this as a form -->
								<input type="hidden" name="code" value="<?php echo $kodzik; ?>">                                
								<input type="submit" class="btn btn-lg btn-primary btn-block" value="Zarejestruj" />
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
