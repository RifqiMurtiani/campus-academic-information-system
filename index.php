<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Sistem Informasi Akademik Kampus</title>
    <link rel="stylesheet" href="style.css" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="proses_login.php" method="post" class="input-group">
        <div class="title">
            <b class="front">Form</b>Login<b class="back"></b>
        </div>
        <div class="form">
            <input type="text" name="username" />
            <span data-placeholder="ID User / NIM"></span>
        </div>
        <div class="form">
            <input type="password" name="password" />
            <span data-placeholder="Kode Akses / PIN"></span>
        </div>
        <button type="submit" name="login">Masuk</button>
    </form>

    <script type="text/javascript">
        $(".form input").on("focus", function() {
            $(this).addClass("focus");
        });
        $(".form input").on("blur", function() {
            if ($(this).val() == "") $(this).removeClass("focus");
        });
    </script>
</body>

</html>