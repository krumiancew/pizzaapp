<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; min-height: 800px" >
            <div class="container-fluid">
				<div class="row">
					<div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills justify-content-center">
                                <li ><a href="index.php?page=properties" >Dane restauracji</a>
                                </li>
                                <li ><a href="index.php?page=drivers" >Kierowcy</a>
                                </li>
                                <li class="active"><a href="index.php?page=menu" >Menu</a>
                                </li>
                                <!--<li><a href="#settings-pills" data-toggle="tab">Settings</a>
                                </li>-->
                            </ul>
				<h4 class="page-header">Edytor Menu</h4>
                    <div class="col-lg-4">
					
					<h1></h1>
						<form action="index.php?page=menu&add" method="post">
							<div class="form-group row">
							  <label for="example-date-input" class="col-2 col-form-label">Produkt</label>
							  
								<input class="form-control" type="text" value="" id="example-date-input" name="produkt" required>
							 
							</div>
							<div class="form-group row">
							  <label for="example-date-input" class="col-2 col-form-label">Cena</label>
							  
								
							 <input class="form-control" type="number" min="0.00" max="1000.00" step="0.01" value="" id="example-date-input" name="cena" required />
							</div>
							<div class="form-group row">
							<button type="submit" class="btn btn-warning">Dodaj Produkt</button>
						<!--	<a href="index.php?page=menu&deleteall">
							<button type="button" class="btn btn-warning">Usuń całe menu</button>
							</a> 
						-->	
							</div>
						</form>	
					</div>
				</div>	
                <div class="row">
                    <div class="col-lg-12">
                        
						<?php
						
						if (isset($_GET['delete'])){
						$produktid=$_GET['delete'];
						$ln->usunprodukt($produktid,$nazwa_restauracji);		
						}
						
						if (isset($_GET['add'])){
						
						$ln->dodajprodukt($_POST['produkt'],$_POST['cena'],$nazwa_restauracji);		
						}
						
						if (isset($_GET['deleteall'])){
						
						$ln->usunwszystko($nazwa_restauracji);		
						}
						
						
						$menu = $ln->showmenu($nazwa_restauracji);
						$liczbamenu = $ln->liczbamenu($nazwa_restauracji);
						
						
						
						
						
						?>
						
						
						<?php

									

									echo('<table class="table ">
								  <thead>
									<tr>
									  <th>#</th>
									  <th>Produkt</th>
									  <th>Cena</th>
									  <th></th>
									  
									  
									</tr>
								  </thead>
								 
								  
								  
								  
								  <tbody>');
								  
								  
								  
								  
								 if(!empty($menu[0]['id'])){ 
								  
								  for ($i=0; $i<$liczbamenu; $i++) {
									echo ('
									<tr>
									  <th scope="row">'.($i+1).'</th>
									  <td>'.$menu[$i]['produkt'].'</td>
									  <td>'.$menu[$i]['cena'].'</td>
									  <td><a href="index.php?page=menu&delete='.$menu[$i]['id'].'">Usun</a></td>
									  
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