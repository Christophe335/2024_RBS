<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compte Client</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_res.css">
</head>
<body>
<?php include 'header.php' ?>
    <header>
        <h1>Mon Compte</h1>
    </header>
    <main>
        <section>
            <h2>Mes Informations</h2>
            <form action="update_compte.php" method="POST">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" value="Jean Dupont" required>
                
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="jean.dupont@example.com" required>
                
                <button type="submit">Mettre à jour</button>
            </form>
        </section>

        <section>
            <h2>Mes Commandes</h2>
            <table>
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Date</th>
                        <th>Montant</th>
                        <th>Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>CMD00123</td>
                        <td>2024-01-15</td>
                        <td>150.00 €</td>
                        <td>Livré</td>
                    </tr>
                    <tr>
                        <td>CMD00124</td>
                        <td>2024-02-10</td>
                        <td>90.00 €</td>
                        <td>En cours</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
