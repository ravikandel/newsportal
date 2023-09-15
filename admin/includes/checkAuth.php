<?php 

       $decryptedToken = json_decode(base64_decode($_SESSION['token']), true);
       if  (($decryptedToken['exp'] <= time()) || (strlen($_SESSION['login'])) == 0)
       {
           header('location:logout.php');
       }

?>