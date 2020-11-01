<?php
session_start();
   if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
       header('Location:index.php?error=3');
   }

   $email = isset($_SESSION['email']) ? $_SESSION['email']:'';


?>