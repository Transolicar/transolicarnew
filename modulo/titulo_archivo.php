<div class="row" style="padding:0;">
   <div class="col-sm-12 col-xs-12 col-md-12">
      <?php
	if($perfil != NULL){
	  echo'<h1 class="celeste text-center ">AGREGAR ARCHIVO A '.strtoupper(get_titulo($perfil)) .'</h1>';
	}
	if($id_usuario != NULL){
	  echo '<h2 class="azul text-center "> AGREGAR ARCHIVO A '.get_usuario($id_usuario, 1).' - '.get_usuario($id_usuario, 2).'</h2>';
	}
      ?>
      <br>
      <center><a onclick="window.close()" class="text-danger">Cerrar</a> | <a href="logout.php" class="celeste">Cerrar Sesión</a></center>
   </div>
</div>
