<?php
$host = 'localhost';
$db = 'articles';
$user = 'root';
$pass = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
$query = $pdo->query("SELECT * FROM articles WHERE prix_promo IS NOT NULL");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>