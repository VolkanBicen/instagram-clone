
<?php 
ob_start();
session_start();
include 'baglan.php';
include 'header.php';

$listfollow=$db->prepare("SELECT * from user,follow WHERE target_id=user.id and follow.user_id=:id ");
$listfollow -> execute(array(
    'id' =>$_GET['id'],
));

$listfollow=$db->prepare("SELECT * from user,follow WHERE target_id=:id and follow.user_id=user.id ");
$listfollow -> execute(array(
    'id' =>$_SESSION['id'], 
));

?>
<div class=" container-insta">
    <div class="position-r">
        <div class="" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-act modal-lg" role="document">
                <div class="modal-content modal-content-act">
                    <div class="modal-header modal-header-act bg-light-gray">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12 r-p-0">
                             <span class="txt-hover-gray decor-none block pull-left r-m-10">
                                <a href=" <?php echo $_SERVER['HTTP_REFERER'] ?> " class="txt-black">
                                    <i class="fal fa-arrow-left f-s-28" data-dismiss="modal"></i>
                                </a>
                            </span>
                            <span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Takip</strong></span>
                        </div>
                    </div>
                </div>

                <div class="modal-body modal-body-act o-hidden">
                 <?php while ($listfollowResp = $listfollow -> fetch(PDO::FETCH_ASSOC)) {?>
                    <a href="profils.php?id=<?php echo $listfollowResp['id'] ?>">
                        <div class="row b-p-10">
                            <div class="col-md-10 col-xs-9 col-sm-10 clearfix">
                                <div class="avatar-img border-50 border-colored border-white pull-left comment-photo-w">
                                    <figure>
                                        <img src="img<?php echo $listfollowResp['img']?>" class="img-responsive">
                                    </figure>
                                </div>
                                <div class="pull-left l-m-10 comment-txt-w">
                                    <h5 class="block b-m-0 t-m-0 t-p-5"><strong><?php echo $listfollowResp['name']. 
                                    "&nbsp;".$listfollowResp['surname']; ?></strong></h5>
                                </div>
                            </div>

                        </div>
                    </a>
                <?php   } ?>
            </div> 

        </div>
    </div>
</div>
</div>
</div>

