<?php
include 'funciones.php';
$perfil = $_GET['rol'];
$clave = $_GET['clave'];

require('conectar.php');

$or = "";

if($perfil == 1){

$or = " or rol = 4";
   

}

if($perfil == 2){

$or = " or rol = 5";
   

}


if($perfil == 3){

$or = " or rol = 4 or rol = 5";
   

}

if($_GET['clave'] == NULL){

$sql = "SELECT * FROM usuarios where (rol = ".$perfil." $or)";

}else{

$sql = "SELECT * FROM usuarios where (rol = ".$perfil." $or) and (nombre like '%".$clave."%' OR cedula like '%".$clave."%' OR correo like '%".$clave."%')";

}

$datos = mysqli_query($c,$sql);

while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

$cadena = $cadena. '<tr>
    <td>'.$ren['nombre'].'</td>
    <td>'.$ren['cedula'].'</td>
    <td>'.$ren['correo'].'</td>
    <td><a href="ver_archivos.php?id='.$ren['id'].'">'.cuentaArchivos($ren['id']).'</a></td>
    <td><a class="btn btn-info" href="nuevo_archivo.php?id_usuario='.$ren['id'].'" >Agregar Archivo</a></td>
  </tr>';

}

echo $cadena;

?>
