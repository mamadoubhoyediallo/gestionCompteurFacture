<?php

  function getConnection(){
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'examendb';
    $dsn = "mysql:host=$host;dbname=$dbname";
    try {
      $db = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $db;
  }
  /*if (getConnection()) {
    echo "yes";
  }*/
 ?>
