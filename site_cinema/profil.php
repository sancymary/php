<?php
$title = "profile";
require_once "inc/function.inc.php";

require_once "inc/header.inc.php";

if(empty($_SESSION['user'])){
    header('location:authentification.php');
}
 session_start();
//pour une seule 


// $expiration=time()+30*24*60*60;
// setcookie('infos',"je suis un cookie",$expiration);


// debug($_COOKIE['infos']);

// debug(time());
//debug($_SESSION);
//session pour naviger plusieure page avec une compte.

?>
<main>
<?php 
echo'bonjour '.($_SESSION['user']['firstName']);
?> 
</main>