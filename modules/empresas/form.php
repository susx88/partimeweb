 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Empresas
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=empresas"> Empresas </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/empresas/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  
          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(CodEmpresa,6) as codigo FROM empresas
                                                ORDER BY CodEmpresa DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }


              $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $codigo = "E$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Rut Empresa</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rut" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Razon Social</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="domicilio" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Región</label>
                <div class="col-sm-5">
                  <select id="region" name="region" class="form-control" style="cursor: pointer;" >
                      <option value="0">Todos</option>
                      <?php 
                      $query = mysqli_query($mysqli, "SELECT * FROM regiones ORDER BY Orden ")
                                                or die('error '.mysqli_error($mysqli));
                     while ($regiones = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $regiones["NombreRegion"]; ?>'
                      <?php //if ($data["Region"] == $regiones["NombreRegion"]) echo "selected='selected'"; ?>
                              ><?php echo $regiones["NombreRegion"]; ?></option>
                      <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Comuna</label>
                <div class="col-sm-5">
                  <select id="comuna" name="comuna" class="form-control" style="cursor: pointer;" >
                      <option value="0">Todos</option>
                      <?php 
                      $query = mysqli_query($mysqli, "SELECT * FROM regiones_comunas 
                        LEFT JOIN regiones on regiones_comunas.Codregion = regiones.CodRegion ORDER BY Orden ")
                                                or die('error '.mysqli_error($mysqli));
                     while ($comunas = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $comunas["NombreComuna"]; ?>'
                      <?php //if ($comunas["NombreComuna"] == $data['Comuna']) echo "selected='selected'"; ?>
                              ><?php echo $comunas["NombreComuna"]; ?></option>
                      <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Giro</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="giro" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="correo" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Contacto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="contacto" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Cargo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cargo" autocomplete="off" >
                </div>
              </div>

             
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=empresas" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT * FROM empresas WHERE CodEmpresa='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Empresa
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=empresas"> Empresas </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/empresas/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $data['CodEmpresa']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Rut Empresa</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rut" autocomplete="off" required  value="<?php echo $data['RutEmpresa']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Razon Social</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off"  value="<?php echo $data['RazonSocial']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="domicilio" autocomplete="off"  value="<?php echo $data['Domicilio']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Región</label>
                <div class="col-sm-5">
                  <select id="region" name="region" class="form-control" style="cursor: pointer;" >
                      <option value="0">Todos</option>
                      <?php 
                      $query = mysqli_query($mysqli, "SELECT * FROM regiones ORDER BY Orden ")
                                                or die('error '.mysqli_error($mysqli));
                     while ($regiones = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $regiones["NombreRegion"]; ?>'
                      <?php if ($data["Region"] == $regiones["NombreRegion"]) echo "selected='selected'"; ?>
                              ><?php echo $regiones["NombreRegion"]; ?></option>
                      <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Comuna</label>
                <div class="col-sm-5">
                  <select id="comuna" name="comuna" class="form-control" style="cursor: pointer;" >
                      <option value="0">Todos</option>
                      <?php 
                      $query = mysqli_query($mysqli, "SELECT * FROM regiones_comunas 
                        LEFT JOIN regiones on regiones_comunas.Codregion = regiones.CodRegion ORDER BY Orden ")
                                                or die('error '.mysqli_error($mysqli));
                     while ($comunas = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $comunas["NombreComuna"]; ?>'
                      <?php if ($comunas["NombreComuna"] == $data['Comuna']) echo "selected='selected'"; ?>
                              ><?php echo $comunas["NombreComuna"]; ?></option>
                      <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Giro</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="giro" autocomplete="off"  value="<?php echo $data['Giro']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="correo" autocomplete="off"  value="<?php echo $data['Correo']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Contacto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="contacto" autocomplete="off"  value="<?php echo $data['Contacto']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off"  value="<?php echo $data['Telefono']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Cargo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cargo" autocomplete="off"  value="<?php echo $data['Cargo']; ?>" >
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=empresas" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>