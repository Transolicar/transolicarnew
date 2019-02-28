<?php
$u = "transolicar_user";
$p = "*!shtKQZgHbn_}7v";
$s = "localhost";

$c = new mysqli($s,$u,$p,'transolicar');
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>