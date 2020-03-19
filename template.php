
<?php 
session_start();
if ( !$_SESSION['login'] ) {
    header("Location: login");
} 
include('./header.php')
?>        
        <!-- Start Content -->

        <!-- End Content -->
<?php include('./footer.php')?>        
