<?php 

require "includes/connect.php";

require "includes/header.php";

$errors = [];

$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
// serverside validation
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    //makes sure user put a username
    if ($username === '') {
        $errors[] = "please put username";

    }
    //makes sure user put a email
    if ($useremail === '') {
        $errors[] = "please put email";
    }
    //makes sure user put a vaild email
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "please put a valid email";
    }
    //makes sure user put a password 
    if ($password === '') {
        $errors[] = "please put password that fits qualifications";
    } 
    //makes sure user put a password that fits the qualifications  
    if (strlen($password) < 8) {
        $errors[] = "Password must be 8 characters long at least";
    }
    //makes sure user confirmed the password
    if ($confirmPassword === '') {
        $errors[] = "Please confirm password.";
    }
    //makes sure that the password for the confirmation is the same as the password
    if ($password !== $confirmPassword) {
        $errors[] = "please put matching password";
    }


    if (empty($errors)) {

    //may need changes due to email input in the resume
        $sql = "SELECT id 
                FROM users 
                WHERE username = :username OR email = :email";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        if ($stmt->fetch()){
            $errors[] = "sorry, that username or email is already in use :/";
        }
    }
}

?>

//sign up area
<main class="container mt-4">
    <h2>Sign Up for an account</h2>

    <?php 
    if (!empty($errors)): 
    ?>
        <div class="alert alert-danger">
            <h3>Please fix the errors :D</h3>
            <ul class="mb-0">
                <?php 
                foreach ($errors as $error): 
                ?>

                    <li><?= htmlspecialchars($error); ?></li>
                <?php 
                endforeach; 
                ?>
            </ul>
        </div>
    <?php 
    endif; 
    ?>

    <?php 
    if ($success !== ""): 
    ?>
        <div class="alert alert-success">
            <?= htmlspecialchars($success); ?>
            <br>
            
            <a href="login.php" class="btn btn-sm btn-success mt-2">login</a>
        </div>
    <?php 
    endif; 
    ?>

    <form method="post" class="mt-3">

        <label for="username" class="form-label">username</label>
        <input type="text" id="username" name="username"  class="form-control mb-3" value="<?= htmlspecialchars($username ?? ''); ?>" required>

        <label for="useremail" class="form-label">email</label>
        <input type="email" id="email" name="email" class="form-control mb-3" value="<?= htmlspecialchars($email ?? ''); ?>" required>

        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control mb-3" required>

        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control mb-4" required>

        <button type="submit" class="btn btn-primary">make account</button>

        <a href="login.php" class="btn btn-secondary">login </a>
    </form>
</main>
