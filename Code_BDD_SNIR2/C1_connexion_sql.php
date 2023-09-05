<?php
$server_name = "localhost";
$user_name = "root";
$password = "";

// Création de la connexion en spécifiant les détails de la connexion
$connection = mysqli_connect($server_name, $user_name, $password);

// Vérification de la connexion
if (!$connection) {
  die("Echec ". mysqli_connect_error());
}
echo "Connexion établie avec succès";
/*
Après avoir testé ce code :
  - Dans XAMPP,créer une nouvelle base données nommée Mes_Donnees.
  - Ne pas créer de table pour le moment !
*/
?>