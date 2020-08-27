<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Post.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate books quote object
$quote = new Quote($db);

// Blog quote query
$result = $quote->read();
// Get row count
$num = $result->rowCount();

// Check if any quotes
if ($num > 0) {
    // quote array
    $quotes_arr = array();
    // $quotes_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quote_item = array(
            'id' => $id,
            'title' => $title,
            'body' => html_entity_decode($body),
            'author' => $author
        );

        // Push to "data"
        array_push($quotes_arr, $quote_item);
        // array_push($quotes_arr['data'], $quote_item);
    }

    // Turn to JSON & output
    echo json_encode($quotes_arr);
} else {
    // No quotes
    echo json_encode(
        array('message' => 'No quotes Found')
    );
}
