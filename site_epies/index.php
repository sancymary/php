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
$avis = avisbydate();
?>
<main class="container"> 
<!-- pour caresole -->
<div id="carouselExampleDark" class="carousel carousel-dark slide">
  <div class="carousel-indicators mt-5">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner mt-5">
    <div class="carousel-item active" data-bs-interval="10000">
      <img src="assets/img/pourcaresole-10.jpg" class="d-block m-auto mt-5 pt-5" alt="image de carousele"width="550" height="550">
      <div class="carousel-caption d-none d-md-block text-white">
        <h2 class="fs-1">que faire de mes épices</h2>
        <p>Achaté des épices c'est bien</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="assets/img/pourcaresole-9.jpg" class="d-block m-auto mt-5 pt-5" alt="image de carousele"width="500" height="500">
      <div class="carousel-caption d-none d-md-block text-white">
        <h2 class="fs-1">les épices et votre santé</h2>
        <p class="fs-4">Epicer vos plats,elles contribuent à la protection de votre organisme </p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/img/pourcaresole-7.jpg" class="d-block  m-auto mt-5 pt-5" alt="image de carousele"width="550" height="550">
      <div class="carousel-caption d-none d-md-block text-white">
        <h2 class="fs-1">comment je vais trouver sur ce site?</h2>
        <p>nos epices est un boutique en ligne d'épices</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- fin de caresolle -->
    <div class="films text-dark">
            <h1 class="text-center mt-5">Produits populaires</h1>
            <h2 class="fw-bolder fs-1 my-5 mx-5"><span class="nbreFilms"><?=count( $product)?></span> <?=($message) ?? ""?></h2> <!-- Je conte le nombre de résultat dans le tableau-->
            <div class="row">
            <?php
            echo $info;
        // vu que le fetch se passe dans la function donc on vas boucler sur le tableau avec un foreach()
                foreach( $product as $index => $val){         
            ?>
                    <div class="col-sm-12 col-md-4 col-lg-3 col-xxl-3 position-relative">
                        <div class=" mb-5 text-center saindex testindex">
                            <img src="<?= RACINE_SITE."assets/".$val['image']?>"alt="Affiche du Produits"style="width: 18rem;"class="m-auto pt-5" >
                            <div class="card-body text-dark mt-5 test1">
                               <h3 class="fs-1"><?=ucfirst($val['title'])?></h3>     
                                <h4 class="fs-2"><?=$val['price']?>€</h4>
                                <a href="<?= RACINE_SITE."showproduit.php?id_product=".$val['id_product']?>" class="btn btn-danger">Voir Plus</a>                                        
                            </div>                            
                        </div>
                    </div> 
                <?php
                    }
                    if(empty($_GET)){                    
                    ?>
                  <div class="col-12 text-center">
                    <a href="<?= RACINE_SITE?>index.php?voirPlus"class="btn btn-danger p-4 fs-3 mb-5">Voir Plus</a>   
                    </div>
                 </div>
              <?php 
                 }
                ?>
      </div>
        <!-- pour avis -->

       <div class="row">
         <div class="col-sm-12">
           <div class=" indexavis d-flex justify-content-center border w-25 m-auto bg-danger bg-opacity-50 rounded-5">
                 <h1><a href="avis.php" class="text-dark text-decoration-none align-self-end">Laisser vos Avis</a></h1>
           </div>
           <!-- pour recuperation avis  -->
           <div class="w-25 m-auto pt-5"> 
            <h1 class="text-center fw-bolder mt-5 text-danger text-uppercase  fs-2">Avis de Utilisateures</h1>
           <table class="table table-bordered mt-5 table-hover table-borderless user mt-5">
            <thead class="thead-dark theadback mt-5">
               <tr>
                    <th class="text-danger table-borderless">commentaire</th> 
                    <th class="text-danger">date</th> 
               </tr>
            </thead>
         <tbody>
           <?php
          $avis = avisbydate();
           foreach($avis as $index => $user){
           ?>
           <tr>  
              <td><?=ucfirst($user['commentaire'])?></td>
               <td><?=ucfirst($user['date_commentaire'])?></td>  
            </tr>
            <?php
              }
             ?>             
            </tbody>
            </table>
        </div>
         </div>
       </div>

           
</main>
<?php
    require_once "inc/footer.inc.php";
?>





















