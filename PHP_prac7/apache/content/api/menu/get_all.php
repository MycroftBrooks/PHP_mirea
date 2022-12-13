<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/connect.php";
include_once "../models/menu.php";

$database = new Database();
$db = $database->get_connection();

$menu = new Menu($db);

$query_result = $menu->get_all();

$result = array("results" => array());
foreach ($query_result as $menu) {
    $menus_obj = array(
        "id" => $menu["id"],
        "name" => $menu["name"],
        "price" => $menu["price"]
    );
    $result["results"][] = $menus_obj;
}

http_response_code(200);
echo json_encode($result);