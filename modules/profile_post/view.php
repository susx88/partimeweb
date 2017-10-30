
<?php  
if (isset($_SESSION['id_user'])) {

  $query = mysqli_query($mysqli, "SELECT * FROM postulantes WHERE RutPostulante='$_SESSION[id_user]'") 
                                  or die('error: '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
} 
?>


<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Perfil del Postulante
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active"> Perfil de Usuario</li>
  </ol>
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
         Perfil del postulante actualizado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que el archivo que se sube es correcto.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que la imagen no es más de 1 MB.
            </div>";
    }

    elseif ($_GET['alert'] == 4) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que el tipo de archivo subido *.JPG, *.JPEG, *.PNG.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="POST" action="modules/profile_post/proses.php?act=update" enctype="multipart/form-data">
          <div class="box-body">

            <input type="hidden" name="codigo" value="<?php echo $data['CodPostulante']; ?>">
            
            <div class="form-group">
              <label class="col-sm-2 control-label">
              <?php  
              if ($data['foto']=="") { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/user-default.png" width="75">
              <?php
              }
              else { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/<?php echo $data['foto']; ?>" width="75">
              <?php
              }
              ?>
              </label>
              <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['PrimerNombre']." ".$data['ApellidoPaterno']; ?></label>
            </div>
            <hr>
            <div class="form-group">
                <label class="col-sm-2 control-label">Rut</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="rut" autocomplete="off" required value="<?php echo $data['RutPostulante']; ?>" readonly="" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Primer Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre1" autocomplete="off" required value="<?php echo $data['PrimerNombre']; ?>"  readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Segundo Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre2" autocomplete="off"  value="<?php echo $data['SegundoNombre']; ?>"  readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Paterno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidoP" autocomplete="off"  value="<?php echo $data['ApellidoPaterno']; ?>"  readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Materno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidoM" autocomplete="off"  value="<?php echo $data['ApellidoMaterno']; ?>"  readonly="">
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
                  <input type="text" class="form-control" name="correo" autocomplete="off" required value="<?php echo $data['Correo']; ?>"  readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">AFP</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="afp" autocomplete="off" value="<?php echo $data['AFP']; ?>"  readonly="" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Sistema de Salud</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="salud" autocomplete="off"  value="<?php echo $data['Salud']; ?>"  readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha de Nacimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fechaNac" autocomplete="off" value="<?php echo $data['FechaNacimiento']; ?>"  readonly="" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nacionalidad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nacionalidad" autocomplete="off"  value="<?php echo $data['Nacionalidad']; ?>"  readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Banco</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="bancoCuenta" autocomplete="off"  value="<?php echo $data['BancoCuenta']; ?>"  readonly="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nro de Cuenta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroCuenta" autocomplete="off" value="<?php echo $data['NroCuenta']; ?>"  readonly="" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tipo de Cuenta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tipoCuenta" autocomplete="off" value="<?php echo $data['TipoCuenta']; ?>"  readonly="" >
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
                <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Actualizar">
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content