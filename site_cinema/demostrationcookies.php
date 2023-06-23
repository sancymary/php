<?php
$title = "profile";
 session_start();
//pour une seule 


$expiration=time()+30*24*60*60;
setcookie('infos',"je suis un cookie",$expiration);
require_once "inc/function.inc.php";

require_once "inc/header.inc.php";

debug($_COOKIE['infos']);

debug(time());
//debug($_SESSION);
//se

?>
<main>
<?php 
echo'bonjour '.($_SESSION['user']['firstName']);
?> 
</main>