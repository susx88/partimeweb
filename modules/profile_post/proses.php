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
            $rut  = mysqli_real_escape_string($mysqli, trim($_POST['rut']));
            $nombre1  = mysqli_real_escape_string($mysqli, trim($_POST['nombre1']));
            $nombre2  = mysqli_real_escape_string($mysqli, trim($_POST['nombre2']));
            $apellidoP  = mysqli_real_escape_string($mysqli, trim($_POST['apellidoP']));
            $apellidoM  = mysqli_real_escape_string($mysqli, trim($_POST['apellidoM']));
            $domicilio  = mysqli_real_escape_string($mysqli, trim($_POST['domicilio']));
            $movil  = mysqli_real_escape_string($mysqli, trim($_POST['celular']));
            $fijo  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $region  = mysqli_real_escape_string($mysqli, trim($_POST['region']));
            $comuna  = mysqli_real_escape_string($mysqli, trim($_POST['comuna']));
            $afp  = mysqli_real_escape_string($mysqli, trim($_POST['afp']));
            $salud  = mysqli_real_escape_string($mysqli, trim($_POST['salud']));
            $correo  = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
            $banco  = mysqli_real_escape_string($mysqli, trim($_POST['bancoCuenta']));
            $tipoCuenta  = mysqli_real_escape_string($mysqli, trim($_POST['tipoCuenta']));
            $nroCuenta  = mysqli_real_escape_string($mysqli, trim($_POST['nroCuenta']));
            $fechaNac  = mysqli_real_escape_string($mysqli, trim($_POST['fechaNac']));
            $puesto  = mysqli_real_escape_string($mysqli, trim($_POST['puesto']));
            $nacionalidad  = mysqli_real_escape_string($mysqli, trim($_POST['nacionalidad']));

            $new_pass    = md5(mysqli_real_escape_string($mysqli, trim("123456")));

            
            $created_user = $_SESSION['id_user'];
           

               $query = mysqli_query($mysqli, "INSERT INTO postulantes(CodPostulante,
                                                             PrimerNombre,
                                                             SegundoNombre,
                                                             ApellidoMaterno,
                                                             ApellidoPaterno,
                                                             RutPostulante,
                                                             Domicilio,
                                                             Region,
                                                             Comuna,
                                                             TelefonoMovil,
                                                             TelefonoFijo,
                                                             Correo,
                                                             AFP,
                                                             Salud,
                                                             FechaNacimiento,
                                                             Nacionalidad,
                                                             BancoCuenta,
                                                             NroCuenta,
                                                             TipoCuenta,
                                                             PuestoTrabajo,
                                                             ClaveAcceso,
                                                             created_user,updated_user) 
                                            VALUES('$codigo','$nombre1','$nombre2','$apellidoM','$apellidoP','$rut','$domicilio','$region','$comuna','$movil','$fijo','$correo','$afp','$salud','$fechaNac','$nacionalidad','$banco','$nroCuenta','$tipoCuenta','$puesto','$new_pass','$created_user','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    
        
            if ($query) {
         
                //header("location: ../../main.php?module=postulantes&alert=1");
                 echo "<script>
                    document.location.replace('../../main.php?module=postulantes&alert=1');
                    </script>";
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $rut  = mysqli_real_escape_string($mysqli, trim($_POST['rut']));
            $nombre1  = mysqli_real_escape_string($mysqli, trim($_POST['nombre1']));
            $nombre2  = mysqli_real_escape_string($mysqli, trim($_POST['nombre2']));
            $apellidoP  = mysqli_real_escape_string($mysqli, trim($_POST['apellidoP']));
            $apellidoM  = mysqli_real_escape_string($mysqli, trim($_POST['apellidoM']));
            $domicilio  = mysqli_real_escape_string($mysqli, trim($_POST['domicilio']));
            $movil  = mysqli_real_escape_string($mysqli, trim($_POST['celular']));
            $fijo  = mysqli_real_escape_string($mysqli, trim($_POST['telefono']));
            $region  = mysqli_real_escape_string($mysqli, trim($_POST['region']));
            $comuna  = mysqli_real_escape_string($mysqli, trim($_POST['comuna']));
            $afp  = mysqli_real_escape_string($mysqli, trim($_POST['afp']));
            $salud  = mysqli_real_escape_string($mysqli, trim($_POST['salud']));
            $correo  = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
            $banco  = mysqli_real_escape_string($mysqli, trim($_POST['bancoCuenta']));
            $tipoCuenta  = mysqli_real_escape_string($mysqli, trim($_POST['tipoCuenta']));
            $nroCuenta  = mysqli_real_escape_string($mysqli, trim($_POST['nroCuenta']));
            $fechaNac  = mysqli_real_escape_string($mysqli, trim($_POST['fechaNac']));
            $puesto  = mysqli_real_escape_string($mysqli, trim($_POST['puesto']));
            $nacionalidad  = mysqli_real_escape_string($mysqli, trim($_POST['nacionalidad']));
            
                $updated_user = $_SESSION['id_user'];


              $query = mysqli_query($mysqli, "UPDATE postulantes SET  
                            PrimerNombre = '$nombre1',
                            RutPostulante    = '$rut',
                            SegundoNombre = '$nombre2',
                            ApellidoPaterno = '$apellidoP',
                            ApellidoMaterno = '$apellidoM',
                            Domicilio = '$domicilio',
                            TelefonoMovil = '$movil',
                            TelefonoFijo = '$fijo',
                            Region = '$region',
                            Comuna = '$comuna',
                            AFP = '$afp',
                            Salud = '$salud',
                            Correo = '$correo',
                            BancoCuenta = '$banco',
                            TipoCuenta = '$tipoCuenta',
                            NroCuenta = '$nroCuenta',
                            FechaNacimiento = '$fechaNac',
                            PuestoTrabajo = '$puesto',
                            Nacionalidad = '$nacionalidad',
                            updated_user = '$updated_user'
                            WHERE CodPostulante       = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));


                if ($query) {
                  
                    //header("location: ../../main.php?module=postulantes&alert=2");

                    echo "<script>
                    document.location.replace('../../main.php?module=profile_post&alert=1');
                    </script>";
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM postulantes WHERE CodPostulante='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                //header("location: ../../main.php?module=postulantes&alert=3");
                 echo "<script>
                    document.location.replace('../../main.php?module=postulantes&alert=3');
                    </script>";
            }
        }
    }       
}       



?>