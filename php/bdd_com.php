<?php

$dsn = "mysql:host=localhost;dbname=php_project;charset=utf8mb4";
$username = "root";
$password = "admin";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $query = "SELECT * FROM taches";


    $stmt = $pdo->prepare($query);


    $stmt->execute();


    $com = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($com as $com) {
        echo "id : " . $com['id'] . "<br>";
        echo "tache : " . $com['tache'] . "<br>";
        echo "etat : " . $com['etat'] . "<br>";
        echo "<hr>";
    
        }
} catch (PDOException $err) {
    die("Erreur de connexion : " . $err->getMessage());
}
?>