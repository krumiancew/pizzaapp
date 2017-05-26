

<?php  

session_start();







 $connect = mysqli_connect();  
 	$mysqli = new mysqli();  
		$mysqli->set_charset("utf8");
		
		$connect->query("SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
		$connect->query("SET CHARSET utf8");

		
      $output = '';  
	  $restauracja = $_SESSION['zalogowany'];
	  $rest = str_replace(' ', '', $restauracja);
      $query = "SELECT * FROM ".$rest."_menu WHERE produkt LIKE '%".$_POST["query"]."%'";  
	 
      $result = mysqli_query($connect, $query);
 	  
	  
	  
	  
	  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li class="list-group-item list-group-item-action">'.$row["produkt"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Nie znaleziono</li>';  
      }  
      $output .= '</ul>';  
      echo $output;  
   
 ?>  