<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 0);

require_once "../../config/database.php";
include "../../assets/php_mailer/enviarcorreo.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $evento  = mysqli_real_escape_string($mysqli, trim($_POST['evento']));
            $empresa  = mysqli_real_escape_string($mysqli, trim($_POST['empresa']));
            $puesto  = mysqli_real_escape_string($mysqli, trim($_POST['puesto']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $hora  = mysqli_real_escape_string($mysqli, trim($_POST['hora']));
            $obs  = mysqli_real_escape_string($mysqli, trim($_POST['obs']));
            $estatus  = mysqli_real_escape_string($mysqli, trim($_POST['estatus']));
            $cantidad  = mysqli_real_escape_string($mysqli, trim($_POST['cantidad']));
            
            $created_user = $_SESSION['id_user'];
           

               $query = mysqli_query($mysqli, "INSERT INTO eventos(CodEvento,
                                                             CodEmpresa,
                                                             Evento,
                                                             Puesto,
                                                             Fecha,
                                                             Hora,
                                                             Obs,
                                                             Cantidad,
                                                             Estatus,created_user,updated_user) 
                                            VALUES('$codigo','$empresa','$evento','$puesto','$fecha','$hora','$obs','$cantidad','$estatus','$created_user','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    
        
            $query = mysqli_query($mysqli, "SELECT
                                    postulantes.Correo
                                    FROM
                                    postulantes
                                    WHERE Estatus = 'Activo' ")
                                            or die('error '.mysqli_error($mysqli));
            $correo="";
            while ($data = mysqli_fetch_assoc($query)) { 
                if ($correo != "") $correo .= ";";
                $correo .= $data["Correo"];
            }

            $mensaje = "<h4>Bienvenido a PartimeWeb</h4>

            <p>Estimado Postulante de PartimeWeb junto con saludar, se le informa que existe una nueva oferta de servicios para postularse. </p>
            <p>Le invitamos a visitar el siguiente enlace y acceder con sus credenciales pararealziar su postulación</p>
            <p>Link: http://partime.grupojega.cl/</p>
            
            <h4>Equipo de PartimeWeb</4>";
            $envio = EnviarCorreoMasivo ($correo,"Postulaciones Disponibles en PartimeWeb",$mensaje);



            if ($envio) {
         
                //header("location: ../../main.php?module=eventos&alert=1");
                 echo "<script>
                    document.location.replace('../../main.php?module=eventos&alert=1');
                    </script>";
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['codigo'])) {
        
            $codigo  = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $evento  = mysqli_real_escape_string($mysqli, trim($_POST['evento']));
            $empresa  = mysqli_real_escape_string($mysqli, trim($_POST['empresa']));
            $puesto  = mysqli_real_escape_string($mysqli, trim($_POST['puesto']));
            $fecha  = mysqli_real_escape_string($mysqli, trim($_POST['fecha']));
            $hora  = mysqli_real_escape_string($mysqli, trim($_POST['hora']));
            $obs  = mysqli_real_escape_string($mysqli, trim($_POST['obs']));
            $estatus  = mysqli_real_escape_string($mysqli, trim($_POST['estatus']));
            $cantidad  = mysqli_real_escape_string($mysqli, trim($_POST['cantidad']));
            
                $updated_user = $_SESSION['id_user'];


              $query = mysqli_query($mysqli, "UPDATE eventos SET  
                            CodEmpresa = '$empresa',
                            Evento    = '$evento',
                            Puesto = '$puesto',
                            Fecha = '$fecha',
                            Hora = '$hora',
                            Obs = '$obs',
                            Cantidad = '$cantidad',
                            Estatus = '$estatus',
                            updated_user = '$updated_user'
                            WHERE CodEvento       = '$codigo'")
                                                or die('error: '.mysqli_error($mysqli));


                if ($query) {
                  
                    //header("location: ../../main.php?module=eventos&alert=2");

                    echo "<script>
                    document.location.replace('../../main.php?module=eventos&alert=2');
                    </script>";
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM eventos WHERE CodEvento='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                //header("location: ../../main.php?module=eventos&alert=3");
                 echo "<script>
                    document.location.replace('../../main.php?module=eventos&alert=3');
                    </script>";
            }
        }
    }    
    elseif ($_GET['act']=='on') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "UPDATE eventos SET Estatus = 'Activo' WHERE CodEvento='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                //header("location: ../../main.php?module=eventos&alert=3");
                 echo "<script>
                    document.location.replace('../../main.php?module=eventos&alert=4');
                    </script>";
            }
        }
    }    
    elseif ($_GET['act']=='off') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "UPDATE eventos SET Estatus = 'Inactivo' WHERE CodEvento='$codigo'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                //header("location: ../../main.php?module=eventos&alert=3");
                 echo "<script>
                    document.location.replace('../../main.php?module=eventos&alert=4');
                    </script>";
            }
        }
    }

    elseif ($_GET['act']=='send') {
        if (isset($_GET['id'])) {
            $codigo = $_GET['id'];
      
            $query = mysqli_query($mysqli, "SELECT
                                    postulantes.Correo
                                    FROM
                                    postulantes
                                    WHERE Estatus = 'Activo' ")
                                            or die('error '.mysqli_error($mysqli));
            $correo="";
            while ($data = mysqli_fetch_assoc($query)) { 
                if ($correo != "") $correo .= ";";
                $correo .= $data["Correo"];
            }

            $mensaje = "<h4>Bienvenido a PartimeWeb</h4>

            <p>Estimado Postulante de PartimeWeb junto con saludar, se le informa que existe una nueva oferta de servicios para postularse. </p>
            <p>Le invitamos a visitar el siguiente enlace y acceder con sus credenciales pararealziar su postulación</p>
            <p>Link: http://partime.grupojega.cl/</p>
            
            <h4>Equipo de PartimeWeb</4>";
            $envio = EnviarCorreoMasivo ($correo,"Postulaciones Disponibles en PartimeWeb",$mensaje);

            if ($envio) {
     
                //header("location: ../../main.php?module=eventos&alert=3");
                 echo "<script>
                    document.location.replace('../../main.php?module=eventos&alert=5');
                    </script>";
            }
        }
    }       
}       
?>