<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 0);
require_once "../../config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
	
			$username  = mysqli_real_escape_string($mysqli, trim($_POST['username']));
			$password  = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
			$name_user = mysqli_real_escape_string($mysqli, trim($_POST['name_user']));
			$permisos_acceso = mysqli_real_escape_string($mysqli, trim($_POST['permisos_acceso']));

            $query = mysqli_query($mysqli, "INSERT INTO usuarios(username,password,name_user,permisos_acceso)
                                            VALUES('$username','$password','$name_user','$permisos_acceso')")
                                            or die('error: '.mysqli_error($mysqli));    

          
            if ($query) {
                echo "<script>
                    document.location.replace('../../main.php?module=user&alert=1');
                    </script>";
            }
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['id_user'])) {
				$id_user            = mysqli_real_escape_string($mysqli, trim($_POST['id_user']));
				$username           = mysqli_real_escape_string($mysqli, trim($_POST['username']));
				$password           = md5(mysqli_real_escape_string($mysqli, trim($_POST['password'])));
				$name_user          = mysqli_real_escape_string($mysqli, trim($_POST['name_user']));
				$email              = mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$telefono            = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
				$permisos_acceso          = mysqli_real_escape_string($mysqli, trim($_POST['permisos_acceso']));
				
				$name_file          = $_FILES['foto']['name'];
				$ukuran_file        = $_FILES['foto']['size'];
				$tipe_file          = $_FILES['foto']['type'];
				$tmp_file           = $_FILES['foto']['tmp_name'];
				
		
				$allowed_extensions = array('jpg','jpeg','png');
				
			
				$path_file          = "../../images/user/".$name_file;
		
				$file               = explode(".", $name_file);
				$extension          = array_pop($file);

				if (empty($_POST['password']) && empty($_FILES['foto']['name'])) {
					
                    $query = mysqli_query($mysqli, "UPDATE usuarios SET username 	= '$username',
                    													name_user 	= '$name_user',
                    													email       = '$email',
                    													telefono     = '$telefono',
                    													permisos_acceso   = '$permisos_acceso'
                                                                  WHERE id_user 	= '$id_user'")
                                                    or die('error: '.mysqli_error($mysqli));

                
                    if ($query) {
                  
                        echo "<script>
                    document.location.replace('../../main.php?module=user&alert=2');
                    </script>";
                    }
				}
		
				elseif (!empty($_POST['password']) && empty($_FILES['foto']['name'])) {
					
                    $query = mysqli_query($mysqli, "UPDATE usuarios SET username 	= '$username',
                    													name_user 	= '$name_user',
                    													password 	= '$password',
                    													email       = '$email',
                    													telefono     = '$telefono',
                    													permisos_acceso   = '$permisos_acceso'
                                                                  WHERE id_user 	= '$id_user'")
                                                    or die('error : '.mysqli_error($mysqli));

             
                    if ($query) {
                    
                        echo "<script>
                    document.location.replace('../../main.php?module=user&alert=2');
                    </script>";
                    }
				}
				
				elseif (empty($_POST['password']) && !empty($_FILES['foto']['name'])) {
			
					if (in_array($extension, $allowed_extensions)) {
	                
	                    if($ukuran_file <= 1000000) { 
	                        
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
                        		
			                    $query = mysqli_query($mysqli, "UPDATE usuarios SET username 	= '$username',
			                    													name_user 	= '$name_user',
			                    													email       = '$email',
			                    													telefono     = '$telefono',
			                    													foto 		= '$name_file',
			                    													permisos_acceso   = '$permisos_acceso'
			                                                                  WHERE id_user 	= '$id_user'")
			                                                    or die('error : '.mysqli_error($mysqli));

			                    if ($query) {
			                    
			                        echo "<script>
                    document.location.replace('../../main.php?module=user&alert=2');
                    </script>";
			                    }
                        	} else {
	                           
	                            echo "<script>
                    document.location.replace('../../main.php?module=user&alert=5');
                    </script>";
	                        }
	                    } else {
	                       
	                       echo "<script>
                    document.location.replace('../../main.php?module=user&alert=6');
                    </script>";
	                    }
	                } else {
	                   
	                    echo "<script>
                    document.location.replace('../../main.php?module=user&alert=7');
                    </script>";
	                } 
				}
				
				else {
					
					if (in_array($extension, $allowed_extensions)) {
	                   
	                    if($ukuran_file <= 1000000) { 
	                       
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
                        		
			                    $query = mysqli_query($mysqli, "UPDATE usuarios SET username 	= '$username',
			                    													name_user 	= '$name_user',
			                    													password    = '$password',
			                    													email       = '$email',
			                    													telefono     = '$telefono',
			                    													foto 		= '$name_file',
			                    													permisos_acceso   = '$permisos_acceso'
			                                                                  WHERE id_user 	= '$id_user'")
			                                                    or die('error: '.mysqli_error($mysqli));

			                    
			                    if ($query) {
			                       
			                        echo "<script>
                    document.location.replace('../../main.php?module=user&alert=2');
                    </script>";
			                    }
                        	} else {
	                            echo "<script>
                    document.location.replace('../../main.php?module=user&alert=5');
                    </script>";
	                        }
	                    } else {
	                       
	                        echo "<script>
                    document.location.replace('../../main.php?module=user&alert=6');
                    </script>";
	                    }
	                } else {
	                
	                   echo "<script>
                    document.location.replace('../../main.php?module=user&alert=7');
                    </script>";
	                } 
				}
			}
		}
	}


	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];
			$status  = "activo";

		
            $query = mysqli_query($mysqli, "UPDATE usuarios SET status  = '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('error: '.mysqli_error($mysqli));

  
            if ($query) {
                echo "<script>
                    document.location.replace('../../main.php?module=user&alert=3');
                    </script>";
            }
		}
	}


	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];
			$status  = "bloqueado";

		
            $query = mysqli_query($mysqli, "UPDATE usuarios SET status  = '$status'
                                                          WHERE id_user = '$id_user'")
                                            or die('Error : '.mysqli_error($mysqli));

        	
            if ($query) {
              
                echo "<script>
                    document.location.replace('../../main.php?module=user&alert=4');
                    </script>";
            }
		}
	}		
}		
?>