<?php

require 'funciones.php'; 

if(delete_user_archivo($_GET['id_archivo'],$_GET['id_usuario'])){

		echo "<script>

		alert('El archivo fue eliminado correctamente.'); 
		location.href='ver_archivos.php?id=".$_GET['id_usuario']."';

		</script>";

} else{

		echo "<script>
		

		alert('Ha ocurrido un error al eliminar el archivo.'); 

		location.href='ver_archivos.php?id=".$_GET['id_usuario']."';

		</script>";

}




?>