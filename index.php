<?php
require 'config/db.php';

$stmt = $pdo->query("SELECT * FROM livres");
$livres = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gestion de livres</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Mes livres 📚</h1>
    <a href="add.php">Ajouter un livre</a>
    <table border="1">
        <tr>
            <th>Titre</th>
            <th>Catégorie</th>
            <th>Note</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($livres as $livre): ?>
        <tr>
            <td><?= htmlspecialchars($livre['titre']) ?></td>
            <td><?= htmlspecialchars($livre['categorie']) ?></td>
            <td><?= $livre['note'] ?> ⭐</td>
            <td>
                <a href="edit.php?id=<?= $livre['id'] ?>">Modifier</a> |
                <a href="delete.php?id=<?= $livre['id'] ?>" onclick="return confirm('Supprimer ce livre ?')">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
