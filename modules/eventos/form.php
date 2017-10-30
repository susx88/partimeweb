 <?php  

if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Eventos
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=eventos"> Eventos </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/eventos/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  

          
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(CodEvento,6) as codigo FROM eventos
                                                ORDER BY CodEvento DESC LIMIT 1")
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
                <label class="col-sm-2 control-label">Empresa</label>
                <div class="col-sm-5">
                  <select id="empresa" name="empresa" class="form-control" style="cursor: pointer;" >
                      <option value="0">Todos</option>
                      <?php 
                      $query = mysqli_query($mysqli, "SELECT * FROM empresas ORDER BY RazonSocial ")
                                                or die('error '.mysqli_error($mysqli));
                     while ($regs = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $regs["CodEmpresa"]; ?>'
                      <?php //if ($tecnico == $tec->user_id) echo "selected='selected'"; ?>
                              ><?php echo $regs["RazonSocial"]; ?></option>
                      <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Evento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="evento" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Puesto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="puesto" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fecha" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Hora</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="hora" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Cantidad</label>
                <div class="col-sm-5">
                  <select id="cantidad" name="cantidad" class="form-control" style="cursor: pointer;" >
                    <?php for ($i=1; $i<=100; $i++) { ?>
                      <option value="<?php echo $i; ?>" 
                        <?php //if ($data["Cantidad"] == $i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                      
                      <?php } ?>
                  </select>
                </div>
              </div>

             
              <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="obs" autocomplete="off" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Estatus</label>
                <div class="col-sm-5">
                  <select id="estatus" name="estatus" class="form-control" style="cursor: pointer;" >
                      <option value="Activo">Activo</option>
                      <option value="Desactivado">Desactivado</option>
                  </select>
                </div>
              </div>

              

              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=eventos" class="btn btn-default btn-reset">Cancelar</a>
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

      $query = mysqli_query($mysqli, "SELECT * FROM eventos WHERE CodEvento='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Evento
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=eventos"> Eventos </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/eventos/proses.php?act=update" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="codigo" value="<?php echo $data['CodEvento']; ?>" readonly required>
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label">Empresa</label>
                <div class="col-sm-5">
                  <select id="empresa" name="empresa" class="form-control" style="cursor: pointer;" >
                      <option value="0">Todos</option>
                      <?php 
                      $query = mysqli_query($mysqli, "SELECT * FROM empresas ORDER BY RazonSocial ")
                                                or die('error '.mysqli_error($mysqli));
                     while ($regs = mysqli_fetch_assoc($query)) {  ?>
                              <option value='<?php echo $regs["CodEmpresa"]; ?>'
                      <?php if ($data["CodEmpresa"] == $regs["CodEmpresa"]) echo "selected='selected'"; ?>
                              ><?php echo $regs["RazonSocial"]; ?></option>
                      <?php } ?>

                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Evento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="evento" autocomplete="off" required value="<?php echo $data['Evento']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Puesto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="puesto" autocomplete="off" value="<?php echo $data['Puesto']; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Fecha</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="fecha" autocomplete="off" value="<?php echo $data['Fecha']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Hora</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="hora" autocomplete="off" value="<?php echo $data['Hora']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Cantidad</label>
                <div class="col-sm-5">
                  <select id="cantidad" name="cantidad" class="form-control" style="cursor: pointer;" >
                    <?php for ($i=1; $i<=100; $i++) { ?>
                      <option value="<?php echo $i; ?>" 
                        <?php if ($data["Cantidad"] == $i) echo "selected='selected'"; ?>><?php echo $i; ?></option>
                      
                      <?php } ?>
                  </select>
                </div>
              </div>

             
              <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="obs" autocomplete="off" value="<?php echo $data['Obs']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Estatus</label>
                <div class="col-sm-5">
                  <select id="estatus" name="estatus" class="form-control" style="cursor: pointer;" >
                      <option value="Activo" <?php if ($data["Estatus"] == 'Activo') echo "selected='selected'"; ?>>Activo</option>
                      <option value="Desactivado" <?php if ($data["Estatus"] == 'Desactivado') echo "selected='selected'"; ?>>Desactivado</option>
                  </select>
                </div>
              </div>


              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=eventos" class="btn btn-default btn-reset">Cancelar</a>
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