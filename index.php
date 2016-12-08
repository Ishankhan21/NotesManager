<?php
require('classes\users.php');
require('classes\tasks.php');
require('DB\init.php');
   if (!isset($_SESSION['id'])) {
   header("Location:http://localhost/notes-project/Notes/parallax/index.html");
   }
   if (isset($_GET['as']) && isset($_GET['id'])) {
    $t=new Tasks($db);
    $t->deletenote($_GET['id']);
   }
  if (isset($_SESSION['id'])) {
    $sql="select * from tasks where user_id=:id";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':id',$_SESSION['id']);
    $ret = $stmt->execute();
    $rowitems=array();
    while ($a = $ret->fetchArray(SQLITE3_ASSOC)) {
        $rowitems[]=$a;
     }
  }
?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Notes</title>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="resources\css\materialize.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="resources\css\style.css"  media="screen,projection"/>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style media="screen">
      </style>
    </head>

  <body>
    <?php //if (isset($_SESSION['id'])): ?>
      <main class="waves-effect waves-light">
        <nav class="primary z-depth-2" id="navbar">
            <div class="nav-wrapper container customcontainer">
              <a href="#" class="" style="font-size:40px;">Notes</a>
              <div class="right">
                <a href="logout.php" style="border:1px;font-size:20px">Logout</a>
              </div>
            </div>
        </nav>
      <div class="container">
        <div class="right floattop">
          <a href="add.php" class="btn-floating btn-large waves-effect waves-light pink  hide-on-med-and-down"><i class="material-icons"> add</i></a>
        </div>
     </div>

    <div class="container" style="padding-top:20px;">
         <div class="centercontent">
          <ul class="collapsible popout" data-collapsible="expandable">
          <?php $first=0 ?>
          <?php foreach ($rowitems as $row):?>
          <?php if ($first==0):?>

          <li class="">
              <div class="collapsible-header active">
                  <div class="row">
                    <div class="col s2 l6">
                      <?php echo $row['title']; ?>
                     </div>
                    <div class="col s10 l6">
                      <div class="right">
                        <?php $tag=@unserialize($row['tag']) ?>
                        <?php if ($tag): ?>
                          <div class="chip"><?php echo $tag[0] ?></div>
                          <div class="chip"><?php echo $tag[1] ?></div>
                        <?php else: ?>
                          <div class="chip"><?php echo $row['tag'] ?></div>
                        <?php endif; ?>
                        <span class="switch"><label><input type="checkbox"><span class="lever"></span>done</label></span>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="collapsible-body">
                  <div class="card-panel">
             <span class=""><?php echo $row['note'] ?></span><hr>
           <div class="card-action">
             <a href="index.php?as=delete&id=<?php echo $row['id']?>" class="waves-effect waves-light btn accent"><i class="material-icons left">delete</i>Delete</a>
               </div>
             </div>
           </div>
              </li>
              <?php $first=1 ?>
              <?php  else: ?>
                <li>
                    <div class="collapsible-header">
                        <div class="row">
                          <div class="col s2 l6">
                            <?php echo $row['title']; ?>
                           </div>
                          <div class="col s10 l6">
                            <div class="right">
                              <?php $tag=@unserialize($row['tag']) ?>
                              <?php if ($tag): ?>
                                <div class="chip"><?php echo $tag[0] ?></div>
                                <div class="chip"><?php echo $tag[1] ?></div>
                              <?php else: ?>
                                <div class="chip"><?php echo $row['tag'] ?></div>
                              <?php endif; ?>
                              <span class="switch"><label><input type="checkbox" ><span class="lever" disabled></span>done</label></span>

                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="collapsible-body">
                        <div class="card-panel">
                       <span class=""><?php echo $row['note'] ?></span><hr>
                       <div class="card-action">
                       <a href="index.php?as=delete&id=<?php echo $row['id']?>" class="waves-effect waves-light btn accent"><i class="material-icons left">delete</i>Delete</a>
                     </div>
                   </div>
                 </div>
                </li>
              <?php endif; ?>
          <?php endforeach; ?>
          </ul>
          </div>
        </div>
    </main>
        <?php ?>
  <a id="floatsmall" class="btn-floating btn-large waves-effect waves-light hide-on-large-only accent"><i class="material-icons">add</i></a>

  <script>

$(document).ready(function(){
    $("input").click(function(){

    //    $a=$(this).parents(".right").parent().siblings().css({"text-decoration": "line-through"});
      //  Materialize.toast('Marked as Done', 2000) // 4000 is the duration of the toast
      if ($(this).is( ":checked" ) ) {
        Materialize.toast('Marked as Done', 2000)
        $a=$(this).parents(".right").parent().siblings().css({"text-decoration": "line-through"});
      }else{
        Materialize.toast('Marked as UnDone', 2000)
        $a=$(this).parents(".right").parent().siblings().css({"text-decoration": "none"});
    }
    });
});
</script>
       <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="resources\js\materialize.js"></script>
  </body>
</html>
