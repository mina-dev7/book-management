<?php
require 'config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Fetch existing book
$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$book) {
    echo "Book not found.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $category = $_POST['category'] ?? '';
    $rating = $_POST['rating'] ?? 0;

    $stmt = $pdo->prepare("UPDATE books SET title = ?, category = ?, rating = ? WHERE id = ?");
    $stmt->execute([$title, $category, $rating, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <h1>Edit Book</h1>
    <form method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($book['title']) ?>" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category" value="<?= htmlspecialchars($book['category']) ?>"><br><br>

        <label>Rating (1–5):</label><br>
        <input type="number" name="rating" min="1" max="5" value="<?= $book['rating'] ?>"><br><br>

        <button type="submit" class="btn">Update Book</button>
    </form>
    <p><a href="index.php" class="btn">Back to List</a></p>
</body>
</html>
