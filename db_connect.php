<?php
// db_connect.php
try {
    $host = "mysql:3306";      // Remplace par ton hôte si différent
    $dbname = "my_database";  // Nom de la base de données
    $username = "user";       // Remplace par ton utilisateur MySQL
    $password = "Tchingjo12";          // Remplace par ton mot de passe MySQL

    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>