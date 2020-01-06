<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: /login');
    exit;
}

include 'Template.php';

$title = "Dashboard";
$bodyContent = "
    <h2>{$title}</h2>
    <p>Hello, you are logged in!</p>
    <a href='/logout'>Logout</a>
";

$pageTemplate = new Template($title, $bodyContent);
$pageTemplate->render();
