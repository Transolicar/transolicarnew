<?

header('Content-Type: text/html; charset=utf-8');
session_start();


require('conectar.php');

$sql = "SELECT * FROM usuarios WHERE correo = '".$_POST["correo"]."' AND cedula = '".$_POST["cedula"]."'";

$datos = mysql_query($sql,$c);

if (!mysql_num_rows($datos)==0){

    $_SESSION["transolicar"] = $_POST["correo"];
   echo "<script>location.href='inicio.php'</script>";
}else {

   echo "<script>alert('Correo, cédula o NIT incorrectos');


   location.href='index.php'</script>";
}



?>
