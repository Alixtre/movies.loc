<nav class="navbar navbar-expand navbar-dark" style="background-color: #101010;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Movies</a>
        <div class="collapse navbar-collapse d-flex justify-content-start">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/filmsList">Список фильмов</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/favoriteList">Избранное</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/addFilm">Добавить фильм</a>
                </li>
            </ul>
        </div>
        <?php
        if (empty($_SESSION['user'])) {
        ?>
            <p style="font-size:18px" class="mt-3"><a href="login">Вход</a> | <a href="register">Регистрация</a></p>
        <?php
        } else {
        ?>
            <div class="mt-3">
                <p style="font-size:18px">Добро пожаловать, <?php echo $_SESSION['user'] ?>. <a href="commands/logout">Выйти</a></p>
            </div>
        <?php
        }
        ?>
        <div class="collapse navbar-collapse d-flex justify-content-end mt-3">
            <form class="form-inline" action="/filmsList.php" method="get">
                <div class="input-group">
                    <input class="form-control mr-sm-2" type="search" name="search" value="<?php echo ($_GET['search'] ?? '') ?>" placeholder="Введите запрос" required>
                    <button class="btn btn-outline-light" type="submit">Поиск</button>
                </div>
            </form>
        </div>
    </div>
</nav>