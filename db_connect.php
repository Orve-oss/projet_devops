<?php
// db_connect.php
try {
    $host = "dpg-cvv928q4d50c73aq0ks0-a.oregon-postgres.render.com";      // Remplace par ton hôte si différent
    $dbname = "my_database";  // Nom de la base de données
    $username = "demo_user";       // Remplace par ton utilisateur MySQL
    $password = "887qACGfNA9HsWihkoIOgb7tKxbz1yZG";          // Remplace par ton mot de passe MySQL
    $port = 5432;

    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET client_encoding TO 'UTF8'");
}
     catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>