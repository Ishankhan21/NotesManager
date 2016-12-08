<?php
session_start();
class Db extends SQLite3
{
  public $con;
  function __construct()
  {
    $this->open('DB\notes.db');
  }
}

$db=new Db;
?>
