<?php

require 'funciones.php'; 

if(delete_user($_GET['id_usuario'])){

		echo "<script>

		alert('El usuario fue eliminado.'); 
		location.href='ver_perfiles.php?rol=".$_GET['rol']."';

		</script>";

} else{

		echo "<script>

		alert('Ha ocurrido un error al eliminar el usuario.'); 

		location.href='ver_perfiles.php?rol=".$_GET['rol']."';

		</script>";

}




?>