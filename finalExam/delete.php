<?php
require "required/authorize.php";

require "required/connect.php";

if (!isset($_GET['id'])) {
  die("No order ID provided.");
}

$customerId = $_GET['id'];

$sql = "DELETE FROM users WHERE image_name = :image_name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':image_name', $imageName);
$stmt->execute();

header("Location: viewAll.php");
exit;