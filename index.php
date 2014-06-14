<? 
include("conectar.php");
?>
<html>
<head>
  <title>Facturacion Web</title>
  <script language="JavaScript" src="menu/JSCookMenu.js"></script>
  <link rel="stylesheet" href="menu/theme.css" type="text/css">
  <script language="JavaScript" src="menu/theme.js"></script>
  <script type="text/javascript" src="funciones/validar.js"></script>
  <script language="JavaScript">
<!--
var MenuPrincipal = [
	[null,'Inicio','central2.php','principal','Inicio'],
];

/*Valudacion de ventas*/
/*MenuPrincipal.push([null,'Productos',null,null,'Productos',
		[null,'Articulos','./articulos/index.php','principal','Articulos'],
	]);
MenuPrincipal.push([null,'Ventas clientes',null,null,'Ventas clientes',
		[null,'Ventas Mostrador','./ventas_mostrador/index.php','principal','Ventas Mostrador'],]);*/

/*Valudacion de ventas*/


/*Admonistrador*/

	MenuPrincipal.push([null,'Inter. Comerciales',null,null,'Ventas clientes',
		[null,'Proveedores','./proveedores/index.php','principal','Proveedores'],
		[null,'Clientes','./clientes/index.php','principal','Clientes']
	],
	[null,'Productos',null,null,'Productos',
		[null,'Articulos','./articulos/index.php','principal','Articulos'],
		[null,'Familias','./familias/index.php','principal','Familias']
	],
	[null,'Ventas clientes',null,null,'Ventas clientes',
		[null,'Ventas Mostrador','./ventas_mostrador/index.php','principal','Ventas Mostrador'],
		[null,'Facturas','./facturas_clientes/index.php','principal','Facturas'],/*,
		[null,'Albaranes','./albaranes_clientes/index.php','principal','Albaranes'],
		[null,'Facturar albaranes','./lote_albaranes_clientes/index.php','principal','Facturar albaranes']*/
	],
	[null,'Compras proveedores',null,null,'Compras proveedores',
		[null,'Facturas','./facturas_proveedores/index.php','principal','Proveedores'],
	],
	[null,'Mantenimientos',null,null,'Mantenimientos',
		[null,'Etiquetas','./etiquetas/index.php','principal','Etiquetas'],
		[null,'Impuestos','./impuestos/index.php','principal','Impuestos'],
		[null,'Entidades bancarias','./entidades/index.php','principal','Entidades bancarias'],
		[null,'Ubicaciones','./ubicaciones/index.php','principal','Ubicaciones'],
		[null,'Embalajes','./embalajes/index.php','principal','Embalajes'],
		[null,'Formas de pago','./formaspago/index.php','principal','Formas de pago'],
	]);


/*Administrador*/

/*Super Usuarios*/
/*ch
[null,'Inter. Comerciales',null,null,'Ventas clientes',
		[null,'Proveedores','./proveedores/index.php','principal','Proveedores'],
		[null,'Clientes','./clientes/index.php','principal','Clientes']
	],
	[null,'Productos',null,null,'Productos',
		[null,'Articulos','./articulos/index.php','principal','Articulos'],
		[null,'Familias','./familias/index.php','principal','Familias']
	],
	[null,'Ventas clientes',null,null,'Ventas clientes',
		[null,'Ventas Mostrador','./ventas_mostrador/index.php','principal','Ventas Mostrador'],
		[null,'Facturas','./facturas_clientes/index.php','principal','Facturas'],/*,
		[null,'Albaranes','./albaranes_clientes/index.php','principal','Albaranes'],
		[null,'Facturar albaranes','./lote_albaranes_clientes/index.php','principal','Facturar albaranes']
	],
	[null,'Compras proveedores',null,null,'Compras proveedores',
		[null,'Facturas','./facturas_proveedores/index.php','principal','Proveedores'],
	],
	[null,'Tesoreria',null,null,'Tesoreria',
		[null,'Cobros','./cobros/index.php','principal','Cobros'],
		[null,'Pagos','./pagos/index.php','principal','Pagos'],
		[null,'Caja Diaria','./cerrarcaja/index.php','principal','Caja Diaria'],
		[null,'Libro Diario','./librodiario/index.php','principal','Libro Diario'],
	],
	[null,'Mantenimientos',null,null,'Mantenimientos',
		[null,'Etiquetas','./etiquetas/index.php','principal','Etiquetas'],
		[null,'Impuestos','./impuestos/index.php','principal','Impuestos'],
		[null,'Entidades bancarias','./entidades/index.php','principal','Entidades bancarias'],
		[null,'Ubicaciones','./ubicaciones/index.php','principal','Ubicaciones'],
		[null,'Embalajes','./embalajes/index.php','principal','Embalajes'],
		[null,'Formas de pago','./formaspago/index.php','principal','Formas de pago'],
	]*/


  </script>
  <style type="text/css">
  body { background-color: rgb(255, 255,255);
    /*background-image: url(images/superior.png);*/
    background-repeat: no-repeat;
	margin: 0px;
    }

  #MenuAplicacion { margin-left: 10px;
    margin-top: 0px;
    }


  </style>
</head>
<body>
<div id="MenuAplicacion" align="center"></div>
<script language="JavaScript">
<!--
	cmDraw ('MenuAplicacion', MenuPrincipal, 'hbr', cmThemeGray, 'ThemeGray');
-->
</script>
<span style="margin-left:88%;margin-top:-15%;" >Administrador</span>
<a style="margin-left:88%;margin-top:-15%;" href="http://localhost/sismansistemapapeleria/login/cerrar_session.php"><img alt="Salir" src="https://cdn2.iconfinder.com/data/icons/pittogrammi/142/22-32.png"></a>
<iframe src="central2.php" name="principal" title="principal" width="100%" height="1050px" frameborder=0 scrolling="no" style="margin-left: 0px; margin-right: 0px; margin-top: 2px; margin-bottom: 0px;"></iframe>
</body>
</html>
