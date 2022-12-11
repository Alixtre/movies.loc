<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    header("Location: /login");
    die();
}
require_once "navbar.php";

if (!isset($_GET['id'])) {
    $id = 1;
} else {
    $id = $_GET['id'];
}

$film_data = $dbConnect->query("SELECT * FROM Films WHERE film_id=" . $id)->fetch(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>More Info</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" rel="stylesheet">
    <style>
        p {
            font-size: 18px;
        }
    </style>
</head>

</html>

<body>
    <div class="container-fluid">
        <div class="mt-3">
            <p><b>Название фильма: </b><?php echo $film_data['film_name'] ?></p>
            <p><b>Дата выхода: </b><?php echo $film_data['release_date'] ?></p>
            <p><b>Жанр: </b><?php echo $film_data['genre'] ?></p>
            <p><b>Страна: </b><?php echo $film_data['country'] ?></p>
            <p><b>Режиссер: </b><?php echo $film_data['director'] ?></p>
        </div>
    </div>
</body>