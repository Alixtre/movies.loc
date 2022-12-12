<?php
require_once dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . "config.php";

$id = $_GET['id'];


$stmt = $dbConnect->prepare(
    "SELECT film_id FROM Favorite
    INNER JOIN Users
    ON Favorite.user_id = Users.user_id
    WHERE user_email = :email"
);
$stmt->execute(
    [
        "email" => $_SESSION['user']
    ]
);
$allFilmsId = $stmt->fetchAll(PDO::FETCH_COLUMN);


$stmt = $dbConnect->prepare(
    "SELECT user_id FROM Users
    WHERE user_email = :email"
);
$stmt->execute(
    [
        "email" => $_SESSION['user']
    ]
);
$userID = $stmt->fetchColumn();

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
            "user_id" => $userID
        ]
    );
}


header("Location: /filmsList");
die();
