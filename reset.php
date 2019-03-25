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
    <script>

    </script>
</head>

<body>
    <div id="headerContent">

     <nav class="navbar navbar-default">

      <a href="login.php"><img src="img/Logo.png" alt="Instagram Logo"/></a>

  </nav>
</div>

<div id="bodyContent" style="margin: 30px;">
    <div class="container-fluid">
       <div class="row">
           <div class="col-sm-6 col-sm-offset-3">
               <center>
                   <h1>Şifre Yenile</h1>

                   <div class="form-group">
                       <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus/>
                   </div>

                   <div class="form-group">
                       <input type="password" name="password" id="password" class="form-control" placeholder="Password" required/>
                   </div>

                   <div class="form-group">
                       <input type="password" id="repeat_password" class="form-control" placeholder="Repeat Password" required/>
                   </div>

                   <div class="form-group">
                       <button class="btn btn-lg btn-primary" onclick="onReset()">Reset</button>
                   </div>

                   <center><h4 id="error"></h4></center>
               </center>
           </div>
       </div>
   </div>
</div>

<div id="footerContent">
  <script>
    /*global $*/
    $(function(){$("#footerContent").load("footer.html");});
</script>
</div>
</body>
</html>
