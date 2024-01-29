<?php
include("../Conexion/Index.php");
session_start();
error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location: ../ControlPanel");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT count(*) as Numero FROM Usuarios WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $integer = intval($row['Numero']);
    
    if ($integer > 0) {
        $sql = "SELECT * FROM Usuarios WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        $id = $row['IdUsuario'];

        // Almacena datos en la sesión
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $row['username'];
        $_SESSION['tipo_usuario'] = $row['IdTipoUsuario'];
    } else {
        echo "<script>alert('El usuario o la contraseña son incorrectos. Por favor, inténtelo de nuevo.')</script>";
    }

    if ($_SESSION['tipo_usuario'] == 1) { // Administrador
        header("Location: SecureCheck/");
    } else {
        if ($_SESSION['tipo_usuario'] == 2) { // Empleado
            header("Location: SecureEmp/");
        }
    }
}

$sql = "SELECT * FROM comercio order by IdNombreComercio desc limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);{
    $NombreComercio = $row['NombreComercio'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- Favicons -->
    <link href="../assets/img/Tortillas.png" rel="icon">
    <link href="../assets/img/Tortillas.png" rel="apple-touch-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Tortilleria</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="../assets/img/Tortillas_img.png" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <h1><img src="../assets/img/Tortillas.png" alt="logo" class="logo"> Tortillería "<?php print($NombreComercio); ?>" </h1>
              </div>
              <p class="login-card-description">Entrar</p>
              <form method="POST">
                  <div class="form-group">
                    <label for="email" class="sr-only">Usuario</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Ingresar tu Usuario" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********" required>
                  </div>
                  <button name="submit" class="btn btn-block login-btn mb-4">Acceder</button>
                </form>
                </nav>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
