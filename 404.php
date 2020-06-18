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
    <link rel="icon" href="/images/favicon_64.png" type="image/png" sizes="64x64">
    <link rel="icon" href="/images/favicon_32.png" type="image/png">
    <link rel="icon" href="/images/favicon_16.png" type="image/png">
    <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon_180.png">
    <link rel="stylesheet" href="/main.min.css">
    <script src="https://kit.fontawesome.com/be1adcc54d.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./fontawesome/css/pro.min.css">-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <link rel="stylesheet" href="/style.min.css">
</head>
<body>
    <div class="container-lg bg-light h-auto p-0 shadow-lg">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="/"><img src="/images/logo.png" alt="zwam" class="img-fluid" width="100vw"></a>
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/" href="/"><i class='fas fas fa-home fa-lg'></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/links" href="/links"><i class='fas fas fa-link fa-lg'></i> Links</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fas fa-code-branch fa-lg'></i> My Work
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" id="/jaks" href="/servers/jaks">J.A.K.S.</a>
                        <a class="dropdown-item" id="/build" href="/servers/build">Build Server</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="/server-info" href="/server-info">Global Information</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/contact" href="/contact"><i class='fas fas fa-address-card fa-lg'></i> Contact</a>
                    </li>
                    <li class="nav-item">
                        <div class="d-flex justify-content-between">
                            <a class='nav-link text-primary w-100' id='/files' href='/files'><i class='fas fas fa-file-alt fa-lg'></i> Files</a> 
                            <a class='nav-external' href='https://riswick.net/fileserver' target="_blank"><i class="fas fa-external-link-alt fa-sm"></i></a>  
                        </div>    
                    </li>
                    <li class="nav-item">
                        <div class="d-flex justify-content-between">
                            <a class='nav-link text-primary w-100' id='/panel' href='/panel'><i class='fas fas fa-server fa-lg'></i> Panel</a> 
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
    </div>
    <div class="container-lg py-2 px-5 position-relative d-flex justify-content-center bg-dark">
        <script>
            var date = new Date();
            var year = date.getYear() + 1900;
            document.write("<p class='py-0 my-0 text-white-50'>&copy; " + year + " Zwamdurkel </p>")
        </script>
    </div>
    <div class="error-page text-light">
        <i class="fas fa-exclamation-circle fa-8x m-3 "></i>
        <h1 class="display-1"><b>404</b></h1>
        <h1 class="display-3" >This page does not exist.</h1>
    </div>
    <script>
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/'));
        var current = document.getElementById(filename);
        current.classList.add("font-weight-bold", "text-white");
        current.classList.remove("text-primary");
        var inner = current.innerHTML; 
        var page = inner.substring(inner.lastIndexOf('> ') + 2) + " | Zwamdurkel";
        document.head.innerHTML += "<title>" + page + "</title>";
        current.innerHTML += "<span class='sr-only'>(current)</span>";
        current.href = "javascript:void(0)";
        // Check if page is in dropdown
        if (current.parentElement.nodeName === "LI") {
            current.parentElement.classList.add("active");
        } else {
            current.parentElement.parentElement.classList.add("active");
            current.parentElement.parentElement.classList.add("font-weight-bold");
        }
    </script>
    <div id="particles-js"></div>
    <script src="/js/particles.js"></script>
    <script src="/js/app.js"></script>
    <script>
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        function enlarge() {
            console.log("test");
            if ( document.getElementById("files").style.width == "90vw" ) {
                document.getElementById("files").classList.remove("files-large");
                document.getElementById("files").classList.add("files");
                document.getElementById("files").style.width = "100%";
                document.getElementById("enlargebtn").classList.add("fa-expand");
                document.getElementById("enlargebtn").classList.remove("fa-compress");
            } else {
                document.getElementById("files").classList.remove("files");
                document.getElementById("files").classList.add("files-large");
                document.getElementById("files").style.width = "90vw";
                document.getElementById("enlargebtn").classList.remove("fa-expand");
                document.getElementById("enlargebtn").classList.add("fa-compress");
            }
        }    
    </script>
    <script>
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;
        navbar.style.opacity = 1;
        navbar.style.transition = "opacity .25s";
        if (filename !== "/") {
            navbar.classList.add("shadow"); 
        }

        function myFunction() {
        if (window.pageYOffset >= 150 && window.pageYOffset < 400) {
            navbar.style.opacity = 0;
            navbar.style.transition = "opacity .25s";
        } else if (window.pageYOffset >= 300) {
            navbar.classList.add("sticky-top");
            navbar.classList.add("shadow");
            navbar.style.opacity = 1;
        } else {
            navbar.classList.remove("sticky-top");
            if (filename === "/") {
                navbar.classList.remove("shadow");
            }
            navbar.style.opacity = 1;
            navbar.style.transition = "opacity 0s";
        }
        }
    </script>
    <script>
        function copyString(str) {
            var el = document.createElement('textarea');
            el.value = str;
            el.setAttribute('readonly', '');
            el.style = {position: 'absolute', left: '-9999px'};
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
    <script>
    window.cookieconsent.initialise({
    "palette": {
        "popup": {
        "background": "#000000",
        "text": "#2fac35"
        },
        "button": {
        "background": "#2fac35",
        "text": "#000000"
        }
    },
    "theme": "classic",
    "position": "top",
    "static": true,
    "content": {
        "message": "This website uses cookies to ensure you get the best experience on my website."
    }
    });
    </script>
</body>
</html>