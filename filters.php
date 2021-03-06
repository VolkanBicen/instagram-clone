<?php
ob_start();
session_start();
include 'baglan.php';

$user=$db -> prepare("SELECT * FROM user WHERE id=:id");
$user -> execute(array(
'id' => $_SESSION['id'],
));

$userResponse = $user -> fetch(PDO::FETCH_ASSOC);


$oneri=$db -> prepare("SELECT * FROM user");
$oneri -> execute();

$oneriall=$db -> prepare("SELECT * FROM user WHERE id !=:id");
$oneriall -> execute(array(
'id'=> $_SESSION['id'],


));

$posts=$db -> prepare("SELECT * FROM posts WHERE user_id=:id");
$posts -> execute(array(
'id' => $_SESSION['id'],
));



?>

<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cookie|Lobster+Two" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
	<link rel="stylesheet"  type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div>
	<div class="container container-insta">
		<div class="row t-p-15 b-p-15 bg-light-gray b-border-gray">
			<div class="col-md-4 col-xs-4 txt-hover-gray decor-none">
				<i class="fal fa-angle-left f-s-28"></i>
			</div>
			<div class="col-md-4 col-xs-4 text-center">
					<span class="lato text-capitalize" ><strong id="get-prof-name"><?php echo $userResponse['name'].
					"&nbsp;".$userResponse['surname'];?></strong></span>
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
				<div class="profil-border-div bg border-50">
					<figure class="profil-photo border-50 border-colored border-white o-hidden status-link ">
						<img src="img<?php echo  $userResponse['img'] ?> " alt="bird" class="fit-cover">
					</figure>
				</div>
			</div>

			<div class="col-md-9 col-xs-8 col-sm-8">
				<div class="row t-p-10">
					<div class="col-md-12 col-xs-12 col-sm-12">

						<div class="row">
							<div class="col-md-4 col-xs-4 col-sm-4 text-center">
								<span class="block lato fs-profil-num"><strong>22125</strong></span>
								<span class="block txt-gray fs-profil-txt">posts</span>
							</div>
							<div class="col-md-4 col-xs-4 col-sm-4 text-center">
									<span class="pointer" data-toggle="modal" data-target=".followers">
										<span class="block lato fs-profil-num"><strong>22125</strong></span>
										<span class="block txt-gray fs-profil-txt pointer" >followers</span>
									</span>
							</div>
							<div class="col-md-4 col-xs-4 col-sm-4 text-center">
									<span class="pointer" data-toggle="modal" data-target=".follow">
										<span class="block lato fs-profil-num"><strong>22125</strong></span>
										<span class="block txt-gray fs-profil-txt pointer">following</span>
									</span>
							</div>
						</div>

						<div class="row profil-top-p">

							<div class="col-md-8 col-xs-6 text-center decor-none txt-hover-black h-30 r-p-0 message-div ">
								<a href="#" class="block b-gray border-5 t-p-5 b-p-5">
									<strong class="txt-black">Message</strong>
								</a>
							</div>

							<!-- Unfollow -->

							<div class="col-md-2 col-xs-3 text-center decor-none txt-hover-black h-30 l-p-0 r-p-0 l-p-5 r-p-5 user-check-div">
									<span href="#" class="txt-black block b-gray border-5 t-p-5 b-p-5 pointer user-check" data-toggle="modal" data-target="#unf-modal">
										<i class="far fa-user f-s-16"></i>
									</span>
							</div>

							<div class="col-md-2 col-xs-3 text-center h-30 l-p-0">
									<span class="block b-gray border-5 t-p-5 txt-black txt-hover-black b-p-5 pointer down">
										<i class="fas fa-caret-down f-s-16 txt-black" ></i>
									</span>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row bg-light-gray b-p-15 t-p-15 none show-hide"><!--  -->
			<div class="clearfix">
				<span class="pull-left mali r-m-10 l-m-10 l-p-5">Önerilenler</span>
				<span class="pull-right mali pointer txt-blue  r-m-10 l-m-10 r-p-5" data-toggle="modal" data-target=".suggested"> Hepsini Gör</span>
			</div>

			<div class="col-md-12 col-xs-12 lato t-m-10 owl-carousel fa-times-par">

				<?php while ($oneriResponse = $oneri -> fetch(PDO::FETCH_ASSOC)) {?>
				<div class="invite-div text-center bg-white remove">
					<div class="t-p-10 r-m-10">
						<i class="fal fa-times position-r pull-right"></i>
					</div>
					<figure class="status-img border-50 m-auto">
						<img src="foto <?php echo $oneriResponse['img'] ?>" alt="bird" class="img-responsive">
					</figure>
					<h5 class="text-capitalize t-p-5 b-p-5"><strong><?php echo $oneriResponse['name'].
							"&nbsp;".$oneriResponse['surname'];?></strong></h5>
					<div class="btn-follow border-5 t-m-10 lato txt-hover-white t-p-5 bg-blue m-auto txt-white follow"><strong>Takip et</strong></div>

				</div>
				<?php
					} ?>


			</div>
		</div>


		<div class="row">
			<div class="col-md-12 col-xs-12 col-sm-12">
				<h5 class="text-capitalize t-p-5 b-p-5"><strong><p><?php echo $userResponse['bio']; ?></p></strong></h5>
			</div>
		</div>


		<div class="row lato t-p-15 b-p-15">
			<div class="col-md-4 col-xs-4 text-center hover-blue">
				<i class="fal fa-th f-s-24 tab-icon txt-gray" id="fa-th"></i>
			</div>
			<div class="col-md-4 col-xs-4 text-center hover-blue">
				<i class="fal fa-th-list f-s-24 tab-icon txt-gray" id="fa-th-list"></i>
			</div>
			<div class="col-md-4 col-xs-4 text-center hover-blue">
				<i class="fal fa-user f-s-24 tab-icon txt-gray" id="fa-user"></i>
			</div>
		</div>



		<div class="row b-m-55 " id="th-div">
			<div class="col-md-12">
				<div class="row">
					<?php while ($postsResponse = $posts -> fetch(PDO::FETCH_ASSOC)) {?>
					<div class="col-md-4 col-xs-4 border-profil l-p-0 r-p-0 o-hidden" data-toggle="modal" data-target=".show-img">

						<figure>

							<img src="posts <?php echo $postsResponse['img']; ?>"   class="img-responsive">

						</figure>

					</div>
					<?php 	} ?>
				</div>
			</div>
		</div>


		<div class="row none" id="th-list-div">
			<div class="col-md-12 col-xs-12 col-sm-12 b-m-70">
				<div class="list-div">

					<!-- post click açılan -->
					<div class="row t-p-15 b-p-15 clearfix">
						<div class="col-md-10 col-xs-10 col-sm-10">

							<div class="avatar-border-div bg border-50 pull-left">
								<figure class="avatar-img border-50 border-colored border-white status-link">
									<img src="img/bird.png" alt="bird" class="img-responsive">
								</figure>
							</div>

							<div class="pull-left lato l-m-10">
								<h4 class="b-m-0 t-m-0 t-p-7 txt-hover-black">
									<a href="#" class="txt-black"><strong>123123123</strong></a>
								</h4>
								<span>Holland, Rotherdam</span>
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
								<img src="img/city.jpg" alt="" class="img-responsive">
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
									<i class="fal fa-comment f-s-24 txt-black" data-toggle="modal" data-target=".comments"></i>
								</li>
								<li>
									<i class="fal fa-location-arrow f-s-24 txt-black" data-toggle="modal" data-target=".send"></i>
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
								<span class="block txt-hover-black text-capitalize mali b-p-5 pointer " data-toggle="modal" data-target=".like"><strong>148 likes</strong></span>
								<span><strong>tmmyolson</strong></span>
								<span><a href="#">#amazing</a></span> <span><a href="#">#travel</a></span> <span><a href="#">#insatagram</a></span> <span><a href="#">#leaf</a></span> <span><a href="#">#style</a></span> <span><a href="#">#nature</a></span><span><a href="#">#plant</a></span> <span><a href="#">#travel</a></span> <span><a href="#">#insatagramplant</a></span> <span><a href="#">#leaf</a></span> <span><a href="#">#green</a></span> <span><a href="#">#lifestyle</a></span>
							</div>
							<span class="block txt-gray text-capitalize mali pointer" data-toggle="modal" data-target=".comments">view all <span>154</span> comments</span>
							<span class="block text-uppercase mali txt-gray t-m-0 f-s-12">3 hours ago </span>
						</div>
					</div>


				</div>


			</div>
		</div>

	</div>
