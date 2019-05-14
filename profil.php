<?php 
ob_start();
session_start();
include 'baglan.php';
include 'header.php';

$user=$db -> prepare("SELECT * FROM user WHERE id=:id");
$user -> execute(array(
	'id' => $_SESSION['id'],
));
$userResponse = $user -> fetch(PDO::FETCH_ASSOC);

$posts=$db -> prepare("SELECT * FROM posts WHERE user_id=:id");
$posts -> execute(array(
	'id' => $_SESSION['id'],
));



$oneri=$db -> prepare("SELECT * from user where id!=:id and id!=(SELECT target_id from follow where user_id =:id");
$oneri -> execute(array(
	'id'=> $_SESSION['id'],
));
$oneriall=$db -> prepare("SELECT * from user where id!=:id and id!=(SELECT target_id from follow where user_id=:id)");
$oneriall -> execute(array(
	'id'=> $_SESSION['id'],
));



$countposts=$db -> prepare("SELECT count(*) as gonderi FROM posts WHERE user_id=:id");
$countposts -> execute(array(
	'id' => $_SESSION['id'],
));
$CountResponse = $countposts -> fetch(PDO::FETCH_ASSOC);

$follow = $db -> prepare ("SELECT count(*) as follow FROM follow WHERE user_id =:id ");
$follow -> execute(array(
	'id' =>$_SESSION['id'], 
));
$followRes = $follow -> fetch(PDO::FETCH_ASSOC);

$followers = $db -> prepare ("SELECT count(*) as followers FROM follow WHERE target_id =:id ");
$followers -> execute(array(
	'id' =>$_SESSION['id'], 
));
$followersRes = $followers -> fetch(PDO::FETCH_ASSOC);

$listfollow=$db->prepare("SELECT * from user,follow WHERE target_id=:id and follow.user_id=user.id ");
$listfollow -> execute(array(
	'id' =>$_SESSION['id'], 
));


?>

<form id="form" action="islem.php" method="POST" enctype="multipart/form-data">

	<div>
		<div class="container container-insta">
			<div class="row t-p-15 b-p-15 bg-light-gray b-border-gray">
				<div class="col-md-4 col-xs-4 txt-hover-gray decor-none">
					<i class="fal fa-angle-left f-s-28"></i>
				</div>
				<div class="col-md-4 col-xs-4 text-center">
					<span class="lato text-capitalize" ><strong id="get-prof-name"><?php echo $userResponse['username']?></strong></span>
				</div>
				<div class="col-md-4 col-xs-4 text-right txt-hover-black">
					<span class="pointer mymodal" data-toggle="modal" data-target=".first-modal">
						<i class="fal fa-ellipsis-h f-s-28"></i>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="">
		<div class="container container-insta">
			<div class="row t-p-15 b-p-15">
				<div class="col-md-3 col-xs-4 col-sm-4">
					<div class="o-hidden txt-hover-blue decor-none m-auto text-center profil-photo border-50">
						<figure class="">
							<img src="img<?php echo  $userResponse['img'] ?>"  class="img-responsive">
						</figure>
					</div>
				</div>

				<div class="col-md-9 col-xs-8 col-sm-8">
					<div class="row t-p-10">
						<div class="col-md-12 col-xs-12 col-sm-12">

							<div class="row">
								<div class="col-md-4 col-xs-4 col-sm-4 text-center">
									<span class="block lato fs-profil-num"><strong> <?php echo  $CountResponse['gonderi'] ?> </strong></span>
									<span class="block txt-gray fs-profil-txt">Gönderi</span>
								</div>
								<div class="col-md-4 col-xs-4 col-sm-4 text-center">

									<span class="pointer" data-toggle="modal" data-target=".followers" >
										<span  class="block lato fs-profil-num"><strong><?php echo $followersRes['followers']?></strong></span>
										<span class="block txt-gray fs-profil-txt pointer" >Takipçi</span>
									</span>

								</div>
								<div class="col-md-4 col-xs-4 col-sm-4 text-center" >
									<a  href="following.php?id=<?php echo $_SESSION['id'] ?>"  >
										<span class="pointer" data-toggle="modal">
											<span style="color: black;" class="block lato fs-profil-num"><strong><?php echo $followRes['follow'] ?></strong></span>
											<span class="block txt-gray fs-profil-txt pointer">Takip</span>
										</span>
									</a>
								</div>
							</div>
							<div class="row profil-top-p">

								<div class="col-md-8 col-xs-6 text-center decor-none txt-hover-black h-30 r-p-0 message-div ">
									<a href="editprofile.php" class="block b-gray border-5 t-p-5 b-p-5">
										<strong class="txt-black">Profil Düzenle</strong>
									</a>
								</div>

