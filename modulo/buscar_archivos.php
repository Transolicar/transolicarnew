<?php

include 'funciones.php';

$ano = $_GET['ano'];
$mes = $_GET['mes'];
$tipo = $_GET['tipo'];
$usuario = $_GET['usuario'];

$plus = "";

if($ano){

$plus = $plus . " and ano = ".$ano;

}

if($mes){

$plus = $plus . " and mes = ".$mes;

}

if($tipo){

$tipo_str = "id_tipo = ".$tipo." and ";

}



require('conectar.php');

$sql = "SELECT * FROM documentos where ".$tipo_str." id_usuario = ".$usuario." ".$plus." ";

$datos = mysqli_query($c,$sql);

$cadena = '<div class="col-md-3"><ul class="media-list">';

if(mysqli_num_rows($datos)==0){

$cadena = $cadena. '<li class="media">
  <div class="media-body">
    <h4 class="media-heading">No existen archivos de este periodo.</h4>
    <p>Intente una busqueda de Año o mes distinto.</p>
    <button class="btn btn-info" onclick="location.reload()">Resetear búsqueda</button>
  </div>
</li>';


}else{

while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

 $nombre_tipo = tipo($ren['id_tipo']);

 $parteUno = explode("/",$ren['link']); 
 
          $nombre_archivo = array_pop($parteUno);
 
         
          $partes_nombre = explode("_", $nombre_archivo);
          
          if(strcmp($partes_nombre[0], $ren['ano']) == 0){
 
               $download_name = $nombre_tipo.'_'.$ren['ano'].'-'.$ren['mes']; 
 
          }else{
 
           $download_name = $nombre_archivo;
 
          }

 $cadena = $cadena .' <li class="media">
  <img class="media-object" src="img/pdf.png" height="64" width="64">
   <div class="media-body">
     <h4 class="media-heading">'.ucfirst($nombre_tipo).'</h4>
     <h5 class="media-heading">'.$nombre_archivo.'</h5>
     <p>Mes: '.get_mes_nombre($ren['mes']).' <br> Año: '.$ren['ano'].' <br>
     <a href="'.$ren['link'].'" download="'.$download_name.'.pdf"><i class="glyphicon glyphicon-save"></i></a>
              | 
              <a href="'.$ren['link'].'" target="_blank" ><i class="glyphicon glyphicon-eye-open"></i></a>

     </p>
   </div>
 </li>';


}

}

$cadena = $cadena ."</div></div>";

echo $cadena;





?>
