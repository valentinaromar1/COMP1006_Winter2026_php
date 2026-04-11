<?php
    require "includes/connect.php";    

    //trims and filters the inputs of the users
    $firstName = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $lastName  = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone     = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
    $currentPos   = trim(filter_input(INPUT_POST, 'current_pos', FILTER_SANITIZE_SPECIAL_CHARS));
    $skills = trim(filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_SPECIAL_CHARS));
    $bio = trim(filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS));

    //Required fields  

        if ($profileImage === null || $profileImage === '') {
            $profileImage === ""; 
        }
        if ($firstName === null || $firstName === '') {
            $errors[] = "please put first name";
        }

        if ($lastName === null || $lastName === '') {
            $errors[] = "please input last name";
        }

        if ($email === null || $email === '') {
            $errors[] = "please input last name";
        } 
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email must be a valid email address";
        }

        //phone params copied from in class example
        if ($phone === null || $phone === '') {
            $errors[] = "please input Phone number.";
        } 
        else if (!filter_var($phone, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
        ])) {
            $errors[] = "Phone number is not vaild.";
        }

        //current position is not a requirement and can be left as a blank

        if ($skills === null || $skills === '') {
            $errors[] = "please input something useful.";
        }

        if ($bio === null || $bio === '') {
            $errors[] = "please input bio.";
        }

    //insert the fields to the sql file
    $sql = "
        INSERT INTO resume1 (
            first_name,
            last_name,
            email,
            phone,
            currentPos,
            skills,
            bio
        ) VALUES (
            :first_name,
            :last_name,
            :email,
            :phone,
            :current_pos,
            :skills,
            :bio
        );
    ";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':current_pos', $currentPos);
    $stmt->bindParam(':skills', $skills);
    $stmt->bindParam(':bio', $bio);

    $stmt->execute();
?>

<div class="alert alert-success">
    <h1>-------------------------------------------</h1>
    <p>
        
      <label for="profile_image" class="form-label">profile image</label>
        <input type="file" id="profile_image" name="profile_image" class="form-control mb-4" accept=".jpg,.jpeg,.png,.webp">
        <?php require "includes/header.php" ?>

        <?php 
        if ($profileImage  === null || $profileImage === '' ): 
        ?>
        <div class="alert alert-success">
            <link href="imageStorage/logo.png">
        </div>
        <?php 
        endif; 
        
        ?>
        <!--formats the resume  page into a decent form-->
        <p><u>full name:</u> <?= htmlspecialchars($firstName)?>, <?= htmlspecialchars($lastName) ?></p>
       
        <P><u>email:</u> <?= htmlspecialchars($email)?></P>

        <p><u>Phone number:</u> <?= htmlspecialchars($phone)?></p>

        <p><u>current postion:</u> <?= htmlspecialchars($currentPos)?></p>

        <P>-----------------------------------------</P>

        <p><u>skills:</u> <?= htmlspecialchars($skills)?></p>

        <p><u>bio:</u> <?= htmlspecialchars($bio)?></p>
    </p>
    
    <p>
        <a href="Update.php">Make changes</a>
    </p>
    <p>
        <a href="delete.php">delete</a>
    </p>
</div>