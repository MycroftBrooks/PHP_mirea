<?php

header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../config/connect.php";
include_once "../models/vacancy.php";

$database = new Database();
$db = $database->get_connection();

$vacancy = new Vacancy($db);

$query_result = $vacancy->get_all();

$result = array("results" => array());
foreach ($query_result as $vacancy) {
    $vacancys_obj = array(
        "id" => $vacancy["id"],
        "name" => $vacancy["name"],
        "salary" => $vacancy["salary"]
    );
    $result["results"][] = $vacancys_obj;
}

http_response_code(200);
echo json_encode($result);