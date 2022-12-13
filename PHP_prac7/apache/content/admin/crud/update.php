<?php
if (isset($_GET['name']) && isset($_GET['type']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $name = $_GET['name'];
    $type = $_GET['type'];
    switch ($type) {
        case 'vacancy':
            $salary = $_GET['salary'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("UPDATE $type SET `name` = '$name', salary = '$salary' WHERE id = $id");
            break;
        case 'product':
            $price = $_GET['price'];
            $mysqli = new mysqli("db", "mysql", "123456", "app_db");
            $result = $mysqli->query("UPDATE $type SET `name` = '$name', price = '$price' WHERE id = $id");
            break;
    }
    header("Location: /admin/admin.php");
} else {
    echo "Bad request";
}
