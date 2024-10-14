<?php
// allow cors
header("Access-Control-Allow-Origin: *");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo json_encode([
        'message' => 'GET request'
    ]);
}
