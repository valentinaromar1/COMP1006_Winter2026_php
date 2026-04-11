<?php
    require "includes/header.php";
    require "includes/connect.php";



  $resumeId= $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $firstName = trim($_POST['first_name'] ?? '');
    $lastName  = trim($_POST['last_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    
    $currentPos  = trim($_POST['current_pos'] ?? '');
    $skills  = trim($_POST['skills'] ?? '');
    $bio  = trim($_POST['bio'] ?? '');
   
    //use as ref for fields

    //$stmt->bindParam(':first_name', $firstName);
    //$stmt->bindParam(':last_name', $lastName);
    //$stmt->bindParam(':email', $email);
    //$stmt->bindParam(':phone', $phone);
    //$stmt->bindParam(':current_pos', $currentPos);
    //$stmt->bindParam(':skills', $skills);
    //$stmt->bindParam(':bio', $bio);
 

    if ($firstName === '' || $lastName === '' || $email === '' || $skills === '') {
        $error = "the fields of frist name, last name and email must be filled out";
    } 
    else {

    //updates the sql fields with the new info inputed 
    $sql = "UPDATE resume1
            SET first_name = :first_name,
                last_name = :last_name,
                email = :email,
                phone = :phone,
                current_pos = :current_pos,
                skills = :skills,
                bio = :bio,
             WHERE resume_id = :resume_id";
    }

    $stmt = $pdo->prepare($sql);

   
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':current_pos', $currentPos);
    $stmt->bindParam(':skills', $skills);
    $stmt->bindParam(':bio', $bio);


    $stmt->bindParam(':resume_id', $resumeId);

    $stmt->execute();

    header("Location: resume.php");
    exit;
  }

$sql = "SELECT * 
        FROM resume1 
        WHERE resume_id = :resumeId";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(':resume_id', $resumeId);

$stmt->execute();

$resume = $stmt->fetch();

?>

<main class="container mt-4">
  <h2>Update resume: <?= htmlspecialchars($resume['resume_id']); ?></h2>

  <form method="post">

    <h3 class="mt-3"><u>Resume info</u></h3>
    <label for="profile_image" class="form-label">profile image</label>
    <input type="file" id="profile_image" name="profile_image" class="form-control mb-4" accept=".jpg,.jpeg,.png,.webp">

    <label class="form-label">First Name:</label>
    <input  type="text" name="first_name"   class="form-control mb-3"   value="<?= htmlspecialchars($order['first_name']); ?>"  required/>

    <label class="form-label">Last Name:</label>
    <input type="text" name="last_name" class="form-control mb-3" value="<?= htmlspecialchars($resume['last_name']); ?>" required />

   <label class="form-label">Email:</label>
    <input type="email" name="email" class="form-control mb-4" value="<?= htmlspecialchars($resume['email']); ?>" required>

    <label class="form-label">Phone:</label>
    <input type="text" name="phone" class="form-control mb-3" value="<?= htmlspecialchars($resume['phone']); ?>">

    <label class="form-label">current postion:</label>
    <input type="text" name="current_pos" class="form-control mb-3" value="<?= htmlspecialchars($resume['current_pos']); ?>">

    <label class="form-label">skills:</label>
    <input type="text" name="skills" class="form-control mb-3" value="<?= htmlspecialchars($resume['skills']); ?>">

    <label class="form-label">bio:</label>
    <input type="text" name="bio" class="form-control mb-3" value="<?= htmlspecialchars($resume['bio']); ?>">

 
    <button class="btn btn-primary">:Save Changes:</button>
    <a href="resume.php" class="btn btn-secondary">Cancel</a>
      
  </form>
</main>
?>