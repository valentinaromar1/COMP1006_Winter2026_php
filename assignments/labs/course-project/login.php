<?php 
session_start();


require "includes/connect.php";


require "includes/header.php";

$error = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = trim($_POST['username_or_email'] ?? '');
    $password = $_POST['password'] ?? '';


    
}

?>