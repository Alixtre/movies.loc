<?php
require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

$id = $_GET['id'];

$allFilmsId = $dbConnect->query(
    "SELECT film_id FROM Favorite
    INNER JOIN Users
    ON Favorite.user_id = Users.user_id
    WHERE user_email = \"" . $_SESSION['user'] . "\""
)->fetchAll(PDO::FETCH_COLUMN);

$UserID = $dbConnect->query(
    "SELECT user_id FROM Users
    WHERE user_email = \"" . $_SESSION['user'] . "\""
)->fetchColumn();

if (!in_array($id, $allFilmsId)) {
    $stmt = $dbConnect->prepare(
        "INSERT INTO Favorite 
            (
                film_id,
                user_id
            )
            VALUES 
            (
                :film_id,
                :user_id
            )"
    );
    $stmt->execute(
        [
            "film_id" => $id,
            "user_id" => $UserID
        ]
    );
}


header("Location: /filmsList");
die();
