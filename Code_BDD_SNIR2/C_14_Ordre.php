<?php
/*
Ce code PHP sélectionnera les colonnes "id" et "nom" de la table "Tableau1" et affichera le résultat dans l'ordre croissant par colonne "nom".
*/

$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Requête sql pour sélectionner des colonnes particulières
// Sélectionner les colonnes id et nom
$query = "SELECT id,nom from Tableau1 ORDER BY nom";

$final = mysqli_query($connection, $query);

if (mysqli_num_rows($final) > 0) {
  while($i = mysqli_fetch_assoc($final)) {
      // Obtenir les colonnes id et nom
    echo "ID : " . $i["id"]. "  <-==-> Nom : " . $i["nom"]. "<br>";
  }
} else {
  echo "Aucun résultat";
}

mysqli_close($connection);
?>