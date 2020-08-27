<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/database.php';
include_once '../../models/Post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate quote object
$quote = new Quote($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$quote->title = $data->title;
$quote->body = $data->body;
$quote->author = $data->author;

// Create quote
if ($quote->create()) {
    echo json_encode(
        array('message' => 'New quote created')
    );
} else {
    echo json_encode(
        array('message' => 'Failed to create new quote')
    );
}
