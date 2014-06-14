<?php 

include('../conectar_login.php');

$nombre   = $_POST['usuario'];
$password = $_POST['password'];

function validarUserPass($nombre , $password){

	$password = ($password!=='')? md5('alumnos') : '' ;
	
	$query_operacion = "SELECT * FROM usuarios 
							WHERE username   = '$nombre' 
								AND password = '$password'
								AND activo   = 1";								
	
	$rs_operacion    = mysql_query($query_operacion);

	if(mysql_num_rows($rs_operacion) > 0 ){

		 $nombre   = mysql_result($rs_operacion, 0 , 'nombre' );
		 $username = mysql_result($rs_operacion, 0 , 'username');
		 $rol_k    = mysql_result($rs_operacion, 0 , 'rol_k');

		 setRolSession( $nombre , $username , $rol_k  );

	}else{
		header("Location: http://localhost/sismansistemapapeleria/login/index.php?login_estatus=0");
	}
}

function setRolSession($nombre , $username , $rol_k ){
	session_start();
	$_SESSION['nombre']   = "$nombre";
	$_SESSION['username'] = "$username";
	$_SESSION['rol_k']    = "$rol_k";
	$_SESSION['sactiva']  = "activa";
	header("Location: http://localhost/sismansistemapapeleria/");
}

validarUserPass( $nombre , $password );

?>
