<?php

function sendResponse($data, $status_code = 200)
{
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    http_response_code($status_code);
    echo json_encode($data);
    exit();
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = json_decode(file_get_contents('php://input'), true);

    // Check if Prodcut Name is included
    if (!isset($data['product_name'])) {
        sendResponse(['error' => 'Product Name is required'], 400);
    }

    $product_name = $data['product_name'];

    // Database Connection
    require_once 'config/Database.php';
    $db = new Database();

    // Try To insert 
    $sql = "INSERT INTO `data` (`product_name`) VALUES ('$product_name')";
    $result = $db->query($sql);
    if ($result) {
        sendResponse(['sucess' => 'New Product is successfully Added'], 201);
    }
    // DB Clone 
    $db->close();
} else {
    sendResponse(['error => Invalid Request'], 404);
}
