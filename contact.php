<?php 
include('./header.php')
?>        
        <!-- Start Content -->
        <?php 
        if ( isset( $_GET['error'] ) ) {
            $error = $_GET['error'];
            if ( $error == 'emptyfield' ) {
                print"<div class='shadow-lg mx-5 mt-5 col-md-6 col-8 rounded p-3 mx-auto alert alert-danger'>";
                print"You have to fill in every field! <i class='far fa-frown'></i>";
                print"</div>";
            } elseif ( $error == 'none' ) {
                print"<div class='shadow-lg mx-5 mt-5 col-md-6 col-8 rounded p-3 mx-auto alert alert-success'>";
                print"Your message has been sent successfully. <i class='far fa-laugh'></i>";
                print"</div>";
            }
        }
        ?>
        <div class="bg-white shadow-lg p-3 mx-md-5 my-5 rounded-lg clearfix">
            <h2 class="text-dark">Contact Form</h2>
            <hr class="bg-primary">
            <form action="/includes/contact.inc.php" method="POST" class="needs-validation" novalidate>
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control bg-light" type="text" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Your email address</label>
                    <input type="email" class="form-control bg-light" id="contact-email" placeholder="name@example.com" name="email" required>
                    <small class="form-text text-muted">We need your email in order to contact you with our reply.</small>
                </div>
                <div class="form-group">
                    <label for="">Subject</label>
                    <input class="form-control bg-light" type="text" placeholder="..." name="subject" required>
                </div>
                <div class="form-group">
                    <label for="">Your message</label>
                    <textarea class="form-control bg-light" id="contact-textarea" rows="5" name="message" required placeholder="Hey Zwam,"></textarea>
                </div>
                <input type="submit" class="btn btn-primary ml-auto float-right">
            </form>
        </div>
        <!-- End Content -->
<?php include('./footer.php')?>        