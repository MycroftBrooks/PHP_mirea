<?php
require "session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <style type="text/css">
        a {
            margin-top: 5px;
        }
    </style>
</head>
<ol>
    <body>
    <h1>Menu</h1>

    <?php
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $result = $mysqli->query("SELECT * FROM menu"); ?>

    <table class="table table-striped" border="2">
        <?php if ($result->num_rows > 0) foreach ($result as $row) echo <<<A
            <tr>
                <td>{$row['name']}</td>
                <td>{$row['description']}</td>
                <td>{$row['price']}&#8364</td>
            </tr>
        A; else echo 'Empty'; ?></table>

    <a  href="index.html">На главную</a>
    <br>
    <a  href="admin/admin.php">Страница админа</a>
    </body>
</ol>
</html>