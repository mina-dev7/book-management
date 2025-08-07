<?php
require 'config/db.php';

$stmt = $pdo->query("SELECT * FROM books");
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Book Management</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>My Books 📚</h1>
    <a href="add.php">Add a Book</a>
    <table border="1">
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Rating</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($books as $book): ?>
        <tr>
            <td><?= htmlspecialchars($book['title']) ?></td>
            <td><?= htmlspecialchars($book['category']) ?></td>
            <td><?= $book['rating'] ?> ⭐</td>
            <td>
                <a href="edit.php?id=<?= $book['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $book['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>