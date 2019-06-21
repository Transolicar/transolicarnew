<?php

function get_titulo ($rol){
     require('conectar.php');
     $sql = "SELECT * FROM roles where tipo = ".$rol."";
     $datos = mysqli_query($c,$sql);
     while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){
        $rol_name = $ren['nombre'];
     }
     return $rol_name;
}

function get_tipos($usuario){

      require('conectar.php');
      $sql = "SELECT * FROM documentos where id_usuario = ".$usuario."";
      $datos = mysqli_query($c,$sql);

      $cadena = "<div class='section' style='width:90%; margin-left:5%;'><div class='row' style='min-height:50%;'>";


                        $keyt = 0;

                        if(mysqli_num_rows($datos) == 0){

                              $cadena =   $cadena . "<h1 class='azul'>No hay documentos registrados.</h1>";

                        }else{

                                while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){
                                   $arrayTipo[$keyt] = $ren['id_tipo'];
                                   $keyt++;
                                }

                                $arrayTipo = array_unique($arrayTipo);








                                foreach ($arrayTipo as $key => $value) {

                                $cadena = $cadena . '<a href="lista_archivos.php?tipo='.$value.'"><div class="col-md-3 center-block">
                                  <img src="img/tipo.png"
                                  class="img-responsive">
                                  <h2 class="text-center" style="color:#127eb0; font-weight:bolder;">'.strtoupper(tipo($value)).'</h2>
                                </div></a>';

                                }

                        }


        $cadena = $cadena . "</div></div>";

      return $cadena;

}

function tipo($id){
    require('conectar.php');
    $sql = "SELECT * FROM tipo where id = ".$id."";
    $datos = mysqli_query($c,$sql);
    while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){
       $tipo_name = $ren['nombre'];
    }
    return $tipo_name;
}


function get_actions(){

  $cadena = '    <div class="row" style="min-height:50%;">
          <a href="ver_perfiles.php?rol=2"><div class="col-md-4" style="cursor:pointer;">
            <img src="img/clientes.png" class="img-responsive center-block">
            <h2 class="text-center text-primary">Clientes</h2>
          </div></a>
          <a href="ver_perfiles.php?rol=3"><div class="col-md-4" style="cursor:pointer;">
            <img src="img/proveedores.png" class="img-responsive center-block">
            <h2 class="text-center text-success">Proveedores
              <br>
            </h2>
          </div></a>
            <a href="ver_perfiles.php?rol=1"> <div class="col-md-4" style="cursor:pointer;">
         <img src="img/empleados.png" class="img-responsive center-block">
            <h2 class="text-center text-danger">Empleados</h2>
          </div></a>
        </div>
      </div>';

      return $cadena;
     
}