</div>
<!-- home search icon alttaki -->
<div class="b-0 fixed">
	<div class="container container-insta">
		<div class="row t-p-15 b-p-15 txt-hover-black">
			<div class="col-xs-2 col-md-2">
				<a href="#" class="">
					<i class="fal fa-home f-s-24 txt-black bold"></i>
				</a>
			</div>
			<div class="col-xs-3 col-md-2 text-center">
				<a href="#" class="">
					<i class="fal fa-search f-s-24 txt-black bold"></i>
				</a>
			</div>
			<form action="islem.php" method="POST"  enctype="multipart/form-data">

				<div class="col-xs-2 col-md-4 text-center ">
					<div class="text-center">
						<input type="file" class="text-center center-block file-upload" name="dosya" />
						<input type="submit" value="Gönder" />
					</div>
				</div>


			</form>

			<div class="col-xs-3 col-md-2 text-center">
				<a href="#" class="">
					<i class="fal fa-heart f-s-24 txt-black bold"></i>
				</a>
			</div>
			<div class="col-xs-2 col-md-2 text-right">
				<a href="#" class="">
					<i class="far fa-user f-s-24 txt-black bold"></i>
				</a>
			</div>
		</div>
	</div>
</div>


<div class="modal fade first-modal " tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm modal-dialog-center" role="document">
		<div class="modal-content ">
			<ul class="list-unstyled mali l-m-10 r-m-10 t-m-10 b-m-10">
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="#" class="txt-black block">asdgg</a></li>
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="#" class="txt-black block">efsifk</a></li>
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="#" class="txt-black block">sfjfsel</a></li>
				<li class="txt-hover-black t-p-5 b-p-5"><a href="#" class="txt-black block">wfkjvv</a></li>
			</ul>
		</div>
	</div>
