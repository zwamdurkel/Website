<?php 
session_start();
if ( isset ($_SESSION['login'] ) ) {
    $login = $_SESSION['login'];
} else {
    $login = false;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Zwamdurkel">
    <meta name="theme-color" content="#2fac35">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="./images/favicon_64.png" type="image/png" sizes="64x64">
    <link rel="icon" href="./images/favicon_32.png" type="image/png">
    <link rel="icon" href="./images/favicon_16.png" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon_180.png">
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome/css/pro.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container-lg container-cont bg-light h-auto p-0 pb-1 shadow-lg">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="/"><img src="images/logo.png" alt="zwam" class="img-fluid" width="100vw"></a>
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/" href="/">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/links" href="/links">Links</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My Work
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" id="/jaks" href="/servers/jaks">J.A.K.S.</a>
                        <a class="dropdown-item" id="/build" href="/servers/build">Build Server</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="/server-info" href="/server-info">Global Information</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/contact" href="/contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <?php
                        if (!$login) {
                            echo"<a class='nav-link text-primary' id='' href='/login' data-toggle='tooltip' data-placement='left' title='Log In'><i class='fas fa-sign-in-alt fa-lg'></i></a>";
                        } else {
                            echo"<a class='nav-link text-primary' id='' href='includes/logout.inc' data-toggle='tooltip' data-placement='left' title='Log Out'><i class='fas fa-sign-out-alt fa-lg'></i></a>";
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>