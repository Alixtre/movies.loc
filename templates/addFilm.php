<?php

$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
$genres = array("Боевик", "Приключения", "Комедия", "Драма", "Фэнтези", "Ужасы", "Мюзикл", "Детектив", "Романтика", "Научная фантастика", "Триллер", "Вестерн");

?>


<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Adding a movie</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-dark-5@1.1.3/dist/css/bootstrap-night.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form action="/addFilm.php" method="post">
                    <div>
                        <h2 style="text-align:center; margin:15px 0px 15px 0px">Добавить фильм</h2>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="name">Название фильма</label>
                        <input type="text" id="name" name="name" value="<?php echo ($_POST['name'] ?? '') ?>" class="form-control <?php if (!empty($error['name'])) echo 'is-invalid'; ?>" />
                        <div class="invalid-feedback">
                            <?php echo $error['name'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="release_date">Дата выхода</label>
                        <input type="date" id="release_date" name="release_date" value="<?php echo ($_POST['release_date'] ?? '') ?>" class="form-control <?php if (!empty($error['release_date'])) echo 'is-invalid'; ?>" />
                        <div class="invalid-feedback">
                            <?php echo $error['release_date'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="genre">Жанр</label>
                        <select name="genre" id="genre" class="form-select <?php if (!empty($error['genre'])) echo 'is-invalid'; ?>">
                            <option value="">Выберите жанр</option>
                            <?php
                            foreach ($genres as $value) :
                                echo '<option value="', $value, '">', $value, '</option>';
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo $error['genre'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="country">Страна</label>
                        <select name="country" id="country" class="form-select <?php if (!empty($error['country'])) echo 'is-invalid'; ?>">
                            <option value="">Выберите страну</option>
                            <?php
                            foreach ($countries as $value) :
                                echo '<option value="', $value, '">', $value, '</option>';
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo $error['country'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="director">Режиссер</label>
                        <input type="text" id="director" name="director" value="<?php echo ($_POST['director'] ?? '') ?>" class="form-control <?php if (!empty($error['director'])) echo 'is-invalid'; ?>" />
                        <div class="invalid-feedback">
                            <?php echo $error['director'] ?? ''; ?>
                        </div>
                    </div>

                    <div class="d-grid gap">
                        <input type="submit" value="Подтвердить" class="btn btn-outline-light" />
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>

</html>