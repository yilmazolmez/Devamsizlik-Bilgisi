<?php
 

 $baglan=mysqli_connect("localhost","root","","devamsizlik"); 
 $baglan->set_charset("utf8");
 mysqli_set_charset($baglan, "utf8");
 if (!$baglan) {
      die("Connection failed: " . mysqli_connect_error());
}

ob_start();
session_start();
 

?>