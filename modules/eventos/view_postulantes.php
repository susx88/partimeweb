

<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Registro de Postulantes por Eventos

    <a class="btn btn-primary btn-social pull-right" href="modules/eventos/view_postulantes_excel.php?codigo=<?php echo $_REQUEST["codigo"]; ?>" target="excel" title="Exportar Excel" data-toggle="tooltip">
      <i class="fa fa-file-excel-o"></i> Exportar
    </a>
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
    <iframe id="excel" name="excel" frameborder="0" marginheight="0" marginwidth="0" width="1" height="1"></iframe>
    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 

    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Datos del evento han sido registrado correctamente.
            </div>";
    }
    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Datos del evento han sido actualizados correctamente.
            </div>";
    }
    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
               Evento ha sido eliminado correctamente.
            </div>";
    }
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Estatus del evento ha sido actualizado correctamente.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
         
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
           
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Nombre Empresa</th>
                <th class="center">Evento Ofrecido</th>
                <th class="center">Puesto Ofertado</th>
                <th class="center">Fecha del Evento</th>
				        <th class="center">Rango de Hora</th>
                <th class="center">Rut Postulante</th>
                <th class="center">Nombre Postulante</th>
              </tr>
            </thead>
         
            <tbody>
            <?php  
            $no = 1;
           
            $query = mysqli_query($mysqli, "SELECT *
                                            FROM eventos 
                                            LEFT JOIN empresas ON eventos.CodEmpresa = empresas.CodEmpresa 
                                            LEFT JOIN postulaciones ON eventos.CodEvento = postulaciones.CodEvento
                                            INNER JOIN postulantes ON postulaciones.RutPostulante = postulantes.RutPostulante
                                            Where eventos.CodEvento = '".$_REQUEST["codigo"]."'
                                            ORDER BY postulantes.RutPostulante DESC")
                                            
                                            or die('error '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              
             
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[RazonSocial]</td>
                      <td width='80' class='center'>$data[Evento]</td>
                      <td width='90' class='center'>$data[Puesto]</td>
					            <td width='120' class='center'>$data[Fecha]</td>
                      <td width='80' align='center'>$data[Hora]</td>
                      <td width='80' class='center'>$data[RutPostulante]</td>
                      <td width='140' class='center'>$data[PrimerNombre] $data[ApellidoPaterno]</td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content