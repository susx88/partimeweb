<?php
session_start();

require_once "config/database.php";

$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_REQUEST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_REQUEST['password']))))));
//echo $password;
//die();

if (is_numeric(substr($username,0,8)) && substr($username,8,1) == "-" && is_numeric(substr($username,-1)))  //25596908-0  
 {
 	$sql  = "SELECT * FROM postulantes WHERE RutPostulante='$username' AND ClaveAcceso='$password' AND Estatus='Activo' ";
	$query = mysqli_query($mysqli, $sql) or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		$_SESSION['id_user']   = $data['RutPostulante'];
		$_SESSION['username']  = $data['PrimerNombre']." ".$data['ApellidoPaterno'];
		$_SESSION['password']  = $data['ClaveAcceso'];
		$_SESSION['name_user'] = $data['RutPostulante'];
		$_SESSION['permisos_acceso'] = "Postulante";
		echo "correct";
		//header("Location: main.php?module=start");
		//echo "<script>document.location.replace('http://america.grupojega.cl/main.php?module=start')</script>";

	}


	else {
		//header("Location: index.php?alert=1");
		//echo "<script>document.location.replace('http://america.grupojega.cl/index.php?alert=1')</script>";
		echo "error: ".$sql;
	}

 }
else
{
	if (!ctype_alnum($username) OR !ctype_alnum($password)) {
		//header("Location: index.php?alert=1");
		//echo "<script>document.location.replace('http://america.grupojega.cl/index.php?alert=1')</script>";
		echo "error";
	}
	else {
		$sql  = "SELECT * FROM usuarios WHERE username='$username' AND password='$password' AND status='activo' ";
		$query = mysqli_query($mysqli, $sql)
										or die('error'.mysqli_error($mysqli));
		$rows  = mysqli_num_rows($query);

		if ($rows > 0) {
			$data  = mysqli_fetch_assoc($query);

			

			
			$_SESSION['id_user']   = $data['id_user'];
			$_SESSION['username']  = $data['username'];
			$_SESSION['password']  = $data['password'];
			$_SESSION['name_user'] = $data['name_user'];
			$_SESSION['permisos_acceso'] = $data['permisos_acceso'];
			echo "correct";
			//header("Location: main.php?module=start");
			//echo "<script>document.location.replace('http://america.grupojega.cl/main.php?module=start')</script>";

		}


		else {
			//header("Location: index.php?alert=1");
			//echo "<script>document.location.replace('http://america.grupojega.cl/index.php?alert=1')</script>";
			echo "error: ".$sql;
		}
	}
}
?>