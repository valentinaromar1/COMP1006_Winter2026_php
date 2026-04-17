    <!-- image Information -->
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imagePath = "imageUploads";

        $imageName = $_POST['image_name'] ?? '';

        if ($imageName === '') {
            $errors[] = "please put a name for the image";
        }
        
        if (empty($errors)) {
        $sql = "INSERT INTO imagesInfo(image_path, image_name)
                VALUES (:image_name, :image_path)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':image_path', $imagePath);
    
        $stmt->bindParam(':image_name', $imageName);

        $stmt->execute();
        }
    }
?>
    <main>
        <legend><em>image Information input</em></legend>

        <label for="image" class="form-label">profile image</label>
        <input type="file" id="image" name="image" class="form-control mb-4" accept=".jpg,.jpeg,.png,.webp">
<h2></h2>
        <label for="image_name" class="form-label">image name</label>
        <input type="text" id="image_name" name="image_name" class="form-control">

        <a href="login.php" class="btn">submit image</a>

</main>