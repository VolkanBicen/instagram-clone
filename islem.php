<?php 
ob_start();
session_start();
include 'baglan.php';


if (isset($_POST ['register'])) {
	
	$email=($_POST['email']);
	$name=($_POST['name']);
	$surname=($_POST['surname']);
	$userName=($_POST['userName']);
	$password=($_POST['password']);
	$password_tekrar=($_POST['password_tekrar']);



	$register=$db->prepare("select * from user where email=:email or userName=:userName");
	$register->execute(array(
		'email' => $email,
		'userName' => $userName,
	));

	$say=$register->rowCount();


	if ($password==$password_tekrar && $say==0) {

		$password=md5($password);

		$kullanicikaydet=$db->prepare("INSERT INTO user SET

			email=:email,
			name=:name,
			surname=:surname,
			userName=:userName,
			password=:password

			");
		$insert=$kullanicikaydet->execute(array(
			'email' => $email,
			'name' => $name,
			'surname' => $surname,
			'userName' => $userName,
			'password' => $password,

		));

		if ($insert) {
			header("Location:login.php");
			exit();
		}
		else{
			header("Location:register.php?error_code=01"); 
			exit();
		}


	}
	else{
		header("Location:register.php?error_code=02"); 
		exit();
	}



}


if (isset($_POST['giris'])) {

	$email=($_POST['email']);
	$password=md5($_POST['password']);

	$giris=$db->prepare("SELECT * FROM user WHERE email=:email and 
		password=:password ");
	$giris -> execute(array(
		'email' => $email,
		'password' => $password,
		
	));
	$girisResponse=$giris->fetch(PDO :: FETCH_ASSOC);
	$girissayac=$giris->rowCount();
	if($girissayac==1){	

		$_SESSION['id']=$girisResponse['id'];
		$id=$_SESSION['id'];
		header("Location:profil.php");
		exit();

	}

	else{
		
		header("Location:login.php?error_code=03");
		exit();
	}

}

if (isset($_FILES['dosya'])) {

	if (!empty($_FILES)) {
		$hata = $_FILES['dosya']['error'];
		if($hata != 0) {
			Header("Location:profil.php?durum=no1");
			exit();
		} else {
			$name = $_FILES['dosya']["name"];
			$benzersizsayi1=rand(20000,32000);
			$benzersizsayi2=rand(20000,32000);
			$benzersizad=$benzersizsayi1.$benzersizsayi2;

			$dizin = 'posts/';
			$yuklenecek_dosya = $dizin .$benzersizad. basename($_FILES['dosya']['name']);

			if (move_uploaded_file($_FILES['dosya']['tmp_name'], $yuklenecek_dosya))
			{
				$id=$_SESSION['id'];

				$kullanici_fotoyol="/".$benzersizad.$name;

				
				$insert=$db -> prepare("INSERT INTO posts (user_id,img) 

					VALUES ( '$id' ,'$kullanici_fotoyol')");
				$insertPosts=$insert -> execute(array(
				));

				if($insert){
					Header("Location:profil.php?durum=yes");
					exit();
				}else{
					Header("Location:profil.php?durum=no2");
					exit();
				}

			} else {
				Header("Location:profil.php?durum=no3");
				exit();
			}

		}
	}
}







?>

