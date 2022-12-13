<?php
if (isset($_GET['type']) && isset($_GET['id'])) {
    $type = $_GET['type'];
    $id = $_GET['id'];
    $mysqli = new mysqli("db", "mysql", "123456", "app_db");
    if ($mysqli->query("DELETE FROM $type WHERE id = $id")) {
        header("Location: /admin/admin.php");
    } else {
        echo "Bad request";
    }
} else {
    echo "Bad request";
}
