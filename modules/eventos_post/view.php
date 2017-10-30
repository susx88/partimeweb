

<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Eventos Disponibles Para Postularse
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
        
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
           
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Empresa</th>
                <th class="center">Evento</th>
                <th class="center">Puestos</th>
                <th class="center">Disponibles</th>
                <th class="center">Fecha</th>
                <th class="center">Hora</th>
                <th class="center">Estatus</th>
                <th class="center"></th>
              </tr>
            </thead>
         
            <tbody>
            <?php  
            $no = 1;
           
            $query = mysqli_query($mysqli, "SELECT *
                                            FROM eventos 
                                            LEFT JOIN empresas ON eventos.CodEmpresa = empresas.CodEmpresa 
                                            WHERE Estatus= 'Activo'
                                            ORDER BY CodEvento DESC")
                                            or die('error '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 

              $query2 = mysqli_query($mysqli, "SELECT COUNT(*) as Postulados
                                            FROM eventos
                                            LEFT JOIN postulaciones ON eventos.CodEvento = postulaciones.CodEvento 
                                            LEFT JOIN postulantes ON postulantes.RutPostulante = postulaciones.RutPostulante 
                                            WHERE postulaciones.CodEvento = '".$data["CodEvento"]."' ")
                                            or die('error '.mysqli_error($mysqli));
              $data_p = mysqli_fetch_assoc($query2);
              $postulados = $data_p["Postulados"];
              $disponibles = $data["Cantidad"]-$postulados;
              
             
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[RazonSocial]</td>
                      <td width='80' class='center'>$data[Evento]</td>
                      <td width='90' class='center'>$data[Puesto]</td>
                      <td width='90' class='center'>$disponibles</td>
                      <td width='120' class='center'>$data[Fecha]</td>
                      <td width='100' align='center'>$data[Hora]</td>
                      <td width='80' class='center'>$data[Estatus]</td>
                   <td class='center' width='50'>
                        <div>";
                        $query2 = mysqli_query($mysqli, "SELECT *
                              FROM postulaciones 
                              Where RutPostulante = '".$_SESSION["id_user"]."' and CodEvento = '".$data["CodEvento"]."' ") or die('error '.mysqli_error($mysqli));

                        if ($regs = mysqli_fetch_assoc($query2)) { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Postulado" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/eventos_post/proses.php?act=remove&id=<?php echo $_SESSION['id_user'];?>&codEvento=<?php echo $data['CodEvento'];?>">
                                <i style="color:#fff" class="fa fa-thumbs-up"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Postularse" style="margin-right:5px" class="btn btn-warning btn-sm" href="modules/eventos_post/proses.php?act=add&id=<?php echo $_SESSION['id_user'];?>&codEvento=<?php echo $data['CodEvento'];?>" onclick="<?php if ($disponibles==0) {?> generateError('No se puede procesar su Postulación debido a que se han completado las vacantes disponibles.'); return false; <?php } ?>">
                                <i style="color:#fff" class="fa fa-user-plus" aria-hidden="true"></i>
                            </a>
            <?php
                          }

                        echo "</div>
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