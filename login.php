
<?php
  require './database/DatabaseMYSQL.php';
  require './models/Admin.php';
  $db = new DatabaseMYSQL();
  $db->connect();

  if(isset($_POST['auth'])){
    $sql = "SELECT * FROM admins WHERE email = '".$_POST['email']."' AND password='".$_POST['password']."'";
    $resp = $db->query($sql);
    if ($rs = mysqli_fetch_array($resp)) {
        $admin = new Admin($rs['id'], $rs['email'], $rs['password']);
        session_start();
        $_SESSION['admin'] = $admin;
        $db->disconnect();
        header("location:  ./index.php");
        return;
    }
    header("location:  ./login.php?error");
  }
  
  $db->disconnect();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranjit</title>
    <link rel="stylesheet" href="./styles/login.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body>

    <div class="login-box">
      <img class="logo" src="./imagen/logo de ranjit.jpg" class="avatar" alt="Avatar Image">
      <h1>Inicia Sesion</h1>
      <form method="POST" action="./login.php">
        <!-- USERNAME INPUT -->
        <label for="username">Nombre de Usuario</label>
        <input type="text" name="email" placeholder="Ingresa tu usuario">
        <!-- PASSWORD INPUT -->
        <label for="password">Contraseña</label>
        <input type="password" name="password" placeholder="Ingresa tu contraseña">
        <input type="submit" name="auth" value="Iniciar Sesion">
      </form>
    </div>
    <script>
      const showMessage = (title,icon = 'success', timer = 1500,) => {
      const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })
        
        Toast.fire({
          icon,
          title
        })
      }
    </script>
    <?php
      if(isset($_GET['error'])){
        echo "<script>showMessage('Correo y/o contraseña incorrectos','error')</script>";
      }
    ?>
  </body>
</html>