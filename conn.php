<?php

  $host = "localhost";
  $user = "root";
  $pass = "";
  $db   = "php_codeigniter";
  $conn = mysqli_connect($host, $user, $pass, $db);
  if( !$conn ) {
    die("Unable to connect");
  }