function get_prefil_actions($perfil){

  $or = "";

    switch($perfil){

        case 1: $rol_nombre = "Empleado";
                $registro = "registro_admin.php";
                $or = " OR rol = 4";
        break;
        case 2: $rol_nombre = "Cliente";
                $registro = "registro.php?rol=2";
                $or = " OR rol = 5";
        break;
        case 3: $rol_nombre = "Proveedor";
                $registro = "registro.php?rol=3";
                $or = " OR rol = 4 OR rol = 5";
        break;
        case 4: $rol_nombre = "Empleado";
                $registro = "registro_admin.php";
                $or = " OR rol = 5";
        break;
        case 5: $rol_nombre = "Cliente";
                $registro = "registro.php?rol=2";
                $or = " OR rol = 4 OR rol = 5";
        break;


    }



$cadena = '

<script>

function keyPressed(evt){
    evt = evt || window.event;
    var key = evt.keyCode || evt.which;
    return key
}



function buscar(evt){

        setTimeout(function(evt){

          var clave = $("#clave").val();
          var rol = '.$perfil.'




          if($("#clave").val().length == 0){

                     $("#tabla_dinamica").html("<tr><td colspan=\'5\'>Buscando, espere por favor...</td>");

                     $.get( "tabla_dinamica.php", {rol: rol} )
                        .done(function( data ) {
                            $("#tabla_dinamica").html(data);

                            });

              }else{

                      $("#tabla_dinamica").html("<tr><td colspan=\'5\'>Buscando, espere por favor...</td>");

                      $.get( "tabla_dinamica.php", {rol: rol, clave: clave} )
                         .done(function( data ) {
                             $("#tabla_dinamica").html(data);

                             });


                  }


              }, "fast")


      }


	function eliminar_usuario(num, rol){
	
	if(confirm("¿Está seguro que desea eliminar este usuario?")){
	
	location.href = "delete_user.php?rol="+rol+"&id_usuario="+num;
	
	}


}

</script>


    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-2 text-center" style="padding-bottom:10px;">
            <a class="btn btn-azul" href="'.$registro.'" >Agregar '.$rol_nombre.'</a>
          </div>
          <div class="col-md-2 text-center" style="padding-bottom:10px;">
              <a class="btn btn-info" href="nuevo_archivo.php?rol='.$perfil.'">Agregar Archivo</a>
          </div>
          <div class="col-md-4 text-center" style="padding-bottom:10px;">
               <input type="text" id="clave" onkeydown="buscar()" class="form-control" placeholder="Escriba cedula, nombre o correo para buscar">
          </div>
        </div>
      </div>
    </div>
    <div class="section" style="min-height:20%;">
      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <table  class="table">
              <thead>
                <tr>

                  <th>Nombre</th>
                  <th>Cédula</th>
                  <th>Correo</th>
                  <th>Archivos</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody id="tabla_dinamica">';

                require('conectar.php');

                $sql = "SELECT * FROM usuarios where rol = ".$perfil." $or";
                $datos = mysqli_query($c,$sql);

                while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

                $cadena = $cadena. '<tr>

                    <td>'.$ren['nombre'].'</td>
                    <td>'.$ren['cedula'].'</td>
                    <td>'.$ren['correo'].'</td>
                    <td><a href="ver_archivos.php?id='.$ren['id'].'">'.cuentaArchivos($ren['id']).'</a></td>
                    <td>
                    
                         <a class="btn btn-info" href="nuevo_archivo.php?id_usuario='.$ren['id'].'" >
                             <i class="glyphicon glyphicon-plus"></i>
                              <sup>1</sup>  <i class="glyphicon glyphicon-file"></i>
                        </a> | <a class="btn btn-danger" onclick="eliminar_usuario('.$ren['id'].','.$perfil.')"><i class="glyphicon glyphicon-trash"></i></a>
			<!--	
                         <a class="btn btn-warning" href="nuevo_archivo_multiple.php?id_usuario='.$ren['id'].'" >
                             <i class="glyphicon glyphicon-plus"></i>
                              <sup>n</sup>  <i class="glyphicon glyphicon-file"></i>
                        </a> 
                        |--> 
                        </td>
                  </tr>';

                }

            $cadena = $cadena . '</tbody>
            </table>
          </div>
        </div>
      </div>
    </div>';
      return $cadena;

}


function cuentaArchivos($id){



  require('conectar.php');

  $sql = "SELECT * FROM documentos where id_usuario = ".$id."";
  $datos = mysqli_query($c,$sql);

  $numero = mysqli_num_rows($datos);

  return $numero;


}

