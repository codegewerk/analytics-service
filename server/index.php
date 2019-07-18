<?php

// example: https://gist.github.com/james2doyle/33794328675a6c88edd6

$authorizedOrigins = include 'authorized-origins.php';
$httpOrigin = $_SERVER['HTTP_ORIGIN'];

if (in_array($httpOrigin, $authorizedOrigins)) {

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type");

    http_response_code(200);
    print_r("REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n");

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $postData = file_get_contents('php://input');

        $decodedPostData = (array) json_decode($postData);
        print_r($decodedPostData);

        file_put_contents('data.csv', dataToCsvLine($decodedPostData), FILE_APPEND | LOCK_EX);
    }
}

http_response_code(403);

function dataToCsvLine($data)
{
    $now = new DateTime();

    return "\"" . $now->format('Y-m-d, H:i:s') . "\", \"" . $data['platform'] . "\", \"" . $data['userAgent'] . "\"\n";
}
