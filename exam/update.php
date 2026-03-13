<?php
require 'includes/connect.php'; 

if (!isset($_GET['id'])) {

  die("invaild id");}

    $customerId= $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $firstName = trim($_POST['first_name'] ?? '');
    $lastName  = trim($_POST['last_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
}
    if ($firstName === '' || $lastName === '' || $email === '' || $phone === '') {
        $error = "all fields must be filled out";
    } 
    else {

    //updates sql fields with tnew info 
    $sql = "UPDATE registrations
            SET first_name = :first_name,
                last_name = :last_name,
                email = :email,
                phone = :phone,
               
             WHERE customer_id = :customer_id";
   
    //prepares the sql again
    $stmt = $pdo->prepare($sql);

   
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);

    $stmt->bindParam(':customer_id', $customerId);

    $stmt->execute();

    header("Location: index.php");
    exit;
    }

    $sql = "SELECT * 
            FROM registrations
            WHERE customer_id = :customer_id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':customer_id', $customerId);

    $stmt->execute();

    $resume = $stmt->fetch();

?>

    <button class="btn btn-primary">Save Changes</button>
    <a href="process.php" class="btn btn-secondary">Cancel</a>