function get_archivo($perfil, $id_usuario){

	if($id_usuario != NULL) {

		$rol = get_usuario($id_usuario, 3);

	    $cadena='<div class="row" style="min-height:50%;">

	                <div class="col-md-4"></div>

	                <div class="col-md-4">
	                    <form method="post" action="subir_archivo.php" enctype="multipart/form-data">
		                    <input type="hidden" value="'.$id_usuario.'" name="usuario">
		                    <input type="hidden" value="'.$rol.'" name="rol">
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-3 text-right">
								   <h4>Nombre Archivo:</h4>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-9">
									<div style="width:200px;">
										<input type="text" name="nombre" class="form-control" /> 
									</div><b>(No es obligatorio - Use únicamente Letras, números y guiones "- ó _")</b>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3 col-sm-3 col-xs-3 text-right">
								  <h4>Tipo:</h4>
								</div>
								<div class="col-md-9 col-sm-9 col-xs-9">
									'.get_tipos_rol($rol).'
								</div>
							</div>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-md-2 col-sm-2 col-xs-2 text-right">
								  <h4>Mes:</h4>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4">
									'.get_mes().'
								</div>
								<div class="col-md-2 col-sm-2 col-xs-2 text-right">
									<h4>Año:</h4>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-4">
									'.get_ano().'
								</div>
							</div>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-md-4  col-sm-4 col-xs-4 text-right">
									<h4>Archivo PDF</h4>
								</div>
								<div class="col-md-8 col-sm-8 col-xs-8">
									<input type="file" name="archivo[]" accept="application/pdf" multiple required style="padding-top:5px; padding-bottom=5px;">
								</div>
							</div>
							<div class="row" style="margin-bottom:10px;">
								<div class="col-md-4 text-right"></div>
								<div class="col-md-8 text-right">
									<input type="submit" class="btn btn-azul" >
								</div>
							</div>
	                	</form>
	                </div>

	                <div class="col-md-4"></div>

	                <div class="row" >
	                  <div class="text-center col-md-12" style="margin-top:100px;">
	                    <a class="btn btn-danger" onclick="history.back()">VOLVER</a>
	                  </div>
	                </div>
	            </div>';
	}else{
		
		$cadena='<div class="row" style="min-height:50%;">
					
					<div class="col-md-3"></div>

                    <div class="col-md-6">
                    	<form method="post" action="subir_archivo.php" enctype="multipart/form-data">
							<input type="hidden" value="'.$perfil.'" name="rol">
       						<div class="row" style="margin-bottom:10px;">
                    			<div class="col-md-3 col-sm-2 col-xs-2 text-right">
									<h4>Usuario:</h4>
								</div>
                    			<div class="col-md-9 col-sm-4 col-xs-4">
									<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#unico" data-backdrop="static" data-keyboard="false">Único usuario</button>-->

									<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#multiple" data-backdrop="static" data-keyboard="false">Usuario(s)</button> <span id="cantidad_usuarios">0</span> Usuario(s) seleccionado(s)
                             
									<!-- Modal 1-->
									<div id="multiple" class="modal fade" role="dialog">
									  	<div class="modal-dialog">
										  	<script>
												function keyPressed(evt){
												evt = evt || window.event;
												var key = evt.keyCode || evt.which;
												return key
												}

												function buscar(evt){					
	        										setTimeout(function(evt){
														var clave = $("#clave").val();
														var rol = '.$perfil.'

		              									if($("#clave").val().length == 0){
															$("#tabla_dinamica").html("<tr><td colspan=\'5\'>Buscando, espere por favor...</td>");
															$.get( "busqueda_usuarios.php", {rol: rol} ).done(function( data ) {
																$("#tabla_dinamica").html(data);
															    var usuarios = $("#usuario").val();
																arrayUsu = usuarios.split("|"); 
																arrayUsu.forEach( function(valor, indice, array) {
																    $("#btn_"+valor).attr("disabled","disabled");
																});
															});
		          										}else{

		                      								$("#tabla_dinamica").html("<tr><td colspan=\'5\'>Buscando, espere por favor...</td>");

		                      								$.get( "busqueda_usuarios.php", {rol: rol, clave: clave} ).done(function( data ) {
		                             							$("#tabla_dinamica").html(data);
																var usuarios = $("#usuario").val();
																arrayUsu = usuarios.split("|"); 
		                                          				arrayUsu.forEach( function(valor, indice, array) {
																	$("#btn_"+valor).attr("disabled","disabled");
																});
		                            						});
														}
													}, "fast")
												}
												
												function seleccionar(id){
										            var centinela = 0; 
										            var usuarios = $("#usuario").val();
										            arrayUsu = usuarios.split("|"); 
										            arrayUsu.forEach( function(valor, indice, array) {
										                if(valor == id){
															alert("Ya has seleccionado este usuario");
															centinela = 1;
										                }
										            });
													cantidad = arrayUsu.length; 

													if(centinela == 0){
	            										$("#agregados").html("Cargando, espere por favor...");
	                     								$.get( "agregar_usuarios.php", {id: id, usuarios: usuarios} ).done(function( data ) {
								                            $("#agregados").html(data);
								                            cantidad = cantidad + 1;
								                            $("#cantidad_usuarios").html(cantidad);
								                            $("#btn_"+id).attr("disabled","disabled");
							                            });
													}
												}

												function quitar(id){
												    var usuarios = $("#usuario").val();
												    arrayUsu = usuarios.split("|"); 
												    cantidad = arrayUsu.length; 
												    if(cantidad == 0){
												        alert("No hay usuarios seleccioandos actualmente");
												    }else{

														$("#agregados").html("Cargando, espere por favor...");

														$.get( "quitar_usuarios.php", {id: id, usuarios: usuarios} ).done(function( data ) {
														    $("#agregados").html(data);
														    cantidad = cantidad - 1;
														    $("#cantidad_usuarios").html(cantidad);
														    $("#btn_"+id).attr("disabled",false);
														});
													}
												}
											</script>
    										<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Único Usuario</h4>
												</div>
												<div class="modal-body">
													<input type="text" id="clave" onkeydown="buscar()" class="form-control" placeholder="Escriba cedula, NIT o nombre para buscar">
													<br><br>
													<div id="agregados">
												    	<input type="hidden" name="usuario" id="usuario"/>
												    	No ha agregado ningún usuario al archivo.
													</div>
													<br><br>
													<div id="busqueda" style="height:500px; overflow:auto;">
														'.get_usuarios_list($perfil, false, 10).'
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
												</div>
											</div>
										</div>
									</div>

									<!-- Modal 2-->
									<div id="unico" class="modal fade" role="dialog">
										<div class="modal-dialog">
											<!-- Modal content-->
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Múltiples Usuarios</h4>
												</div>
												<div class="modal-body">
													'.get_usuarios_list($perfil, true, 10).'
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
												</div>
											</div>
										</div>
									</div>
                    			</div>
							</div>
							<div class="row">
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-3 text-right">
										<h4>Nombre Archivo:</h4>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-9">
										<div style="width:200px;"> <input type="text" name="nombre" class="form-control" /> </div> <b>(No es obligatorio - Use únicamente Letras, números y guiones "- ó _")</b>
										</div>
									</div>
	                        		<div class="col-md-3 col-sm-3 col-xs-3 text-right">
	                            		<h4>Tipo:</h4>
	                        		</div>
	                        		<div class="col-md-9 col-sm-9 col-xs-9">
	                          			'.get_tipos_rol($perfil).'
	                        		</div>
								</div>
  								<div class="row" style="margin-bottom:10px;">
                        			<div class="col-md-2 col-sm-2 col-xs-2 text-right">
                            			<h4>Mes:</h4>
									</div>
	                        		<div class="col-md-4 col-sm-4 col-xs-4">
	                          			'.get_mes().'
	                        		</div>
			                        <div class="col-md-2 col-sm-2 col-xs-2 text-right">
			                            <h4>Año:</h4>
			                        </div>
			                        <div class="col-md-4 col-sm-4 col-xs-4">
							'.get_ano().'
			                        </div>
  						</div>
  						
  						
  						
  						
  						
  						
  								
  					        <div class="row" style="margin-bottom:10px;">
  					          <script src="js/multiples.js"></script>	
                        			  <div class="col-md-4  col-sm-4 col-xs-4 text-right">
			                            <h4>Archivo PDF</h4><br>
                        			  </div>
                        			  <div id="adjuntos" class="col-md-8 col-sm-8 col-xs-8">
                          			    <input type="file" name="archivo[]" accept="application/pdf" multiple required style="padding-top:5px; padding-bottom=5px;">
						  </div>
  						</div>
  						
  						
  								<div class="row" style="margin-bottom:10px;">
                        			<div class="col-md-4 text-right">
                        		</div>
                        		<div class="col-md-8 text-right">
                          			<input type="submit" class="btn btn-azul" >
                        		</div>
  							</div>
                      	</form>
                    </div>
					<div class="col-md-3"></div>
                      	<div class="row" >
                        	<div class="text-center col-md-12" style="margin-top:100px;">
                        	<a class="btn btn-danger" onclick="history.back()">VOLVER</a>
                        </div>
                    </div>
              	</div>';
    }
			
	return $cadena;
}

