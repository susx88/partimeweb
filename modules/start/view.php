  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-home icon-title"></i> Inicio
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    </ol>
  </section>
  
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12 col-xs-12">
        <div class="alert alert-info alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <p style="font-size:15px">
            <i class="icon fa fa-user"></i> Bienvenido <strong><?php echo $_SESSION['name_user']; ?></strong>
          </p>        
        </div>
      </div>  
    </div>
   <?php 
   if ($_SESSION['permisos_acceso']!='Postulante') { ?>
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00c0ef;color:#fff" class="small-box">
          <div class="inner">
            <?php  
          
            $query = mysqli_query($mysqli, "SELECT COUNT(CodPostulante) as numero FROM postulantes Where Estatus = 'Activo' ")
                                            or die('Error '.mysqli_error($mysqli));

           
            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Datos de Postulantes</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-card-o"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="?module=form_postulantes&form=add" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#00a65a;color:#fff" class="small-box">
          <div class="inner">
            <?php   
   
            $query = mysqli_query($mysqli, "SELECT COUNT(CodEmpresa) as numero FROM empresas")
                                            or die('Error '.mysqli_error($mysqli));


            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Datos de Empresas</p>
          </div>
          <div class="icon">
            <i class="fa fa-briefcase"></i>
          </div>
          <?php  
          if ($_SESSION['permisos_acceso']!='gerente') { ?>
            <a href="?module=form_empresas&form=add" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
          <?php
          } else { ?>
            <a class="small-box-footer"><i class="fa"></i></a>
          <?php
          }
          ?>
        </div>
      </div><!-- ./col -->

      <div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
  
            $query = mysqli_query($mysqli, "SELECT COUNT(CodEvento) as numero FROM eventos")
                                            or die('Error'.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Eventos de Empresas</p>
          </div>
          <div class="icon">
            <i class="fa fa-newspaper-o"></i>
          </div>
          <a href="?module=form_eventos&form=add" class="small-box-footer" title="Agregar" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
      </div><!-- ./col -->

     <?php 
   }
   else
    {?>

<div class="col-lg-4 col-xs-6">
        <!-- small box -->
        <div style="background-color:#f39c12;color:#fff" class="small-box">
          <div class="inner">
            <?php  
  
            $query = mysqli_query($mysqli, "SELECT COUNT(CodEvento) as numero FROM eventos where Estatus = 'Activo'")
                                            or die('Error'.mysqli_error($mysqli));

            $data = mysqli_fetch_assoc($query);
            ?>
            <h3><?php echo $data['numero']; ?></h3>
            <p>Eventos de Empresas</p>
          </div>
          <div class="icon">
            <i class="fa fa-newspaper-o"></i>
          </div>
          <a href="?module=eventos_post" class="small-box-footer" title="Consultar" data-toggle="tooltip"><i class="fa fa-folder"></i></a>
        </div>
      </div><!-- ./col -->
    
    <?php } ?> 
  </section><!-- /.content -->