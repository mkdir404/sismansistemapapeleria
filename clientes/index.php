<?php
include ("../conectar.php");

$cadena_busqueda=$_GET["cadena_busqueda"];

if (!isset($cadena_busqueda)) { $cadena_busqueda=""; } else { $cadena_busqueda=str_replace("",",",$cadena_busqueda); }

if ($cadena_busqueda<>"") {
	$array_cadena_busqueda=split("~",$cadena_busqueda);
	$codcliente=$array_cadena_busqueda[1];
	$nombre=$array_cadena_busqueda[2];
	$nif=$array_cadena_busqueda[3];
	$provincia=$array_cadena_busqueda[4];
	$localidad=$array_cadena_busqueda[5];
	$telefono=$array_cadena_busqueda[6];
} else {
	$codcliente="";
	$nombre="";
	$nif="";
	$provincia="";
	$localidad="";
	$telefono="";
}

?>
<html>
	<head>
		<title>Clientes</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<script language="javascript">
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function inicio() {
			document.getElementById("form_busqueda").submit();
		}
		
		function nuevo_cliente() {
			location.href="nuevo_cliente.php";
		}
		
		function imprimir() {
			var codcliente=document.getElementById("codcliente").value;
			var nombre=document.getElementById("nombre").value;
			var nif=document.getElementById("nif").value;			
			var provincia=document.getElementById("cboProvincias").value;
			var localidad=document.getElementById("localidad").value;
			var telefono=document.getElementById("telefono").value;
			window.open("../fpdf/clientes.php?codcliente="+codcliente+"&nombre="+nombre+"&nif="+nif+"&provincia="+provincia+"&localidad="+localidad+"&telefono="+telefono);
		}
		
		function buscar() {
			var cadena;
			cadena=hacer_cadena_busqueda();

			console.log(cadena);

			if(cadena){			
				document.getElementById("cadena_busqueda").value=cadena;
				if (document.getElementById("iniciopagina").value=="") {
					document.getElementById("iniciopagina").value=1;
				} else {
					document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
				}
				document.getElementById("form_busqueda").submit();
			}
		}
		
		function paginar() {
			document.getElementById("iniciopagina").value=document.getElementById("paginas").value;
			document.getElementById("form_busqueda").submit();
		}
		
		function hacer_cadena_busqueda() {
			
			/*Etiquetas de validacion*/
			var codvalidacion 		 = document.getElementById("codvalidacion");
			var telvalidacion 		 = document.getElementById("telvalidacion");
			var nifvalidacion 		 = document.getElementById("nifvalidacion");
			var provinciasvalidacion = document.getElementById("provinciasvalidacion");

			/*Valores de los inputs*/
			var codcliente=document.getElementById("codcliente").value;
			var nombre=document.getElementById("nombre").value;
			var nif=document.getElementById("nif").value;			
			var provincia=document.getElementById("cboProvincias").value;
			var localidad=document.getElementById("localidad").value;
			var telefono=document.getElementById("telefono").value;
			var cadena="";

			/*Lipmpiar validaciones*/
			codvalidacion.innerHTML = '';
			telvalidacion.innerHTML = '';
			nifvalidacion.innerHTML = '';
			provinciasvalidacion.innerHTML = '';

			/*bandera de validaciones*/

			var x = 0;

			if(codcliente === ''){

			 	codvalidacion.innerHTML = "<strong> CAMPO ES OBLIGATORIO </strong>";
			 	x++;
			 
			}else{
			 	
			 	if( isNaN(codcliente) ){
			 	
			 		codvalidacion.innerHTML = "<strong>CAMPO SOLO DEBE CONTENER NUMEROS</strong>"
			 		x++;
			 	}else{
			 		//return cadena; 
			 		cadena+="~"+codcliente;
			 	}

			}

			cadena+="~"+nombre;

			if( nif === ''){
				
				if( isNaN(nif) ){
					nifvalidacion.innerHTML = "<strong> CAMPO SOLO DEBE CONTENER NUMEROS </strong>";
					x++;
				}else{
					cadena+="~"+nif;
				}		
			}else{
				cadena+="~"+nif;
			}

			if(provincia === '0'){
				provinciasvalidacion.innerHTML = "<strong> CAMPO ES OBLIGATORIO </strong>";
				x++;
			}else{
				cadena+="~"+provincia;
			}

			cadena+="~"+localidad;

			 if(telefono !== ''){
			
			 	if( isNaN(telefono) ){
			 		telvalidacion.innerHTML = '<strong>Campo debe contener solo numeros</strong>';
			 		x++;
				 }else{
				 	cadena+="~"+telefono+"~";
				 }
			}else{
					cadena+="~"+telefono+"~";
			}

			if(x==0){
				return cadena
			}else{
				return false;
			}
		}

		function validaNumero(valor , cadena ,elemento){					
			if(!isNaN(valor) && valor != ''){
				return true
			}else{
				return '';
			}			
		}
			
		function limpiar() {
			document.getElementById("form_busqueda").reset();
		}
		
		function abreVentana(){
			miPopup = window.open("ventana_clientes.php","miwin","width=700,height=380,scrollbars=yes");
			miPopup.focus();
		}
		
		function validarcliente(){
			var codigo=document.getElementById("codcliente").value;
			miPopup = window.open("comprobarcliente.php?codcliente="+codigo,"frame_datos","width=700,height=80,scrollbars=yes");
		}

			
		
		</script>
	</head>
	<body onLoad="inicio()">
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">Buscar CLIENTE </div>
				<div id="frmBusqueda">
				<form id="form_busqueda" name="form_busqueda" method="post" action="rejilla.php" target="frame_rejilla">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>					
						<tr>
							<td width="16%">Codigo de cliente *</td>
							<td width="38%"><input id="codcliente" type="text" class="cajaPequena" NAME="codcliente" maxlength="10" value="<? echo $codcliente?>"> <img src="../img/ver.png" width="16" height="16" onClick="abreVentana()" title="Buscar cliente" onMouseOver="style.cursor=cursor"> <img src="../img/cliente.png" width="16" height="16" onClick="validarcliente()" title="Validar cliente" onMouseOver="style.cursor=cursor"></td>
							<td width="5%">&nbsp;</td>
							<td width="35%">&nbsp; <span style='color:red;' id="codvalidacion"></span></td>
							<td width="6%" align="right"></td>
						</tr>
						<tr>
							<td>Nombre</td>
							<td><input id="nombre" name="nombre" type="text" class="cajaGrande" maxlength="45" value="<? echo $nombre?>"></td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
						  <td>NIF / CIF </td>
						  <td><input id="nif" type="text" class="cajaPequena" NAME="nif" maxlength="15" value="<? echo $nif?>"></td>
						  <td>&nbsp;</td>
						  <td >&nbsp; <span style='color:red;' id="nifvalidacion"></span></td>
						  <td>&nbsp;</td>
					  </tr>
						<?php
					  	$query_provincias="SELECT * FROM provincias ORDER BY nombreprovincia ASC";
						$res_provincias=mysql_query($query_provincias);
						$contador=0;
					  ?>
						<tr>
							<td>Provincia * </td>
							<td><select id="cboProvincias" name="cboProvincias" class="comboMedio">
								<option value="0" selected>Todas las provincias</option>
								<?php
								while ($contador < mysql_num_rows($res_provincias)) { 
									if ( mysql_result($res_provincias,$contador,"codprovincia") == $provincia) { ?>
								<option value="<?php echo mysql_result($res_provincias,$contador,"codprovincia")?>" selected><?php echo mysql_result($res_provincias,$contador,"nombreprovincia")?></option>
								<? } else { ?> 
								<option value="<?php echo mysql_result($res_provincias,$contador,"codprovincia")?>"><?php echo mysql_result($res_provincias,$contador,"nombreprovincia")?></option>
								<? }
								$contador++;
								} ?>				
								</select></td>
								<td>&nbsp;</td>
								<td width="35%">&nbsp; <span style='color:red;' id="provinciasvalidacion"></span></td>
					    		<td>&nbsp;</td>
					    </tr>
					  <tr>
						  <td>Localidad</td>
						  <td><input id="localidad" type="text" class="cajaGrande" NAME="localidad" maxlength="30" value="<? echo $localidad?>"></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					  </tr>
						<tr>
						  <td>Tel&eacute;fono</td>
						  <td><input id="telefono" type="text" class="cajaPequena" NAME="telefono" maxlength="15" value="<? echo $telefono?>"></td>
						  <td>&nbsp;</td>
						 <td width="25%">&nbsp; <span style='color:red;' id="telvalidacion"></span></td>
						  <td>&nbsp;</td>
					  </tr>
					</table>
			  </div>
			 	<div id="botonBusqueda"><img src="../img/botonbuscar.jpg" width="69" height="22" border="1" onClick="buscar()" onMouseOver="style.cursor=cursor">
			 	  <img src="../img/botonlimpiar.jpg" width="69" height="22" border="1" onClick="limpiar()" onMouseOver="style.cursor=cursor">
					 <img src="../img/botonnuevocliente.jpg" width="107" height="22" border="1" onClick="nuevo_cliente()" onMouseOver="style.cursor=cursor">
					<img src="../img/botonimprimir.jpg" width="79" height="22" border="1" onClick="imprimir()" onMouseOver="style.cursor=cursor"></div>
			  <div id="lineaResultado">
			  <table class="fuente8" width="80%" cellspacing=0 cellpadding=3 border=0>
			  	<tr>
				<td width="50%" align="left">N de clientes encontrados <input id="filas" type="text" class="cajaPequena" NAME="filas" maxlength="5" readonly></td>
				<td width="50%" align="right">Mostrados <select name="paginas" id="paginas" onChange="paginar()">
		          </select></td>
			  </table>
				</div>
				<div id="cabeceraResultado" class="header">
					relacion de CLIENTES </div>
				<div id="frmResultado">
				<table class="fuente8" width="100%" cellspacing=0 cellpadding=3 border=0 ID="Table1">
						<tr class="cabeceraTabla">
							<td width="8%">ITEM</td>
							<td width="6%">CODIGO</td>
							<td width="38%">NOMBRE </td>
							<td width="13%">NIF/CIF</td>
							<td width="19%">TELEFONO</td>
							<td width="5%">&nbsp;</td>
							<td width="5%">&nbsp;</td>
							<td width="6%">&nbsp;</td>
						</tr>
				</table>
				</div>
				<input type="hidden" id="iniciopagina" name="iniciopagina">
				<input type="hidden" id="cadena_busqueda" name="cadena_busqueda">
			</form>
				<div id="lineaResultado">
					<iframe width="100%" height="250" id="frame_rejilla" name="frame_rejilla" frameborder="0">
						<ilayer width="100%" height="250" id="frame_rejilla" name="frame_rejilla"></ilayer>
					</iframe>
					<iframe id="frame_datos" name="frame_datos" width="0" height="0" frameborder="0">
					<ilayer width="0" height="0" id="frame_datos" name="frame_datos"></ilayer>
					</iframe>
				</div>
			</div>
		  </div>			
		</div>
	</body>
</html>
