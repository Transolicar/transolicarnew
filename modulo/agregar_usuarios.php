<?php 


$id = $_GET['id'];

if($_GET['usuarios'] || strlen($_GET['usuarios']) > 0){

$usuarios = $_GET['usuarios']."|".$id;

}else{

$usuarios = $id;

}



$arrayUsuarios  = explode("|", $usuarios); 

require 'conectar.php'; 

$cadena = '<ul class="list-group">';

foreach ($arrayUsuarios as $key => $value) {



			$sql = "SELECT * FROM usuarios where id = $value";

			$datos = mysql_query($sql,$c); 

			while ($ren = mysql_fetch_array($datos)){

					$cadena = $cadena.'<li class="list-group-item">'.$ren['cedula'].' - '.$ren['nombre'].' <span class="badge text-danger" onclick="quitar('.$ren['id'].')" ><i class="glyphicon glyphicon-minus"></i></span></li>';
 
 



			}
}

$cadena = $cadena . '</ul>  <input type="hidden" name="usuario" id="usuario" value="'.$usuarios.'" />';



echo $cadena; 



?> 