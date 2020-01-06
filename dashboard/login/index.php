<?php

session_start();

if (isset($_SESSION['is_logged_in'])) {
    header('Location: /');
    exit;
}

if (isset($_GET['login_action'])) {
    $password = $_POST['password'];
    // current dev password: 123456
    $passwordHashed = "$2y$10$/713M1F1JLCiDj/LyypwMe9qPWd8ZSy40thWSmh66ZL.3zLiw5okK";

    if (password_verify($password, $passwordHashed)) {
        $_SESSION['is_logged_in'] = 1;
        header('Location: /');
        exit;
    } else {
        $errorMessage = "Invalid password";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <h2>Login</h2>
        <p>
            <b><?php
if (isset($errorMessage)) {
    echo $errorMessage;
}
?></b>
        </p>
        <form action="?login_action=1" method="post">
            Access password<br>
            <input type="password" size="40"  maxlength="250" name="password"><br>

            <input type="submit" value="send">
        </form>
    </body>
</html>
