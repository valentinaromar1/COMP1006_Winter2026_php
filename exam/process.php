<?php
    require 'includes/connect.php'; 

    //filter and trims user imput
    $firstName = trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $lastName  = trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_SPECIAL_CHARS));
    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone     = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
   
    //makes a if statement for all Required fields
        if ($firstName === null || $firstName === '') {
            $errors[] = "please input first name";
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

        if ($phone === null || $phone === '') {
            $errors[] = "please input Phone number.";
        } 
        else if (!filter_var($phone, FILTER_VALIDATE_REGEXP, [
            'options' => ['regexp' => '/^[0-9\-\+\(\)\s]{7,25}$/']
        ])) {
            $errors[] = "Phone number is not vaild.";
        }

            //insert the fields to the sql database 
    $sql = "
        INSERT INTO registrations (
            first_name,
            last_name,
            email,
            phone,

        ) VALUES (
            :first_name,
            :last_name,
            :email,
            :phone,
        );
    ";

    //prepares the sql  
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);

    $stmt->execute();
?>

<main>
    <legend>Information inputed</legend>

        <p>first name: <?= htmlspecialchars($firstName)?></p>
        
        <p>last name: <?= htmlspecialchars($lastName) ?></p>
       
        <P>email: <?= htmlspecialchars($email)?></P>

        <p>Phone number: <?= htmlspecialchars($phone)?></p>

</main>
    <p>
        <a href="admin.php">Go to Admin Page</a>
    </p>