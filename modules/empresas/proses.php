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
     
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
            $rut  = mysqli_real_escape_string($mysqli, trim($_POST['rut']));
            $domicilio  = mysqli_real_escape_string($mysqli, trim($_POST['domicilio']));
            $region     = mysqli_real_escape_string($mysqli, trim($_POST['region']));
            $comuna     = mysqli_real_escape_string($mysqli, trim($_POST['comuna']));
            $telefono     = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $correo     = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
            $giro     = mysqli_real_escape_string($mysqli, trim($_POST['giro']));
            $contacto     = mysqli_real_escape_string($mysqli, trim($_POST['contacto']));
            $cargo     = mysqli_real_escape_string($mysqli, trim($_POST['cargo']));


            $created_user = $_SESSION['id_user'];


               $query = mysqli_query($mysqli, "INSERT INTO empresas(CodEmpresa,
                                                             RutEmpresa,
                                                             RazonSocial,
                                                             Domicilio,
                                                             Region,
                                                             Comuna,
                                                             Giro,
                                                             Correo,
                                                             Contacto,
                                                             Telefono,
                                                             Cargo,
                                                             created_user,
                                                             updated_user) 
                                            VALUES('$codigo','$rut','$nombre','$domicilio','$region','$comuna','$giro','$correo','$contacto','$telefono','$cargo','$created_user','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    
        
            if ($query) {
         
                //header("location: ../../main.php?module=empresas&alert=1");
                 echo "<script>
                    document.location.replace('../../main.php?module=empresas&alert=1');
                    </script>";
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
                $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
                $nombre  = mysqli_real_escape_string($mysqli, trim($_POST['nombre']));
                $rut  = mysqli_real_escape_string($mysqli, trim($_POST['rut']));
                $domicilio  = mysqli_real_escape_string($mysqli, trim($_POST['domicilio']));
                $region     = mysqli_real_escape_string($mysqli, trim($_POST['region']));
                $comuna     = mysqli_real_escape_string($mysqli, trim($_POST['comuna']));
                $telefono     = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
                $correo     = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
                $giro     = mysqli_real_escape_string($mysqli, trim($_POST['giro']));
                $contacto     = mysqli_real_escape_string($mysqli, trim($_POST['contacto']));
                $cargo     = mysqli_real_escape_string($mysqli, trim($_POST['cargo']));

                $updated_user = $_SESSION['id_user'];



                

              $query = mysqli_query($mysqli, "UPDATE empresas SET  
                                         RutEmpresa = '$rut',
                                         RazonSocial = '$nombre',
                                         Domicilio = '$domicilio',
                                         Region = '$region',
                                         Comuna = '$comuna',
                                         Giro = '$giro',
                                         Correo = '$correo',
                                         Contacto = '$contacto',
                                         Telefono = '$telefono',
                                         Cargo = '$cargo',
                                         updated_user = '$updated_user'
                                                WHERE CodEmpresa       = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));

                if ($query) {
                  
                    echo "<script>
                    document.location.replace('../../main.php?module=empresas&alert=2');
                    </script>";
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM empresas WHERE CodEmpresa='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                echo "<script>
                    document.location.replace('../../main.php?module=empresas&alert=3');
                    </script>";
            }
        }
    }       
}       
?>