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

include '../Template.php';

$title = "Login";
$errorMessageHtmlString = $errorMessage ? "<div class='invalid-feedback'>{$errorMessage}</div>" : null;
$isInvalidClass = $errorMessage ? " is-invalid" : "";
$bgStyle = "background-image: url(\"/img/jeremy-bishop-BuQ-jgeexaQ-unsplash_1920w.jpg\");background-size: cover;";
$bodyContent = "
    <div class='d-flex flex-grow-1 justify-content-center align-items-center' style='{$bgStyle}'>
        <div class='container'>
            <div class='card mb-3' style='max-width: 20rem;'>
                <!--<div class='card-header'>Header</div>-->
                <div class='card-body'>
                    <h4 class='card-title mt-3'>{$title}</h4>
                    <form action='?login_action=1' method='post'>
                        <div class='form-group'>
                            <label class='form-control-label' for='inputPassword'>Access password</label>
                            <input type='password' name='password' class='form-control{$isInvalidClass}' id='inputPassword'>
                            {$errorMessageHtmlString}
                        </div>
                        <div class='form-group'>
                            <button type='submit' class='btn btn-primary btn-sm'>Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class='fixed-bottom p-3 text-right text-white'>
        &copy; 2020 <span class='text-muted small'>CodeGewerk.</span>
    </footer>
";

$pageTemplate = new Template($title, $bodyContent);
$pageTemplate->render();
