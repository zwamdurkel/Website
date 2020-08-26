<?php 
session_start();
if ( isset ( $_SESSION['login'] ) ) {
    $login = $_SESSION['login'];
} else {
    $login = false;
}
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-173195462-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-173195462-1');
    </script>
    <script async data-ad-client="ca-pub-2887937456467590" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=yes">
    <meta name="author" content="Zwamdurkel">
    <meta name="theme-color" content="#2fac35">
    <meta http-equiv="content-Type" content="text/html; charset=utf-8">
    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="description" content="This is Zwamdurkel's personal website, filled with handy tools for authorized people. Some of the tools include FileRun: a file server and Pterodactyl panel: a game management system.">
    <meta name="keywords" content="zwamdurkel riswick personal tools filerun pterodactyl server developer html css website design">
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" href="/images/favicon_64.webp" type="image/webp" sizes="64x64">
    <link rel="icon" href="/images/favicon_32.webp" type="image/webp">
    <link rel="icon" href="/images/favicon_16.webp" type="image/webp">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon_180.webp">
    <link rel="stylesheet" href="/custom.min.css">
    <script src="https://kit.fontawesome.com/be1adcc54d.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome/css/pro.min.css">-->
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link async rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <link rel="stylesheet" href="/style.min.css">
</head>
<script>
    $(window).on("load",function(){
     $(".loader-wrapper").fadeOut("slow");
    });
</script>
<div class="loader-wrapper">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<body>  
    <div class="container-lg container-cont bg-light h-auto p-0 shadow-lg" id="container-cont">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="/"><img src="/images/logo.webp" alt="zwam" class="img-fluid" width="100vw"></a>
            <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary in-header" id="/" href="/"><i class='fas fas fa-home fa-lg'></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary in-header" id="/links" href="/links"><i class='fas fas fa-link fa-lg'></i> Links</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='fas fas fa-code-branch fa-lg'></i> My Work
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" id="/mcservers" href="/mywork/mcservers"> MC Servers</a>
                            <a class="dropdown-item" id="/websites" href="/mywork/websites"> Websites</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="/mywork" href="/mywork"> Global Information</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary in-header" id="/contact" href="/contact"><i class='fas fas fa-address-card fa-lg'></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex justify-content-between">
                            <a class='nav-link text-primary w-100 in-header' id='/cloud' href='/cloud'><i class='fas fa-cloud fa-lg'></i> Cloud</a> 
                            <a class='nav-external' href='https://cloud.riswick.net/' target="_blank"><i class="fas fa-external-link-alt fa-sm"></i></a>  
                        </div>    
                    </li>
                    <li class="nav-item">
                        <div class="d-flex justify-content-between">
                            <a class='nav-link text-primary w-100 in-header' id='/panel' href='/panel'><i class='fas fas fa-server fa-lg'></i> Panel</a> 
                            <a class='nav-external' href='https://panel.riswick.net' target="_blank"><i class="fas fa-external-link-alt fa-sm"></i></a>  
                        </div>         
                    </li>
                    <?php 
                    /*if ($login) { echo "
                    <li class='nav-item'>
                        <a class='nav-link text-primary' id='/files' href='/files'>Files</a>
                    </li>"; }*/
                    ?>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <!--<li class="nav-item">
                        <?php
                        /*if (!$login) {
                            echo"<a class='nav-link text-primary' id='' href='/login' data-toggle='tooltip' data-placement='left' title='Log In'><i class='fas fa-sign-in-alt fa-lg'></i> Log in</a>";
                        } else {
                            echo"<a class='nav-link text-primary' id='' href='includes/logout.inc' data-toggle='tooltip' data-placement='left' title='Log Out'><i class='fas fa-sign-out-alt fa-lg'></i> Log out</a>";
                        }*/
                        ?>
                    </li>-->
                </ul>
            </div>
        </nav>