<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: /login');
    exit;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <p>Hello, you are logged in!</p>
        <a href="/logout">Logout</a>
    </body>
</html>
