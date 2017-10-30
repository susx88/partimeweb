 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Postulantes
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=postulantes"> Postulantes </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/postulantes/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  

          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(CodPostulante,6) as codigo FROM postulantes
                                                ORDER BY CodPostulante DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['codigo']+1;
              } else {
                  $codigo = 1;
              }


              $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $codigo = "P$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Rut</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rut" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre1" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre2" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Paterno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidoP" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Materno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidoM" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="domicilio" autocomplete="off" required>
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
                     while ($data = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $data["NombreRegion"]; ?>'
                      <?php //if ($tecnico == $tec->user_id) echo "selected='selected'"; ?>
                              ><?php echo $data["NombreRegion"]; ?></option>
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
                      $query = mysqli_query($mysqli, "SELECT * FROM regiones_comunas LEFT JOIN regiones on regiones_comunas.Codregion = regiones.CodRegion ORDER BY Orden ")
                                                or die('error '.mysqli_error($mysqli));
                     while ($data = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $data["NombreComuna"]; ?>'
                      <?php //if ($tecnico == $tec->user_id) echo "selected='selected'"; ?>
                              ><?php echo $data["NombreComuna"]; ?></option>
                      <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teléfono Movil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="celular" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teléfono Fijo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="correo" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">AFP</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="afp" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sistema de Salud</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="salud" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha de Nacimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fechaNac" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nacionalidad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nacionalidad" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Banco</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bancoCuenta" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nro de Cuenta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroCuenta" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Cuenta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tipoCuenta" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Puesto de Trabajo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="puesto" autocomplete="off" >
                </div>
              </div>

              

              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=postulantes" class="btn btn-default btn-reset">Cancelar</a>
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

      $query = mysqli_query($mysqli, "SELECT * FROM postulantes WHERE CodPostulante='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Postulante
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=postulantes"> Postulantes </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/postulantes/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $data['CodPostulante']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Rut</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rut" autocomplete="off" required value="<?php echo $data['RutPostulante']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre1" autocomplete="off" required value="<?php echo $data['PrimerNombre']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre2" autocomplete="off"  value="<?php echo $data['SegundoNombre']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Paterno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidoP" autocomplete="off"  value="<?php echo $data['ApellidoPaterno']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Materno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidoM" autocomplete="off"  value="<?php echo $data['ApellidoMaterno']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Domicilio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="domicilio" autocomplete="off" required value="<?php echo $data['Domicilio']; ?>" >
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
                <label class="col-sm-2 control-label">Teléfono Movil</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="celular" autocomplete="off" required value="<?php echo $data['TelefonoMovil']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teléfono Fijo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off"  value="<?php echo $data['TelefonoFijo']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="correo" autocomplete="off" required value="<?php echo $data['Correo']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">AFP</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="afp" autocomplete="off" value="<?php echo $data['AFP']; ?>"  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sistema de Salud</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="salud" autocomplete="off"  value="<?php echo $data['Salud']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha de Nacimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fechaNac" autocomplete="off" value="<?php echo $data['FechaNacimiento']; ?>"  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nacionalidad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nacionalidad" autocomplete="off"  value="<?php echo $data['Nacionalidad']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Banco</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bancoCuenta" autocomplete="off"  value="<?php echo $data['BancoCuenta']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nro de Cuenta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroCuenta" autocomplete="off" value="<?php echo $data['NroCuenta']; ?>"  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Cuenta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tipoCuenta" autocomplete="off" value="<?php echo $data['TipoCuenta']; ?>"  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Puesto de Trabajo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="puesto" autocomplete="off" value="<?php echo $data['PuestoTrabajo']; ?>"  >
                </div>
              </div>

              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=postulantes" class="btn btn-default btn-reset">Cancelar</a>
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