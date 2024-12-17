<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles en Promotion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_res.css">
</head>
<body>

<?php
include 'db_connect.php';

$query = $pdo->query("SELECT * FROM articles WHERE prix_promo IS NOT NULL");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>


    
            
    
    <main>
        <div class="espace"></div>
        <h1>Articles en Promotion</h1>
        <div class="articles-container">
            <?php foreach ($articles as $article): ?>
                <div class="article-card-line grille">
                    <div class="grilleimage">
                        <img src="<?= $article['lien_photo'] ?>" alt="<?= $article['nom_article'] ?>">
                    </div>
                    <div class="grillenom">
                        <h2><?= $article['nom_article'] ?></h2>
                    </div>
                    <div class="grilleprix">
                        <p>Prix : <s><?= $article['prix_article'] ?>€</s> <strong style="color:red;"><?= $article['prix_promo'] ?>€</strong></p>
                    </div>
                    <div class="grilledescription">
                        <p><?= $article['description_article'] ?></p>
                    </div>
                    <div class="row groupebouton grillebouton">    
                        <button class="bouton1" onclick="openModal('caracteristique', <?= $article['id'] ?>)">Voir caractéristiques</button>
                        <button class="bouton2" onclick="openModal('video', <?= $article['id'] ?>)">Voir vidéo</button>
                        <button class="bouton3" onclick="ajouterAuPanier(<?= $article['id'] ?>)">Ajouter au panier</button>
                    </div>
                </div>   
            <?php endforeach; ?>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>
