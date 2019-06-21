
<?php
session_start();



require('conectar.php');

$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";

$datos = mysqli_query($c,$sql);

      while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

      switch($ren['rol']){

          case 0 : include ('administrador.php');
          break;
          case 1 : include ('empleado.php');
          break;
          case 2 : include ('cliente.php');
          break;
          case 3 : include ('proveedor.php');
          break;


        }

      }



?>
