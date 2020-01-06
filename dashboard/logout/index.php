<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: /');
    exit;
}

session_destroy();

include '../Template.php';

$title = "Logout";
$bodyContent = "
    <h2>{$title}</h2>
    <p>Hello, your logout was successful!</p>
    <a href='/'>Back to start</a>
";

$pageTemplate = new Template($title, $bodyContent);
$pageTemplate->render();
