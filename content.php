<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

	elseif ($_GET['module'] == 'postulantes') {
		include "modules/postulantes/view.php";
	}

	elseif ($_GET['module'] == 'form_postulantes') {
		include "modules/postulantes/form.php";
	}
	elseif ($_GET['module'] == 'form_eventos_postulantes') {
		include "modules/eventos/view_postulantes.php";
	}

	elseif ($_GET['module'] == 'empresas') {
		include "modules/empresas/view.php";
	}

	elseif ($_GET['module'] == 'form_empresas') {
		include "modules/empresas/form.php";
	}
	

	elseif ($_GET['module'] == 'eventos') {
		include "modules/eventos/view.php";
	}

	elseif ($_GET['module'] == 'form_eventos') {
		include "modules/eventos/form.php";
	}

	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}


	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'profile') {
		include "modules/profile/view.php";
		}


	elseif ($_GET['module'] == 'form_profile') {
		include "modules/profile/form.php";
	}

	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}

	elseif ($_GET['module'] == 'profile_post') {
		include "modules/profile_post/view.php";
	}

	elseif ($_GET['module'] == 'form_profile_post') {
		include "modules/profile_post/form.php";
	}

	elseif ($_GET['module'] == 'eventos_post') {
		include "modules/eventos_post/view.php";
	}

	elseif ($_GET['module'] == 'password_post') {
		include "modules/password_post/view.php";
	}
}
?>