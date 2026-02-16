<?php
require "includes/header.php";
//  TODO: connect to the database 
$dsn = "mysql:host=$host;dbname=$dbname";
//   TODO: Grab form data (no validation or sanitization for this lab)
$firstName = ('first_name');
$lastName  = ('last_name');
$email     = ('email');

  //1. Write an INSERT statement with named placeholders
  $sql = "INSERT INTO orders (frist_name, last_name, email) VALUES (:frist_name, :last_name, :email) ";
  //2. Prepare the statement
  
  //3. Execute the statement with an array of values



*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <main class="container mt-4">
        <h2>Thank You for Subscribing</h2>

        <!-- TODO: Display a confirmation message -->
        <!-- Example: "Thanks, Name! You have been added to our mailing list." -->
        <p>Thanks you, <?= htmlspecialchars($firstName) ?> <?= htmlspecialchars($lastName) ?> you have been added to our mailing list and will be contacted at  <?= htmlspecialchars($email) ?>!</p>


        <p class="mt-3">
            <a href="subscribers.php">View Subscribers</a>
        </p>
    </main>
</body>

</html>
