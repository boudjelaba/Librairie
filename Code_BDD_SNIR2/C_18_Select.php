<?php
/*
Dans ce code, on va sélectionner toutes les colonnes de la table "Tableau1" avec un numero 200 et afficher le résultat.

L'opérateur sera égal à ("=") et la valeur est 200 en spécifiant le column_name comme numero.
*/
$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Requête sql pour sélectionner des colonnes particulières
// Sélectionner toutes les colonnes dont le numero (pas id) est 200
$query = "SELECT * from Tableau1 where numero =200";

$final = mysqli_query($connection, $query);

if (mysqli_num_rows($final) > 0) {
  while($i = mysqli_fetch_assoc($final)) {
    echo "ID : " . $i["id"]. "  <----> Nom : " . $i["nom"]."  <----> Numéro : " . $i["numero"]. "<br>";
  }
} else {
  echo "Aucun résultat";
}

mysqli_close($connection);
?>