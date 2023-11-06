<!-- Ce fichier correspond à la page d'affichage d'un seul film -->
<?php
    
     require_once "inc/functions.inc.php";
    
     if(!empty($_GET)){ // si ma variable $_GET est pas vide cela veut dire que j'ai cliqué sur un lien de ma side barre, l'indexe de la variable $_GET change selon le lien indiqué dans la balise a 
            debug($_GET);
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
     <div class="w-50 border border-5 m-auto text-dark show">
               
          <div class="back">
               <a href="<?=RACINE_SITE."index.php"?>"><i class="bi bi-arrow-left-circle-fill fs-1"></i></a>
          </div>
          <div class="cardDetails row mt-5">
               <h1 class="text-center mb-5 fs-2 m-auto"><?=ucfirst($product['title'])?></h1>
               <div class="col-12 row p-5 hovshow">
                    <img src="<?=RACINE_SITE."assets/". $product['image']?>" alt="affichage de produit" class="m-auto" style="width: 20rem;">
                    <!-- formulaire d'ajout au panier -->
                    <div class="col-12 mt-5">
                         <form action="boutique/pannier.php" method="post"  enctype="multipart/form-data"  class="w-50 m-auto row justify-content-center p-5">
                         <!-- Dans le formulaire d'ajout au panier, ajoutez des champs cachés pour chaque information que vous souhaitez conserver du product -->
                              <input type="hidden" name="id_product" value="<?= $product['id_product'] ?>">
                              <input type="hidden" name="title" value="<?= $product['title'] ?>">
                              <input type="hidden" name="price" value="<?= $product['price'] ?>">
                              <input type="hidden" name="stock" value="<?= $product['stock'] ?>">
                              <input type="hidden" name="image" value="<?= $product['image'] ?>">

                              <div class="m-auto d-flex justify-content-center" >
                                   <select name="quantity" class="form-select form-select-lg" aria-label=".form-select-lg example"style="width: 30rem;">
                                        <!-- Je créé dynamiquement la quantité sélectionnable dans la limite du stock -->
     
                                       
                                             <?php for ($i = 1; $i <= $product["stock"]; $i++) { ?>
                                                  <option value="<?= $i ?>"><?= $i ?></option>
                                             <?php } ?>
                                      
                                   </select>
                              </div>
                              <!-- <a href="boutique/panier.php?id_film=<?//=$product["id_film"] ?>" class="btn w-100 m-auto">Ajouter au Panier</a>  -->
                             <div class="m-auto d-flex justify-content-center">
                               <input class="btn btn-outline-danger mt-5" type="submit" value="Ajouter au panier" name="ajout_panier" id="addCart"style="width: 30rem;">
                             </div>
                              <!-- au moment du click j'initalise une session de panier qui sera récupérer dans le fichier panier.php -->
                         </form>
                         </div>
               </div>
               <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 ms-3 mb-5">     
                         <div class="d-flex"> 
                              <h3 class="fw-bold"><span>Prix : </span></h3>
                             
                                   <h3><?=$product['price']?>€</h3>
                             
                             
                         </div>
                         <div class="d-flex"> 
                              <h3 class="fw-bold"><span>Stock :</span> </h3>
                             
                                   <h3><?=$product['stock']?></h3>
                           
                             
                         </div>
                         <div class="showdescri">                                   
                              <h3 class="fw-bold" ><span>Description :</span></h3>
                             
                                   <h3 class="showdescri"><?= html_entity_decode($product['description'])?></h3>
                            
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