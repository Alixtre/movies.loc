<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    header("Location: /login");
    die();
}
require_once "navbar.php";

$fields = ["name", "release_date", "genre", "country", "director"];
if (!empty($_POST)) {
    $error = [];
    foreach ($_POST as $k => $v) {
        if (in_array($k, $fields) && empty($v)) {
            $error[$k] = "Поле должно быть заполнено";
        }
    }
    $stmt = $dbConnect->prepare("SELECT film_id FROM Films WHERE film_name = :name");
    $stmt->execute(["name" => $_POST['name']]);
    $isExist = $stmt->fetch();
    if (!empty($isExist)) {
        $error['name'] = "Фильм с таким названием уже добавлен";
    }
    if (empty($error)) {
        $stmt = $dbConnect->prepare(
            "INSERT INTO Films
            (
                `film_name`,
                `release_date`,
                `genre`,
                `country`,
                `director`
            ) 
            VALUES
            (
                :name,
                :release_date,
                :genre,
                :country,
                :director
            )"
        );
        $stmt->execute(
            [
                "name" => $_POST['name'],
                "release_date" => $_POST['release_date'],
                "genre" => $_POST['genre'],
                "country" => $_POST['country'],
                "director" => $_POST['director']
            ]
        );
        header("Location: /filmsList");
        die();
    }
}

require_once TEMPLATES_PATH . "addFilm.php";
