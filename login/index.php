 <?php 
session_start(); 
session_unset();
session_destroy();
?>
 <html>
 <head>
 	<meta charset="UTF-8">
 	<title>login Facturacion Web</title>
 	<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
 	<style>
 		
 		.login{
 			width: 400px;
			margin:auto;
			border-bottom: 10px solid #4ECC17;
			display: block;
			margin-top: 17%;
			padding: 1em;
			background-color: #F5F5F5;
			color:#333;			
			font-family: helvetica;
 		}

 		span {
 			font-size: 11px;
 			color:#333;
 		}
		
		ul li {
			list-style: none;
			padding-bottom: 8px;
		}

		input[type='text'] , input[type='password']{
			width: 300px;
			height: 30px
		}
		button{
			padding: 10px;
		}
		h1{
			margin:0;
			color:#666;
		}
 	</style>
 	<script type="text/javascript">

 	/*Script papa*/

 	</script>
 </head>
 <body>
 	<div class="login">
 		<form id="formulario_login" name="formulario_login" method="post" action="validar_login.php">
			<h1>Facturación Web</h1>
	 		<span>Debes colocar usuario y contraseña para ingresar al sistema</span>	 		 		
	 		<ul>
	 			<li>Usuario</li>
	 			<li><input name="usuario" type="text"></li>
	 			<li>Constraseña</li>
	 			<li><input name="password" type="password"></li>
	 			<li><button>Enviar</button></li>
	 		</ul>
 		</form>
 	<div align="center" style="padding:6px;margin-bottom:10px;"><span style="color:red;font-size:13;">	<?php if( isset($_GET['login_estatus']) || $_GET['login_estatus'] === 0) echo 'Usuario y/o Contraseña no valido' ?> </span></div>
 	<div align="center" style="margin-bottom:10px;"><img src="../img/firefox.gif" width="80" height="15" /></div>	
 	<div align="center"><span class="Estilo5">Resolución óptima 1024 x 768 píxeles  </span></div>	
 	</div>
 </body>
 </html>