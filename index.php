<?php include('./header.php')?>        
        <!-- Start Content -->
        <img src="images/banner.png" alt="Zwamdurkel's website" class="img-fluid w-100">
        <div class="mx-5">
            <h1>Zwamdurkel's Site</h1>
            <hr class="bg-primary">
        </div>
        <div class="bg-white shadow-lg rounded-lg p-3 mx-md-5">
            <?php
            /*if ( !$login ) {
                echo"<h2>Wait, What?</h2>
                <hr class='bg-primary'>
                <p>This is Zwamdurkel's personal website. <br></p>
                <p>On this site you'll find many tools.</p>
                <div class='d-flex justify-content-end'>
                    <a href='login' class='btn btn-primary text-white disabled'>Log In <i class='fas fa-sign-in-alt'></i></a>
                </div>";
            } else {
                echo"<h2>Welcome Back!</h2>
                <hr class='bg-primary'>
                <p>You seem to be Zwamdurkel.</p>";
            }*/
            ?>
            <div class="row">
                <div class="col-sm d-flex justify-content-between flex-column bg-light mx-3 p-3 rounded-lg border">
                    <div class="">
                        <h2>Hello there</h2>
                        <hr class='bg-primary'>
                        <p>This is Zwamdurkel's personal website. <br></p>
                        <p>On this site you'll find many tools.</p>
                    </div>
                    <div class='d-flex justify-content-end'>
                        <a href='login' class='btn btn-primary text-white disabled'>Log In <i class='fas fa-sign-in-alt text-white-50'></i></a>
                    </div>
                </div>
                <div class="col-sm mt-3 mt-md-0">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner rounded">
                            <div class="carousel-item active">
                            <a href="filerun"><img class="d-block w-100" src="/images/filerun.png" alt="Filerun"></a>          
                            </div>
                            <div class="carousel-item">
                            <a href="panel"><img class="d-block w-100" src="/images/panel.png" alt="Panel"></a>
                            </div>
                            <div class="carousel-item">
                            <a href=""><img class="d-block w-100" src="/images/temp.png" alt="Temp"></a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-3 mx-md-5 my-7">
            <div class="row">
                <div class="col-sm-8 bg-light mx-3 p-3 rounded-lg border">
                    <h2>File Server</h2>
                    <hr class="bg-primary">
                    <blockquote class="text-center blockquote">
                        "Self-Hosted File Sync and Sharing"
                        <footer class="blockquote-footer"><cite title="Source Title">https://filerun.com</cite></footer>
                    </blockquote>
                    <p>
                    Filerun allows you to upload and access files from anywhere. Not only through it's excelent web interface but also through the standalone software that integrates seamlessly in File Explorer. 
                    Currently, my home NAS setup is set to sync with FileRun. This means that all the computers in the house, even thouse without the standalone software, can sync to FileRun.
                    </p> 
                    <p>
                    It's truly a necessity for any computer enthusiast.
                    </p>
                    <div class="d-flex justify-content-end">
                        <a href="files" class="btn btn-primary">FileRun <i class="fas fa-external-link-alt text-white-50"></i></a>
                    </div>
                </div>
                <div class="col-sm d-flex justify-content-center align-items-center m-3">
                    <i class="fas fa-file-alt fa-8x text-primary"></i>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-3 mx-md-5 my-7">
            <div class="row">
                <div class="col-sm d-flex justify-content-center align-items-center m-3">
                    <i class="fas fa-server fa-8x text-primary"></i>
                </div>
                <div class="col-sm-8 bg-light mx-3 p-3 rounded-lg border">
                    <h2>Pterodactyl Panel</h2>
                    <hr class="bg-primary">
                    <blockquote class="text-center blockquote">
                        "Pterodactyl is the open-source game server management panel built with PHP7, Nodejs, and Go. Designed with security in mind"
                        <footer class="blockquote-footer"><cite title="Source Title">https://pterodactyl.io</cite></footer>
                    </blockquote>
                    <p>It certainly works well for me. Compared to all the other game management panel's I've tried, this one is miles ahead of the rest.</p>
                    <div class="d-flex justify-content-end">
                        <a href="panel" class="btn btn-primary">Panel <i class="fas fa-external-link-alt text-white-50"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg p-3 mx-md-5 my-7">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>My work</h2>
                    <hr class="bg-primary">
                </div>
                <div class="col-sm-4 my-md-0 my-3">
                    <div class="card bg-light">
                        <img src="/images/mcserver.png" class="card-img-top" alt="MC Server">
                        <div class="card-body">
                            <h5 class="card-title">MC Servers</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="mywork/mcservers" class="btn btn-primary">More <i class="fas fa-external-link-alt text-white-50"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 my-md-0 my-3">
                    <div class="card bg-light">
                        <img src="/images/websites.png" class="card-img-top" alt="Websites">
                        <div class="card-body">
                            <h5 class="card-title">Websites</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="panel" class="btn btn-primary">More <i class="fas fa-external-link-alt text-white-50"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 my-md-0 my-3">
                    <div class="card bg-light">
                        <img src="/images/discordbot.png" class="card-img-top" alt="Discord Bot">
                        <div class="card-body">
                            <h5 class="card-title">Discord Bot</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="panel" class="btn btn-primary">More <i class="fas fa-external-link-alt text-white-50"></i></a>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-flex mt-3">
                    <a href="mywork" class="mx-auto btn btn-primary">All Projects <i class="fas fa-external-link-alt text-white-50"></i></a>
                </div>
            </div>
        </div>
        <!-- End Content -->
<?php include('./footer.php')?>
