<?php

// example: https://gist.github.com/james2doyle/33794328675a6c88edd6

$authorizedOrigins = include 'authorized-origins.php';
$httpOrigin = $_SERVER['HTTP_ORIGIN'];

if (in_array($httpOrigin, $authorizedOrigins)) {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    $post_data = file_get_contents('php://input');

    $decoded_post_data = (array) json_decode($post_data);
    print_r($decoded_post_data);

    file_put_contents('data.csv', dataToCsvLine($decoded_post_data), FILE_APPEND | LOCK_EX);

    http_response_code(200);

}

http_response_code(403);

function dataToCsvLine($data)
{
    $now = new DateTime();

    return "\"" . $now->format('Y-m-d, H:i:s') . "\", \"" . $data['platform'] . "\", \"" . $data['userAgent'] . "\"\n";
}
