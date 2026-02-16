<?php
/**
 * delete.php
 * ------------------------------------------------------------
 * Deletes one order from the orders1 table.
 * - Gets the customer_id from the URL (delete.php?id=5)
 * - Uses PDO + bindParam for safety
 * - Redirects back to orders.php
 */
//connect to db
<<<<<<< HEAD:06-friday/04-delete/delete.php
require 'includes/connect.php'
// make sure we received an ID
$customerId = $_GET['id'];
// create the query 
$sql = "DELETE from orders1 where customer_id = :customer_id";
//prepare 
$stmt = $pdo->prepare($sql);
//bind 
$stmt->bindParam('customer_id',$customerId)
=======
require 'includes/connect.php'; 

// make sure we received an ID
$customerId = $_GET['id']; 

// create the query 
$sql = "DELETE from orders1 WHERE customer_id = :customer_id"; 

//prepare 
$stmt = $pdo->prepare($sql); 

//bind 
$stmt->bindParam(':customer_id', $customerId);

>>>>>>> 621e66002d09a05a772f80027cabf980011e1568:06/04-delete/delete.php
//execute
$stmt->execute(); 

// Redirect back to order list 
header("Location: orders.php"); 
exit; 