function get_usuario($id, $opcion){


    require('conectar.php');

    $sql = "SELECT * FROM usuarios where id = ".$id."";
    $datos = mysqli_query($c,$sql);



   while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

     switch ($opcion) {
       case 1:
         $cadena = $ren['nombre'];
         break;

       case 2:
          $cadena = $ren['cedula'];
         break;

        case 3:
            $cadena = $ren['rol'];
           break;
     }


   }



    return $cadena;

}

function get_tipos_rol($rol){

$or = "";

  if($rol == 4){

      $rol = 1; 
      $or = " or rol = 3";

  }

  if($rol == 5){

      $rol = 2; 
      $or = " or rol = 3";

  }

        require('conectar.php');

        $sql = "SELECT * FROM tipo where rol = ".$rol." $or";
        $datos = mysqli_query($c,$sql);

        $cadena = "<select name='tipo' required class='form-control'><option value> - Seleccione - </option>";

       while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){


         $cadena = $cadena ."<option value='".$ren['id']."'>".ucfirst($ren['nombre']) ."</option>";
        



       }

       $cadena = $cadena ."</select>";


        return $cadena;



}


function get_mes(){

  $cadena = "<select name='mes' required class='form-control'>
  <option value> - Seleccione - </option>
  <option value='1'>Enero</option>
  <option value='2'>Febrero</option>
  <option value='3'>Marzo</option>
  <option value='4'>Abril</option>
  <option value='5'>Mayo</option>
  <option value='6'>Junio</option>
  <option value='7'>Julio</option>
  <option value='8'>Agosto</option>
  <option value='9'>Septiembre</option>
  <option value='10'>Octubre</option>
  <option value='11'>Noviembre</option>
  <option value='12'>Diciembre</option>
  </select>";


     return $cadena;



}


