<?php
require 'config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute delete query
    $stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect back to the main page
    header("Location: index.php");
    exit();
} else {
    echo "Invalid book ID.";
}