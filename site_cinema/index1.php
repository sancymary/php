<?php
$title = "Authentification";

require_once "inc/function.inc.php";

require_once "inc/header.inc.php"; 

$info='';
if(!empty($_POST)){
    debug($_FILES);
    $varif=true;
    foreach($_POST as $key => $value){
        if(empty(trim($value))){
            $varif= false;

        }
    }
    if(!$varif){
        $info=alert("vous renseigner tous les champs","danger");

    }else{
        
        $pseudo=trim($_POST['pseudo']);
        $email=trim($_POST['email']);
        $mdp=trim($_POST['mdp']);
        //je verifier si les donner passé dans le formulaire existe dans la BDD,il faut récuperer l'utilisateure de la BDD s'il existe
        $user=checkuser($email,$pseudo);
        if($user){
       //
             if(password_verify($mdp,$user['mdp'])){
                
                //************POUR MOI****** */
                //1ere deja je stocker dans mon base de donner
                //2eme $user['mdp']) je inserer par mon site
                //************************************ */

           // Je vérifie si le mot de passe est bon
                // password_verify() pour vérifier si un mot de passe correspond à un mot de passe haché créé par la password_hash().
                // Si le hash du mdp de la BDD correspond au mdp du formulaire, alors password_verify retourne true
            //debug($user);

        ///******************************* */
        /*  Suite à la connexion on vas crére ce qu'on appelle une session :
    Principe des sessions : un fichier temporaire appeléé "session" est crée sur le serveur, avec un identifiant unique . Les sessions constituent un moyen de stocker les données sur le serveur. Cette session est liée à un internaute car ces données sont propres à ce dernier,  Les données du fichier de session sont accessibles et manipulables à partir de la superglobale $_SESSION, elle est mêmoriser par le serveur et est disponible tant que la session de l'utilsateur est maintenu sur le serveur.
Quand une session est créée sur le serveur, ce dernier envoie son identifiant (unique) au client sous forme d'un cookie.
 un cookie est déposé sur le poste de l'internaute avec l'identifiant (au nom de PHPSESSID). Ce cookie se détruit lorsqu'on quitte le navigateur.
                        
                */
               
// Création ou ouverture d'une session :
// Une variable de session est une variable superglobale du nom de $_SESSION, cest un tableau associatif

            session_start();//permet de demarrer une nouvelle section ou reprender une session deja existante.on utiliser session quand cette functio est execute,le serveure verifier si la meme identifiant envoyer existe
            ////ensuite on stock les donner dans cette session
            $_SESSION['user'] = $user;
            /// nous créons une session avec les infos de l'utilisateur provenant de la BDD. 
                //  cette variable créé et affecté dans cette page sera accessible partout dans le site une fois la fonction session_start () est appelé
            debug($_SESSION);
            //redirection de utlisateure vers sa page de profile
            header('location:profile.php');
        }else{
            $info=alert("les identifiant sont incorrectes","danger");
        }
    }else{
        $info=alert("les identifiant sont incorrectes","danger");
    }
        

    }
}

?>
<main style="background:url(assets/img/5818.png) no-repeat; background-size: cover; background-attachment: fixed;" >
    <div class="w-50 m-auto p-5 mt-5" style="background: rgba(20, 20, 20, 0.9);">
        <h2 class="text-center mb-5 p-3">Connexion</h2>

        <?php
            //echo($info);   // pour afficher les messages de vérification
        ?>

        <form action="" method="post" class="p-5" >  
                <div class="row mb-3">
                    <div class="col-12 mb-5">
                        <label for="pseudo" class="form-label mb-3">Pseudo</label>
                        <input type="text" class="form-control fs-5" id="pseudo" name="pseudo">
                    </div>
                    <div class="col-12 mb-5">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control fs-5" id="email" name="email" placeholder="exemple.email@exemple.com">
                    </div>
                    <div class="col-12 mb-5">
                        <label for="mdp" class="form-label mb-3">Mot de passe</label>
                        <input type="password" class="form-control fs-5 mb-3" id="mdp" name="mdp" >
                        <input type="checkbox" onclick="myFunction()"> <span class="text-danger">Afficher/masquer le mot de passe</span>
                    </div>
                  
                        <button class="w-25 m-auto btn btn-danger btn-lg fs-5" type="submit">Se connecter</button>
                        <p class="mt-5 text-center">Vous n'avez pas encore de compte ! <a href="register.php" class=" text-danger">créer un compte ici</a></p>
                </div>
        </form>
    </div>
</main>
<?php

  require_once "inc/footer.inc.php";
?>