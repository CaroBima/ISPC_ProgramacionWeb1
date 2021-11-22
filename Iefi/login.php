
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;500;700;800&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/normalize.css" />
    <title>Login</title>
  </head>
  <body>
    <main class="login-design">
      <div class="waves"></div>
      <div class="login">
        <div class="login-data">
          <img src="assets/beer2.png" alt="" />
          <h1>Inicio de Sesión</h1>
          <form id="login" action="<?=$_SERVER['PHP_SELF'];?>" method="Post" class="login-form">
            <div class="input-group">
              <label class="input-fill">
                <input type="email" name="email" id="email" required />
                <span class="input-label">Correo Electrónico</span>
                <i class="fas fa-envelope"></i>
              </label>
            </div>
            <div class="input-group">
              <label class="input-fill">
                <input type="password" name="password" id="password" required />
                <span class="input-label">Contraseña</span>
                <i class="fas fa-lock"></i>
              </label>
            </div>
            <a href="registroUsuarios.php">¿Necesitas una Cuenta?</a>
            <input type="submit" name="submit" value="Iniciar Sesión" class="btn-login" />
          </form>
        </div>
      </div>
    </main>
    <?php
        if(isset($_POST['submit'])) { 
            //conexión a la base de datos
            //include (“config.php”); 
            //$idconex = cnn(); 
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');
            define('DB_NAME', 'beerfriendsstocksystem');

            //conccion a la base de datos
            $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

            // verifico si se pudo hacer la conexion, si no da error
            if($link === false){
              die("ERROR: No se pudo realizar la conexión. " . mysqli_connect_error());
            } 
            
            //traigo los valores de los input
            $email = $_POST["email"];
            $contra = $_POST["password"];
           
            $consulta = "SELECT * FROM usuario WHERE nombreUsuario ='$email' AND contrasenia = '$contra';";
            $registros = mysqli_query($link, $consulta);
           
            
            //si devuelve registros es que los datos coinciden
            if($registros -> num_rows > 0){
              echo "<script> alert('hay registros'); </script>";
                header("Location: index.php");
                die();
            }else{
              echo "<script type='text/javascript'>alert('Lo sentimos, los datos ingresados son incorrectos');</script>";
              die();
            }
          
            

            echo "<script> alert('pasa del if'); </script>";


            mysql_free_result($id);
            mysql_close($idconex);
        }
    ?>

    
  </body>
  
</html>
