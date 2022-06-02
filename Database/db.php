<?php
try {
 $host = 'localhost'; // Adresse de la base de données
 $name = 'phptwitch'; // Nom de la base de données à utiliser
 $user = 'root'; // Utilisateur de la base de données
 $pass = ''; // Mot de passe de la base de données
 $dbh = new PDO("mysql:host=$host;dbname=$name", $user, $pass); // Initialisation de la connexion à la base
} catch (PDOException $e) { // En cas d'erreur de récupération
 print "Erreur !: " . $e->getMessage() . "<br!/"; // Définition du message d'erreur
 die(); // Arrêt du script
}
?>