function get_ano(){


        $cadena = "<select name='ano' required class='form-control'>
        <option value> - Seleccione - </option>";

       for ($i=2015; $i < 2100; $i++) {
         $cadena = $cadena ."<option value='".$i."'>".$i."</option>";
       }






       $cadena = $cadena ."</select>";


        return $cadena;



}

function get_usuarios($rol){

      require('conectar.php');

      $sql = "SELECT * FROM usuarios where rol = ".$rol."";
      $datos = mysqli_query($c,$sql);

      $cadena = "<select name='usuario' required class='form-control'>
                  <option value> - Seleccione - </option>";

     while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

       $cadena = $cadena ."<option value='".$ren['id']."'>".ucfirst($ren['nombre']) ." -  ".$ren['cedula'] ."</option>";


     }

     $cadena = $cadena ."</select>";


      return $cadena;



}



function get_usuarios_list($rol, $multiple, $cantidad){

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

      $sql = "SELECT * FROM usuarios where rol = ".$rol." $or";
      $datos = mysqli_query($c,$sql);

      $cadena = "<table class='table' id='tabla_dinamica'>
      <tr><td>Cédula o NIT</td><td>Nombre</td><td></td></tr>";

     while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

       $cadena = $cadena ."<tr>
       <td>".$ren['cedula'] ."</td>
       <td>".ucfirst($ren['nombre']) ."</td>
       <td><button id='btn_".$ren['id']."' type='button' class='btn btn-success' onclick='seleccionar(".$ren['id'].")'>
              <i class='glyphicon glyphicon-plus'></i>
           </button></td> 
       </tr>";


     }

     $cadena = $cadena ."</table>";


      return $cadena;



}



