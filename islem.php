<?php 

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
	$girissayac=$giris->rowCount();
	if($girissayac==1){	

		//$_SESSION['kullanici_id']=$kullanicigiriscek['kullanici_id'];
echo "Başarılı Giriş";
		//header("Location:");
		//exit();

	}

	else{
		
		header("Location:login.php?error_code=03");
		exit();
	}

}

?>