<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 0);

require_once "../../config/database.php";


if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if (isset($_POST['Guardar'])) {
        if (isset($_SESSION['id_user'])) {
    
            $old_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['old_pass'])));
            $new_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['new_pass'])));
            $retype_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['retype_pass'])));

 
            $id_user = $_SESSION['id_user'];


            $sql = mysqli_query($mysqli, "SELECT password FROM usuarios WHERE id_user=$id_user")
                                          or die('error: '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($sql);

         
            if ($old_pass != $data['password']){
                echo "<script>
                    document.location.replace('../../main.php?module=password&alert=1');
                    </script>";
            }

          
            else {

                
                if ($new_pass != $retype_pass){
                        echo "<script>
                    document.location.replace('../../main.php?module=password&alert=2);
                    </script>";
                }

               
                else {
                   
                    $query = mysqli_query($mysqli, "UPDATE usuarios SET password = '$new_pass'
                                                                  WHERE id_user  = '$id_user'")
                                                    or die('error : '.mysqli_error($mysqli));   

                   
                    if ($query) {
                        
                        echo "<script>
                    document.location.replace('../../main.php?module=password&alert=3');
                    </script>";
                    }   
                }
            }
        }
    }   
}               
?>