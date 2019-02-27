<?php

header('Content-Type: text/html; charset=UTF-8');


if(!$_POST['usuario']){


    echo "<html lang='es'>
<head>

<meta charset='utf-8'>
    <script>

          alert('Parece que no ha seleccionado ningún usuario.');
          window.history.back();

    </script>

</head></html>";


}else{







$usuarios =  $_POST['usuario'];
$rol =  $_POST['rol'];
$tipo =  $_POST['tipo'];
$mes =  $_POST['mes'];
$ano = $_POST['ano'];
$nombre = $_POST['nombre'];
//$tmp_archivo =  $_FILES['archivo']['tmp_name'];

require('conectar.php');

$aleatorio =  generarCodigo(4);

if($nombre == NULL){

$nombre = $ano."_".$mes."_".$aleatorio.".pdf";


}else{

    $nombre = $nombre."_".$aleatorio.".pdf";

}


$arrayUsuarios = explode("|", $usuarios); 


$contador = 0; 

      foreach ($arrayUsuarios as $key => $value) {


       echo  $id_usuario = $value;
       

           echo   $directorio = "archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes."/";



if (!file_exists('archivos')) {
    mkdir('archivos', 0777, true);

}

if (!file_exists('archivos/'.$id_usuario)) {
    mkdir('archivos/'.$id_usuario, 0777, true);

}

if (!file_exists('archivos/'.$id_usuario."/".$tipo)) {
    mkdir('archivos/'.$id_usuario."/".$tipo, 0777, true);
}

if (!file_exists('archivos/'.$id_usuario."/".$tipo."/".$ano)) {
    mkdir('archivos/'.$id_usuario."/".$tipo."/".$ano, 0777, true);
}

if (!file_exists('archivos/'.$id_usuario."/".$tipo."/".$ano)) {
      mkdir('archivos/'.$id_usuario."/".$tipo."/".$ano, 0777, true);


}


    if (!file_exists("archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes)) {




      mkdir("archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes, 0777, true);



                if($contador == 0){

                  $original = "$directorio/$nombre";
                  
                                      if (isset ($_FILES["archivo"])) {

	  $tot = count($_FILES["archivo"]["name"]);

		  for ($i = 0; $i < $tot; $i++){
		  
		      $tmp_archivo = $_FILES["archivo"]["tmp_name"][$i];
	    	      $name = $_FILES["archivo"]["name"][$i];
	
			  if(move_uploaded_file($tmp_archivo, "$directorio/$nombre"))
			  {
			          
			     $sql = "INSERT INTO documentos (id_usuario,id_tipo,mes,ano,link,descargas,estado,disponible)                                    				
			     VALUES(".$id_usuario.",".$tipo.",".$mes.",".$ano.",'archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes."/".$nombre."',0,0,1)";
			
		             /*if(mysql_query($sql,$c))
		             {
				$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitoso. por aqui es 3 \\n";
			     }*/
		    
		      
			    
		          }
	
		             if(mysql_query($sql,$c))
		             {
				$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitoso.  \\n";
			     }
			     else{
				$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - ERROR DE SUBIDA. \\n";
		             }
		}

	}
                  
                  /*

                                        if(move_uploaded_file($tmp_archivo, "$directorio/$nombre")){

                                              $sql = "INSERT INTO documentos (id_usuario,id_tipo,mes,ano,link,descargas,estado,disponible)
                                                      VALUES (".$id_usuario.",".$tipo.",".$mes.",".$ano.",'archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes."/".$nombre."',0,0,1)";

                                                     if(mysql_query($sql,$c)){

                                                        $cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitosopor aqui es. \\n";

                                                     }
                                      
                                        }else{


                                                    $cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - ERROR DE SUBIDA por qui es. \\n";

                                

                                        }*/


                }else{





                                      if(copy($original, "$directorio/$nombre")){

                                              $sql = "INSERT INTO documentos (id_usuario,id_tipo,mes,ano,link,descargas,estado,disponible)
                                                      VALUES (".$id_usuario.",".$tipo.",".$mes.",".$ano.",'archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes."/".$nombre."',0,0,1)";

                                                     if(mysql_query($sql,$c)){

                                                        $cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitoso por aqui es 2. \\n";

                                                     }
                                      
                                        }else{


                                                    $cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - ERROR DE SUBIDA. por aqui es 2 \\n";

                                

                                        }



                }

      
        

    }else{
	if($contador == 0){
          $original = "$directorio/$nombre";
          
          //echo $original;
          //exhit();
          
                    if (isset ($_FILES["archivo"])) {

	  $tot = count($_FILES["archivo"]["name"]);

		  for ($i = 0; $i < $tot; $i++){
		  
		      $tmp_archivo = $_FILES["archivo"]["tmp_name"][$i];
	    	      $name = $_FILES["archivo"]["name"][$i];
	
			  if(move_uploaded_file($tmp_archivo, "$directorio/$nombre"))
			  {
			          
			     $sql = "INSERT INTO documentos (id_usuario,id_tipo,mes,ano,link,descargas,estado,disponible)                                    				
			     VALUES(".$id_usuario.",".$tipo.",".$mes.",".$ano.",'archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes."/".$nombre."',0,0,1)";
			
		             /*if(mysql_query($sql,$c))
		             {
				$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitoso. por aqui es 3 \\n";
			     }*/
		    
		      
			    
		          }
	
		             if(mysql_query($sql,$c))
		             {
				$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitoso.  \\n";
			     }
			     else{
				$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - ERROR DE SUBIDA. \\n";
		             }
		}

	}
          /*
          if(move_uploaded_file($tmp_archivo, "$directorio/$nombre")){
            $sql = "INSERT INTO documentos (id_usuario,id_tipo,mes,ano,link,descargas,estado,disponible)                                    				
            VALUES(".$id_usuario.",".$tipo.",".$mes.",".$ano.",'archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes."/".$nombre."',0,0,1)";

            if(mysql_query($sql,$c)){
		$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitoso. por aqui es 3 \\n";
	    }
          }else{
		$cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - ERROR DE SUBIDA. por aqui es 3\\n";
          }
          */

   	}else{




                                      if(copy($original, "$directorio/$nombre")){

                                      $sql = "INSERT INTO documentos (id_usuario,id_tipo,mes,ano,link,descargas,estado,disponible)
                                                      VALUES (".$id_usuario.",".$tipo.",".$mes.",".$ano.",'archivos/".$id_usuario."/".$tipo."/".$ano."/".$mes."/".$nombre."',0,0,1)";

                                                     if(mysql_query($sql,$c)){

                                                        $cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - Exitoso. por aqui es 4\\n";

                                                     }
                                      
                                        }else{


                                                    $cadenAlert = $cadenAlert. "Usuario: ".$id_usuario. " - ERROR DE SUBIDA.  por aqui es 4\\n";

                                

                                        }





            }                
          


     
     }


      $contador++; 


      }/* fin de foreach */


                    echo "<script>

                              alert('".$cadenAlert."');
                              location.href = 'ver_perfiles.php?rol=".$rol."';

                            </script>";



}



        function generarCodigo($longitud) {
         $key = '';
         $pattern = '1234567890';
         $max = strlen($pattern)-1;
         for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
         return $key;
        }

 ?>
