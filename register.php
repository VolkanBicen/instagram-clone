
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
          <a href="register.php"><img src="img/Logo.png" alt="Instagram Logo"/></a>
      </nav>

  </div>
  
  <form action="islem.php" method="POST" class="form-horizontal checkout"> 
      <div id="bodyContent" style="margin: 30px;">
        <div class="container-fluid">
           <div class="row">
               <div class="col-sm-6 col-sm-offset-3">
                <?php if ($_GET['error_code']=="01")
                {?>
                 <b style="color:red;">Sunucu Hatası</b>
             <?php }
             elseif ($_GET['error_code']=="02"){?>
                <b style="color:red;">Bu e-mail adresine veya kullanıcı adına ait bir kayıt var</b>
            <?php }
            ?>
            <center>
               <h1>Yeni Hesap Oluştur</h1>
               <div class="form-group">
                   <input type="email" name="email"  class="form-control" placeholder="Email" required autofocus/>
               </div>
               <div class="form-group">
                   <input type="text" name="name"  class="form-control" placeholder="Adınız" required autofocus/>
               </div>
               <div class="form-group">
                   <input type="text" name="surname"  class="form-control" placeholder="Soyadınız" required autofocus/>
               </div>
               <div class="form-group">
                   <input type="text" name="username"  class="form-control" placeholder="Kullanıcı Adınız" required autofocus/>
               </div>
               <div class="form-group">
                   <input type="password" name="password"  class="form-control" placeholder="Parola" required/>
               </div>
               <div class="form-group">
                   <input type="password" name="password_tekrar" class="form-control" placeholder="Parola Tekrar" required/>
               </div>
               <div class="form-group">
                   <button name="register" class="btn btn-lg btn-primary" >Kayıt</button>
               </div>
               <center><h4 id="error"></h4></center>
           </center>
       </div>
   </div>
</div>
</div>
</form>

<br>
<br>
<br>


</body>

<div id="footerContent">
  <?php
  include 'footer.php';  ?>
</div>
