<?php 
ob_start();
session_start();
include 'baglan.php';

if (isset($_POST ['register'])) {
	
	$email=($_POST['email']);
	$name=($_POST['name']);
	$surname=($_POST['surname']);
	$username=($_POST['username']);
	$password=($_POST['password']);
	$password_tekrar=($_POST['password_tekrar']);
	$register=$db->prepare("select * from user where email=:email or username=:username");
	$register->execute(array(
		'email' => $email,
		'username' => $username,
	));
	$say=$register->rowCount();
	if ($password==$password_tekrar && $say==0) {
		$password=md5($password);
		$kullanicikaydet=$db->prepare("INSERT INTO user SET
			email=:email,
			name=:name,
			surname=:surname,
			username=:username,
			password=:password
			");
		$insert=$kullanicikaydet->execute(array(
			'email' => $email,
			'name' => $name,
			'surname' => $surname,
			'username' => $username,
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
		header("Location:profil.php");
		exit();
	}
	else{	
		header("Location:login.php?error_code=03");
		exit();
	}
}



if (isset($_POST['kaydet'])) {
	$id=$_SESSION['id'];
	$img = $_FILES['dosya']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizad=$benzersizsayi1.$benzersizsayi2;
	$dizin = 'img/';
	$yuklenecek_dosya = $dizin .$benzersizad .basename($_FILES['dosya']['name']);
	$kullanici_fotoyol="/".$benzersizad.$img;
	if (move_uploaded_file($_FILES['dosya']['tmp_name'], $yuklenecek_dosya))
	{
		$guncelle=$db->prepare("UPDATE user SET 
			name=:name,
			surname=:surname,
			email=:email,
			bio=:bio,
			img=:img
			WHERE id=$id");
		$update=$guncelle->execute(array(
			'name' => $_POST['name'],
			'surname' => $_POST['surname'],
			'email' => $_POST['email'],
			'bio' => $_POST['bio'],
			'img'=> $kullanici_fotoyol,
		));
		if($update){
			Header("Location:profil.php");
			exit();
		}else{
			Header("Location:profil.php?error_code=02");
			exit();
		}
	}
	else  {
		$guncelle=$db->prepare("UPDATE user SET 
			name=:name,
			surname=:surname,
			email=:email,
			bio=:bio

			WHERE id=$id");
		$update=$guncelle->execute(array(
			'name' => $_POST['name'],
			'surname' => $_POST['surname'],
			'email' => $_POST['email'],
			'bio' => $_POST['bio'],
		));
		if($update){
			Header("Location:profil.php");
			exit();
		}else{
			Header("Location:profil.php?error_code=02");
			exit();
		}
	}
}

if (isset($_POST['unf'])) {

	$target_id= $_POST['target_id'];

	$unfollow=$db->prepare("DELETE FROM follow where user_id=:user_id and target_id=:target_id");
	$unfollow -> execute(array(
		'user_id' => $_POST['user_id'],
		'target_id' => $_POST['target_id']
		
	));

	if($unfollow){	
		header("Location:profils.php?id=$target_id");
		exit();

	}

	else{
		
		header("Location:login.php?id=hata");
		exit();
	}
}


if (isset($_POST['follow'])) {
	$target_id= $_POST['target_id'];


	$follow=$db->prepare("INSERT INTO follow SET

		user_id=:user_id,
		target_id=:target_id

		");
	$insert=$follow->execute(array(
		'user_id' => $_POST['user_id'],
		'target_id' => $_POST['target_id'],
		

	));

	if ($insert) {
		header("Location:profils.php?id=$target_id");
		exit();
	}
	else{
		header("Location:profil.php?error_code=02");
		exit();
	}
}


?>


