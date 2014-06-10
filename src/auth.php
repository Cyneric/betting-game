<?php
     session_start();

     $hostname = $_SERVER['HTTP_HOST'];
     $path = dirname($_SERVER['PHP_SELF']);

     if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
      header('Location: http://'.$hostname.($path == '/' ? '' : $path).'/login.php');
      exit;
      }
?>