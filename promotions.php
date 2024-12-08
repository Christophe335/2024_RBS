<?php
include 'db_connect.php';

$query = $pdo->query("SELECT * FROM articles WHERE prix_promo IS NOT NULL");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles en Promotion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
            <?php include 'header.php' ?>
    
    <main>
        <h1>Articles en Promotion</h1>
        <div class="articles-container">
            <?php foreach ($articles as $article): ?>
                <div class="article-card">
                    <img src="<?= $article['lien_photo'] ?>" alt="<?= $article['nom_article'] ?>">
                    <h2><?= $article['nom_article'] ?></h2>
                    <p>Prix : <s><?= $article['prix_article'] ?>€</s> <strong><?= $article['prix_promo'] ?>€</strong></p>
                    <p><?= $article['description_article'] ?></p>
                    <button onclick="openModal('caracteristique', <?= $article['id'] ?>)">Voir caractéristiques</button>
                    <button onclick="openModal('video', <?= $article['id'] ?>)">Voir vidéo</button>
                    <button onclick="ajouterAuPanier(<?= $article['id'] ?>)">Ajouter au panier</button>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>
