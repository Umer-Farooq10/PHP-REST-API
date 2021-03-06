<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: PUT");
    // Security Purpose
    header("Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With");

    $data = json_decode(file_get_contents("php://input"), true);

    $sid = $data["sid"];
    $name = $data["sname"];
    $age = $data["sage"];
    $city = $data["scity"];

    include "config.php";

    $sql = "UPDATE students SET name = '{$name}', age = {$age}, city = '{$city}' WHERE id = {$sid}";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array("message" => "Record Updated Successfully.", "status" => true));
    } else {
        echo json_encode(array("message" => "Record Not Updated.", "status" => false));
    }
?>