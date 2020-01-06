<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: /');
    exit;
}

session_destroy();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
    </head>
    <body>
        <h2>Logout</h2>
        <p>Hello, your logout was successful!</p>
        <a href="/">Back to start</a>
    </body>
</html>
