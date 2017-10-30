<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Empresas

    <a class="btn btn-primary btn-social pull-right" href="?module=form_empresas&form=add" title="agregar" data-toggle="tooltip">
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
             Nuevos datos de empresas han sido  almacenado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Datos de la Empresa modificados correcamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Se eliminaron los datos de la Empresa
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
                <th class="center">Razon Social</th>
                <th class="center">Giro</th>
                <th class="center">Telefono</th>
                <th class="center">Correo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT * FROM empresas ORDER BY CodEmpresa DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[CodEmpresa]</td>
                      <td width='30'>$data[RutEmpresa]</td>
                      <td width='80' align='left'>$data[RazonSocial]</td>
                      <td width='80' class='center'>$data[Giro]</td>
                      <td width='80' class='center'>$data[Telefono]</td>
                      <td width='80' class='center'>$data[Correo]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-primary btn-sm' href='?module=form_empresas&form=edit&id=$data[CodEmpresa]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/empresas/proses.php?act=delete&id=<?php echo $data['codigo'];?>" onclick="return confirm('estas seguro de eliminar<?php echo $data['RazonSocial']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
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