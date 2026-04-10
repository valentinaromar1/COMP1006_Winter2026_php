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
        $errors[] = "please put username.";

    }

        if ($username === '') {
        $errors[] = "please put username.";
    }
        if ($username === '') {
        $errors[] = "please put username.";
    }

        if ($username === '') {
        $errors[] = "please put username.";
    }

        if ($username === '') {
        $errors[] = "please put username.";
    }

        if ($username === '') {
        $errors[] = "please put username.";
    }

        if ($username === '') {
        $errors[] = "please put username.";
    }

        if ($username === '') {
        $errors[] = "please put username.";
    }
}