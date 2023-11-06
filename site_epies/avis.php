<?php
$title = "avis";
require_once "inc/functions.inc.php";
require_once "inc/header.inc.php";

$date= date("Y-m-d H:i:s");
session_start();
$userId = $_SESSION['user']['id_user']; 
?>
<?php
$info ='';
if(!empty($_POST)){
debug($_POST);
    $varif=true;
    foreach($_POST as $key => $value){
        if(empty(trim($value))){
            $varif= false;

        }
    }
    if(!$varif){//tous le champs vide et alerter le message
     $info=alert("veuiller renseigner tous le champs","danger");
}else{
     //on stock les  le valeure de nos champs dans des variable et en les passant dans la function trim()+
    
     
     $commentaire=trim($_POST['commentaire']);
    
     
//*******************pour verification*********************** */
                
if(strlen($commentaire)< 3 ){
              
    $info.= alert("il faut que la description dépasser 50 caractere","danger");

}        
if(empty($info)){
    
     $commentaire=htmlentities($commentaire);
    
    
     // debug($_SESSION);
     debug($userId);

     
       
         
           $result=inscriptionAvis($userId,$commentaire,$date);

          $info=alert('merci pour votre commentaire','success');
         

    }

   }

}
 require_once "inc/header.inc.php";
?>

<main class="container">
  <div class="row">
        
       <div class="col-sm-12 col-md-6 col-lg-8 m-auto text-dark">
             <div class="w-75 m-auto p-5" style="background: rgba(248, 232, 238, 0.9);">
                    <h2 class="text-center mb-5 p-3">Avis de nos clients</h2>
                    <?php
                         echo  $info;   
                    ?>
                    <form action="" method="post" class="p-5" >
                         
                         <div class="row mb-3">
                              <div class="col-12 mb-5">
                                   <label for="commentaire" class="form-label mb-3">commentaire</label>
                                   <textarea class="form-control fs-5" id="commentaire" name="commentaire" ></textarea>
                              </div>
                             
                              
                         </div>
                         <div class="row mt-5">
                              <button class="w-25 m-auto btn btn-danger btn-lg fs-5 box" type="submit">submit</button>
                         </div>
                    </form>
             </div>
       </div>
  </div>



</main>
<?php

     require_once "inc/footer.inc.php";
?>
