<?php
require('classes\users.php');
require('DB\init.php');


$u=new Users($db);

$u->logout();

?>
