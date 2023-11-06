<?php
$title = "Inscription";
require_once "inc/functions.inc.php";
require_once "inc/header.inc.php";
if(!empty($_SESSION['user'])){
     header('location:profil.php');
}
//si l'utilisateure est deja connecter il pouura pas avoir accés à la page de inscription
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
     $lastName=trim($_POST['lastName']);
     $firstname=trim($_POST['firstName']);
     $pseudo=trim($_POST['pseudo']);
     $email=trim($_POST['email']);
     $phone=trim($_POST['phone']);
     $mdp=trim($_POST['mdp']);
     $confirmMdp=trim($_POST['confirmMdp']);
     $address=trim($_POST['address']);
     $zip=trim($_POST['zip']);
     $city=trim($_POST['city']);
     $country=trim($_POST['country']);
//*******************pour verification*********************** */
                         //pour Lastname
if(!isset($lastName)|| strlen($lastName)< 3 || preg_match('/[0-9]+/',$lastName)){
     $info.=alert(" le champs nom pas valide","danger");
}
                          //pour firstname
if(!isset( $firstname)|| strlen($firstname)< 3 || preg_match('/[0-9]+/', $firstname)){
     $info.=alert(" le champs prenom pas valide","danger");
}
               //pour pseudo
if(!isset($pseudo)|| strlen($pseudo)< 3 ){
     $info.=alert(" le champs pseudo pas valide","danger");

}
                    //pour mot de passe
if(!isset($mdp) || strlen($mdp)< 5 || strlen($mdp) > 15){
     $info.=alert(" le champs mdp pas valide","danger");

}
                     //pour confirm mot de passe
if(!isset($confirmMdp)||  $mdp!== $confirmMdp){
     $info.=alert(" le champs mdp et la conformation doit etre identiques","danger");
     //c'est champs on enregistre pas le BDD,juste on verifier le mop
}
                          //pour email

if(!isset($email)|| strlen ($email) > 20||!filter_var($email,FILTER_VALIDATE_EMAIL) ){
     $info.=alert(" l'email n'est pas valide","danger");
}

if(!isset( $phone) || !preg_match('#^[0-9]+$#', $phone) ){
     // / preg_match vérifie si le code postal correspond à l'expression régulière précisée. 
               /* La regex s'écrit entre #
               Le ^ définit le début de l'expression
               Le $ définit la fin de l'expression     
               [0-9] définit l'intervalle des chiffres autorisés
               si je met{10} c'est que je  définit que l'on en veut 10 précisément
               */
     $info.=alert(" le telephone doit comporter 10 chiffre.","danger");
}



if(!isset($address) || strlen($address) < 5 || strlen($address) > 50){
     $info.=alert(" le adresse  pas valide","danger");

}

if(!isset($zip) || !preg_match('#^[0-9]+$#',$zip) ){
     // / preg_match vérifie si le code postal correspond à l'expression régulière précisée. 
               /* La regex s'écrit entre #
               Le ^ définit le début de l'expression
               Le $ définit la fin de l'expression     
               [0-9] définit l'intervalle des chiffres autorisés
             si je met{5} c'est que je définit que l'on en veut 5 précisément
               */
     $info.=alert("le telephone doit comporter 5 ou 3  chiffre.","danger");
}


if(!isset($city)|| strlen($city)> 20  ){
     $info.=alert(" le champs de ville n'est pas valide","danger");

}

if(!isset($country)|| strlen($country)< 5 ||strlen($country)> 20  ){
     $info.=alert(" le champs de  country  doit contenir entre 5 et 50 caractere","danger");

}


