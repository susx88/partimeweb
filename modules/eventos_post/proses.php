<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 0);
require_once "../../config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

	if ($_GET['act']=='add') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];

			$query_id = mysqli_query($mysqli, "SELECT RIGHT(CodPostulacion,6) as codigo FROM postulaciones
                                                ORDER BY CodPostulacion DESC LIMIT 1")
                                                or die('error '.mysqli_error($mysqli));

	        $count = mysqli_num_rows($query_id);

          	if ($count <> 0) {
        
              $data_id = mysqli_fetch_assoc($query_id);
              $codigo    = $data_id['codigo']+1;
          	} else {
              $codigo = 1;
          	}


	        $buat_id = str_pad($codigo, 6, "0", STR_PAD_LEFT);
	        $codigo = "T$buat_id";

			$sql = "INSERT INTO postulaciones (CodPostulacion,RutPostulante,CodEvento,FechaRegistro,HoraRegistro) 
            	Values ('$codigo','".$_REQUEST["id"]."','".$_REQUEST["codEvento"]."','".date("Y-m-d")."','".date("H:i:s")."' )";
            $query = mysqli_query($mysqli, $sql)
                                            or die('error: '.mysqli_error($mysqli)."<br>$sql");

  
            if ($query) {
                echo "<script>
                    document.location.replace('../../main.php?module=eventos_post&alert=3');
                    </script>";
            }
		}
	}


	elseif ($_GET['act']=='remove') {
		if (isset($_GET['id'])) {
			
			$id_user = $_GET['id'];
			
            $query = mysqli_query($mysqli, "DELETE from postulaciones where CodEvento = '".$_REQUEST["codEvento"]."' And RutPostulante = '".$_REQUEST["id"]."' ")
                                            or die('Error : '.mysqli_error($mysqli));

        	
            if ($query) {
              
                echo "<script>
                    document.location.replace('../../main.php?module=eventos_post&alert=4');
                    </script>";
            }
		}
	}		
}		
?>