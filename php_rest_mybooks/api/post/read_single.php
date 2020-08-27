<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/database.php';
include_once '../../models/Post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate book quote object
$quote = new Quote($db);

// Get ID
$quote->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get quote
$quote->read_single();

// Create array
$quote_arr = array(
    'id' => $quote->id,
    'title' => $quote->title,
    'body' => $quote->body,
    'author' => $quote->author,
);

// Make JSON  
print_r(json_encode($quote_arr));
