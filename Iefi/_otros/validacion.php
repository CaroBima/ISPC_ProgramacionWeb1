<?php
        if(isset($_POST['submit'])) { 
            //conexión a la base de datos
            include (“conexion.php”); 
            $idconex = cnn(); 

            //traigo los valores de los input
            $email = $_POST["email"];
            $contra = $_POST["password"];
            
            $registros = mysql_query("SELECT * FROM usuario WHERE nombreUsuario ='" + $email + "' AND contrasenia = '" + $contra + "';" , $id);
            
            //si devuelve registros es que los datos coinciden
            if(empty($registros)){
                header("Location: .$index.html");
                die();
            }else{
                header("Location: .$contacto.html");
                die();
            }
        
            




            mysql_free_result($id);
            mysql_close($idconex);
        }
    ?>