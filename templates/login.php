<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="" method="post">
                    <div>
                        <h2 style="text-align:center; margin:15px 0px 15px 0px">Вход</h2>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Email адрес</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required=required />
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Пароль</label>
                        <input type="password" id="password" name="password" class="form-control" required=required />
                    </div>

                    <div class="d-grid gap">
                        <input type="submit" value="Подтвердить" class="btn btn-outline-light" />
                    </div>
                </form>
                <div class="d-flex justify-content-center">
                    <p>Еще нет аккаунта? <a href="register">Зарегистрироватся</a></p>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>