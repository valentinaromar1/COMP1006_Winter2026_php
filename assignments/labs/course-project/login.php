<?php 
session_start();

require "includes/connect.php";

require "includes/header.php";

$error = "";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usernameOrEmail = trim($_POST['username_or_email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($usernameOrEmail === '' || $password === '') {
        $error = "Username/email and password are needed";
    } 
    else {
        $sql = "SELECT id, username, email, password
                FROM users
                WHERE username = :login OR email = :login
                LIMIT 1";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':login', $usernameOrEmail);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: index.php");
            exit;
        } 
        else {
            $error = "Invalid information, please try again";
        }
    }
}
?>

//sends back to the index.page
 <p>
        <a href="index.php">resume builder</a>
</p>