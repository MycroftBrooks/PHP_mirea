<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");

include_once "../config/connect.php";
include_once "../models/menu.php";

$database = new Database();
$db = $database->get_connection();

$menu = new Menu($db);

if (!isset($_GET["id"])) {
    http_response_code(400);
    echo json_encode(array("message" => "Bad request. Id is not set"));
} else {
    $menu->id = $_GET["id"];
    $found = $menu->get();
    if ($found != null) {
        $result = array(
            "id" => $found[0],
            "name" => $found[1],
            "price" => $found[2]
        );
        http_response_code(200);
        echo json_encode($result);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Position not found"));
    }
}