<!--
								<div class="col-md-2 col-xs-3 text-center h-30 l-p-0">
									<span class="block b-gray border-5 t-p-5 txt-black txt-hover-black b-p-5 pointer down">
										<i class="fas fa-caret-down f-s-16 txt-black" ></i>
									</span>
								</div>
							-->
						</div>
					</div>
				</div>
			</div>
		</div>

<!-- 
			<div class="row bg-light-gray b-p-15 t-p-15 none show-hide">
				<div class="clearfix">
					<span class="pull-left mali r-m-10 l-m-10 l-p-5">Önerilenler</span>
					<span class="pull-right mali pointer txt-blue  r-m-10 l-m-10 r-p-5" data-toggle="modal" data-target=".suggested"> Hepsini Gör</span>
				</div>

				<div class="col-md-12 col-xs-12 lato t-m-10 owl-carousel fa-times-par">

					<?php while ($oneriallResponse = $oneriall -> fetch(PDO::FETCH_ASSOC)) {?>
						<a href="profils.php?id=<?php echo $oneriallResponse['id'] ?>">
							<div class="invite-div text-center bg-white remove">
								<div class="t-p-10 r-m-10">
									<i class="fal fa-times position-r pull-right"></i> 
								</div>
								<figure class="status-img border-50 m-auto">
									<img src="img <?php echo $oneriallResponse['img'] ?>" alt="bird" class="img-responsive">
								</figure>
								<h5 class="text-capitalize t-p-5 b-p-5"><strong><?php echo $oneriallResponse['name']. 
								"&nbsp;".$oneriallResponse['surname'];?></strong></h5>


							</div>
						</a>
						<?php
					} ?>

				</div>
			</div>
		-->

		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h5 class="text-capitalize t-p-5 b-p-5"><strong><p><u><?php echo $userResponse['name']. 
				"&nbsp;".$userResponse['surname'];?></u></p></strong></h5>

				<h5 class="text-capitalize t-p-5 b-p-5"><strong><p><u><?php echo $userResponse['bio']; ?></u></p></strong></h5>

			</div>
		</div>
		
		<div class="row b-m-55 " id="th-div">
			<div class="col-md-12">
				<div class="row">

					<?php while ($postsResponse = $posts -> fetch(PDO::FETCH_ASSOC)) {?>
						<div class="col-md-4 col-xs-4 border-profil l-p-0 r-p-0 o-hidden" data-toggle="modal" data-target=".show-img">

							<figure>
								<a href="showpost.php?post_id=<?php echo $postsResponse['post_id']?>">
									<img src="posts <?php echo $postsResponse['post_img']; ?> " class="img-responsive2">
								</a>
							</figure>

						</div>
					<?php 	} ?>
				</div>
			</div>
		</div>



	</div>
</div>
<!-- home search icon alttaki -->
<?php include 'footer.php' ?>


<div class="modal fade first-modal " tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm modal-dialog-center" role="document">
		<div class="modal-content ">
			<ul class="list-unstyled mali l-m-10 r-m-10 t-m-10 b-m-10">
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="logout.php" class="txt-black block">Çıkış Yap</a></li>
			</ul>
		</div>
	</div>
</div>


<!-- show followers -->

<div class="position-r">
	<div class="modal modal-act fade followers" tabindex="-1" role="dialog">
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
							<span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Takipçi</strong></span>
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
										"&nbsp;".$listfollowResp['surname']?></strong></h5>

									</div>

								</div>

							</div>
						</a>
					<?php 	} ?>
				</div> 


			</div>
		</div>	
	</div>
</div>





<div class="modal fade second-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<ul class="list-unstyled l-m-10 r-m-10 t-m-10 b-m-10 mali">
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="logout.php" class="txt-black block">Çıkış Yap</a></li>
				
			</ul>
		</div>
	</div>
</div>






<!-- 
	<div class="position-r">
		<div class="modal modal-act fade suggested" tabindex="-1" role="dialog">
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
								<span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Önerilenler</strong></span>
							</div>
						</div>
					</div>
	
					<div class="modal-body modal-body-act o-hidden">
						<?php while ($ores = $oneri -> fetch(PDO::FETCH_ASSOC)) {?>
							<a href="profils.php?id=<?php echo $ores['id'] ?>">
								<div class="row b-p-10">
									<div class="col-md-10 col-xs-9 col-sm-10 clearfix">
										<div class="avatar-img border-50 border-colored border-white pull-left comment-photo-w">
											<figure>
												<img src="img <?php echo $ores['img'] ?> " alt="bird" class="img-responsive">
											</figure>
										</div>
										<div class="pull-left l-m-10 comment-txt-w">
											<h5 class="block b-m-0 t-m-0 t-p-5"><strong> <?php echo $ores['name']."&nbsp;".$ores['surname']; 
											?> </strong></h5>

										</div>
									</div>

								</div>
							</a>
							<?php
						}
						?>

					</div> 


				</div>
			</div>
		</div>
	</div>

-->




</html>
</form>

