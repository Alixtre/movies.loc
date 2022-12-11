<?php
require_once "config.php";
require_once "navbar.php";

if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $stmt = $dbConnect->prepare("SELECT * FROM Users WHERE user_email = :email");
    $stmt->execute(["email" => $_POST['email']]);
    $userdata = $stmt->fetch();
    if (password_verify($_POST['password'], $userdata['user_password'])) {
        $_SESSION['user'] = $_POST['email'];
        header("Location: /index.php");
        die();
    }
}
require_once TEMPLATES_PATH . "login.php";
