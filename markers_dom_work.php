<?php

header("Content-type: text/xml");

// Dati sql
$username = "root" ; 
$password = "" ; 
$database = "mapmarkerswork" ;
// Crea un file xml e i suoi nodi

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Stabilisce una connessione con il database mysql

$connection=mysqli_connect ('localhost', $username, $password, $database);
if (!$connection) {  die('Not connected : ' . mysql_error());}

// Selezione tutte le righe del database

$query = "SELECT * FROM markers WHERE 1";
$result = mysqli_query($connection, $query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


// Aggiunge un nodo al file xml per ogni attributo del database

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['id']);
  $newnode->setAttribute("name",$row['name']);
  $newnode->setAttribute("address", $row['address']);
  $newnode->setAttribute("lat", $row['lat']);
  $newnode->setAttribute("lng", $row['lng']);
  $newnode->setAttribute("type", $row['type']);
  $newnode->setAttribute("location", $row['location']);
  $newnode->setAttribute("cap", $row['cap']);
  $newnode->setAttribute("gestore", $row['gestore']);
  $newnode->setAttribute("tel", $row['tel']);
  $newnode->setAttribute("telfax", $row['telfax']);
  $newnode->setAttribute("cell", $row['cell']);
  $newnode->setAttribute("webadress", $row['webadress']);
  $newnode->setAttribute("email", $row['email']);
  $newnode->setAttribute("ascensore", $row['ascensore']);
  $newnode->setAttribute("rampa", $row['rampa']);
  $newnode->setAttribute("serviziigienici", $row['serviziigienici']);
}

echo $dom->saveXML();
?>
