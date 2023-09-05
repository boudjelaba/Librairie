<?php
/*  
Code PHP pour sélectionner des données dans la table de base de données MySQL à l'aide de l'opérateur OR

OR est utilisé pour obtenir les valeurs lorsque l'une des conditions est vraie. Il faudra deux conditions et vérifier les conditions, si l'une est vraie, les lignes seront renvoyées, sinon il n'y aura aucun résultat.

Dans ce code, on va sélectionner toutes les colonnes où le :
  - id est supérieur à 2 OU numero inférieur à 2000,
  - nom est Charles OU id est 1.
*/

$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Sélectionner toutes les colonnes dont id est supérieur à 2 ou numero inférieur à 2000
$query = "SELECT * from Tableau1 where id>2 OR numero<2000";

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

// Sélectionner toutes les colonnes dont le nom est Charles ou l'id est 1
$query1 = "SELECT * from Tableau1 where nom='Charles' OR id=1";

$final1 = mysqli_query($connection, $query1);

if (mysqli_num_rows($final1) > 0) {
  while($j = mysqli_fetch_assoc($final1)) {
    echo "ID: " . $j["id"]. "  <----> Nom : " . $j["nom"]."  <----> Numéro : " . $j["numero"]. "<br>";
  }
} else {
  echo "Aucun résultat";
}

mysqli_close($connection);
?>