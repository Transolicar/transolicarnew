<?

$u = "transolicar_user";
$p = "Transolicar2016!";
$s = "localhost";

 $c = mysql_connect($s,$u,$p);

 mysql_select_db("transolicar", $c) or die (mysql_error($c));  





?>