if(empty($info)){
     //avant de faire quoi que soit je verifier que l'addresse mail et pseudo n'existe pas dans la bdd de cette facon j'eviter l'inserction de plusieure utilisateure avec le meme pseudo/ou la meme adresse mail


     //je verifie dans la BDD l'email

     $emailExist=checkEmailUser($email);
    //  // debug(isset($emailExist));
     if($emailExist){ //si la addresse mail existe dans bdd
          $info=alert("l'addresse mail deja existe","danger");

     }
    //  //je verifie dans la BDD l'PSEUDO
          $pseudoExist = checksudouser($pseudo);
          if($pseudoExist){ //si l'addresse mail existe dans bdd
               $info=alert("l'pseudo deja existe","danger");
     }
     if(empty($info)){
          $mdp = password_hash($mdp,PASSWORD_DEFAULT);
          // cette fonction prédéfinie permet de hasher le mot de passe : générer une chaîne de caractére unique à partire d'une entrée. c'est un mécanisme unidirectionnelle dont l'utilité est de ne pas déchifré un hash Il faudra lors de la connexion comparer le hash de la BDD avec celui du mdp de l'internaute.
          // PASSWORD_DEFAULT c'est un paramètre qui indique l'alogorithme utilisé pour effectuer le hashage c'est le plus recommandé
          //pour password securisation
          //pour moi md1 pas conseille car on peut voir nos 
          $result=inscriptionUsers($firstname,$lastName,$pseudo,$mdp,$email,$phone,$address,$zip,$city,$country);
//// j'insére mon inscription avec la fonction inscriptionUsers() créée dans le fichier fonctions.php
          $info=alert('vous etes bien iscrit, vous pouvez vous connecter','success');
         }

    }

   }

}
 require_once "inc/header.inc.php";
?>

<main style="background:url(assets/img/masala-walpaper.jpg) no-repeat; background-size: cover; background-attachment: fixed;">
   
   <div class="w-75 m-auto pt-5 mt-5 regisletre" >
          <h1 class="text-center ms-5 p-5">Créer un compte</h1>
          <p class="text-center">Merci de renseigner les informations ci-dessous pour créer votre compte.</p>
          <?php
        //    debug($_POST);
               echo  $info;   // pour afficher les messages
          ?>
          <form action="" method="post" class="p-5 formregister" style="background: #F8E8EE;" >
               <div class="row mb-3">
                     <div class="col-sm-12 col-md-6 mb-5">
                         <label for="lastName" class="form-label mb-3">Nom</label>
                         <input type="text" class="form-control fs-5" id="lastName" name="lastName">
                     </div>
                     <div class="col-md-6 mb-5">
                         <label for="firstName" class="form-label mb-3">Prenom</label>
                         <input type="text" class="form-control fs-5" id="firstName" name="firstName" >
                     </div>
               </div>
               <div class="row mb-3">
                    <div class="col-md-4 mb-5">
                         <label for="pseudo" class="form-label mb-3">Pseudo</label>
                         <input type="text" class="form-control fs-5" id="pseudo" name="pseudo">
                    </div>
                    <div class="col-md-4 mb-5">
                         <label for="email" class="form-label mb-3">Email</label>
                         <input type="text" class="form-control fs-5" id="email" name="email" placeholder="exemple.email@exemple.com">
                    </div>
                    <div class="col-md-4 mb-5">
                         <label for="phone" class="form-label mb-3">Téléphone</label>
                         <input type="text" class="form-control fs-5" id="phone" name="phone">
                    </div>
                     
               </div>
               <div class="row mb-3">
                    <div class="col-md-6 mb-5">
                         <label for="mdp" class="form-label mb-3">Mot de passe</label>
                         <input type="password" class="form-control fs-5" id="mdp" name="mdp"  placeholder="Entrer votre mot de passe">
                    </div>
                    <div class="col-md-6 mb-5">
                         <label for="confirmMdp" class="form-label mb-3">Confirmation mot de passe</label>
                         <input type="password" class="form-control fs-5 mb-3" id="confirmMdp" name="confirmMdp" placeholder="Confirmer votre mot de passe " >
                         <input type="checkbox" onclick="myFunction()"> <span class="text-danger" id="affiche">Afficher/masquer le mot de passe</span>
                    </div>
                </div>  
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
                     <div class="row mb-3">
                          <div class="col-md-4 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1"><a href="confidentialite.php" class="text-black text-decoration-none">j'accepte la politique de confidentialité </a></label>
                         </div>
                     </div>
               <div class="row mt-5">
                    <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">S'inscrire</button>
                    <p class="mt-5 text-center">Vous avez dèjà un compte ! <a href="authentification.php" class=" text-danger">connectez-vous ici</a></p>
               </div>
          </form>
   </div>



</main>
<?php

     require_once "inc/footer.inc.php";
?>
