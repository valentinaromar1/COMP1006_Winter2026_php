<?php

require "includes/connect.php";

require "includes/header.php";

$errors = [];

$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS));

    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($username === '') {
        $errors[] = "please put username";

    }

    if ($email === '') {
        $errors[] = "please put email";
    }

    if ($username === '') {
        $errors[] = "please put username.";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "please put a valid email";
    }

    if ($password === '') {
        $errors[] = "please put password that fits qualifications";
    }

    if ($confirmPassword === '') {
        $errors[] = "Please confirm password.";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "please put matching password";
    }
    if (str(len($password)) < 8) {
        $errors[] = "Password must be 8 characters long at least";
    }
}