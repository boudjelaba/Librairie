<?php
/*
Dans ce code, on va sélectionner toutes les colonnes de la table "Tableau1" avec le nom "Lycée" et afficher le résultat.

L'opérateur sera égal à ("=") et la valeur est "Lycée" en spécifiant le nom_colonne comme nom.
*/

$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Requête sql pour sélectionner des colonnes particulières
// Sélectionner toutes les colonnes dont le nom est égal à Lycée
$query = "SELECT * from Tableau1 where nom ='Lycée'";

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