
<?php
$title = "backoffice";
require_once "../inc/function.inc.php";


if(empty($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");

}else{
if($_SESSION['user']['role']=='ROLE_USER'){
    header("location:".RACINE_SITE."index.php");
}
} 
require_once "../inc/header.inc.php";
?>
<main>
    <div class="row">

            <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="d-flex flex-column p-3 text-bg-dark sidebarre">
                    <hr>
                    <ul class="nav nav-pills mb-auto flex-column d-flex">
                        <li><a href="?dashboard_php" class="nav-link text-light">Backoffice</a></li>
                        <li><a href="?films_php" class="nav-link text-light">Films</a></li>
                        <li><a href="?categories_php" class="nav-link text-light">categories</a></li>
                        <li><a href="?user_php" class="nav-link text-light">utilisateure</a></li>
                    </ul>
                    <hr>
                </div>
            </div>
            
            <?php if (isset($_GET['dashboard_php'])): ?>

                    <div class="w-50 m-auto">
                        <h2>Bonjour sancy</h2>
                        <p>Bienvenu sur le backoffice</p>
                        <img src="<?=RACINE_SITE?>assets/img/affiches-films-bleu-orange-2.jpg" alt="sur le immage de film"  width="500"  height ="800">

                    </div>

            <?php endif?>
            <div class="col-sm-12">

            

            <?php
            //$_GET represente les donner qui transitent par l'URL.ils'agit d'une superglobale,et comme toutes les superglobale c'est un tableau (array)
            // superglobale signifier que cette variable et disbonible partout dans le script,y compris au seine de function(pas besoins de faire globale G_GET)
            //les information transitent dand url selon le syntaxe suivante
            //ex:page.php?indice1=valeure1&indice2=valeure2&indiceN=valeureN
            //auand on reception les donner $_get est remplit selon le schema suivant:

            //$_GET =array(
              //        'indice1'=> 'valeure1';
              //        'indice2'=> 'valeure2';
              //        'indiceN'=> 'valeureN';

            //              );

            if(!empty($_GET)){//si ma variable $_get est pas vide veut je cliquer sur un lien de ma sidebare,l'indexe de la variable $_GET change le lien indiquer dans la balise a
                if(isset($_GET['films_php'])){ 
                    require_once "film.php"; 
                    //quand mon url afiche films_php on appelle le fichier film.php  

                }else if(isset($_GET['categories_php'])){
                    require_once "categories.php"; 

                }else if(isset($_GET['user_php'])){
                    require_once "user.php"; 

                }else{
                    require_once "dashboard.php"; //si existes l'index dashboard-php dans la superglobale on appelle le fichier dasboard.php
                }
            }


                ?>
                
            </div>
        
    </div>
    
</main>
<?php
// debug($_GET);
?>

<?php
require_once "../inc/footer.inc.php";
?>
