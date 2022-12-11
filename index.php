<?php
require_once "config.php";

if (empty($_SESSION['user'])) {
    header("Location: /login");
    die();
}
require_once "navbar.php";
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Main page</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" rel="stylesheet">
</head>
<body>
    <h2 style="text-align:center; margin:15px 0px 15px 0px">Главная страница</h2>
    <p style="text-align:center">Все доступные вкладки находятся в навигационной панели сверху</p>
</body>