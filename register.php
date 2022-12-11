<?php
require_once "config.php";
require_once "navbar.php";

$fields = ["name", "email", "password", "confirmPassword"];
if (!empty($_POST)) {
    $error = [];
    foreach ($_POST as $k => $v) {
        if (in_array($k, $fields) && empty($v)) {
            $error[$k] = "Поле должно быть заполнено";
        }
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Некорректный email";
    }
    $stmt = $dbConnect->prepare("SELECT user_id FROM Users WHERE user_email = :email");
    $stmt->execute(["email" => $_POST['email']]);
    $isExist = $stmt->fetch();
    if (!empty($isExist)) {
        $error['email'] = "Email уже используется";
    }
    if (mb_strlen($_POST['password']) < 8) {
        $error['password'] = "Пароль должен быть не менее 8 символов";
    }
    if ($_POST['password'] !== $_POST['confirmPassword']) {
        $error['confirmPassword'] = "Пароли не совпадают";
    }
    if (empty($error)) {
        $stmt = $dbConnect->prepare(
            "INSERT INTO Users
            (
                `user_name`,
                `user_email`,
                `user_password`
            ) 
            VALUES
            (
                :name,
                :email,
                :password
            )"
        );
        $stmt->execute(
            [
                "name" => $_POST['name'],
                "email" => $_POST['email'],
                "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
            ]
        );
        $_SESSION['user'] = $_POST['email'];
        header("Location: /index.php");
        die();
    }
}

require_once TEMPLATES_PATH . "register.php";
