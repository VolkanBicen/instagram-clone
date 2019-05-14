
<!doctype html>
<html lang="en" ng-app>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- COMMON STYLES -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/main_style.css">
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./img/favicon.ico" type="image/x-icon">
    <!-- COMMON SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div id="headerContent">
    	<nav class="navbar navbar-default">
          <a href="login.php"><img src="img/Logo.png" alt="Instagram Logo"/></a>
      </nav>

  </div>
  <form action="islem.php" method="POST" class="form-horizontal checkout"> 
    <div id="bodyContent" style="margin: 30px;">
        <div class="container-fluid">
        	<div class="row">
               <div class="col-sm-6 col-sm-offset-3">

                <?php if ($_GET['error_code']=="03")
                {?>
                   <b style="color:red;">Kullanıcı Bulunamadı</b>
               <?php }
               ?>
               <center>
                   <h1>Giriş Yap</h1>
                   <div class="form-group">
                       <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus/>
                   </div>
                   <div class="form-group">
                       <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
                   </div>
                   <div class="form-group">
                       <button class="btn btn-lg btn-primary" name="giris">Beni içeri al</button>
                   </div>
                   <br>
                   <a href="register.php" class="text-center">Yeni hesap oluştur</a></br>
                   <a href="yapim.html" class="text-center">Şifremi unuttum</a>
                   <center><h4 id="error"></h4></center>
               </center>
           </div>
       </div>
   </div>
</form>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


</body>
</html>

<div id="footerContent">
   <?php

   include 'footer.php';  ?>
</div>