function listar($tipo, $usuario){

  require('conectar.php');
  


  if($tipo){

$tipo_str = "id_tipo = ".$tipo." and "; 

  }

  $sql = "SELECT * FROM documentos where ".$tipo_str." id_usuario = ".$usuario." order by ano,mes DESC";
  $datos = mysqli_query($c,$sql);

  if(mysqli_num_rows($datos) == 0){

      $cadena = '<p>No se han encontrado archivos.</p>
    <button class="btn btn-info" onclick="window.history.back()">Volver</button>';

  }else{


    

      while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

         $cadena = $cadena . '<div class="col-md-3"><ul class="media-list">';
         

         $nombre_tipo = tipo($ren['id_tipo']);


         $parteUno = explode("/",$ren['link']); 

         $nombre_archivo = array_pop($parteUno);

        
         $partes_nombre = explode("_", $nombre_archivo);
         
         if(strcmp($partes_nombre[0], $ren['ano']) == 0){

              $download_name = $nombre_tipo.'_'.$ren['ano'].'-'.$ren['mes']; 

         }else{

          $download_name = $nombre_archivo;

         }


         $cadena = $cadena .'<li class="media">
         


           <img class="media-object" src="img/pdf.png" height="64" width="64">
           <div class="media-body">
             <h4 class="media-heading">'.ucfirst($nombre_tipo).'</h4>
             <h5 class="media-heading">'.$nombre_archivo.'</h5>
             <p>Mes: '.get_mes_nombre($ren['mes']).'  <br> Año: '.$ren['ano'].' <br>
             
             <a href="'.$ren['link'].'" download="'.$download_name.'.pdf"><i class="glyphicon glyphicon-save"></i></a>
              | 
              <a href="'.$ren['link'].'" target="_blank" ><i class="glyphicon glyphicon-eye-open"></i></a>
              | 
              <a class="btn" onclick="eliminar_documento('.$ren['id'].','.$usuario.')" ><i class="glyphicon glyphicon-trash"></i></a>
             </p>
           </div>
           
         </li>';
  $cadena = $cadena ."</ul></div>";
  
  $script = "
  
	<script>
	   function eliminar_documento(id,id_usuario){
		if(confirm('¿Está seguro que desea eliminar este archivo?')){
		location.href = 'delete_user_archivo.php?id_archivo='+id+'+&id_usuario='+id_usuario;
	   }}
	
       </script>
  ";

        }

    

  }

  


  return $cadena.$script;



}



function delete_user_archivo($id_archivo,$id_usuario){


  require('conectar.php');

//echo "aqui hay problemas";  
//exit();
  $sql = "DELETE FROM documentos where id_usuario = ".$id_usuario." and id =".$id_archivo;

  $datos = mysqli_query($c,$sql);
  return true;
 
}


function disponible($tipo, $usuario) {

  require('conectar.php');

   if($tipo){

$tipo_str = "id_tipo = ".$tipo." and "; 



  }

  $sql = "SELECT * FROM documentos where ".$tipo_str." id_usuario = ".$usuario." order by ano,mes DESC";
  $datos = mysqli_query($c,$sql);

  $cadena = '<form>';
  $keyano = 0;
  $keymes = 0;
  $keytipo = 0; 

 while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

        if(!$tipo){

            $arrayTipos[$keytipo] = $ren['id_tipo']; 
            $keytipo++;

        }

   

   $arrayAno[$keyano] = $ren['ano'];

   $arrayMes[$keymes] = $ren['mes'];

   $keyano++;
   $keymes++;
 }


 if(!$tipo){

 $arrayTipos = array_unique($arrayTipos);

      $cadena = $cadena . "<h4 class='text-info'> Seleccione el tipo: </h4>";

      $cadena = $cadena . "<select id='tipo' class='form-control' style='max-width:70%;'><option value>Seleccione</option>";
      foreach ($arrayTipos as $key3 => $value3) {
         $cadena = $cadena . "<option value='".$value3."'>".tipo($value3)."</option>";
       }
       $cadena = $cadena . "</select><br>";


 }


 $arrayAno = array_unique($arrayAno);

 $arrayMes = array_unique($arrayMes);

 $cadena = $cadena . "<h4 class='text-info'> Seleccione el año: </h4>";

      $cadena = $cadena . "<select id='ano' class='form-control' style='max-width:70%;'><option value>Seleccione</option>";
      foreach ($arrayAno as $key1 => $value1) {
         $cadena = $cadena . "<option value='".$value1."'>".$value1."</option>";
       }
       $cadena = $cadena . "</select><br>";


 $cadena = $cadena . "<h4 class='text-info'> Seleccione el mes: </h4>";

       $cadena = $cadena . "<select id='mes' class='form-control' style='max-width:70%;'><option value>Seleccione</option>";
       foreach ($arrayMes as $key2 => $value2) {
          $cadena = $cadena . "<option value='".$value2."'>".get_mes_nombre($value2)."</option>";
        }
        $cadena = $cadena . "</select>";


 $cadena = $cadena ."<br><br><input class='btn btn-azul' onclick='buscar()' value='Buscar'></form>";


  return $cadena;




}


