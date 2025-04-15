


<?php
// db_connect.php
try {
    $host = "dpg-cvv928q4d50c73aq0ks0-a.oregon-postgres.render.com";      // Remplace par ton hôte si différent
    $dbname = "demodb_mt3y";  // Nom de la base de données
    $username = "demo_user";       // Remplace par ton utilisateur MySQL
    $password = "887qACGfNA9HsWihkoIOgb7tKxbz1yZG";          // Remplace par ton mot de passe MySQL

    $pdo = new PDO("postgresql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>