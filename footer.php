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
            current.parentElement.parentElement.classList.add("active", "font-weight-bold", "text-white");
        }
    </script>
    <div id="particles-js"></div>
    <div id="particles-overlap"></div>
    <script src="/js/particles.js"></script>
    <script src="/js/app.js"></script>
    <script>
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        var url = window.location.pathname;
        var filename = url.substring(url.lastIndexOf('/'));
        var current = document.getElementById(filename);
        var inner = current.innerHTML; 
        var page = inner.substring(inner.lastIndexOf('> ') + 2) + " | Zwamdurkel";
        document.head.innerHTML += "<title>" + page + "</title>";
        current.innerHTML += "<span class='sr-only'>(current)</span>";
        current.href = "javascript:void(0)";
        // Check if page is in dropdown
        if (current.parentElement.nodeName === "LI") {
            current.parentElement.classList.add("active");
            current.classList.add("font-weight-bold", "text-white");
            current.classList.remove("text-primary");
        } else {
            current.parentElement.parentElement.classList.add("active", "font-weight-bold", "text-white");
            current.classList.add("font-weight-bold", "text-primary");
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
            console.log(window.pageYOffset);
            /*if (window.pageYOffset >= 150 && window.pageYOffset < 300) {
                navbar.style.opacity = 0;
                navbar.style.transition = "opacity .25s ease 0.125s";
            } else if (window.pageYOffset >= 300) {
                navbar.classList.add("fixed-top", "vw-100");
                navbar.classList.add("shadow");
                navbar.style.opacity = 1;
            } else {
                navbar.classList.remove("fixed-top", "vw-100");
                if (filename === "/") {
                    navbar.classList.remove("shadow");
                }
                navbar.style.opacity = 1;
                navbar.style.transition = "opacity 0s";
            }*/
            var scrollpos = (document.documentElement.scrollTop / 2) + "px";
            //console.log(scrollpos);
            document.getElementById("particles-overlap").style.top = scrollpos;
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