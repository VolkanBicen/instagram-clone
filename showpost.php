<?php
ob_start();
session_start();
include 'baglan.php';

$user = $db->prepare("SELECT * FROM posts WHERE post_id=:id");
$user->execute(array(
    'id' => $_GET['id'],
));
$userResponse = $user->fetch(PDO::FETCH_ASSOC);


$post=$db->prepare("SELECT * from posts,user WHERE post_id=:id and posts.user_id=user.id ");
$post->execute(array(
    'id' => $_GET['id']
    
)); 
$postResponse=$post->fetch(PDO::FETCH_ASSOC);

include 'header.php';
?>


    <div class="">
        <div class="container container-insta">
            <div class="row t-p-15 b-p-15">

                <div class="position-r">
                    <div class="row">
                        <div class="col-md-14 col-xs-12 col-sm-12 r-p-0">
                            <span class="txt-hover-gray decor-none block pull-left r-m-10">
                                <a href="profil.php">
                                   <i class="fal fa-arrow-left f-s-28" data-dismiss="modal"></i>
                               </a>
                           </span>
                       </div>
                   </div>
               </div>

               <div
               class="modal-body modal-body-act" id='myrow'>
           </div>
           <div class="col-md-12 col-xs-12 col-sm-12 b-m-70">

            <!-- post click açılan -->
            <div class="row t-p-15 b-p-15 clearfix">
                <div class="col-md-10 col-xs-10 col-sm-10">

                    <div class="avatar-border-div  status-img border-50 m-autoo pull-left">
                        <figure class="avatar-img border-50 border-colored border-white status-link">
                            <img src="img <?php echo $postResponse['img'] ?>" alt="bird" class="img-responsive">
                        </figure>
                    </div>

                    <div class="pull-left lato l-m-10">
                        <h4 class="b-m-0 t-m-0 t-p-7 txt-hover-black">
                            <a href="#" class="txt-black"><strong><?php echo $postResponse['username'] ?></strong></a>
                        </h4>
                    </div>

                </div>
                <div class="col-md-2 col-xs-2 t-p-13 text-right col-sm-2 dropdown">
                    <i class="fal fa-ellipsis-h f-s-28 mymodal" data-toggle="modal" data-target=".second-modal"></i>
                </div>
            </div>
            <!-- post click açılan photo -->
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12 r-p-0 l-p-0">
                    <figure>
                        <img src="posts <?php echo $postResponse['post_img'] ?>" alt="" class="img-responsive">
                    </figure>
                </div>
            </div>
            <!-- like  icon -->
            <div class="row t-p-15 b-p-10 txt-hover-black">
                <div class="col-xs-6">
                    <ul class="list-inline b-m-0">
                        <li>
                            <i class="fal fa-heart f-s-24 txt-black change-col"></i>
                        </li>
                        <li>
                            <i class="fal fa-comment f-s-24 txt-black" data-toggle="modal"
                            data-target=".comments"></i>
                        </li>
                        <li>
                            <i class="fal fa-location-arrow f-s-24 txt-black" data-toggle="modal"
                            data-target=".send"></i>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-offset-4 col-xs-2 text-right">
                    <i class="fal fa-bookmark f-s-28 txt-black change-col"></i>
                </div>
            </div>
            <!-- post açıklama -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="decor-none">
                        <span class="block txt-hover-black text-capitalize mali b-p-5 pointer " data-toggle="modal"
                        data-target=".like"><strong>148 likes</strong></span>
                        <span><strong>tmmyolson</strong></span>
                        <span><a href="#">#amazing</a></span> <span><a href="#">#travel</a></span> <span><a
                            href="#">#insatagram</a></span>
                            <span><a href="#">#leaf</a></span> <span><a href="#">#style</a></span> <span><a
                                href="#">#nature</a></span><span><a href="#">#plant</a></span> <span><a
                                    href="#">#travel</a></span>
                                    <span><a href="#">#insatagramplant</a></span> <span><a href="#">#leaf</a></span> <span><a
                                        href="#">#green</a></span> <span><a href="#">#lifestyle</a></span>
                                    </div>
                                    <span class="block txt-gray text-capitalize mali pointer" data-toggle="modal"
                                    data-target=".comments">view all <span>154</span> comments</span>
                                    <span class="block text-uppercase mali txt-gray t-m-0 f-s-12">3 hours ago </span>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
                <!-- home search icon alttaki -->
             <?php include 'footer.php' ?>
                <!-- post comment-->
                <div class="position-r">
                    <div class="modal modal-act fade comments" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-act modal-lg" role="document">
                            <div class="modal-content modal-content-act">
                                <div class="modal-header modal-header-act bg-light-gray">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 col-sm-12 r-p-0">
                                            <span class="txt-hover-gray decor-none block pull-left r-m-10">
                                               <i class="fal fa-arrow-left f-s-28" data-dismiss="modal"></i>
                                           </span>
                                           <span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Commnets</strong></span>
                                       </div>
                                   </div>
                               </div>
                               <div class="modal-body modal-body-act o-hidden">
                                <div class="row b-border-gray b-p-10">
                                    <div class="col-md-11 col-xs-10 col-sm-11 col-lg-11 clearfix">
                                        <div class="comment-photo-w comment-border-div bg border-50 pull-left">
                                            <figure class="comment-photo border-white border-50 status-link">
                                                <img src="img/photo1.png" alt="">
                                            </figure>
                                        </div>
                                        <div class="lato l-m-10 comment-txt-w pull-left">
                                            <span class="name"><strong>ygjrre</strong></span>
                                            <span class="l-p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia iste quidem eius corporis possimus quo tempora excepturi laudantium pariatur, ullam autem rerum vero illum labore velit cum deserunt natus laboriosam? . </span>
                                            <div class="clearfix txt-gray mali">
                                                <span class="block pull-left t-p-5 b-p-5">2h</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-2 col-sm-1 col-lg-1 text-right">
                                        <i class="fal fa-heart f-s-18 change-col txt-gray"></i>
                                    </div>
                                </div>
                                <div class="row t-p-10 b-p-10">
                                    <div class="col-md-11 col-xs-10 col-sm-11 col-lg-11">
                                        <div class="pull-left">
                                            <div class="comment-photo-w comment-border-div bg border-50">
                                                <figure class="comment-photo border-white border-50 status-link">
                                                    <img src="img/photo2.png" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="pull-left comment-txt-w lato l-m-10">
                                            <span class="name"><strong>gvrdh</strong></span>
                                            <span class="l-p-5">Lorem ipsum dolor</span>
                                            <div class="clearfix txt-gray mali t-p-5 b-p-5">
                                                <span class="block pull-left">2h</span>
                                                <span class="block pull-left l-p-15">1 like</span>
                                                <span class="block pull-left l-p-15 reply pointer">Reply</span>
                                            </div>
                                            <div class="">
                                                <span class="w-20 b-border-gray inline b-m-3"></span>
                                                <span class="inline l-p-5 txt-gray pointer"><cite>Wiew reply</cite></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-xs-2 col-sm-1 text-right col-lg-1">
                                        <i class="fal fa-heart f-s-18 change-col txt-gray"></i>
                                    </div>
                                </div>
                                <div class="row t-p-10 b-p-10">
                                    <div class="col-md-11 col-xs-10 col-sm-11 col-lg-11 clearfix">
                                        <div class="comment-photo-w comment-border-div bg border-50 pull-left">
                                            <figure class="comment-photo border-white border-50 status-link">
                                                <img src="img/photo2.png" alt="">
                                            </figure>
                                        </div>
                                        <div class="pull-left comment-txt-w lato l-m-10">
                                            <div>
                                                <span class="name"><strong>tonfrg</strong></span>
                                                <span class="l-p-5">Lorem ipsum </span>
                                                <div class="clearfix txt-gray mali t-p-5 b-p-5">
                                                    <span class="block pull-left">2h</span>
                                                    <span class="block pull-left l-p-15">1 like</span>
                                                    <span class="block pull-left l-p-15 reply pointer">Reply</span>
                                                </div>
                                            </div>
                                            <div class="wiew-reply-par">
                                                <div class="row">
                                                    <div class="col-md-12 col-xs-12">
                                                        <span class="w-20 b-border-gray inline b-m-3"></span>
                                                        <span class=" l-p-5 txt-gray pointer"><cite
                                                            class="wiew-reply">Wiew reply</cite></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-xs-2 col-sm-1 text-right col-lg-1">
                                            <i class="fal fa-heart txt-gray change-col f-s-18"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer modal-footer-act">
                                    <div class="row">
                                        <div class="col-md-1 col-xs-2 col-sm-1 b-m-10">
                                            <div class="avatar-img o-hidden border-50">
                                                <figure>
                                                    <img src="img/photo2.png" alt="">
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-md-10 col-xs-8 col-sm-10 iphone-l-p ">
                                            <form action="submit mali">
                                                <input type="text" class="w-100 b-none t-m-15 write-name" placeholder="Add comment">
                                            </form>
                                        </div>
                                        <div class="col-md-1 col-xs-2 col-sm-1 l-p-0">
                                            <button type="submit" class="b-none bg-white txt-blue t-m-15">Post</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- post like -->
                <div class="position-r">
                    <div class="modal modal-act fade like" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-act modal-lg" role="document">
                            <div class="modal-content modal-content-act">
                                <div class="modal-header modal-header-act bg-light-gray">
                                    <div class="row">
                                        <div class="col-md-12 col-xs-12 col-sm-12 r-p-0">
                                            <span class="txt-hover-gray decor-none block pull-left r-m-10">
                                               <a href="#" class="txt-black">
                                                  <i class="fal fa-arrow-left f-s-28" data-dismiss="modal"></i>
                                              </a>
                                          </span>
                                          <span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Like</strong></span>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-body modal-body-act o-hidden">
                                <div class="row b-p-10">
                                    <div class="col-md-10 col-xs-9 col-sm-10 clearfix">
                                        <div class="avatar-img border-50 border-colored border-white pull-left comment-photo-w">
                                            <figure>
                                                <img src="img/bird.png" alt="bird" class="img-responsive">
                                            </figure>
                                        </div>
                                        <div class="pull-left l-m-10 comment-txt-w">
                                            <h5 class="block b-m-0 t-m-0 t-p-5"><strong>tmmyolson</strong></h5>
                                            <span class="block f-s-14">Holland, Rotherdam</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-3 col-sm-2 lato clearfix">
                                        <div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer"
                                        data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
                                    </div>
                                </div>
                                <div class="row b-p-10">
                                    <div class="col-md-10 col-xs-9 col-sm-10 clearfix">
                                        <div class="avatar-img border-50 border-colored border-white pull-left comment-photo-w">
                                            <figure>
                                                <img src="img/bird.png" alt="bird" class="img-responsive">
                                            </figure>
                                        </div>
                                        <div class="pull-left l-m-10 comment-txt-w">
                                            <h5 class="block b-m-0 t-m-0 t-p-5"><strong>tmmyolson</strong></h5>
                                            <span class="block f-s-14">Holland, Rotherdam</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-3 col-sm-2 lato clearfix">
                                        <div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer"
                                        data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
                                    </div>
                                </div>
                                <div class="row b-p-10">
                                    <div class="col-md-10 col-xs-9 col-sm-10 clearfix">
                                        <div class="avatar-img border-50 border-colored border-white pull-left comment-photo-w">
                                            <figure>
                                                <img src="img/bird.png" alt="bird" class="img-responsive">
                                            </figure>
                                        </div>
                                        <div class="pull-left l-m-10 comment-txt-w">
                                            <h5 class="block b-m-0 t-m-0 t-p-5"><strong>tmmyolson</strong></h5>
                                            <span class="block f-s-14">Holland, Rotherdam</span>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-3 col-sm-2 lato clearfix">
                                        <div class="pull-right btn-follow border-5 text-center t-m-10 lato bg-blue txt-white t-p-5 pointer follow"
                                        data-num='0'><strong>Follow</strong></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


