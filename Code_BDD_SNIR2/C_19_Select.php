<?php
/*
Code PHP pour sélectionner des données dans la table de base de données MySQL à l'aide de l'opérateur BETWEEN

BETWEEN est utilisé pour renvoyer les lignes présentes entre les deux valeurs données. Il prendra la première valeur suivie de l'opérateur AND et de la deuxième valeur.

L'opérateur BETWEEN renverra toutes les valeurs présentes dans la colonne qui sont présentes dans la plage donnée.

Dans ce code, on va sélectionner les valeurs :
  - de la colonne id entre 1 et 4,
  - de la colonne de numero entre 20 et 3000.
*/
$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Sélectionne toutes les colonnes dont l'id est compris entre 1 et 4
$query = "SELECT * from Tableau1 where id  BETWEEN 1 AND 4";

$final = mysqli_query($connection, $query);

if (mysqli_num_rows($final) > 0) {
  while($i = mysqli_fetch_assoc($final)) {
    echo "ID : " . $i["id"]. "  <----> Nom : " . $i["nom"]."  <----> Numéro : " . $i["numero"]. "<br>";
  }
} else {
  echo "Aucun résultat";
}

echo "<br>";
echo "<br>";

// Sélectionner toutes les colonnes dont le numero est compris entre 20 et 3000
$query1 = "SELECT * from Tableau1 where numero  BETWEEN 20 AND 3000";

$final1 = mysqli_query($connection, $query1);

if (mysqli_num_rows($final1) > 0) {
  while($j = mysqli_fetch_assoc($final1)) {
    echo "ID : " . $j["id"]. "  <----> Nom : " . $j["nom"]."  <----> Numéro : " . $j["numero"]. "<br>";
  }
} else {
  echo "Aucun résultat";
}

mysqli_close($connection);
?>