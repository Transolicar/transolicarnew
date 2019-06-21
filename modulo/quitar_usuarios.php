<?php 


$id = $_GET['id'];

$usuarios = $_GET['usuarios'];





$arrayUsuarios  = explode("|", $usuarios); 



if(count($arrayUsuarios) == 1){

	$cadena = '<input type="hidden" name="usuario" id="usuario"/>
            No ha agregado ningún usuario al archivo.';

 

}else{



require 'conectar.php'; 

$cadena = '<ul class="list-group">';

foreach ($arrayUsuarios as $key => $value) {



			$sql = "SELECT * FROM usuarios where id = $value";

			$datos = mysqli_query($c,$sql); 

			while ($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

				if($id != $ren['id']){

							$cadena = $cadena.'<li class="list-group-item">'.$ren['cedula'].' - '.$ren['nombre'].' <span class="badge text-danger"><i class="glyphicon glyphicon-minus" onclick="quitar('.$ren['id'].')"></i></span></li>';

				}else{

						unset($arrayUsuarios[$key]); 

				}


			}
}

$usuarios = implode("|", $arrayUsuarios); 

$cadena = $cadena . '</ul>  <input type="hidden" name="usuario" id="usuario" value="'.$usuarios.'" />';



}




echo $cadena; 



?> 