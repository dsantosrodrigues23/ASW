<?php
$dbhost = "appserver-01.alunos.di.fc.ul.pt";
$dbuser = "asw02";
$dbpass = "DPMN22GRUPO";
$dbname = "asw02";
// Cria a ligação à BD
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_set_charset($conn, "utf8");
// Verifica a ligação à BD
if (mysqli_connect_error()) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>