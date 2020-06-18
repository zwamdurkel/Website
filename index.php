<?php include('./header.php')?>        
        <!-- Start Content -->
        <img src="images/banner.png" alt="Zwamdurkel's website" class="img-fluid w-100">
        <div class="mx-5">
            <h1>Zwamdurkel's Site</h1>
            <hr class="bg-primary">
        </div>
        <div class="bg-white shadow-lg rounded-lg p-3 mx-5 overlflow-auto">
            <?php
            if ( !$login ) {
                echo"<h2>Wait, What?</h2>
                <hr class='bg-primary'>
                <p>This is Zwamdurkel's personal website. <br></p>
                <p>On this site you'll find many tools.</p>
                <div class='d-flex justify-content-end'>
                    <a href='login' class='btn btn-primary text-white'>Log In <i class='fas fa-sign-in-alt'></i></a>
                </div>";
            } else {
                echo"<h2>Welcome Back!</h2>
                <hr class='bg-primary'>
                <p>You seem to be Zwamdurkel.</p>";
            }
            ?>
        </div>
        <!-- End Content -->
<?php include('./footer.php')?>
