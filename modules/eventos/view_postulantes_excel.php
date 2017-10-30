<?php
	session_start();
	header("Cache-Control: maxage=1"); //In seconds
	header("Pragma: public");
	header('Content-type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=Postulantes_".date("dmYHis").".xls");
	header("Pragma: no-cache");
	header("Expires: 0");

	session_start();

	error_reporting(E_ALL);
	ini_set("display_errors", 0);

	require_once "../../config/database.php";
	include "../../assets/php_mailer/enviarcorreo.php";
?>

<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<style type="text/css">
	.subtitulo {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 12px;
		font-weight: bold;
		color: #FC0;
	}
	.subtituloazul {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 12px;
		font-weight: bold;
		color: #666666;
	}

	.subtitulo2 {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 12px;
		font-weight: bold;
		color: #FFF;
	}
	.texto1 {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 12px;
		font-weight: normal;
		color: #FFF;
	}
	.texto1peque {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 11px;
		font-weight: normal;
		color: #FFF;
	}
	.textopequeazul {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 11px;
		font-weight: normal;
		color: #001966;
	}


	.texto2 {
		font-family: tahoma;
		font-size: 11px;
		font-weight: normal;
		color: #666666;
		padding: 2px;
		margin-right: 2px;
	}
	.texto3 {
		border: 1px solid #999999;
		font-family: tahoma;
		font-size: 11px;
		font-weight: normal;
		color: #666666;
		padding: 2px;
		float: left;
		margin-right: 2px;
	}
	.texto2Fecha {
		font-family: tahoma;
		font-size: 11px;
		font-weight: normal;
		color: #666666;
		padding: 2px;
		float: left;
		margin-right: 2px;
	}
	.texto2Negritas {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 10px;
		font-weight: bold;
		color: #666666;
		margin-right: 2px;
	}
	.textosubtitulo {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 12px;
		font-weight: normal;
		color: #009;
		text-align: right;
		text-decoration: underline;
	}
	.textopequerojo {

		font-family: Verdana, Geneva, sans-serif;
		font-size: 11px;
		font-weight: normal;
		color: #FF0000;
	}
	.textopequeverde {

		font-family: Verdana, Geneva, sans-serif;
		font-size: 11px;
		font-weight: normal;
		color:#006600;
	}.texto4 {
		font-family: tahoma;
		font-size: 11px;
		font-weight: normal;
		color: #666666;
	}

	.texto2Negro {

		font-family: tahoma;
		font-size: 11px;
		font-weight: normal;
		color: #000000;
		padding: 2px;
		margin-right: 2px;
	}
	.texto2Center {
		font-family: tahoma;
		font-size: 11px;
		font-weight: normal;
		color: #666666;
		padding: 2px;
		margin-right: 2px;
		text-align: center;
	}
	.subtitulorojo {
		font-family: "Courier New", Courier, monospace;
		font-size: 18px;
		font-weight: bolder;
		color: #8C0000;
		padding-left: 35px;
	}
	.subtitulorojo2 {
		font-family: "Times New Roman", Times, serif;
		font-size: 18px;
		font-weight: normal;
		color: #8C0000;
		padding-left: 35px;
		padding-right: 35px;
	}
	.subtituloazulGrande {

		font-family: Verdana, Geneva, sans-serif;
		font-size: 14px;
		font-weight: bold;
		color: #666666;
	}
	.texto2_peque {

		font-family: tahoma;
		font-size: 9px;
		font-weight: normal;
		color: #666666;
		padding: 2px;
		margin-right: 2px;
	}

</style>
<body>
<table border="1">
            <thead>
            	<?php
				$query = mysqli_query($mysqli, "SELECT *
                                            FROM eventos 
                                            LEFT JOIN empresas ON eventos.CodEmpresa = empresas.CodEmpresa 
                                            Where eventos.CodEvento = '".$_REQUEST["codigo"]."'
                                            ")
                                            or die('error '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);

            	?>
              <tr>
                <th align="left" width="150">Nombre Empresa</th>
                <th align="left" colspan="7"><?php echo $data["RazonSocial"]; ?></th>
              </tr>
              <tr>
                <th align="left" width="150">Evento Ofrecido</th>
                <th align="left" colspan="7"><?php echo $data["Evento"]; ?></th>
              </tr>
              <tr>
                <th align="left" width="150">Puesto Ofertado</th>
                <th align="left" colspan="7"><?php echo $data["Puesto"]; ?></th>
              </tr>
              <tr>
                <th align="left" width="150">Fecha del Evento</th>
                <th align="left" colspan="7"><?php echo $data["Fecha"]; ?></th>
			  </tr>
              <tr>
			  	<th align="left" width="150">Rango de Hora</th>
			  	<th align="left" colspan="7"><?php echo $data["Hora"]; ?></th>
              </tr>
              <tr>
			  	<th align="left" width="150">Puestos Ofrecidos</th>
			  	<th align="left" colspan="7"><?php echo $data["Cantidad"]; ?></th>
              </tr>

            </thead>


            <thead>
              <tr>
			  	<th align="center" width="200">Nro</th>
			  	<th align="center">Rut Postulante</th>
			  	<th align="center">Nombre Postulante</th>
			  	<th align="center">Correo</th>
                <th align="center">Movil</th>
                <th align="center">Banco</th>
                <th align="center">Tipo Cuenta</th>
                <th align="center">Nro Cuenta</th>
              </tr>
            	
            </thead>

            <tbody>
            <?php  
            $no = 1;
           
            $query = mysqli_query($mysqli, "SELECT *
                                            FROM eventos 
                                            LEFT JOIN postulaciones ON eventos.CodEvento = postulaciones.CodEvento
                                            INNER JOIN postulantes ON postulaciones.RutPostulante = postulantes.RutPostulante
                                            Where eventos.CodEvento = '".$_REQUEST["codigo"]."'
                                            ORDER BY postulantes.RutPostulante DESC")
                                            
                                            or die('error '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              
             
              echo "<tr>
                      <td width='150' align='center'>$no</td>
                      <td width='100' align='center'>$data[RutPostulante]</td>
                      <td width='200' align='center'>$data[PrimerNombre] $data[ApellidoPaterno]</td>
                      <td width='200' align='center'>$data[Correo]</td>
					  <td width='120' align='center'>$data[TelefonoMovil]</td>
                      <td width='80' align='center'>$data[BancoCuenta]</td>
                      <td width='80' align='center'>$data[TipoCuenta]</td>
                      <td width='140' align='center'>$data[NroCuenta]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
</body>
</html>	


