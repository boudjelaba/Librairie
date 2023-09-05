<?php
/*
Code PHP pour sélectionner des données dans la table de base de données MySQL à l'aide de l'opérateur IN

IN est utilisé pour obtenir les valeurs présentes dans la liste de valeurs donnée. Il faudra une liste de valeurs séparées par des virgules entre parenthèses (). Il renverra donc toutes les valeurs présentes dans la liste-().

Dans cet exemple, on obtiendra les valeurs :
  - de la colonne id où les valeurs peuvent être dans (1,3,6),
  - à partir de la colonne de nom où les valeurs peuvent être dans ("Carnus","Informatique").
*/
$server_name = "localhost";
$user_name = "root";
$password = "";

$database_name = "mesdonnees";

$connection = mysqli_connect($server_name, $user_name, $password, $database_name);

// Sélectionne toutes les colonnes dont l'id est dans 1,3,6
$query = "SELECT * from Tableau1 where id  IN (1,3,6)";

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

// Sélectionner toutes les colonnes dont le nom est Carnus,Informatique
$query1 = "SELECT * from Tableau1 where nom  IN ('Carnus','Informatique')";

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