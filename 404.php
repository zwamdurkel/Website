<?php 
/*if ( !$_SESSION['login'] ) {
    header("Location: login");
} */
include('./header.php')
?>        
        <!-- Start Content -->
        </div>
        <script>
            var container = document.getElementById("container-cont");
            container.classList.remove("container-cont");
        </script>
        <div class="error-page text-light">
        <i class="fas fa-exclamation-circle fa-8x m-3 "></i>
        <h1 class="display-1"><b>404</b></h1>
        <h1 class="display-3" >This page does not exist.</h1>
        <!-- End Content -->
<?php include('./footer.php')?>        