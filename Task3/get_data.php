<?php

function sendResponse($data, $status_code = 200)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    http_response_code($status_code);
    echo json_encode($data);
    exit();
};
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    require_once 'config/Database.php';
    $db = new Database();

    $sql = "SELECT * FROM data";

    $result = $db->query($sql);

    $row = $result->fetch_all(MYSQLI_ASSOC);
    $db->close();
    sendResponse($row);
} else {
    sendResponse(['error => Invalid Request'], 404);
}
