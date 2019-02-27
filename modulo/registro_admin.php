
<?
session_start();



if(!isset($_SESSION['transolicar'])){

echo "<script>location.href='index.php'</script>";


}else{

require('conectar.php');

$sql = "SELECT * FROM usuarios where correo = '".$_SESSION['transolicar']."'";

$datos = mysql_query($sql,$c);

      while($ren = mysql_fetch_array($datos)){

        if($ren['rol'] != 0){

          echo "<script>location.href='index.php'</script>";

        }else{

          include ('form_reg.php'); 

        }

      }
}
?>
