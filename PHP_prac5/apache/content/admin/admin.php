<?php
require "../session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
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
    <h1>Users</h1>

    <?php
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $result = $mysqli->query("SELECT * FROM auth"); ?>

    <table class="table table-striped" border="2">
        <?php if ($result->num_rows > 0) foreach ($result as $row) echo <<<A
            <tr>
                <td>{$row['login']}</td>
                <td>{$row['password']}</td>
            </tr>
        A; else echo 'Empty'; ?></table>
    </body>
</ol>
</html>
