<?php

class Zend_Controller_Action_Helper_PrintOrdenes extends Zend_Controller_Action_Helper_Abstract
{
    function printOrdenes($orden,$Accesorios){
    	echo 	"<table aling='center'>".
	    			"<tr>".
		    			"<td>Codigo</td><td id='Orden'>".$orden["CodOrden"]."</td>".
		    			"<td>Accesorios</td><td style='color:green; font-size: 25px'>".$Accesorios."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Operadora</td><td>".$orden["NombreOperadora"]."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Marca</td><td>".$orden["NombreMarca"]."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Modelo</td><td>".$orden["NombreModelo"]."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Serial 1</td><td>".$orden["Serial1"]."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Fecha de creacion</td><td>".$orden["FechaRegistro"]->format('d-m-Y')."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Orden Externa</td><td>".$orden["OrdenExterna"]."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Fecha orden externa</td><td>".$orden["FechaOrdenExterna"]->format('d-m-Y')."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Fecha de compra</td><td>".$orden["FechaCompra"]->format('d-m-Y')."</td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Status de la orden</td><td><span style='color:red'>".$orden["NombreStatusOS"]."</span></td>".
	    			"</tr>".
	    			"<tr>".
		    			"<td>Status del equipo</td><td>".$orden["NombreStatusEquipo"]."</td>".
	    			"</tr>".
    			"</table>";
    }
}
?>