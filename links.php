<?php 
include('./header.php')
?>        
        <!-- Start Content -->
        <div class="mt-5 mx-0 mx-md-5 p-3">
            <h1>Social Media Links</h1>
                <hr class="bg-primary">
                <div class="row my-5 p-3 bg-white rounded shadow-lg">
                    <div class="w-100">
                        <h3>Click on a picture</h3> 
                        <hr class="bg-primary">
                    </div>
                    <div class="w-100"></div>
                    <div class="list-group list-group-horizontal overflow-auto w-100" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active p-3 discord" id="list-Discord-list" data-toggle="list" href="#list-Discord" role="tab" aria-controls="Discord"><!--Discord --><i class="fab fa-discord fa-6x"></i></a>
                        <a class="list-group-item list-group-item-action p-3 github" id="list-github-list" data-toggle="list" href="#list-github" role="tab" aria-controls="github"><!--Discord --><i class="fab fa-github fa-6x"></i></a>
                        <a class="list-group-item list-group-item-action p-3 reddit" id="list-Reddit-list" data-toggle="list" href="#list-Reddit" role="tab" aria-controls="Reddit"><!--Discord --><i class="fab fa-reddit fa-6x"></i></a>
                        <a class="list-group-item list-group-item-action p-3 twitter" id="list-Twitter-list" data-toggle="list" href="#list-Twitter" role="tab" aria-controls="Twitter"><!--Discord --><i class="fab fa-twitter fa-6x"></i></a>
                        <a class="list-group-item list-group-item-action p-3 youtube" id="list-Youtube-list" data-toggle="list" href="#list-Youtube" role="tab" aria-controls="Youtube"><!--Discord --><i class="fab fa-youtube fa-6x"></i></a>
                    </div>
                    <div class="tab-content mt-2 position-static" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-Discord" role="tabpanel" aria-labelledby="list-Discord-list">
                            <div style="transform: rotate(0);">
                                <h3>Discord 
                                    <a href="javascript:void(0)" class="stretched-link" data-toggle="tooltip" data-placement="bottom" title="Click to Copy!" onclick="copyString('Zwamdurkel#2578')">
                                        <span class="badge badge-discord">Zwamdurkel#2578</span>
                                    </a>
                                </h3>
                                <hr class="bg-primary">
                                <p>Discord is the easiest way to communicate over voice, video, and text, whether you’re part of a school club, a nightly gaming group, a worldwide art community, or just a handful of friends that want to hang out.</p>
                            </div>  
                        </div>
                        <div class="tab-pane fade show" id="list-Twitter" role="tabpanel" aria-labelledby="list-Twitter-list">
                            <div style="transform: rotate(0);">
                                <h3>Twitter 
                                    <a href="https://twitter.com/Zwamdurkel" class="stretched-link" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Click to Open!">
                                        <span class="badge badge-twitter">@Zwamdurkel</span>
                                    </a>
                                </h3>
                                <hr class="bg-primary">
                                <p>Twitter is an American microblogging and social networking service on which users post and interact with messages known as "tweets". Registered users can post, like, and retweet tweets, but unregistered users can only read them.</p>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="twitter-timeline" data-width="500" data-height="1000" data-theme="light" href="https://twitter.com/Zwamdurkel?ref_src=twsrc%5Etfw">Tweets by Zwamdurkel</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="list-github" role="tabpanel" aria-labelledby="list-github-list">
                            <div style="transform: rotate(0);">
                                <h3>Github 
                                    <a href="https://github.com/zwamdurkel" class="stretched-link" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Click to Open!">
                                    <span class="badge badge-github">zwamdurkel</span>
                                    </a>
                                </h3>
                                <hr class="bg-primary">
                                <p>GitHub brings together the world's largest community of developers to discover, share, and build better software. From open source projects to private team repositories, we're your all-in-one platform for collaborative development.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="list-Reddit" role="tabpanel" aria-labelledby="list-Reddit-list">
                            <div style="transform: rotate(0);">
                                <h3>Reddit 
                                    <a href="https://www.reddit.com/user/Zwamdurkel" class="stretched-link" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Click to Open!">
                                    <span class="badge badge-reddit">u/Zwamdurkel</span>
                                    </a>
                                </h3>
                                <hr class="bg-primary">
                                <p>Reddit is a network of communities based on people's interests. Find communities you're interested in, and become part of an online community!</p>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="list-Youtube" role="tabpanel" aria-labelledby="list-Youtube-list">
                            <div class="w-100" style="transform: rotate(0);">
                                <h3>Youtube
                                    <a href="https://www.youtube.com/channel/UCEs4z2ySE5iifeNXVqrU4eQ" class="stretched-link" target="_blank" data-toggle="tooltip" data-placement="bottom" title="Click to Open!">
                                    <span class="badge badge-youtube">Zwamdurkel</span>
                                    </a>
                                </h3>
                                <hr class="bg-primary">
                                <p>YouTube is a video sharing service where users can watch, like, share, comment and upload their own videos. The video service can be accessed on PCs, laptops, tablets and via mobile phones.</p>
                            </div>
                            <div class="d-flex w-100 justify-content-center">
                                <iframe class="rounded-lg shadow-lg mw-100" width="560" height="315" src="https://www.youtube.com/embed/DPnk84ZeuDo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row bg-light rounded shadow-lg p-3 d-none">
                <button class="btn btn-primary social d-flex align-items-center"><i class="fab fa-discord fa-6x"></i><span>Discord: Zwamdurkel#2578</span></button>
                </div>
            </div>
        <!-- End Content -->
<?php include('./footer.php')?>        
