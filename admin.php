<?php
session_start();
include 'db_connect.php';

// Vérification de l'accès
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    if (isset($_POST['password']) && $_POST['password'] === '1234') {
        $_SESSION['admin_logged_in'] = true;
    } else {
        echo '<form method="POST"><input type="password" name="password" placeholder="Mot de passe" required><button type="submit">Accéder</button></form>';
        exit;
    }
}

// Ajouter un article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_article'])) {
    $stmt = $pdo->prepare("INSERT INTO articles (reference_article, nom_article, prix_article, categorie_article, prix_promo, description_article, caracteristique_article, lien_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['reference_article'],
        $_POST['nom_article'],
        $_POST['prix_article'],
        $_POST['categorie_article'],
        $_POST['prix_promo'],
        $_POST['description_article'],
        $_POST['caracteristique_article'],
        $_POST['lien_photo']
    ]);
}

// Supprimer un article
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

// Récupérer tous les articles
$query = $pdo->query("SELECT * FROM articles");
$articles = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php' ?>
    <header>
        <h1>Administration des Articles</h1>
    </header>
    <main>
        <section>
            <h2>Ajouter un article</h2>
            <form method="POST">
                <input type="text" name="reference_article" placeholder="Référence" required>
                <input type="text" name="nom_article" placeholder="Nom" required><br>
                <input type="number" step="0.01" name="prix_article" placeholder="Prix" required>
                <br>
                <input type="text" name="categorie_article" placeholder="Catégorie" required>
                <input type="number" step="0.01" name="prix_promo" placeholder="Prix Promo"><br>
                <textarea name="description_article" placeholder="Description"></textarea>
                <textarea name="caracteristique_article" placeholder="Caractéristiques"></textarea>
                <br>
                <input type="text" name="lien_photo" placeholder="Lien Photo">
                <button type="submit" name="add_article">Ajouter</button>
            </form>
        </section>

        <section>
            <h2>Liste des articles</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Référence</th>
                        <th>Catégorie</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Promo</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= $article['id'] ?></td>
                            <td><?= $article['reference_article'] ?></td>
                            <td><?= $article['categorie_article'] ?></td>
                            <td><?= $article['nom_article'] ?></td>
                            <td><?= $article['prix_article'] ?> €</td>
                            <td><?= $article['prix_promo'] ?> €</td>
                            <td>
                                <a href="?action=delete&id=<?= $article['id'] ?>">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
