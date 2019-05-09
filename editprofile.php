<?php 
ob_start();
session_start();
include 'baglan.php';

$user=$db -> prepare("SELECT * FROM user WHERE id=:id");
$user -> execute(array(
	'id' => $_SESSION['id'],
));

$userResponse = $user -> fetch(PDO::FETCH_ASSOC);
include 'header.php';
?>


<form id="form" action="islem.php" method="POST" enctype="multipart/form-data">

	<div class="fixed t-0">
		<div class="container container-insta">
			<div class="row t-p-15 b-p-15 bg-light-gray b-border-gray">
				<div class="col-md-4 col-xs-4">
					<a href="profil.php"><span class="lato">Geri</span></a>
				</div>
				<div class="col-md-4 col-xs-4 text-center">
					<span class="lato"><strong>Profili Düzenle</strong></span>
				</div>
					<div class="col-md-4 col-xs-4 text-right">

						<input  type="submit"  name="kaydet" value="Kaydet" class="bg-none b-none" />
					
					</div>	
				
			</div>
		</div>
	</div>

	<div class="t-m-50">
		<div class="container container-insta">
			<div class="row bg-light-gray t-p-15 b-p-15 b-border-gray">
				<div class="col-md-12 col-xs-12 col-sm-12 txt-hover-blue">
					<div class="o-hidden txt-hover-blue decor-none m-auto text-center profil-photo border-50">

						<figure class="">
							<img src="img<?php echo $userResponse['img'] ?>"   class="img-responsive">
						</figure>

					</div>

					<span class="lato text-capitalize txt-blue block text-center t-p-15"><strong></strong></span>

					<div class="text-center">
						<input type="file" class="text-center center-block file-upload" name="dosya" id="dosya" style="display: none;" />
							<label for="dosya"> <span class="lato text-capitalize txt-blue block text-center t-p-15"><strong>Profil Fotoğrafını değiştir </strong></span>  </label>
					</div>

					</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12 col-sm-12">

						<div class="row text-capitalize">
							<div class="col-md-2 col-xs-3 t-p-10 b-p-10">
								<label for="name"><strong>İsim</strong></label>
							</div>
							<div class="col-md-10 col-xs-9 t-p-10 b-p-10">
								<input type="text"   name="name" class="b-input" value="<?php echo  $userResponse['name'] ?>">
							</div>
						</div>

							<div class="row text-capitalize">
							<div class="col-md-2 col-xs-3 t-p-10 b-p-10">
								<label for="name"><strong>Soyisim</strong></label>
							</div>
							<div class="col-md-10 col-xs-9 t-p-10 b-p-10">
								<input type="text"   name="surname" class="b-input" value="<?php echo $userResponse['surname'] ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-md-2 col-xs-3 t-p-10 b-p-10 text-capitalize">
								<label for="email"><strong>e-mail</strong></label>
							</div>
							<div class="col-md-10 col-xs-9 t-p-10 b-p-10">
							<input type="email" name="email"  class="b-input" value="<?php echo  $userResponse['email'] ?>"/>
							</div>

						</div>
						<div class="row b-border-gray text-capitalize">
							<div class="col-md-2 col-xs-3 t-p-10 b-p-10">
								<label for="bio"><strong>biografi</strong></label>
							</div>
							<div class="col-md-10 col-xs-9 t-p-10 b-p-10">
								<input type="text" name="bio"  value="<?php echo  $userResponse['bio'] ?>" class="border-white" >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
		<?php include 'footer.php' ?>
	</body>
	</html>