<?php
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $category = $_POST['category'] ?? '';
    $rating = $_POST['rating'] ?? 0;

    $stmt = $pdo->prepare("INSERT INTO books (title, category, rating) VALUES (?, ?, ?)");
    $stmt->execute([$title, $category, $rating]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add a Book</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Add a New Book</h1>
    <form method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category"><br><br>

        <label>Rating (1–5):</label><br>
        <input type="number" name="rating" min="1" max="5"><br><br>

        <button type="submit" class="btn">Save Book</button>
        <a href="index.php" class="btn">Cancel</a>
    </form>
</body>
</html>