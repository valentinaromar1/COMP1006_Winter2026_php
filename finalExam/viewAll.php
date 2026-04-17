<?php
require "required/authorize.php";
require "required/connect.php";

$sql = "SELECT * 
        FROM imagesInfo 
        ORDER BY created_at DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$images = $stmt->fetchAll();
?>

<main class="mt-4">
    <h2>Orders (Admin)</h2>

    <?php if (empty($imagesInfo)): ?>
        <p>No images to show</p>
    <?php else: ?>
    
    <a
        class="btn btn-sm btn-danger mt-2"
        href="delete.php?id=<?= urlencode($images['imagesInfo']); ?>"
        onclick="return confirm('Are you sure you want to delete?');">

    <?php endif; ?>

    <a class="btn btn-secondary" href="upload.php">back to upload</a>
</main>
