<?php

session_start();

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: /login');
    exit;
}

include 'Template.php';

$title = "Dashboard";
$bodyContent = "
    <div class='container my-4'>
        <h2>{$title}</h2>
        <p>Hello, you are logged in!</p>
        <a href='/logout'>Logout</a>
    </div>
";

$pageTemplate = new Template($title, $bodyContent);
$pageTemplate->render();
