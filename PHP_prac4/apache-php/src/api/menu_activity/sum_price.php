<?php
require_once 'main_menu.php';
require_once '../helper.php';
function sum_all_prices()
{
    $mysqli = openMysqli();
    $result = $mysqli->query('select sum(price) from menu');

    //Если совпадений не нашлось
    if ($result->num_rows != 1) {
        bad_query();
        return;
    }
    echo "Sum of all coffees = " . array_values($result->fetch_assoc())[0] . " Euro";
    $mysqli->close();
}
