    </div>
    <div class="container-lg py-2 px-5 position-relative d-flex justify-content-center bg-dark">
        <script>
            var date = new Date();
            var year = date.getYear() + 1900;
            document.write("<p class='py-0 my-0 text-white-50'>&copy; " + year + " Zwamdurkel </p>")
        </script>
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
    <script src="js/particles.js"></script>
    <script src="js/app.js"></script>
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