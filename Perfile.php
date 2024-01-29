<?php session_start(); ?>
<?php include 'Conexion/Index.PHP'; 
error_reporting(0);
         $sql = "SELECT * from usuarios  WHERE username = '".$_SESSION['username']."'";
         $result = mysqli_query($conn, $sql);
       $row = mysqli_fetch_array($result);
       $ClaveActiva = $row['IdUsuario'];
       $Nombre = $row['username'];
       $TipoUsuarioA = $row['IdTipoUsuario'];
   
 $sql = "SELECT * FROM comercio order by IdNombreComercio desc limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);{
    $NombreComercio = $row['NombreComercio'];
}
?>
