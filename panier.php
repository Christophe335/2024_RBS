<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_res.css">
    
    <title>panier</title>
</head> 
<body>
    <header>
    <?php include 'header.php' ?>
    </header>

<div class="espace"></div>
<?php
session_start();
include 'db_connect.php';

// Initialisation du panier (exemple)
if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

// Suppression d'un article du panier
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['id'])) {
    $id = $_GET['id'];
    unset($_SESSION['panier'][$id]);
}

// Récupérer les articles du panier
$panier_articles = [];
if (!empty($_SESSION['panier'])) {
    $ids = implode(',', array_keys($_SESSION['panier']));
    $query = $pdo->query("SELECT * FROM articles WHERE id IN ($ids)");
    $panier_articles = $query->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="style.css">
    <script src="/script.js" defer></script>
</head>
<body>
<?php include 'header.php' ?>
    <header>
        <h1>Votre Panier</h1>
    </header>
    <main>
        <?php if (!empty($panier_articles)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($panier_articles as $article): ?>
                        <tr>
                            <td><?= $article['nom_article'] ?></td>
                            <td><?= $article['prix_promo'] ?? $article['prix_article'] ?> €</td>
                            <td><?= $_SESSION['panier'][$article['id']] ?></td>
                            <td>
                                <a href="?action=remove&id=<?= $article['id'] ?>">Retirer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Votre panier est vide.</p>
        <?php endif; ?>
    </main>
</body>
</html>
