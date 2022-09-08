<html lang="ru">
<head>
    <title>Аким Земар</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
    <h1>Таблица пользователей данного продукта</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
        </tr>
        <?php
        $mysqli = new mysqli("db", "mysql", "123456", "app_db");
        $result = $mysqli->query("SELECT * FROM users");
        foreach ($result as $row) {
            echo "<tr><td>{$row['ID']}</td><td>{$row['name']}</td><td>{$row['surname']}</td></tr>";
        }
        ?>
    </table>
    <?php
    phpinfo();
    ?>
</body>
</html>