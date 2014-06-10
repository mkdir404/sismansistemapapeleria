<?php include ("../conectar.php"); ?>
<html>
	<head>
		<title>Principal</title>
		<link href="../estilos/estilos.css" type="text/css" rel="stylesheet">
		<!--<script type="text/javascript" src="../funciones/validar.js"></script> no carga correctamente la valudacion podemos ver si es cache-->
		<script language="javascript">
		
		function cancelar() {
			location.href="index.php";
		}
		
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
		function limpiar() {
			document.getElementById("formulario").reset();
		}

		/*
funciones de javascript para comprobar formularios
creadas por: Duilio Palacios
e-mail: solo@otrotiempo.com
Licencia: CreativeCommons
*/
function validar(formulario,mandar) {
	var campos  = formulario.getElementsByTagName("input");
	var listaErrores = document.getElementById("lista-errores");
	limpiarNodo(listaErrores);
	modificado = esModificado();
	longitud = campos.length;



	for (i=0; i<longitud; i++) {
		var campo = new clsCampo( campos.item(i) );
		if( campo.type == "text" )
			if ( ( campo.esObligatorio() && campo.vacio() ) ) {	
				/*aqui tenia el mismo case de abajo*/							 			
			}else{
				if(campos[i].value!=''){					
					switch ( campo.tipo ) {
						case 't': campo.soloTexto(); break;
						case 'n': campo.natural(); break;
						case 'z': campo.entero(); break;
						case 'q': campo.realPositivo(); break;
						case 'r': campo.numeroReal(); break;
						case 'e': campo.correo(); break;
					  }
				}
			}
		else if ( ( campo.type == "file" ) || ( campo.type == "password" ) )
			if ( !modificado && campo.esObligatorio() ) campo.vacio();
		if ( campo.error )
		  listaErrores.appendChild( crearLI( campo.error ) );
	}
	campos = formulario.getElementsByTagName("textarea");
	longitud = campos.length;
	for (i=0; i<longitud; i++) {
		var campo = new clsCampo( campos.item(i) );
		if ( campo.esObligatorio() && campo.vacio() )
		  listaErrores.appendChild( crearLI( campo.error ) );
	}
	campos = formulario.getElementsByTagName("select");
	longitud = campos.length;
	for (i=0; i<longitud; i++) {
		var campo = new clsCampo( campos.item(i) );
		if ( campo.esObligatorio() && !campo.estaSeleccionado() )
		  listaErrores.appendChild( crearLI( campo.error ) );
	}
	formValido = !listaErrores.getElementsByTagName("li").length;
	if ( formValido && mandar ) enviar(formulario);
	
	return formValido;
}
/***/
function clsCampo (campo) {
	this.campo = campo;
//	this.campo.value = campo.value;
	this.type = this.campo.getAttribute("type");
	this.tipo = this.campo.name.charAt(0).toLowerCase();
	this.error = false;
}
clsCampo.prototype.esObligatorio = function esObligatorio() {
	var chr = this.campo.name.charAt(0);
	if ( chr.search('[A-Z]') || (chr == 'W') ) return false;
	return true;
}
clsCampo.prototype.vacio = function vacio() {
	valor = trim(this.campo.value);
	if ( valor.length!=0 ) return false;
	this.error = 'Debe completar el campo "'+this.formatoNombre()+'"';
	return true;
}
clsCampo.prototype.natural = function natural() {
	if( this.campo.value.search('[^0-9]') == -1 ) return true;
	this.error = 'el campo "'+this.formatoNombre()+'" solo puede tener numeros enteros sin signo';
	return false;
}
clsCampo.prototype.entero = function entero() {
	if( this.campo.value.search('^-?[0-9]+$') != -1 ) return true;
	this.error = 'el campo "'+this.formatoNombre()+'" solo puede tener numeros enteros';
	return false;
}
clsCampo.prototype.realPositivo = function realPositivo() {
	if( this.campo.value.search('[^0-9.]') == -1 ) return true;
	this.error = 'el campo "'+this.formatoNombre()+'" solo puede tener numeros sin signo';					 
	return false;
}
clsCampo.prototype.numeroReal = function numeroReal() {
	if( this.campo.value.search('[^0-9.-]') == -1 ) return true;
	this.error = 'el campo "'+this.formatoNombre()+'" solo puede tener numeros';
	return false;
}
clsCampo.prototype.soloTexto = function soloTexto() {
	if( this.campo.value.search('^[a-z A-Z]+$') != -1 ) return true;
	this.error = 'el campo "'+this.formatoNombre()+'" solo puede tener texto';
	return false;
}
clsCampo.prototype.correo = function correo() {
	if( this.campo.value.toLowerCase().search('(^[a-z][a-z0-9\-_.]+[@][a-z0-9\-_.]+[.][a-z]+$)') != -1 ) return true;
	this.error = 'el campo "'+this.formatoNombre()+'" debe ser un correo valido';
	return false;
} 
clsCampo.prototype.estaSeleccionado = function estaSeleccionado() {
	var valor = parseInt(this.campo.options[this.campo.selectedIndex].value);
	if ( isNaN(valor) || valor ) return true;
	this.error =  'debe eligir un valor del combo "'+this.formatoNombre()+'"';
	return false;
}
/***/
clsCampo.prototype.formatoNombre = function formatoNombre() {
	nombre = this.campo.name;
	return nombre.charAt(1).toUpperCase()+nombre.replace(/_/g,' ').substr(2);
}
function enviar(formulario) {	
//	formulario.boton.setAttribute('disabled','disabled');
	formulario.submit();
}
function esModificado() {
	if ( parseInt( document.getElementById('id').value ) ) return true;
	else return false;
}
function trim(str) {
	return str.replace(/^\s*|\s*$/g,"");
}
/* DOM */
function crearLI(txt){
	var objLI = document.createElement('li');
	objLI.appendChild( document.createTextNode( txt ) );
	return objLI;
}
function limpiarNodo(nodo){
	while( nodo.hasChildNodes() ) nodo.removeChild(nodo.firstChild);
}
		
		</script>
	</head>
	<body>
		<div id="pagina">
			<div id="zonaContenido">
				<div align="center">
				<div id="tituloForm" class="header">INSERTAR CLIENTE </div>
				<div id="frmBusqueda">
				<form id="formulario" name="formulario" method="post" action="guardar_cliente.php">
					<table class="fuente8" width="98%" cellspacing=0 cellpadding=3 border=0>
						<tr>
							<td width="15%">Nombre</td>
						    <td width="43%"><input NAME="Anombre" type="text" class="cajaGrande" id="nombre" size="45" maxlength="45"></td>
					        <td width="42%" rowspan="14" align="left" valign="top"><ul id="lista-errores"></ul></td>
						</tr>
						<tr>
						  <td>NIF / CIF</td>
						  <td><input id="nif" type="text" class="cajaPequena" NAME="Znif" maxlength="15"></td>
				      </tr>
						<tr>
						  <td>Direcci&oacute;n</td>
						  <td><input NAME="adireccion" type="text" class="cajaGrande" id="direccion" size="45" maxlength="45"></td>
				      </tr>
						<tr>
						  <td>Localidad</td>
						  <td><input NAME="alocalidad" type="text" class="cajaGrande" id="localidad" size="35" maxlength="35"></td>
				      </tr>
					  <?php
					  	$query_provincias="SELECT * FROM provincias ORDER BY nombreprovincia ASC";
						$res_provincias=mysql_query($query_provincias);
						$contador=0;
					  ?>
						<tr>
							<td width="15%">Provincia</td>
							<td width="43%"><select id="cboProvincias" name="cboProvincias" class="comboGrande">
							<option value="0">Seleccione una provincia</option>
								<?php
								while ($contador < mysql_num_rows($res_provincias)) { ?>
								<option value="<?php echo mysql_result($res_provincias,$contador,"codprovincia")?>"><?php echo mysql_result($res_provincias,$contador,"nombreprovincia")?></option>
								<? $contador++;
								} ?>				
								</select>							</td>
				        </tr>
						<?php
					  	$query_formapago="SELECT * FROM formapago WHERE borrado=0 ORDER BY nombrefp ASC";
						$res_formapago=mysql_query($query_formapago);
						$contador=0;
					  ?>
						<tr>
							<td width="15%">Forma de pago</td>
							<td width="43%"><select id="cboFPago" name="cboFPago" class="comboGrande">
							<option value="0">Seleccione una forma de pago</option>
								<?php
								while ($contador < mysql_num_rows($res_formapago)) { ?>
								<option value="<?php echo mysql_result($res_formapago,$contador,"codformapago")?>"><?php echo mysql_result($res_formapago,$contador,"nombrefp")?></option>
								<? $contador++;
								} ?>	
											</select>							</td>
				        </tr>
						<?php
					  	$query_entidades="SELECT * FROM entidades WHERE borrado=0 ORDER BY nombreentidad ASC";
						$res_entidades=mysql_query($query_entidades);
						$contador=0;
					  ?>
						<tr>
							<td width="15%">Entidad Bancaria</td>
							<td width="43%"><select id="cboBanco" name="cboBanco" class="comboGrande">
							<option value="0">Seleccione una entidad bancaria</option>
									<?php
								while ($contador < mysql_num_rows($res_entidades)) { ?>
								<option value="<?php echo mysql_result($res_entidades,$contador,"codentidad")?>"><?php echo mysql_result($res_entidades,$contador,"nombreentidad")?></option>
								<? $contador++;
								} ?>
											</select>							</td>
				        </tr>
						<tr>
							<td>Cuenta bancaria</td>
							<td><input id="cuentabanco" type="text" class="cajaGrande" NAME="acuentabanco" maxlength="20"></td>
					    </tr>
						<tr>
							<td>C&oacute;digo postal </td>
							<td><input id="codpostal" type="text" class="cajaPequena" NAME="zcodpostal" maxlength="5"></td>
					    </tr>
						<tr>
							<td>Tel&eacute;fono </td>
							<td><input id="telefono" name="ztelefono" type="text" class="cajaPequena" maxlength="14"></td>
					    </tr>
						<tr>
							<td>M&oacute;vil</td>
							<td><input id="movil" name="zmovil" type="text" class="cajaPequena" maxlength="14"></td>
					    </tr>
						<tr>
							<td>Correo electr&oacute;nico  </td>
							<td><input NAME="eemail" type="text" class="cajaGrande" id="email" size="35" maxlength="35"></td>
					    </tr>
												<tr>
							<td>Direcci&oacute;n web </td>
							<td><input NAME="aweb" type="text" class="cajaGrande" id="web" size="45" maxlength="45"></td>
					    </tr>
					</table>
			  </div>
				<div id="botonBusqueda">
					<img src="../img/botonaceptar.jpg" width="85" height="22" onClick="validar(formulario,true)" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botonlimpiar.jpg" width="69" height="22" onClick="limpiar()" border="1" onMouseOver="style.cursor=cursor">
					<img src="../img/botoncancelar.jpg" width="85" height="22" onClick="cancelar()" border="1" onMouseOver="style.cursor=cursor">
					<input id="accion" name="accion" value="alta" type="hidden">
					<input id="id" name="Zid" value="" type="hidden">
			  </div>
			  </form>
			  </div>
		  </div>
		</div>
	</body>
</html>
