<?php
$title = "Inscription";
require_once "inc/functions.inc.php";
require_once "inc/header.inc.php";
if(!empty($_SESSION['user'])){
     header('location:profil.php');
}
//si l'utilisateure est deja connecter il pouura pas avoir accés à la page de inscription
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
     //on stock les  le valeure de nos champs dans des variable et en les passant dans la function trim() 
     $address=trim($_POST['address']);
     $zip=trim($_POST['zip']);
     $city=trim($_POST['city']);
     $country=trim($_POST['country']);
//*******************pour verification*********************** */
                         //pour Lastname
if(!isset($address) || strlen($address) < 5 || strlen($address) > 50){
     $info.=alert(" le adresse  pas valide","danger");

}
if(!isset($zip) || !preg_match('#^[0-9]+$#',$zip) ){
    
     $info.=alert("le telephone doit comporter 5 ou 3  chiffre.","danger");
}


if(!isset($city)|| strlen($city)> 20  ){
     $info.=alert(" le champs de ville n'est pas valide","danger");

}

if(!isset($country)|| strlen($country)< 5 ||strlen($country)> 20  ){
     $info.=alert(" le champs de  country  doit contenir entre 5 et 50 caractere","danger");

}
if(empty($info)){
     
    updateAddress($userId,$address,$zip,$city,$country);//je effectuer la modification 
    header('location:categories.php');   

    }

   }

}
 require_once "inc/header.inc.php";
?>
<main style="background:url(assets/img/masala-walpaper.jpg) no-repeat; background-size: cover; background-attachment: fixed;"> 
   <div class="w-75 m-auto pt-5 mt-5 regisletre" >
          <h1 class="text-center ms-5 p-5">changement address</h1>
         
          <?php
        //    debug($_POST);
               echo  $info;   // pour afficher les messages
          ?>
          <form action="" method="post" class="p-5 formregister" style="background: #7F7F7F;" >
               <div class="row mb-3">
                    <div class="col-12 mb-5">
                         <label for="address" class="form-label mb-3">ville</label>
                         <input type="text" class="form-control fs-5" id="address" name="address">
                    </div>
               </div>
               <div class="row mb-3">
                    <div class="col-md-3">
                         <label for="zip" class="form-label mb-3">Code postale</label>
                         <input type="text" class="form-control fs-5" id="zip" name="zip">
                    </div>
                    <div class="col-md-5">
                         <label for="city" class="form-label mb-3">Cité</label>
                         <input type="text" class="form-control fs-5" id="city" name="city">
                    </div>
                    <div class="col-md-4">
                         <label for="country" class="form-label mb-3">Pays</label>
                         <input type="text" class="form-control fs-5" id="country" name="country">
                    </div>
               </div>
                     
               <div class="row mt-5">
                    <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">submit</button>
                    <!-- <p class="mt-5 text-center">Vous avez dèjà un compte ! <a href="authentification.php" class=" text-danger">connectez-vous ici</a></p> -->
               </div>
          </form>
   </div>



</main>
<?php

     require_once "inc/footer.inc.php";
?>
