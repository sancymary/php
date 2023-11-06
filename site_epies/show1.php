<!-- Ce fichier correspond à la page d'affichage d'un seul film -->
<?php
    
     require_once "inc/functions.inc.php";
    
     if(!empty($_GET)){ // si ma variable $_GET est pas vide cela veut dire que j'ai cliqué sur un lien de ma side barre, l'indexe de la variable $_GET change selon le lien indiqué dans la balise a 
            //debug($_GET);
                 $id_product = htmlentities($_GET['id_product']); //je sécurise l'id récupérer de l'url 
                 $product = showProduct($id_product);
                    // debug($product);
                if ($_GET['id_product'] != $product['id_product']) {

                    header('location:index.php');

                }else{ // si existe l'indexe du product dans la superglobal on appel le fichier dashboard.php
                    
                    
                    
                    // la catégorie du product
                    $category = showCategory($product['categorie_id']); 
                    $categoryName = $category['name'];
                    $title = $product['title'];
require_once "inc/header.inc.php";           
?>


<main class="mt-5">
     <div class="film bg-dark">
               
          <div class="back">
               <a href="<?=RACINE_SITE."index.php"?>"><i class="bi bi-arrow-left-circle-fill"></i></a>
          </div>
          <div class="cardDetails row mt-5">
               <h1 class="text-center mb-5 fs-2"><?=ucfirst($product['title'])?></h1>
               <div class="col-12 col-xl-5 row p-5">
                    <img src="<?=RACINE_SITE."assets/". $product['image']?>" alt="affichage de produit">
                    <!-- formulaire d'ajout au panier -->
                    <div class="col-12 mt-5">
                         <form action="boutique/pannier.php" method="post"  enctype="multipart/form-data"  class="w-50 m-auto row justify-content-center p-5">
                         <!-- Dans le formulaire d'ajout au panier, ajoutez des champs cachés pour chaque information que vous souhaitez conserver du product -->
                              <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                              <input type="hidden" name="title" value="<?= $product['title'] ?>">
                              <input type="hidden" name="price" value="<?= $product['price'] ?>">
                              <input type="hidden" name="stock" value="<?= $product['stock'] ?>">
                              <input type="hidden" name="image" value="<?= $product['image'] ?>">
                              <select name="quantity" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                   <!-- <option selected>Choisir une quantité</option> -->
                                   <!-- Je créé dynamiquement la quantité sélectionnable dans la limite du stock -->

                                   <?php for ($i = 1; $i <= $product["stock"]; $i++) { ?>
                                        <option value="<?= $i ?>"><?= $i ?></option>
                                   <?php } ?>
                              </select>
                              <!-- <a href="boutique/panier.php?id_film=<?//=$product["id_film"] ?>" class="btn w-100 m-auto">Ajouter au Panier</a>  -->
                              <input class="btn btn-outline-danger mt-3 w-100" type="submit" value="Ajouter au panier" name="ajout_panier" id="addCart">
                              <!-- au moment du click j'initalise une session de panier qui sera récupérer dans le fichier panier.php -->
                         </form>
                         </div>
               </div>
               <div class="detailsContent  col-md-7 p-5">
                    <div class="container mt-5">     
                        
                       
                         <div class="row">
                              <h3  class="col-4"><span>Genre : </span></h3>
                              <ul  class="col-8">
                                   <li><?=$categoryName?></li>
                              </ul>
                              <hr>
                         </div>
                        
                        
                         <div class="row"> 
                              <h3 class="col-4"><span>Prix : </span></h3>
                              <ul class="col-8">
                                   <li><?=$product['price']?>€</li>
                              </ul>
                              <hr>
                         </div>
                         <div class="row"> 
                              <h3 class="col-4"><span>Stock :</span> </h3>
                              <ul class="col-8">
                                   <li><?=$product['stock']?></li>
                              </ul>
                              <hr>
                         </div>
                         <div class="row">
                                   
                              <h5 class="col-4" ><span>Description :</span></h5>
                              <ul class="col-8">
                                   <li><?= html_entity_decode($product['description'])?></li>
                              </ul>
                         </div>
                    </div>
               </div>
          </div>          
          <?php
                    }
               }
          ?>
                       
     
     </div>
</main>


<?php

     require_once "inc/footer.inc.php";
?>