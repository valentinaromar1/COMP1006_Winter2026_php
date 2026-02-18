<?php
    require "includes/connect.php";  

    $firstName = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $lastName  = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone     = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
    $currentPos   = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS));
    $skills = trim(filter_input(INPUT_POST, 'skills', FILTER_SANITIZE_SPECIAL_CHARS));
    $bio = trim(filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_SPECIAL_CHARS));

    // Required fields
        if ($firstName === null || $firstName === '') {
            $errors[] = "First Name is required.";
        }

        if ($lastName === null || $lastName === '') {
            $errors[] = "Last Name is required.";
        }

        if ($email === null || $email === '') {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email must be a valid email address.";
        }

      
        if ($phone === null || $phone === '') {
            $errors[] = "Phone number is required.";
        } elseif (!filter_var($phone, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
        ])) {
            $errors[] = "Phone number format is invalid.";
        }


        if ($currentPos === null || $currentPos === '') {
            $errors[] = "Address is required.";
        }

        if ($skills === null || $skills === '') {
            $errors[] = "please input something useful.";
        }

        if ($bio === null || $bio === '') {
            $errors[] = "please input bio.";
        }
?>

<div class="alert alert-success">
    <h1>please view your resume  <?= htmlspecialchars($firstName) ?>!</h1>
    <p>
        <p><?= htmlspecialchars($firstName) ?> <?= htmlspecialchars($lastName) ?></p>
       
        <?= htmlspecialchars($email) ?>

        <?= htmlspecialchars($phone) ?>

        <?= htmlspecialchars($currentPos) ?>

        <?= htmlspecialchars($skills) ?>
        
        <?= htmlspecialchars($bio) ?>
    </p>
</div>