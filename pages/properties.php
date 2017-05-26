<!-- Page Content -->
         <div class="container" style="background-color: #ffffff; height: 800px" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        
						
						
						 <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills justify-content-center">
                                <li class="active"><a href="index.php?page=properties" >Dane restauracji</a>
                                </li>
                                <li><a href="index.php?page=drivers" >Kierowcy</a>
                                </li>
                                <li><a href="index.php?page=menu" >Menu</a>
                                </li>
                                <!--<li><a href="#settings-pills" data-toggle="tab">Settings</a>
                                </li>-->
                            </ul>
							
							
							<form action="index.php?page=properties" method="post" enctype="multipart/form-data">
								<h4 class="page-header">Logo Restauracji - widoczne na wydrukach z zamówieniami</h4>
								<div class="form-group">
								<input type="file" name="fileToUpload" id="fileToUpload">
								<small id="fileHelp" class="form-text text-muted">JPG, JPEG, PNG, GIF - rozmiar 200x80 px</small>
								 </div>
								
								
							
                            <h4 class="page-header"></h4>
							
							<div class="form-group">
							 <button type="submit" class="btn btn-primary">Wczytaj plik</button>
							 <a href="index.php?page=properties&deletelogo"> <button type="button" class="btn btn-warning">Usuń plik</button></a>
    
						  </div>
							</form>						
							<?php
								if (isset($_GET['deletelogo'])){
								
								$ln->usunlogo($nazwa_restauracji);
								}
							
							
							
							
							
							
							
								$target_dir = "uploads/";
								$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
								$uploadOk = 1;
								$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
								// Check if image file is a actual image or fake image
								if(isset($_POST["submit"])) {
									$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
									if($check !== false) {
										echo "File is an image - " . $check["mime"] . ".";
										$uploadOk = 1;
									} else {
										echo "File is not an image.";
										$uploadOk = 0;
									}
								}
								// Check if file already exists
								if (file_exists($target_file)) {
									
									$uploadOk = 0;
								}
								// Check file size
								if ($_FILES["fileToUpload"]["size"] > 500000) {
									echo "Sorry, your file is too large.";
									$uploadOk = 0;
								}
								// Allow certain file formats
								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
								&& $imageFileType != "gif" ) {
									echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
									$uploadOk = 0;
								}
								// Check if $uploadOk is set to 0 by an error
								if ($uploadOk == 0) {
									echo "Sorry, your file was not uploaded.";
								// if everything is ok, try to upload file
								} else {
									$temp = explode(".", $_FILES["fileToUpload"]["name"]);
										$newfilename = round(microtime(true)) . '.' . end($temp);
										
										
									
									if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file.$newfilename)) {
										
										
										$nam = $target_file.$newfilename;
										
										
										$ln->dodajlogo($nazwa_restauracji, $nam);
										
										
									} else {
										echo "Sorry, there was an error uploading your file.";
									}
								}
								
								$logo = $ln->pokazlogo($nazwa_restauracji);
							
								
								
								?>
							
							
							<div class="form-group">
							</br>
							</br>
							<img src="<?php echo $logo[0]['logo']; ?>"  />
							</div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->