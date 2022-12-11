<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    header("Location: /login");
    die();
}
require_once "navbar.php";

$results_per_page = 10;

if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

$start_from = ($page - 1) * $results_per_page;

$stmt = $dbConnect->prepare(
    "SELECT * FROM Favorite
    INNER JOIN Users
    ON Favorite.user_id=Users.user_id
    INNER JOIN Films
    ON Favorite.film_id=Films.film_id
    WHERE user_email=:email
    ORDER BY film_name ASC
    LIMIT $start_from, $results_per_page"
);
$stmt->execute(
    [
        "email" => $_SESSION['user']
    ]
);
$filmData = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Favorite List</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" rel="stylesheet">
    <style>
        .page-link {
            color: white;
        }

        .page-link:hover:not(.active) {
            color: white;
        }

        .pagination .active {
            background-color: darkgray;
            color: black;
        }

        tbody a {
            font-weight: bold;
            color: whitesmoke;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div>
            <h2 style="text-align:center; margin:15px 0px 15px 0px">Избранные фильмы</h2>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="30%">Название</th>
                    <th scope="col">Жанр</th>
                    <th scope="col" width="15%"></th>
                    <th scope="col" width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($filmData as $value) :
                    echo '<tr data-id="1">';
                    echo '<td>' . $value['film_name'] . '</td>';
                    echo '<td>' . $value['genre'] . '</td>';
                    echo '<td>' . "<a href='commands/remove?id=" . $value['film_id'] . "'>Убрать из избранного</a>" . '</td>';
                    echo '<td>' . "<a href='filmInfo?id=" . $value['film_id'] . "'>Подробнее</a>" . '</td>';
                    echo '</tr>';
                endforeach;
                ?>
            </tbody>
        </table>
        <div class="pagination d-flex justify-content-center">
        
            <ul class="pagination">
                <?php 
                $total_results = $dbConnect->query("SELECT COUNT(*) FROM Favorite INNER JOIN Users ON Favorite.user_id=Users.user_id WHERE user_email='" . $_SESSION['user'] . "'")->fetchColumn();
                $total_pages = ceil($total_results / $results_per_page);
                

                if ($page >= 2) :
                ?>
                    <li class="page-item">
                        <a class="page-link" href="favoriteList?page=<?php echo ($page - 1); ?>"> Prev </a>
                    </li>
                    <?php
                endif;

                for ($i = 1; $i <= $total_pages; $i++) {
                    if ($i == $page) {
                    ?>
                        <li class="page-item">
                            <a class="page-link active" href="favoriteList?page=<?php echo ($i); ?>"> <?php echo ($i); ?> </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="page-item">
                            <a class="page-link" href="favoriteList?page=<?php echo ($i); ?>"> <?php echo ($i); ?> </a>
                        </li>
                    <?php
                    }
                };
                if ($page < $total_pages) :
                    ?>
                    <li class="page-item">
                        <a class="page-link" href="favoriteList?page=<?php echo ($page + 1); ?>"> Next </a>
                    </li>
                <?php
                endif;
                ?>
            </ul>
        </div>
    </div>
</body>

</html>