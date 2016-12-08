<?php
require('classes\users.php');
require('DB\init.php');



if (!empty($_GET['name']) && !empty($_GET['email']) && !empty($_GET['password'])){
  $u=new Users($db,$_GET['name'],$_GET['password'],$_GET['email']);
  $u->register();

}



?>

<!DOCTYPE html>
<html>
  <head>
    <title>Register</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="resources\css\materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="resources\css\style.css"  media="screen,projection"/>


    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  </head>

  <body class="waves-effect waves-light" style="height:100%;width:100%;">
    <nav class="transparent">
      <div class="nav-wrapper">
        <div class="container">
          <a href="#" class="" style="font-size:30px;color:#424242 !important">Register</a>
        <ul id="" class="right">
         <li><a href="Login.php" class="btn pink"><i class="material-icons left">face</i>Login</a></li>
        </ul>
      </div>
      </div>
    </nav>

    <div class="demo-ribbon"></div>
    <div class="container">
      <div class="demo-main z-depth-2">
          <div class="container" style="padding-top:2rem">
                 <div class="row">
                   <form class="col s12" action="register.php" method="GET">
                     <div class="row">
                        <div class="input-field col s10 l4">
                         <input id="name" type="text" class="validate" name="name" required>
                         <label for="last_name">Username</label>
                       </div>
                     </div>
                     <div class="row">
                       <div class="input-field col s10 l4">
                         <input id="" type="text" class="validate" name="email" required>
                         <label for="last_name">Email</label>
                       </div>
                     </div>
                     <div class="row">
                       <div class="input-field col s10 l4">
                         <input id="" type="password" class="validate" name="password" required>
                         <label for="last_name">Password</label>
                       </div>
                     </div>
                     <div class="row">
                       <div class="col s2">
                         <input type="submit" class="btn blue" value="Register">
                       </div>
                     </div>
                   </form>
                 </div><br>
          </div>
      </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources\js\materialize.js"></script>
  </body>
</html>
