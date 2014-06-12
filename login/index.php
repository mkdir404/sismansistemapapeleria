<?php 

include('../conectar.php');

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

		input[type='text']{
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
 </head>
 <body>
 	<div class="login">
 		<form action="">
			<h1>Facturación Web</h1>
	 		<span>Debes colocar usuario y contraseña para ingresar al sistema</span>
	 		<ul>
	 			<li>Usuario</li>
	 			<li><input type="text"></li>
	 			<li>Constraseña</li>
	 			<li><input type="text"></li>
	 			<li><button>Enviar</button></li>
	 		</ul>
 		</form>
 	<div align="center" style="margin-bottom:10px;"><img src="../img/firefox.gif" width="80" height="15" /></div>	
 	<div align="center"><span class="Estilo5">Resolución óptima 1024 x 768 píxeles  </span></div>	
 	</div>
 </body>
 </html>