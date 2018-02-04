<?php
$username="root";
$password="";
$database="userlocation";

// Acquisisce i dati dai parametri dell'URL
$name = $_GET['name'];
$address = $_GET['address'];
$type = $_GET['type'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];
$ascensore = $_GET['ascensore'];
$rampa= $_GET['rampa'];
$serviziigienici = $_GET['serviziigienici'];

// Stabilisce una connessione con il database
$connection=mysqli_connect ("localhost", $username, $password, $database);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Inserisce nuove righe nel database con i dati acquisiti
$query = sprintf("INSERT INTO locationsend " .
         " (id, name, address, type, lat, lng, ascensore, rampa, serviziigienici ) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s');",
         mysqli_real_escape_string($connection, $name),
         mysqli_real_escape_string($connection, $address),
		 mysqli_real_escape_string($connection, $type),
         mysqli_real_escape_string($connection, $lat),
         mysqli_real_escape_string($connection, $lng),
		 mysqli_real_escape_string($connection, $ascensore),
		 mysqli_real_escape_string($connection, $rampa),
		 mysqli_real_escape_string($connection, $serviziigienici));
         

$result = mysqli_query($connection, $query);

if (!$result) {
  die('Invalid query: ' . mysql_error());
}

?>
