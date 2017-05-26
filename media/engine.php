<?php

	class listaNumerow {

		var $handle;

		function __construct($dbuser, $dbpass, $dbname, $dbhost){
			$this->handle = mysql_connect($dbhost, $dbuser, $dbpass) or die('zle dane');

			$tmp = mysql_select_db($dbname, $this->handle) or die ('zla baza');
			
			mysql_query('SET NAMES utf8');
		}

		function dodaj($numer, $adres, $produkty, $suma, $platnosc){

			mysql_query('insert into zamowienia values(null,\''.$numer.'\',\''.$adres.'\',\''.$produkty.'\',\''.$suma.'\',\''.$platnosc.'\');');
		}
		
		
		function lista($numer){

				$ret = array();


				$odpowiedz = mysql_query('select * from numery_tel where numer='.$numer.';');

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					$ret [] = $txt;

				}
				return $ret;
				}







		}


		function zarejestruj($login, $haslo, $restauracja, $miasto, $adres, $telefon, $kod){
			
			$logo = '';
			$datakonta = date("Y:m:d");
			
			
			
			
			
			$datarejestracji = date("Y-m-d");   
			
			$superkod = 'RKS86XQ';
			
			

			// zamiana daty na znacznik czasu 
			$d1 = strtotime($datarejestracji);   
			
			if ($kod == $superkod){
				$d2 = 15552000;
			}
			else{
				$d2 = 2592000;
			}		
			
			
			$d = $d1 + $d2; 

			// format nowej daty 
			$waznosckonta = date("Y-m-d", $d); 
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			

			
			mysql_query('insert into restauracje values(null,\''.$login.'\',\''.$haslo.'\',\''.$restauracja.'\',\''.$miasto.'\',\''.$adres.'\',\''.$telefon.'\',\''.$logo.'\',\''.$datakonta.'\',\''.$waznosckonta.'\');');
			
			
			
			
			$rest = str_replace(' ', '', $restauracja);
			
			
			mysql_query('CREATE TABLE '.$rest.'_zamowienia(
							idzamowienia INT NOT NULL AUTO_INCREMENT, 
							PRIMARY KEY(idzamowienia),
							 idklienta INT,				 									
							 platnosc VARCHAR(30),
							 suma FLOAT,
							 data DATE,
							 godzina TIME,
							 status VARCHAR(30))')		
							 or die(mysql_error()); 



			mysql_query('CREATE TABLE '.$rest.'_produkty(
							idproduktu INT NOT NULL AUTO_INCREMENT, 
							PRIMARY KEY(idproduktu),
							 nazwa VARCHAR (100),	
							 cena FLOAT,
							 idzamowienia INT)')		
							 or die(mysql_error()); 
			
			mysql_query('CREATE TABLE '.$rest.'_klienci(
							idklienta INT NOT NULL AUTO_INCREMENT, 
							PRIMARY KEY(idklienta),
							 numer INT,	
							 adres VARCHAR(50),
							 miasto VARCHAR(20),
							 uwagi VARCHAR(200),
							 typ VARCHAR(50),
							 adresnumer VARCHAR(50),
							 mieszkanie VARCHAR(50))')		
							 or die(mysql_error());
			mysql_query('CREATE TABLE '.$rest.'_dzien(
							 dzien VARCHAR(30),
							 data DATE,
							 stan INT)')		
							 or die(mysql_error());	
			mysql_query('CREATE TABLE '.$rest.'_menu(
							 id INT NOT NULL AUTO_INCREMENT, 
							 PRIMARY KEY(id),
							 produkt VARCHAR(50),
							 cena FLOAT)')		
							 or die(mysql_error());
			mysql_query('CREATE TABLE '.$rest.'_kierowcy(
							 id INT NOT NULL AUTO_INCREMENT, 
							 PRIMARY KEY(id),
							 nazwa VARCHAR(50))')		
							 or die(mysql_error());				 
			mysql_query('insert into '.$rest.'_menu values(null,\'Margherita 30cm\',\'20,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Margherita 40cm\',\'25,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Margherita 50cm\',\'30,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Capriciosa 30cm\',\'40,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Capriciosa 40cm\',\'49,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Capriciosa 50cm\',\'50,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Mirinda 1L\',\'5,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Tortilla\',\'20,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Sałatka z tuńczykiem\',\'20,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Frytki\',\'4,99\');');
			mysql_query('insert into '.$rest.'_menu values(null,\'Sos czosnkowy 30cm\',\'2,99\');');
				
									


			header('Location: login.php?register='.$kod.'');

							 
		}


		
		
			
			
			
			
			
			
			
			
		
		function zaloguj2($login, $haslo){
			
			session_start();
			
			
			$login = $_POST['login'];
			$haslo = $_POST['haslo'];
			
			$sql = mysql_fetch_assoc(mysql_query("SELECT * FROM restauracje WHERE login='$login' AND haslo='$haslo'"));
			
			$_SESSION['zalogowany'] = $sql['restauracja'];
			$nazwa_restauracji = $_SESSION['zalogowany'];
			
			if (isset($_SESSION['zalogowany'])){
				header('Location: ../index.php');
			}
			else
			{
				echo ('Zły login lub hasło');
			}
			
		}
		
		
		function pokazzamowienia($restauracja){

				$ret = array();


				$odpowiedz = mysql_query('select * from '.$restauracja.';');

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				return $ret;
				}







		}
		
		
		
		
		
		
		function newday($data, $dzientygodnia, $status, $nazwa_restauracji){
			$rest = str_replace(' ', '', $nazwa_restauracji);

			mysql_query('insert into '.$rest.'_dzien values(\''.$dzientygodnia.'\',\''.$data.'\',\''.$status.'\');');
		}
		
		function whatdata($nazwa_restauracji){
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			$ret = array();


				$odpowiedz = mysql_query('select * from '.$rest.'_dzien;');

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					$ret [] = $txt;

				}
				return $ret;
				}
			
			
			
			
			
			
			
			
			
			
		}
		
		
		
		
		function showorders($nazwa_restauracji, $akt_data){
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select * from ".$rest."_zamowienia, ".$rest."_klienci where data='".$akt_data."' AND ".$rest."_klienci.idklienta = ".$rest."_zamowienia.idklienta";
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
			
			
			
			
			
			
			
			
		}
		
		
		function liczbarekordow($nazwa_restauracji, $akt_data){
			
				$rest = str_replace(' ', '', $nazwa_restauracji);


				$odpowiedz_string = "select * from ".$rest."_zamowienia, ".$rest."_klienci where data='".$akt_data."' AND ".$rest."_klienci.idklienta = ".$rest."_zamowienia.idklienta";
				
				
				
			
				
				
				$rows = mysql_num_rows(mysql_query($odpowiedz_string));
				
				
				return $rows;
				
				
				
			
			
			
			
			
			
			
			
			
			
		}
		
		
		function checknumber($numer){
			
			
			$odpowiedz_string = "SELECT * FROM admin_klienci_zgloszenia WHERE numer='".$numer."'";
			
			
				
				
				
			
				
				
				$rows = mysql_num_rows(mysql_query($odpowiedz_string));
				
				
				return $rows;
			
			
			
			
			
		}
		
		
		function ileadresow($numer){
			
			
			$odpowiedz_string = "SELECT * FROM admin_klienci WHERE numer='".$numer."'ORDER BY id DESC LIMIT 4;";
			
			
				
				
				
			
				
				
				$rows = mysql_num_rows(mysql_query($odpowiedz_string));
				
				
				return $rows;
			
			
		}
		
		
		function pobierzadresy($numer){
			
			
			
			
			$ret = array();


				$odpowiedz = mysql_query('select * from admin_klienci where numer='.$numer.' ORDER BY id DESC LIMIT 4;');

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				return $ret;
				}

			
			
			
		}
		
		
		
		function dodajprodukty($produkt,$cena,$restauracja,$numerzamowienia){
			$rest = str_replace(' ', '', $restauracja);
			
			mysql_query('insert into '.$rest.'_produkty values(null,\''.$produkt.'\',\''.$cena.'\',\''.($numerzamowienia+1).'\');');
			
			
			
			
		}
		
		function numer_zamowienia($nazwa_restauracji){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			$ret = array();
		
			$odpowiedz = mysql_query("SELECT max(idzamowienia) FROM ".$rest."_zamowienia");
			
			
			$txt = array();
		
			
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				return $ret;
				}
			
			
			
		}
		
		
		function dodaj_klienta($numer, $adres, $miasto,$restauracja,$uwagi, $typ, $adresnumer, $mieszkanie){
			
			$rest = str_replace(' ', '', $restauracja);
			
			mysql_query('insert into '.$rest.'_klienci values(null,\''.$numer.'\',\''.$adres.'\',\''.$miasto.'\',\''.$uwagi.'\',\''.$typ.'\',\''.$adresnumer.'\',\''.$mieszkanie.'\');');
			
			
			
			
		}
		
		function numer_klienta($nazwa_restauracji){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			$ret = array();
		
			$odpowiedz = mysql_query("SELECT max(idklienta) FROM ".$rest."_klienci");
			
			
			$txt = array();
		
			
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				return $ret;
				}
			
			
			
		}
		
		
		
		function dodajzamowienie($numerklienta,$platnosc,$suma,$date,$time,$restauracja,$status){
			
			$rest = str_replace(' ', '', $restauracja);
			
			$zapytanie = mysql_query('insert into '.$rest.'_zamowienia values(null,\''.$numerklienta.'\',\''.$platnosc.'\',\''.$suma.'\',\''.$date.'\',\''.$time.'\',\''.$status.'\');') or die ("Error in query: ".mysql_error());
			
		}
		
		
		
		function checkprice($nazwa_restauracji,$produkt){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			$ret = array();
		
			$odpowiedz_string = 'SELECT * FROM '.$rest.'_menu WHERE produkt="'.$produkt.'"';
			
			$odpowiedz = mysql_query($odpowiedz_string);
			
			
			$txt = array();
		
			
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				if(isset($ret[0]['cena'])){
				return $ret[0]['cena'];
				}
				
				}
			
			
		}
		
		
		
		
		function dodaj_adres($numer, $adres, $miasto,$restauracja,$uwagi, $typ, $adresnumer, $mieszkanie){
			
			
			$rest = str_replace(' ', '', $restauracja);
			
			$ret = array();
			
			$numer_w_bazie_string = 'SELECT * FROM admin_klienci WHERE numer="'.$numer.'"';
			
			
			
			$odpowiedz = mysql_query($numer_w_bazie_string);
			
			
			
			
			$txt = array();
		
			
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
			}
			
			//print_r ($ret);
			
			$rows = mysql_num_rows(mysql_query($numer_w_bazie_string));
				
				
			
			
			if ($rows>0){
				
				$p = 0;
			
				for ($i=0; $i<$rows; $i++){
					
					//echo $ret[$i]['adresnumer'];
					//echo '</br>';
					//echo $adresnumer;
	
					if (((ucfirst($adres)) == $ret[$i]['adres']) && ($adresnumer == $ret[$i]['adresnumer'])){
						
						$p=1;	
					}
				}
			
				if ($p==0){
					mysql_query('insert into admin_klienci values(null,\''.$numer.'\',\''.ucfirst($adres).'\',\''.$miasto.'\',\''.$uwagi.'\',\''.$typ.'\',\''.$adresnumer.'\',\''.$mieszkanie.'\');');
				}
			}
			else{
				mysql_query('insert into admin_klienci values(null,\''.$numer.'\',\''.ucfirst($adres).'\',\''.$miasto.'\',\''.$uwagi.'\',\''.$typ.'\',\''.$adresnumer.'\',\''.$mieszkanie.'\');');
			}
			

			
			
		}
		
		
		
		
		function showmenu($nazwa_restauracji){
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select * from ".$rest."_menu";
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
	
			
		}
		
		
		
		
		function liczbamenu($nazwa_restauracji){
			
				$rest = str_replace(' ', '', $nazwa_restauracji);


				$odpowiedz_string = "select * from ".$rest."_menu";
				
				
				
			
				
				
				$rows = mysql_num_rows(mysql_query($odpowiedz_string));
				
				
				return $rows;
				
				
				
			
			
			
			
			
			
			
			
			
			
		}
		
		
		function usunprodukt($id,$nazwa_restauracji){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			
			$zapytanie_string = "DELETE FROM ".$rest."_menu WHERE id=".($id)."";
			
			
			
			mysql_query($zapytanie_string);
			
			
			
		}
		
		
		
		
		
		function dodajprodukt($produkt,$cena,$restauracja){
			$rest = str_replace(' ', '', $restauracja);
			
			mysql_query('insert into '.$rest.'_menu values(null,\''.$produkt.'\',\''.$cena.'\');');
			
			
			
			
		}
		
		
		function usunwszystko($nazwa_restauracji){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			
			$zapytanie_string = "DELETE FROM ".$rest."_menu WHERE id>0";
			
			
			
			mysql_query($zapytanie_string);
			
			
			
		}
		
		function pokaznierozw($nazwa_restauracji, $akt_data){
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select * from ".$rest."_zamowienia, ".$rest."_klienci where data='".$akt_data."' AND ".$rest."_klienci.idklienta = ".$rest."_zamowienia.idklienta AND ".$rest."_zamowienia.status='Niedostarczone'";
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
			
			
		}
		function liczbarekordownierozw($nazwa_restauracji, $akt_data){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
				
				//echo $nazwa_restauracji;

				$odpowiedz_string = "select * from ".$rest."_zamowienia, ".$rest."_klienci where data='".$akt_data."' AND ".$rest."_klienci.idklienta = ".$rest."_zamowienia.idklienta AND ".$rest."_zamowienia.status='Niedostarczone'";
				
				
				//echo $odpowiedz_string;
			
				
				
				$rows = mysql_num_rows(mysql_query($odpowiedz_string));
				//print_r('asdasdasd'.$rows);
				
				return $rows;
			
			
			
		}
		
		
		function pokazzamowienie($nazwa_restauracji, $id){
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select * from ".$rest."_zamowienia, ".$rest."_klienci, ".$rest."_produkty where ".$rest."_produkty.idzamowienia = ".$rest."_zamowienia.idzamowienia AND ".$rest."_klienci.idklienta = ".$rest."_zamowienia.idklienta AND ".$rest."_zamowienia.idzamowienia=".$id."";
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
			
			
		}
		
		
		
		
		function ilukierowcow($restauracja){
			
			$ret = array();

				$rest = str_replace(' ', '', $restauracja);
				
				
				$odpowiedz_string = "select * from ".$rest."_kierowcy";
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
		}
		
		
		
		
		
		
 		function zmienstatuszam($nazwa_restauracji, $id, $kierowca){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			
			$sql = "UPDATE ".$rest."_zamowienia SET status='".$kierowca."' WHERE idzamowienia=".$id."";
			
			
			mysql_query($sql);
			
				
		}
 		
		
		
		
		
		function usunkierowce($nazwakierowcy,$nazwa_restauracji){
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			
			$zapytanie_string = "DELETE FROM ".$rest."_kierowcy WHERE nazwa='".($nazwakierowcy)."'";
				
				
				
				mysql_query($zapytanie_string);
			
			
			
			
			
		}	
		
		
		
		
		function dodajkierowce($driver,$restauracja){
			
			$rest = str_replace(' ', '', $restauracja);
			
			mysql_query('insert into '.$rest.'_kierowcy values(null,\''.$driver.'\');');
			
			
			
		}
		
		
		
		
		function usun_dzien_z_bazy($nazwa_restauracji,$dzien,$data){
			
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			
			$zapytanie_string = "DELETE FROM ".$rest."_dzien WHERE data='".($data)."'";
			
				
				
				
				mysql_query($zapytanie_string);
			
			
			
			
			
		}
		
		
		function sprawdzostatnidzien($nazwa_restauracji){
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select * from ".$rest."_zamowienia ORDER BY idzamowienia DESC LIMIT 1";
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
		}
		
		
		
		
		
		
		function ilukierowcowunik($nazwa_restauracji,$akt_data){
			
				$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select DISTINCT ".$rest."_zamowienia.status from ".$rest."_zamowienia where data='".$akt_data."' ORDER BY status DESC";
				
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
		}
		
		
		
		function obliczutarg($nazwa_restauracji, $akt_data){
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select  ".$rest."_zamowienia.suma from ".$rest."_zamowienia where data='".$akt_data."'";
				
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				$suma = array_sum(array_column($ret,'suma')); 
				
				
				return $suma;
				
				
				}
			
			
			
			
			
			
			
			
		}
		
		function obliczutarggotowka($nazwa_restauracji, $akt_data){
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select  ".$rest."_zamowienia.suma from ".$rest."_zamowienia where data='".$akt_data."' AND platnosc='gotówka'";
				
				
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				$suma = array_sum(array_column($ret,'suma')); 
				
				
				return $suma;
				
				
				}
			
			
			
			
			
			
			
			
		}
		
		
		
		
		function obliczutargkierowcy($nazwa_restauracji, $akt_data, $kierowca){
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select  ".$rest."_zamowienia.suma from ".$rest."_zamowienia where data='".$akt_data."' AND status='".$kierowca."'";
				
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				$suma = array_sum(array_column($ret,'suma')); 
				
				
				
				return $suma;
				
				
				}
			
			
			
			
			
			
			
			
		}
		
		
		
		
		
		
		function obliczutarg_kier($nazwa_restauracji, $akt_data, $kierowca){
			
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select  ".$rest."_zamowienia.suma from ".$rest."_zamowienia where data='".$akt_data."' AND status='".$kierowca."'";
				
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				$suma = array_sum(array_column($ret,'suma')); 
				
				
				return $suma;
				
				
				}
			
			
			
			
			
			
		}
		
		
		
		
		function showorders_kier($nazwa_restauracji, $akt_data, $kierowca){
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select * from ".$rest."_zamowienia, ".$rest."_klienci where data='".$akt_data."' AND ".$rest."_klienci.idklienta = ".$rest."_zamowienia.idklienta AND status='".$kierowca."'";
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
			
			
			
			
			
			
			
			
		}
		
		
		
		
		function liczbarekordow_kier($nazwa_restauracji, $akt_data, $kierowca){
			
			
			
			$rest = str_replace(' ', '', $nazwa_restauracji);


				$odpowiedz_string = "select * from ".$rest."_zamowienia, ".$rest."_klienci where data='".$akt_data."' AND ".$rest."_klienci.idklienta = ".$rest."_zamowienia.idklienta AND status='".$kierowca."'";
				
				
				
			
				
				
				$rows = mysql_num_rows(mysql_query($odpowiedz_string));
				
				
				return $rows;
			
			
			
			
			
			
			
			
			
		}
		
		
		function obliczutarggotowka_kier($nazwa_restauracji, $akt_data, $kierowca){
			
			
			
			$ret = array();

				$rest = str_replace(' ', '', $nazwa_restauracji);
				
				
				$odpowiedz_string = "select  ".$rest."_zamowienia.suma from ".$rest."_zamowienia where data='".$akt_data."' AND platnosc='gotówka' AND status='".$kierowca."'";
				
				
				
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				$suma = array_sum(array_column($ret,'suma')); 
				
				
				return $suma;
				
				
				}
			
			
			
			
			
			
			
			
			
			
			
			
		}
		
		
		
		function obliczczas($czaszam)
		{
			$time = date("G:i:s");
			
			
			
			
			$minelominut = round(60*((strtotime($time) - strtotime($czaszam))/3600));
			
			if ($minelominut<0) {
				$minelominut = round(((((strtotime($time)*60)/3600)+1440))- ((strtotime($czaszam))/3600)*60);
				
				
			}  
			
			if ($minelominut>180) {
				$minelominut = '>3h';
			} 
			
			
			
			return $minelominut;
			
			
			
			
		}
		
		
		
		
		function adresrestauracji($nazwa_restauracji){
			
			$ret = array();

				
				
				
				$odpowiedz_string = "SELECT * FROM restauracje WHERE restauracja='".$nazwa_restauracji."'";
				//echo $odpowiedz_string;
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
		}

		
		
		
		
		
		
		function dodajlogo($nazwa_restauracji, $nam){
			
			
			
			
			
			mysql_query("UPDATE restauracje SET logo='".$nam."' WHERE restauracja='".$nazwa_restauracji."'");
			
			
			
			
			
		}
		
		
		
		function pokazlogo($nazwa_restauracji){
			
				$ret = array();

				
				
				
				$odpowiedz_string = "SELECT * FROM restauracje WHERE restauracja='".$nazwa_restauracji."' LIMIT 1";
				//echo $odpowiedz_string;
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
				
				
				}
			
			
		}
		
		
		function sprawdzrest($nazwa_restauracji){
			

				$ret = array();

				
				
				
				$odpowiedz_string = "SELECT * FROM restauracje WHERE restauracja='".$nazwa_restauracji."' LIMIT 1";
				//echo $odpowiedz_string;
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);

				$rows = mysql_num_rows($odpowiedz);
				
				return $rows;
				
					
			
			
		}
		
		
		
		
				
		function sprawdzlogin($login){
			
			
			$ret = array();

				
				
				
				$odpowiedz_string = "SELECT * FROM restauracje WHERE login='".$login."' LIMIT 1";
				//echo $odpowiedz_string;
				
				
				
				$odpowiedz = mysql_query($odpowiedz_string);
			
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
				
				
				
				
				return $ret;
			
			
			
			
			
			
		}		
				
		
		}
		
		
		function ile_dni_konto($nazwa_restauracji){
		
			$akt_data = date("Y-m-d");
			
			$odpowiedz_string = "SELECT * FROM restauracje WHERE restauracja='".$nazwa_restauracji."' LIMIT 1";
				//echo $odpowiedz_string;
			
			$odpowiedz = mysql_query($odpowiedz_string);
			
			
						
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
			
			
			
			$data_konta = ($ret[0]['data_konta']);
			
			
			
			
			
			
			
			$minelodni = (strtotime($akt_data) - strtotime($data_konta))/(60*60*24);
			
			
			$pozostalo_konto_testowe = (30 - $minelodni);
			
			return $pozostalo_konto_testowe;
			
			
			
			
			
			
			
			
			
			
		}
		
		
		}
		
		
		
		
		function waznosc_konta($nazwa_restauracji){
		
			
			
			$odpowiedz_string = "SELECT * FROM restauracje WHERE restauracja='".$nazwa_restauracji."' LIMIT 1";
				//echo $odpowiedz_string;
			
			$odpowiedz = mysql_query($odpowiedz_string);
			
			
						
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
			
			
			
			$wynik = ($ret[0]['waznosc_konta']);
			
			
			
			
			
			
			
			
			
			
			
			
			return $wynik;
			
			
			
			
			
			
			
			
			
			
		}
		
		
		}
		
		
		
		function kontorok($nazwa_restauracji){
			
			
			
			$rest = str_replace(' ', '', $nazwa_restauracji);
			
			
			mysql_query('insert into '.$rest.'_menu values(null,\'Zaplacone\',\'2,99\');');
			
			
			
			
			
			
			
			
			
		}
		
		
		function usunlogo($nazwa_restauracji){
			
			mysql_query("UPDATE restauracje SET logo='' WHERE restauracja='".$nazwa_restauracji."'");
			
			
			
		}
		
		
		
		function miastorest($nazwa_restauracji){
			
			
			$odpowiedz_string = "SELECT * FROM restauracje WHERE restauracja='".$nazwa_restauracji."' LIMIT 1";
				//echo $odpowiedz_string;
			
			$odpowiedz = mysql_query($odpowiedz_string);
			
			
						
			if ($odpowiedz){
				while ($txt = mysql_fetch_assoc($odpowiedz)){
					
					$ret [] = $txt;

				}
			
			
			
			$wynik = ($ret[0]['miasto']);
			
			
			
			
			
			
			
			
			
			
			
			
			return $wynik;
			
			
			
			
			
			}
			
			
			
			
			
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	}































?>
