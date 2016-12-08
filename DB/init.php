<?php
/**
 *
 */
session_start();
class Db extends SQLite3
{

  function __construct()
  {
    $this->open('DB\notes.db');
  }
}

$db=new Db;

 ?>
