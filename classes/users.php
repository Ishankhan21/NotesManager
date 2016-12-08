<?php
/**
 * User management
 */
class Users
{
  public $name,$email,$password,$con;
  function __construct(Db $db,$n='',$p='',$e='')
  {
    $this->con=$db;
    $this->name=$n;
    $this->password=$p;
    $this->email=$e;
  }
  public function register()
  {
    $sql ="INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
    $stmt=$this->con->prepare($sql);
    $stmt->bindParam(':name',$this->name);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':password',$this->password);

        if ( $stmt->execute()) {
            header("Location:http://localhost/notes-project/Notes/login.php");
            exit;
          }else {
           die('fail');
         }
  }
  public function login()
  {
    $sql="select * from users where name=:name";
    $stmt=$this->con->prepare($sql);
    $stmt->bindParam(':name', $this->name);
    $ret = $stmt->execute();
    $row = $ret->fetchArray(SQLITE3_ASSOC);
    if($row['password']==$this->password){
       $_SESSION['id']=$row['id'];
       header("Location:http://localhost/notes-project/Notes/");
       }else{
        return false;
        }
  }
  public function logout(){
    session_unset();
    session_destroy();
    header("Location:http://localhost/notes-project/Notes");


  }
}
//$u=new Users($db,'test3','test3123456');
//$u->login();


?>
