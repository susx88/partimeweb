

<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Registro de Eventos

    <a class="btn btn-primary btn-social pull-right" href="?module=form_eventos&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
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
                <th class="center">Empresa</th>
                <th class="center">Evento</th>
                <th class="center">Puestos</th>
                <th class="center">Ofrecidos</th>
                <th class="center">Postulados</th>
                <th class="center">Fecha</th>
				        <th class="center">Hora</th>
                <th class="center">Estatus</th>
                <th class="center">Acciones</th>
              </tr>
            </thead>
         
            <tbody>
            <?php  
            $no = 1;
           
            $query = mysqli_query($mysqli, "SELECT *
                                            FROM eventos LEFT JOIN empresas ON eventos.CodEmpresa = empresas.CodEmpresa ORDER BY CodEvento DESC")
                                            or die('error '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 

              $query2 = mysqli_query($mysqli, "SELECT COUNT(*) as Postulados
                                            FROM eventos
                                            LEFT JOIN postulaciones ON eventos.CodEvento = postulaciones.CodEvento 
                                            INNER JOIN postulantes ON postulantes.RutPostulante = postulaciones.RutPostulante 
                                            WHERE postulaciones.CodEvento = '".$data["CodEvento"]."' ")
                                            or die('error '.mysqli_error($mysqli));
              $data_p = mysqli_fetch_assoc($query2);
              $postulados = $data_p["Postulados"];
              //$disponibles = $data["Cantidad"]-$postulados;
              
             
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[RazonSocial]</td>
                      <td width='80' class='center'>$data[Evento]</td>
                      <td width='90' class='center'>$data[Puesto]</td>
                      <td width='90' class='center'>$data[Cantidad]</td>
                      <td width='90' class='center'>$postulados</td>
					            <td width='120' class='center'>$data[Fecha]</td>
                      <td width='100' align='center'>$data[Hora]</td>
                      <td width='80' class='center'>$data[Estatus]</td>
                   <td class='center' width='160'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin:3px' class='btn btn-primary btn-sm' href='?module=form_eventos&form=edit&id=$data[CodEvento]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>

                          <a data-toggle='tooltip' data-placement='top' title='Postulantes' style='margin:3px' class='btn btn-info btn-sm' href='?module=form_eventos_postulantes&codigo=$data[CodEvento]'>
                              <i style='color:#fff' class='glyphicon glyphicon-user'></i>
                          </a>
                          ";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" style='margin:3px' class="btn btn-danger btn-sm" href="modules/eventos/proses.php?act=delete&id=<?php echo $data['CodEvento'];?>" onclick="return confirm('estas seguro de eliminar el evento <?php echo $data['Evento']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
                          <a data-toggle="tooltip" data-placement="top" style='margin:3px' title="Enviar Notificación a Postulantes" class="btn btn-danger btn-sm" href="modules/eventos/proses.php?act=send&id=<?php echo $data['CodEvento'];?>" onclick="return confirm('Esta seguro de enviar la notificación del evento <?php echo $data['Evento']; ?> a los postulantes ?');">
                              <i style="color:#fff" class="fa fa-envelope"></i>
                          </a>

                           <?php

                          if ($data['Estatus']=='Activo') { ?>
                            
                            <a data-toggle="tooltip" data-placement="top" title="Activo" style="margin:3px" class="btn btn-success btn-sm" href="modules/eventos/proses.php?act=off&id=<?php echo $data['CodEvento'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            
                            <a data-toggle="tooltip" data-placement="top" title="Inactivo" style="margin:3px" class="btn btn-warning btn-sm" href="modules/eventos/proses.php?act=on&id=<?php echo $data['CodEvento'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
            <?php
                          }
            
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