<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Method: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once "../config/connect.php";

include_once "../models/vacancy.php";

$database = new Database();
$db = $database->get_connection();
$vacancy = new Vacancy($db);

$data = json_decode(file_get_contents("php://input"));

if (
    !empty($data->name) &&
    !empty($data->salary)
) {
    $vacancy->name = $data->name;
    $vacancy->salary = $data->salary;

    $result = $vacancy->create();

    if ($result) {
        http_response_code(201);
        echo json_encode(array("message" => "Vacancy created"), JSON_UNESCAPED_UNICODE);
    } else {
        http_response_code(500);
        echo json_encode(array("message" => "Unable to create vacancy"), JSON_UNESCAPED_UNICODE);
    }
} else {
    http_response_code(400);
    echo json_encode(array("message" => "Unable to create vacancy. Data is not valid"), JSON_UNESCAPED_UNICODE);
}

