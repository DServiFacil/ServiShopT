
<?php

include("../Conexion/Index.php");

error_reporting(0);

session_start();


if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
	$IdTipoUsuario = $_POST['IdTipoUsuario'];
    date_default_timezone_set("America/Monterrey");
    $FechaRegistro = date("Y-m-d H:i:s");

	if ($password == $cpassword) {
		$sql = "SELECT * FROM Usuarios WHERE username='$username'";
		$result=mysqli_query($conn,$sql);
		if (!$result->num_rows > 0) {
			 $sql = "INSERT INTO Usuarios (username, password, IdTipoUsuario,FechaRegistro)
					VALUES ('$username', '$password','$IdTipoUsuario','$FechaRegistro')";
			$result=mysqli_query($conn,$sql);
			if ($result) {
				echo "<script>alert('excelente! Registro de usuario completado.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
				$IdTipoUsuario = "";
                $FechaRegistro = "";
			} else {
				echo "<script>alert('¡Ups! algo salió mal.')</script>";
			}
		} else {
			echo "<script>alert('¡Ups! El Usuario ya existe.')</script>";
		}

	} else {
		echo "<script>alert('
		Contraseña no coincidente.')</script>";
	}
}

?>


<html>    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrar Empleado</title>
        <link rel="shortcut icon" href="icon.png" type="image/x-icon">
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/estilificado.css" rel="stylesheet"  />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
	</head>

            <div id="layoutSidenav_content">
<body>
<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registro Usuarios</p>


			<div class="input-group">
				<input type="text" placeholder="Nombre de Usuario" name="username"  required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirmar Contraseña" name="cpassword" required>
			</div>
			<div class="input-group">

        <select class="input-group-sellect" id="" name="IdTipoUsuario">
        <option selected disabled value="">Tipo Usuario:</option>
        <?php
include("../Conexion/Index.php");

$query = mysqli_query($conn, "SELECT * FROM CatTipoUsuarios");
while ($valores = mysqli_fetch_array($query)) {
    echo '<option value="' . $valores['IdTipoUsuario'] . '">' . $valores['TipoUsuario'] . '</option>';
}
?>

      </select required>
		</div>


			<div class="input-group">
				<button name="submit" class="btn">Registrar</button>
			</div>

		</form>
	</div>


        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
</body>
</html>