</div>



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
							<span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Followers</strong></span>
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
								<h5 class="block b-m-0 t-m-0 t-p-5"><strong>123</strong></h5>
								<span class="block f-s-14">Holland, Rotherdam</span>
							</div>
						</div>
						<div class="col-md-2 col-xs-3 col-sm-2 lato clearfix">
							<div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer" data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
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
							<div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer" data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
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
							<div class="pull-right btn-follow border-5 text-center t-m-10 lato bg-blue txt-white t-p-5 pointer " data-toggle="modal"><strong>Follow</strong></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="position-r">
	<div class="modal modal-act fade follow" tabindex="-1" role="dialog">
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
							<span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Following</strong></span>
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
							<div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer" data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
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
							<div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer" data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
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
							<div class="pull-right btn-follow border-5 text-center t-m-10 lato bg-blue txt-white t-p-5 following pointer " data-toggle="modal" data-target=".user-unf"><strong>Follow</strong></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade second-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<ul class="list-unstyled l-m-10 r-m-10 t-m-10 b-m-10 mali">
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="#" class="txt-black block">Action</a></li>
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="#" class="txt-black block">Another action</a></li>
				<li class="t-p-5 b-p-5 txt-hover-black"><a href="#" class="txt-black block">Something else here </a></li>
				<li class="txt-hover-black t-p-5 b-p-5"><a href="#" class="txt-black block">Separated link</a></li>
			</ul>
		</div>
	</div>
</div>



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
											<span class=" l-p-5 txt-gray pointer"><cite class="wiew-reply">Wiew reply</cite></span>
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
							<div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer" data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
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
							<div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer" data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
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
							<div class="pull-right btn-follow border-5 text-center t-m-10 lato bg-blue txt-white t-p-5 pointer follow" data-num = '0'><strong>Follow</strong></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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
					<?php while ($oneriallResponse = $oneriall -> fetch(PDO::FETCH_ASSOC)) {?>
					<div class="row b-p-10">
						<div class="col-md-10 col-xs-9 col-sm-10 clearfix">
							<div class="avatar-img border-50 border-colored border-white pull-left comment-photo-w">
								<figure>
									<img src="img <?php echo $oneriallResponse['img'] ?> " alt="bird" class="img-responsive">
								</figure>
							</div>
							<div class="pull-left l-m-10 comment-txt-w">
								<h5 class="block b-m-0 t-m-0 t-p-5"><strong> <?php echo $oneriallResponse['name']."&nbsp;".$oneriallResponse['surname'];
										?> </strong></h5>

							</div>
						</div>
						<div class="col-md-2 col-xs-3 col-sm-2 lato clearfix">
							<div class="pull-right btn-follow b-gray border-5 text-center t-m-10 lato t-p-5 following pointer" data-toggle="modal" data-target=".user-unf"><strong>Following</strong></div>
						</div>
					</div>
					<?php
						}
						?>

				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade user-unf" id="unf-modal" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class=" avatar-img border-50 border-colored border-white status-link m-auto">
					<figure>
						<img src="img/bird.png" alt="bird" class="img-responsive">
					</figure>
				</div>
				<div class="t-p-10 l-p-25 r-p-25">
					dvjsfjk c;lvk,sl <strong id="set-prof-name"></strong> ?
				</div>
			</div>

			<div class="text-center">
				<div class="row t-p-10 b-p-10">
					<div class="col-md-6 col-xs-6 col-sm-6 b-right pointer" data-dismiss="modal">Cancel</div>
					<div class="col-md-6 col-xs-6 col-sm-6 pointer unf">Unfollow</div>
				</div>
			</div>
		</div>
	</div>
</div>



<!-- click post -->

<div class="position-r">
	<div class="modal modal-act fade show-img" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-dialog-act modal-lg" role="document">
			<div class="modal-content modal-content-act">
				<div class="modal-header modal-header-act bg-light-gray">
					<div class="row">
						<div class="col-md-12 col-xs-12 col-sm-12 r-p-0">
								<span class="txt-hover-gray decor-none block pull-left r-m-10">
									<i class="fal fa-arrow-left f-s-28" data-dismiss="modal"></i>
								</span>
							<span class="lato text-capitalize mali f-s-18 block pull-left"><strong>Photo</strong></span>
						</div>
					</div>
				</div>
				<div class="modal-body modal-body-act" id='myrow'>

				</div>
			</div>
		</div>
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/insta.js"></script>

</body>
</html>