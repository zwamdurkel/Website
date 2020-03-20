<?php
include('./header.php');
if ( isset($_SESSION['login']) && $_SESSION['login'] ) {
    header("Location: /");
}
?>        
        <!-- Start Content -->
            <div class="bg-white shadow-lg mx-5 mt-5 col-md-6 rounded-lg p-3 mx-auto">
                <form method="POST" action="includes/login.inc.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name@example.com" name="email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
                    </div>
                    <div class="form-group form-check d-none">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Log In</button>
                </form>
            </div>
        <!-- End Content --> 
<?php 
if ( isset( $_GET['error'] ) ) {
    $error = $_GET['error'];
    if ( $error == 'emptyfield' ) {
        print"<div class='shadow-lg mx-5 mt-5 col-md-6 col-8 rounded p-3 mx-auto alert alert-danger'>";
        print"You have to fill in every field!";
        print"</div>";
    } elseif ( $error == 'sql' ) {
        print"<div class='shadow-lg mx-5 mt-5 col-md-6 col-8 rounded p-3 mx-auto alert alert-danger'>";
        print"There has been an SQL error!";
        print"</div>";
    } elseif ( $error == 'exist' ) {
        print"<div class='shadow-lg mx-5 mt-5 col-md-6 col-8 rounded p-3 mx-auto alert alert-danger'>";
        print"This user does not exist!";
        print"</div>";
    }
}
?>             
<?php include('./footer.php')?>