<?php
// db_connect.php
try {
    $host = "localhost";      // Remplace par ton hôte si différent
    $dbname = "devops";  // Nom de la base de données
    $username = "root";       // Remplace par ton utilisateur MySQL
    $password = "";          // Remplace par ton mot de passe MySQL

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>