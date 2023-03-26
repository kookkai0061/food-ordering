<?php 
//start session
  session_start();
//create constrain
define('SITEURL', 'http://localhost/food1/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','00619412'); 
define('DB_NAME','food-order1');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME, DB_PASSWORD) or die(mysqli_connect_error());
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_connect_error());
?>