<html><head>
<meta charset="utf-8">
<?php

$cedula = str_replace(".", "", strtolower($_POST['cedula']));
$correo = str_replace(" ", "", strtolower($_POST['correo']));


header('Content-Type: text/html; charset=utf-8');
require('conectar.php');

//$select  = "SELECT * FROM usuarios where correo = '".$correo."' or cedula = '".$cedula."'";
$select  = "SELECT * FROM usuarios where  cedula = '".$cedula."'";



$datos = mysql_query($select,$c);

//echo $datos;
//exit();

if(mysql_num_rows($datos)==0){





      $sql = "INSERT INTO usuarios (nombre, correo, cedula, rol) VALUES ('".$_POST['nombre']."', '".$correo."', '".$cedula."', '".$_POST['rol']."')";

      if(mysql_query($sql,$c)){

        echo "<script>alert('Se ha registrado con éxito. Vuelva a escribir los datos para ingresar.');

              location.href='ver_perfiles.php?rol=".$_POST['vista']."';
                </script>";


      }else{

        echo "<script>alert('Ha ocurrido un error, intente nuevamente.');

              location.href='registro.php?rol=".$_POST['vista']."';
                </script>";
      }



}else{


  echo "<script>alert('El correo o número de identificación digitados ya estan registrados.');

        window.history.back(1);
          </script>";

}

?>
</head>
<body>
</body>
