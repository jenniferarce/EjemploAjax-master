<?php 
session_start();
if(validadora::validarSesionActual())
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/cd.php");
	$estadisticas=cd::TraerEstadisticas();
	echo "<h2> Bienvenido: ". $_SESSION['registrado']."</h2>";

 ?>

	<div id="grillaEstadistica" style="min-width: 310px; height: 400px; margin: 0 auto">
	</div>

<table class="table" id="tablaEstadistica" style=" background-color: beige;display:none;">
	<thead>
		<tr>
			<th>Cantante</th><th>CantidadCD</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($estadisticas as $row) {
	echo"<tr>
			<td>".$row["cantante"]."</td>
			<td>".$row["cantidadCD"]."</td>
		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>


<script type="text/javascript">

	$(function () {
    	$('#grillaEstadistica').highcharts({
        	data: {
            	table: 'tablaEstadistica'
        		},
        	chart: {
            	type: 'column'
        		},
        	title: {
            	text: 'Estadistica top 5'
        		},
        	yAxis: {
            	allowDecimals: false,
            title: {
                text: 'Cantidad'
            	}
        	},
        	tooltip: {
            	formatter: function () {
                	return '<b>' + this.series.name + '</b><br/>' +
                    	this.point.y + ' ' + this.point.name.toLowerCase();
            		}
        		}
    	});
	});

</script>