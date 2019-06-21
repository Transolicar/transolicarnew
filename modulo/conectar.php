<?php
$u = "transolicar_user";
$p = "*!shtKQZgHbn_}7v";
$s = "localhost";

$c = new mysqli($s,$u,$p,'transolicar');
if ($c->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $c->connect_errno . ") " . $c->connect_error;
}

?>
