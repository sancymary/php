<?php
$title = "Accueil";
require_once "inc/functions.inc.php";
require_once "inc/header.inc.php";

$info="";
////pour recuperation avec son categorie///////////////////////////
if(isset($_GET) && !empty($_GET)){ //si j'ai des donnes dans url,je recupere la valeure de la superglobale $-get avec son index category

    // if(isset($_GET['id_category'])){

    //      $product=productbycategoryid($_GET['id_category']);//category index.php la
    //     $message="Produits à vous proposer dans cette category.";
    //     if(count($product)==0){
    //         $info=alert("desoler pas de Produits,choisir une categorie","danger");
    
    //     }

     if(isset($_GET['voirPlus'])){
        $product=allProduct();
        $message="Produits à vous proposer .";
    }
   
   
}else{
     $product = productbydate();
    $message="Produits à vous plus récent.";
}
////////////////////////////////////pour avis////////////////////
$avis = avisbydate();

?>



<main class="container-fluid"> 
    

    <div class="films">
            <h2 class="fw-bolder fs-1 my-5 mx-5"><span class="nbreFilms"><?=count($product)?></span> <?=($message) ?? ""?></h2> <!-- Je conte le nombre de résultat dans le tableau-->
            <div class="row">

            <?php
            echo $info;

        // vu que le fetch se passe dans la function donc on vas boucler sur le tableau avec un foreach()

 
                foreach( $product as $index => $val){

                   
            ?>
                    <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3">
                        <div class="mb-5 text-center sa">
                            <img src="<?= RACINE_SITE."assets/".$val['image']?>" alt="Affiche du Produits <?=$val['title']?>" >
                            <div class="card-body text-dark">
                                    <h3><?=ucfirst($val['title'])?></h3>     
                                    <h4><?=$val['price']?></h4>
                                   
                            
                                    <a href="<?= RACINE_SITE."showproduit.php?id_product=".$val['id_product']?>" class="btn ">Voir Plus</a>                            
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
            ////////////////////////////////pour avis///////////////////
            foreach( $avis as $index => $commentaire){
     ?>
     
     <div class="card-body text-dark">
      <h3>commentaire<?=ucfirst($commentaire['commentaire'])?></h3> 
      </div>
     <?php 
            }
       ?>
       <div class=" indexavis d-flex justify-content-center border w-25 m-auto bg-danger bg-opacity-50 rounded-5">
        <h1><a href="avis.php" class="text-dark text-decoration-none">  Avis</a></h1>
       </div>

    </div>
</main>
<?php

    require_once "inc/footer.inc.php";

?>




















<?php
require_once "inc/footer.inc.php";
?>

