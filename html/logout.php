<?php
// Inialize session
session_start();
// Delete certain session
unset($_SESSION[ 'username' ]);
// Delete all session variables
// session_destroy();
// Jump to login page

 function Redirect($url, $permanent = false ){
    header('Location: ' . $url, true, $permanent ? 301 : 302 );
    exit();
  }
    $url ='../index.php';
      Redirect($url, false );
?>