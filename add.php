<?php
require('classes\tasks.php');
require('DB\init.php');
 if ( !empty($_GET['title']) && !empty($_GET['note']) ) {
    if(!empty($_GET['tag1'])){
      $t=serialize(array($_GET['tag'],$_GET['tag1']));
    }else {
      $t=$_GET['tag'];
    }
    $task=new Tasks($db,$_GET['title'],$_GET['note'],$_SESSION['id'],$t);
    $task->addnote();
 }

?>
<!DOCTYPE >
<html>
  <head>
    <title>Add</title>

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="resources\css\materialize.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="resources\css\style.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  </head>

  <body class="waves-effect waves-light" style="height:100%;width:100%;">
        <nav class="transparent">
      <div class="nav-wrapper">
        <div class="container">
          <a href="#" class="" style="font-size:30px;color:#424242 !important">ADD</a>
        <ul id="" class="right">
         <li><a href="index.php" class="btn pink">Back</a></li>
        </ul>
      </div>
      </div>
       </nav>
    <div class="demo-ribbon"></div>
    <div class="container">
      <div class="demo-main z-depth-2">
          <div class="container" style="padding-top:2rem">
                <div class="row">
                  <?php if (isset($message)): ?>
                  <p style="color:red;font-size:30px;"> <?php echo $message ?></p>
                  <?php endif; ?>
                </div>
                 <div class="row">
                   <form class="col s12" method="GET" action="add.php">
                     <div class="row">
                       <div class="input-field col s10 l4">
                         <input id="last_name" type="text" class="validate" name="title" required>
                         <label for="last_name">Title</label>
                       </div>
                     </div>
                     <div class="row" style="">
                       <div class="input-field col s10 l4 test123" style="">
                         <input id="" type="text" class="validate" name="tag" required>
                         <label for="last_name">Tag</label>
                       </div><a class="btn-floating btn-flat blue tooltipped newtag" data-position="top" data-delay="50" data-tooltip="Add more Tags" style="top:20px;"><i class="material-icons">add</i><a>
                     </div>
                      <div class="row">
                        <div class="input-field col s10 l4">
                          <textarea id="textarea1" class="materialize-textarea" name="note" required></textarea>
                          <label for="textarea1">Note</label>
                        </div>
                      </div>

                     <div class="row">
                       <div class="col s2">
                         <input type="submit" class="btn blue" value="Add">
                       </div>
                     </div>
                   </form>
                 </div><br>
          </div>
      </div>
    </div>
  </main>

  <script type="text/javascript">
      $(document).ready(function(){
        $a=true;
     $(".newtag").click(function(){
       if($a){
        $( ".test123" ).after('<div class="input-field col s10 l4 test123" style=""><input id="" type="text" class="validate" name="tag1"><label for="last_name">Tag</label></div></div>');
        $('.newtag').addClass("disabled");
        $a=false;
      }
     });
    });
  </script>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="resources\js\materialize.js"></script>
  </body>
</html>
