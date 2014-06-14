<?php

  session_start(); 
  if( isset( $_SESSION['sactiva'] ) && $_SESSION['sactiva'] === "activa" ){
  
  	include("config.php"); 
  	$conexion=mysql_connect($Servidor,$Usuario,$Password) or die("Error: El servidor no puede conectar con la base de datos");
  	$descriptor=mysql_select_db($BaseDeDatos,$conexion);
  
  }else{
  	header("Location: http://localhost/sismansistemapapeleria/login/index.php");
  }

  

?>
