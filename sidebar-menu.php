<?php 

if ($_SESSION['permisos_acceso']=='Super Admin') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
  //ESTO ES PARA VALIDAR QUE OPCION MOSTRAR SI ESTAS ENTRANDO AL MODULO O ESTAS EN LA PAGINA PRINCIPAL
  if ($_GET["module"]=="postulantes" || $_GET["module"]=="form_postulantes") { ?>
    <li class="active">
      <a href="?module=postulantes"><i class="fa fa-address-card-o"></i> Datos de Postulantes </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=postulantes"><i class="fa fa-address-card-o"></i> Datos de Postulantes </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="empresas" || $_GET["module"]=="form_empresas") { ?>
    <li class="active">
      <a href="?module=empresas"><i class="fa fa-briefcase"></i> Datos de Empresas </a>
      </li>
  <?php
  }
   else { ?>
    <li>
      <a href="?module=empresas"><i class="fa fa-briefcase"></i> Datos de Empresas </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="eventos" || $_GET["module"]=="form_eventos" || $_GET["module"]=="form_eventos_postulantes") { ?>
    <li class="active">
      <a href="?module=eventos"><i class="fa fa-newspaper-o"></i> Eventos de Empresas </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=eventos"><i class="fa fa-newspaper-o"></i> Eventos de Empresas </a>
      </li>
  <?php
  }

	if ($_GET["module"]=="eventos_postulantes") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Informes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=eventos_empresas"><i class="fa fa-circle-o"></i> Eventos por Empresas </a></li>
        		<li><a href="?module=eventos_postulantes"><i class="fa fa-circle-o"></i> Eventos/Postulantes</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="eventos_empresas") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Informes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=eventos_empresas"><i class="fa fa-circle-o"></i> Eventos por Empresas </a></li>
            <li><a href="?module=eventos_postulantes"><i class="fa fa-circle-o"></i> Eventos/Postulantes</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="eventos_empreddsas") {  ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=eventos_empresas"><i class="fa fa-circle-o"></i> Eventos por Empresas </a></li>
            <li><a href="?module=eventos_postulantes"><i class="fa fa-circle-o"></i> Eventos/Postulantes</a></li>
      		</ul>
    	</li>
    <?php
	}


	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}


	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}

	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>

<?php
}

elseif ($_SESSION['permisos_acceso']=='Postulante') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

  if ($_GET["module"]=="eventos_post") { ?>
      <li class="active">
        <a href="?module=eventos_post"><i class="fa fa-newspaper-o"></i> Eventos de Empresas </a>
        </li>
    <?php
    }
  else
  { ?>
      <li>
        <a href="?module=eventos_post"><i class="fa fa-newspaper-o"></i> Eventos de Empresas </a>
        </li>
  <?php }
	if ($_GET["module"]=="password_post") { ?>
		<li class="active">
			<a href="?module=password_post"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password_post"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
if ($_SESSION['permisos_acceso']=='Almacen') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

  if ($_GET["module"]=="start") { ?>
    <li class="active">
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }


  if ($_GET["module"]=="medicines" || $_GET["module"]=="form_medicines") { ?>
    <li class="active">
      <a href="?module=medicines"><i class="fa fa-folder"></i> Agregar Productos </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=medicines"><i class="fa fa-folder"></i> Datos de Inventario </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="medicines_transaction" || $_GET["module"]=="form_medicines_transaction") { ?>
    <li class="active">
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de productos </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=medicines_transaction"><i class="fa fa-clone"></i> Registro de productos </a>
      </li>
  <?php
  }

 

	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	?>
	</ul>
<?php
}
?>