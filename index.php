<?php
(empty($_GET['page'])) ? $url = "dashboard" : $url = $_GET['page'];
$file = "pages/".$url.".php";
include("media/mysqlconstruct.php");
include("media/logincheck.php");
include("modules/header.php");
if(file_exists($file)){
	include($file);
}
else {
	include("pages/error.php");
}
?>