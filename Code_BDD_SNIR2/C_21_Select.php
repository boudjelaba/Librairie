<?php
/*
Code PHP pour sélectionner des données dans la table de base de données MySQL à l'aide de l'opérateur AND

AND est utilisé pour obtenir les valeurs lorsque les deux conditions sont vraies. Il faudra deux conditions et vérifier les conditions, si les deux sont vraies, les lignes seront renvoyées, sinon aucun résultat.

Dans ce code, on va sélectionner toutes les colonnes où le :
  - id est supérieur à 2 ET numero inférieur à 2000,
  - nom est Charles ET id est 2.
*/

$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Sélectionnes toutes les colonnes dont l'id est supérieur à 2 et numero inférieur à 2000
$query = "SELECT * from Tableau1 where id>2 AND numero<2000";

$final = mysqli_query($connection, $query);

if (mysqli_num_rows($final) > 0) {
  while($i = mysqli_fetch_assoc($final)) {
      //get all columns
    echo "ID : " . $i["id"]. "  <----> Nom : " . $i["nom"]."  <----> Numéro : " . $i["numero"]. "<br>";
  }
} else {
  echo "Aucun résultat";
}

echo "<br>";
echo "<br>";

// Sélectionner toutes les colonnes dont le nom est Charles et l'id est 2
$query1 = "SELECT * from Tableau1 where nom='Charles' AND id=2";

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