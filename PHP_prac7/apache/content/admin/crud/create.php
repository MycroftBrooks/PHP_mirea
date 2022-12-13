<?php
if (isset($_GET['name']) && isset($_GET['type'])) {
    $name = $_GET['name'];
    $type = $_GET['type'];
    switch ($type) {
        case 'vacancy':
            $salary = $_GET['salary'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("INSERT INTO $type VALUES (Null, '$name', '$salary')");
            break;
        case 'product':
            $price = $_GET['price'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("INSERT INTO $type VALUES (Null, '$name', '$price')");
            break;
    }
    header("Location: /admin/admin.php");
} else {
    echo "Bad request";
}
