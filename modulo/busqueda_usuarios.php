 <?php 

$rol = $_GET['rol']; 
$clave = $_GET['clave']; 



 $or = "";

    switch($rol){

        case 1: 
                $or = " OR rol = 4";
        break;
        case 2:
                $or = " OR rol = 5";
        break;
        case 3: 
                $or = " OR rol = 4 OR rol = 5";
        break;


    }
    
      require('conectar.php');

      $sql = "SELECT * FROM usuarios where (cedula LIKE '%".$clave."%' or nombre LIKE '%".$clave."%') and (rol = ".$rol." $or) ";
      $datos = mysql_query($sql,$c);

        if (mysql_num_rows($datos) == 0){

          $cadena = "No hay resultados para su busqueda."; 

        }else{


               $cadena = "<table class='table'>
      <tr><td>Cédula o NIT</td><td>Nombre</td><td></td></tr>";

     while($ren = mysql_fetch_array($datos)){

       $cadena = $cadena ."<tr>
       <td>".$ren['cedula'] ."</td>
       <td>".ucfirst($ren['nombre']) ."</td>
       <td><button id='btn_".$ren['id']."' type='button' class='btn btn-success' onclick='seleccionar(".$ren['id'].")'>
              <i class='glyphicon glyphicon-plus'></i>
           </button></td> 
       </tr>";


     }

     $cadena = $cadena ."</table>";

        }

     


      echo $cadena;


      ?>