function get_mes_nombre($numero){


switch ($numero){

  case 1: $cadena = "Enero";
  break;
  case 2: $cadena = "Febrero";
  break;
  case 3: $cadena = "Marzo";
  break;
  case 4: $cadena = "Abril";
  break;
  case 5: $cadena = "Mayo";
  break;
  case 6: $cadena = "Junio";
  break;
  case 7: $cadena = "Julio";
  break;
  case 8: $cadena = "Agosto";
  break;
  case 9: $cadena = "Septiembre";
  break;
  case 10: $cadena = "Octubre";
  break;
  case 11: $cadena = "Noviembre";
  break;
  case 12: $cadena = "Diciembre";
  break;


}

     return $cadena;



}




function delete_user($id){

 require('conectar.php');

  $sql = "SELECT * FROM documentos where id_usuario = ".$id;
  $datos = mysqli_query($c,$sql);

   	$arrayElemetos =  array();

   while($ren = mysqli_fetch_array($datos,MYSQLI_ASSOC)){

   	$arrayElemetos[] = $ren['link'];

   }

		if(count($arrayElemetos)>0){

			$sql2 = "DELETE FROM usuarios where id = ".$id;
  			if(mysqli_query($c,$sql2)){

  					$sql3 = "DELETE FROM documentos where id_usuario = ".$id;
  					mysqli_query($c,$sql3);

  					foreach ($arrayElemetos as $value) {
  						
  						if(chmod($value, 0777)){

  								unlink($value);
  						}
  						
  					}

  					return true;

  		
  			}
		

		}else{


      $sql2 = "DELETE FROM usuarios where id = ".$id;
        if(mysqli_query($c,$sql2)){


            return true;

      
        }





    }

			

			return false;

	



}






function get_multiples_archivos($perfil, $id_usuario){



  $rol = get_usuario($id_usuario, 3);


    $cadena = '<div class="row" style="min-height:50%;">

                    <div class="col-md-4">


                    </div>

                    <div class="col-md-4">

                    <form method="post" action="subir_archivo.php" enctype="multipart/form-data">
                    <input type="hidden" value="'.$id_usuario.'" name="usuario">
                    <input type="hidden" value="'.$rol.'" name="rol">
<div class="row">
                      <div class="col-md-3 col-sm-3 col-xs-3 text-right">

                          <h4>Tipo:</h4>

                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-9">

                        '.get_tipos_rol($rol).'

                      </div>
</div>
<div class="row" style="margin-bottom:10px;">
                      <div class="col-md-2 col-sm-2 col-xs-2 text-right">

                          <h4>Mes:</h4>

                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">

                        '.get_mes().'

                      </div>

                      <div class="col-md-2 col-sm-2 col-xs-2 text-right">

                          <h4>Año:</h4>

                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-4">

                        '.get_ano().'

                      </div>
</div>

<div class="row" style="margin-bottom:10px;">
                      <div class="col-md-4  col-sm-4 col-xs-4 text-right">

                          <h4>Archivo PDF</h4>

                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-8">

                        <input type="file" name="archivo" accept="application/pdf" required>

                      </div>


</div>

<div class="row" style="margin-bottom:10px;">
                      <div class="col-md-4 text-right">



                      </div>
                      <div class="col-md-8 text-right">

                        <input type="submit" class="btn btn-azul" >
                      </div>


</div>
                    </form>

                    </div>

                    <div class="col-md-4">


                    </div>
                    <div class="row" >
                      <div class="text-center col-md-12" style="margin-top:100px;">
                        <a class="btn btn-danger" href="ver_perfiles.php?rol='.$rol.'">VOLVER</a>
                      </div>
                    </div>
            </div>
            ';


return $cadena; 


}

?>