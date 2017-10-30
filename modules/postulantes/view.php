<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Postulantes

    <a class="btn btn-primary btn-social pull-right" href="?module=form_postulantes&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar Postulante
    </a>
  </h1>

</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Nuevos datos de postulantes han sido almacenados correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos del Postulante modificados correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos del Postulante
            </div>";
    }
     elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Correo enviado satisfactoriamente al Postulante
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
    
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo</th>
                <th class="center">Rut</th>
                <th class="center">Nombres</th>
                <th class="center">Correo</th>
                <th class="center">Movil</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT *, CONCAT (PrimerNombre,' ',SegundoNombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as NombrePostulante FROM postulantes ORDER BY CodPostulante DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[CodPostulante]</td>
                      <td width='80' class='center'>$data[RutPostulante]</td>
                      <td width='180'>$data[NombrePostulante]</td>
                      <td width='180'>$data[Correo]</td>
                      <td width='180'>$data[TelefonoMovil]</td>
                      <td class='center' width='140'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_postulantes&form=edit&id=$data[CodPostulante]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" style='margin-right:5px' class="btn btn-danger btn-sm" href="modules/postulantes/proses.php?act=delete&id=<?php echo $data['CodPostulante'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data['NombrePostulante']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>

                          <a data-toggle="tooltip" data-placement="top" title="Enviar Correo con Datos de Acceso" class="btn btn-warning btn-sm" href="modules/postulantes/proses.php?act=correo&id=<?php echo $data['CodPostulante'];?>" onclick="return confirm('estas seguro de Enviar el Correo a <?php echo $data['NombrePostulante']; ?> ?');">
                              <i style="color:#fff" class="fa fa-envelope"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
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