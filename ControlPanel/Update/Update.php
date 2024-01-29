<?php
ModificarProducto($_POST['IdUsuario'], $_POST['Nombre']);

function ModificarProducto($IdUsuario, $Nombre)
{
    include '../../Conexion/Index.php';

    // Corregir la sentencia SQL: usar comillas simples alrededor de $Nombre y $IdUsuario
    $sentencia = "UPDATE Usuarios SET NombreUsuario='".$Nombre."' WHERE IdUsuario ='".$IdUsuario."'";

    // Agregar manejo de errores en la conexión


    $query = mysqli_query($conn, $sentencia);

    // Agregar manejo de errores en la consulta


    // Cerrar la conexión
    mysqli_close($conn);
}

if ($_FILES["file1"]["error"] > 0) {
    // Manejar el caso en que no se haya subido ningún archivo
} else {
    $nom_archivo = $_FILES['file1']['name'];
    $archivo = $_FILES['file1']['tmp_name'];

    // Rutas de imagen
    $ruta = "../images/" . $nom_archivo;
    $ruta2 = "../../images/" . $nom_archivo;
    $ruta3 = "images/" . $nom_archivo;

    // Subir el archivo a las tres rutas
    $subir1 = move_uploaded_file($archivo, $ruta);
    $subir2 = copy($ruta, $ruta2);
    $subir3 = copy($ruta, $ruta3);

    // Verificar si se subió correctamente a alguna de las rutas
    if ($subir1 && $subir2 && $subir3) {
        // Establecer una nueva conexión
        include '../../Conexion/Index.php';
        // Verificar la conexión

        $sentencia_img = "UPDATE Usuarios SET Foto='$ruta', Foto2='$ruta2', Foto3='$ruta3' WHERE IdUsuario='".$_POST['IdUsuario']."' ";
        
        $query_img = mysqli_query($conn, $sentencia_img);

        // Agregar manejo de errores en la consulta de imágenes


        // Cerrar la conexión
        mysqli_close($conn);
    } else {
        echo "Error al subir el archivo a alguna de las rutas.";
    }
}
?>
<script type="text/javascript">
    alert("Registro Actualizado");
    window.location.href='../../ControlPanel';
</script>
