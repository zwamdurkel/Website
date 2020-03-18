<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Zwamdurkel">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-lg container-cont bg-light h-auto p-0 shadow-lg">
        <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="zwam" class="img-fluid" width="100vw"></a>
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/" href="/">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/discord" href="/discord">Discord</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-primary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servers
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" id="/jaks" href="/servers/jaks">J.A.K.S.</a>
                        <a class="dropdown-item" id="/build" href="/servers/build">Build Server</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" id="/server-info" href="/server-info">Global Information</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/donate" href="/donate">Donate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/staff" href="/staff">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="/contact" href="/contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <li class="nav-item">
                        <a class="nav-link text-primary" id="" href="#" data-toggle="tooltip" data-placement="left" title="Control Panel"><i class="fas fa-server fa-lg"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <img src="images/banner.png" alt="Zwamdurkel's website" class="img-fluid w-100">
        <!-- Start Content -->

    </div>
    <div class="container-md py-2 px-5 position-relative d-flex justify-content-center bg-dark">
        <script>
            var date = new Date();
            var year = date.getYear() + 1900;
            document.write("<p class='py-0 my-0 text-white-50'>&copy; " + year + " Zwamdurkel </p>")
        </script>
    </div>
    <div id="particles-js"></div>
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
    <script>
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/'));
        var current = document.getElementById(filename);
        current.classList.add("font-weight-bold");
        var page = current.innerHTML + " | Zwamdurkel";
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
    <script>
        window.onscroll = function() {myFunction()};

        var navbar = document.getElementById("navbar");
        var sticky = navbar.offsetTop;
        navbar.style.opacity = 1;
        navbar.style.transition = "opacity 1s";
        if (filename !== "/") {
            navbar.classList.add("shadow"); 
        }

        function myFunction() {
        if (window.pageYOffset >= 100 && window.pageYOffset < 300) {
            navbar.style.opacity = 0;
            navbar.style.transition = "opacity 1s";
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>