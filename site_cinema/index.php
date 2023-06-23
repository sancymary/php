<?php
$title = "Accueil";
require_once "inc/function.inc.php";
require_once "inc/header.inc.php";
//////////////////12/06/23/////////////
$info="";
// if(isset($_GET) && !empty($_GET)){ //si j'ai des donnes dans url,je recupere la valeure de la superglobale $-get avec son index category
//     //je recupere les films selons la category passer en argument dans la function
//     $films=filmbycategoryname($_GET['category']);//category index.php la irunthu vanthathu
//     if(count($films)==0){
//         $info=alert("desoler pas de films,choisir une categorie","danger");

//     }
     
// }else{
//     $films = allFilm();
// }

//////////////////////test///////////////// (petite changemen 22/06/23)
if(isset($_GET) && !empty($_GET)){ //si j'ai des donnes dans url,je recupere la valeure de la superglobale $-get avec son index category

    if(isset($_GET['id_category'])){

        $films=filmbycategoryid($_GET['id_category']);//category index.php la
        $message="films à vous proposer dans cette category.";
        if(count($films)==0){
            $info=alert("desoler pas de films,choisir une categorie","danger");
    
        }

    }else if(isset($_GET['voirPlus'])){
        $films=allFilm();
        $message="films à vous proposer .";
    }
   
    
}else{
    $films = filmbydate();
    $message="films à vous plus récent.";
}

?>
<!-- //////////////////12/06/23 end///////////// -->


<main class="container-fluid"> 
    

    <div class="films">
            <h2 class="fw-bolder fs-1 my-5 mx-5"><span class="nbreFilms"><?=count($films)?></span> <?=($message) ?? ""?></h2> <!-- Je conte le nombre de résultat dans le tableau-->
            <div class="row">

            <?php
            echo $info;

        // vu que le fetch se passe dans la function donc on vas boucler sur le tableau avec un foreach()

 
                foreach($films as $index => $film){

                   
            ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3">
                        <div class="card">
                            <img src="<?= RACINE_SITE."assets/".$film['image']?>" alt="Affiche du film <?=$film['title']?>" >
                            <div class="card-body">
                                    <h3><?=ucfirst($film['title'])?></h3>     
                                    <h4><?=ucfirst($film['director'])?></h4>
                                    <p><span class="fw-bolder">Resumé : </span><?=substr($film['synopsis'], 0, 100)."..."?></p><!--je demande d'afficher un segment d'une chaîne de caractére :0 début de découpage jusqu'au 100 ième caractère--> 
                                    <!--Dans ce p on récupère l'id du film qui va nous servir à afficher les détils du film à partir de l'url  -->
                            
                                    <a href="<?= RACINE_SITE."showfilm.php?id_film=".$film['id_film']?>" class="btn ">Voir Plus</a>                            
                                        <!-- Pour afficher le film en quetion on rajoute l'index du film dans le chemin du bouton donc on trasmet la donnée via la variable$_GET-->
                                    <!-- Pour afficher le film en vas utiliser la même page: on vas cachéer la div avec la totalité des film et on affiche celle avec un seul film, on vas le faire en JS -->
                            </div>
                            
                        </div>
                    </div>
                
                <?php
                    }
                    if(empty($_GET)){
//<!-- le nombre de produit dans le panier:  j'affiche le nombre de produit dans le panier/ si je veux afficher le nombre de produits dans le panier que lorsque l'utilisateur est connecté je rajoute ( !empty($_session['user']))  -->
                    
            ?>


                    <div class="col-12 text-center">
                    <a href="<?= RACINE_SITE?>index.php?voirPlus"class="btn p-4 fs-3 ">Voir Plus</a>   
                    </div>

            </div>
            <?php 
            }
?>

    </div>
</main>
<?php

    require_once "inc/footer.inc.php";

?>




















<?php
require_once "inc/footer.inc.php";
?>

