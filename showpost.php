<?php
ob_start();
session_start();
include 'baglan.php';
include 'header.php';

$user = $db->prepare("SELECT * FROM posts WHERE post_id=:id");
$user->execute(array(
    'id' => $_GET['post_id'],
));
$userResponse = $user->fetch(PDO::FETCH_ASSOC);

$post=$db->prepare("SELECT * from posts,user WHERE post_id=:id and posts.user_id=user.id ");
$post->execute(array(
    'id' => $_GET['post_id']
    
)); 
$postResponse=$post->fetch(PDO::FETCH_ASSOC);

$likeCount=$db->prepare("SELECT count(*) as likecount FROM postlike where post_id=:id");
$likeCount->execute(array(
    'id'=> $_GET['post_id']));
$likeCountResp=$likeCount->fetch(PDO::FETCH_ASSOC);

$comment=$db->prepare("SELECT count(*) as commentcount FROM comment where post_id=:id");
$comment->execute(array(
    'id'=> $_GET['post_id']));
$commentResp=$comment->fetch(PDO::FETCH_ASSOC);

$commentuser=$db->prepare("SELECT * FROM comment,user where post_id=:id and comment.user_id=user.id" );
$commentuser->execute(array(
    'id'=> $_GET['post_id']));

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
                            <img src="img <?php echo $postResponse['img'] ?>"  class="img-responsive">
                        </figure>
                    </div>

                    <div class="pull-left lato l-m-10">
                        <h4 class="b-m-0 t-m-0 t-p-7 txt-hover-black">
                            <a href="profils.php?id=<?php echo $postResponse['user_id'] ?>" class="txt-black"><strong><?php echo $postResponse['username'] ?></strong></a>
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

                    </ul>
                </div>
            </div>
            <!-- post açıklama -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="decor-none">
                        <span class="block txt-hover-black text-capitalize mali b-p-5 pointer " data-toggle="modal"
                        data-target=".like"><strong><?php echo $likeCountResp['likecount']." Beğeni" ?></strong></span>

                        <span><strong><?php echo $postResponse['name'] ?> <?php echo $postResponse['surname'] ?></strong></span>

                        <span><?php echo $postResponse['text'] ?></span>


                    </div>
                    <span class="block txt-gray text-capitalize mali pointer" data-toggle="modal"
                    data-target=".comments"><span><?php echo $commentResp['commentcount'] ?></span> Yorumu Gör</span>

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
                           <span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Yorumlar</strong></span>
                       </div>
                   </div>
               </div>

               <div class="modal-body modal-body-act o-hidden">
                <div class="row t-p-10 b-p-10">
                    <div class="col-md-11 col-xs-10 col-sm-11 col-lg-11">
                       <?php while ($commentuserResp = $commentuser -> fetch(PDO::FETCH_ASSOC)) {?>
                        <div class="pull-left">
                            <div class="comment-photo-w comment-border-div bg border-50">
                                <figure class="comment-photo border-white border-50 status-link">
                                    <img src="img/<?php echo $commentuserResp['img'] ?>" alt="">
                                </figure>
                            </div>
                        </div>


                        <div class="pull-left comment-txt-w lato l-m-10">
                            <span class="name"><strong><?php echo $commentuserResp['username'] ?> </strong></span>
                            <span class="l-p-5"><?php echo $commentuserResp['text'] ?></span>
                        </div>
                    <?php } ?>
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
                        <div class="pull-right btn-follow border-5 text-center t-m-10 lato bg-blue txt-white t-p-5 pointer follow"
                        data-num='0'><strong>Follow</strong></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


