
<?php
session_start();



require('conectar.php');

$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";

$datos = mysql_query($sql,$c);

      while($ren = mysql_fetch_array($datos)){

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
