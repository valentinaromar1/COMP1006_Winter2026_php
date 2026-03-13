<?php

//connect to db (which is not working for me)
require 'includes/connect.php'; 

$customerId = $_GET['id']; 

//deletes the proper file from the sql
$sql = "DELETE from registrations
        WHERE customer_id = :customer_id"; 

$stmt = $pdo->prepare($sql); 

$stmt->bindParam(':customer_id', $costomerId);


$stmt->execute(); 


header("Location: index.php"); 
exit; 
?>

    <a href="process.php" class="btn btn-secondary">Cancel</a>