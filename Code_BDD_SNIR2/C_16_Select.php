<?php
/*
Filtrage des données de la table MySQL avec l'instruction WHERE

WHERE est utilisée pour extraire uniquement les enregistrements qui correspondent à une condition spécifique. WHERE vérifiera la condition en prenant un opérateur suivi d'une valeur.

Dans ce code, on va sélectionner toutes les colonnes de la table "Tableau1" dont la valeur id est supérieure à 3 et afficher le résultat.

Ainsi, l'opérateur sera supérieur à (">") et la valeur est 3 en spécifiant le column_name comme id.
*/

$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Requête sql pour sélectionner des colonnes particulières
// Sélectionner toutes les colonnes dont l'id est supérieur à 3
$query = "SELECT * from Tableau1 where id>3";

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