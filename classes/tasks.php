<?php
/**
 * Class for Tasks
 */
class Tasks
{
  public $con,$title,$note,$user_id,$tag;
  function __construct(Db $db,$t='',$n='',$u='',$tag='')
  {
    $this->con=$db;
    $this->title=$t;
    $this->note=$n;
    $this->user_id=$u;
    $this->tag=$tag;
  }

  function addnote(){
      $sql ="INSERT INTO tasks (title,note,user_id,tag) VALUES (:title,:note,:user_id,:tag)";
      $stmt=$this->con->prepare($sql);
      $stmt->bindParam(':title',$this->title);
      $stmt->bindParam(':note', $this->note);
      $stmt->bindParam(':user_id',$this->user_id);
      $stmt->bindParam(':tag',$this->tag);

      if ($stmt->execute()) {
        header("Location:http://localhost/notes-project/Notes");
          }else{
         die('fail');
       }
  }
  function deletenote($id){
     $sql="Delete from tasks where id=:id";
     $stmt=$this->con->prepare($sql);
     $stmt->bindParam(':id',$id);

     if ($stmt->execute()) {
       header("Location:http://localhost/notes-project/Notes");
         }else{
        die('fail');
      }
  }
  
}


?>
