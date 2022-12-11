<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Registration</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="/register.php" method="post">
                    <div>
                        <h2 style="text-align:center; margin:15px 0px 15px 0px">Регистрация</h2>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Имя</label>
                        <input type="text" id="name" name="name" value="<?php echo ($_POST['name'] ?? '') ?>" class="form-control <?php if (!empty($error['name'])) echo 'is-invalid'; ?>" />
                        <div class="invalid-feedback">
                            <?php echo $error['name'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="email">Email адрес</label>
                        <input type="email" id="email" name="email" value="<?php echo ($_POST['email'] ?? '') ?>" class="form-control <?php if (!empty($error['email'])) echo 'is-invalid'; ?>" placeholder="name@example.com" />
                        <div class="invalid-feedback">
                            <?php echo $error['email'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="password">Пароль</label>
                        <input type="password" id="password" name="password" class="form-control <?php if (!empty($error['password'])) echo 'is-invalid'; ?>" />
                        <div class="invalid-feedback">
                            <?php echo $error['password'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="confirmPassword">Повторите пароль</label>
                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control <?php if (!empty($error['confirmPassword'])) echo 'is-invalid'; ?>" />
                        <div class="invalid-feedback">
                            <?php echo $error['confirmPassword'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="d-grid gap">
                        <input type="submit" value="Подтвердить" class="btn btn-outline-light" />
                    </div>
                </form>
                <div class="d-flex justify-content-center">
                    <p>Уже есть аккаунт? <a href="login">Войти</a></p>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>