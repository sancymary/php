<?php
     $title = "Panier";
     require_once "../inc/function.inc.php";
    

     if(empty($_SESSION['user'])){ // si'l'utilisateur n'est pas connécté il ne peut pas accéder à son panier

          header("location:".RACINE_SITE."authentification.php"); // je lle redérige vers la page de connexion
     }
   
     
     if(isset($_POST["ajout_panier"])) {
              // Récupérer les données du film depuis le formulaire
               // on récupére l'id de l'input caché dans le formulaire et la quantité sélectionné
               $id_film = htmlentities($_POST['id_film']);
               $quantity = htmlentities($_POST['quantity']);
          // debug($id_film);
         

               if(!isset($quantity) || empty($quantity)){ // si'l'utilisateur n'est pas connecté il ne peut pas accéder à son panier

                    header("location:".RACINE_SITE."showFilm.php"); // je lle redérige vers la page de connexion

               }else{ // s'il y a une quantité et l'utilisateur est connecté 
                                      
                    // je vérifie si je n'ai pas  de film dans le panier donc je initialise le panier
                    if(!isset($_SESSION['panier'])){ 
                         //s'il nexiste pas une session avec l'index panier on créer une et on mets un tableau a l'intérieur 
                         //si elle existe déjà on passe directement à la vérification du film
                         $_SESSION["panier"] = array();
                        
                    }
                
                    // Vérifier si le film existe déjà dans le panier
                    $film_existe = false;

                    foreach ($_SESSION['panier'] as $key => $film) { //nous parcourons le panier pour vérifier si le film existe déjà
                         if ($film['id_film'] === $id_film) {
                              // Si le film existe, ajouter la quantité sélectionnée à la quantité existante
                              $_SESSION['panier'][$key]['quantity'] += $quantity; 
                              $film_existe = true;
                              break;
                             }
                    }
                    if (!$film_existe) {
                         // Si le film n'existe pas, ajouter le film avec toutes les informations dans $_SESSION['panier']
                         $new_film = array(
                             'id_film' => $id_film,
                             'quantity' => $quantity,
                             'title' => $_POST['title'],
                             'price' => $_POST['price'],
                             'stock' => $_POST['stock'],
                             'image' => $_POST['image']

                         );
                         $_SESSION['panier'][] = $new_film;

                         // header('Location: panier.php');
                         
                    }                                        
                 
               }
          }
          // debug($_SESSION);
     

     // Vérifier si un film doit être supprimé du panier
     if (isset($_GET['id_film']) && isset($_SESSION['panier'])) {
          $idFilmForDelete = $_GET['id_film'];
          // parcourons le panier pour trouver le film correspondant et le supprimer à l'aide de la fonction unset.
          foreach ($_SESSION['panier'] as $key => $film) {
               if ($film['id_film'] === $idFilmForDelete) {
                    // Supprimer le film du panier
                    unset($_SESSION['panier'][$key]);
                    break;
               }
          }
     
          // Rediriger vers la page du panier
          // header('Location: panier.php');
          // exit();

     }else if(isset($_GET['vider'])) {
          // Vider complètement le panier avec la fonction unset
          unset($_SESSION['panier']);
          
          // header('Location: panier.php');
          // exit();
     }

     
     require_once "../inc/header.inc.php";

?>
     <div class="panier d-flex justify-content-center" style="padding-top:8rem;">

         
          <div class="d-flex flex-column  mt-5 p-5">
               <h2 class="text-center fw-bolder mb-5 text-danger">Mon panier</h2>
               
               <!-- le paramètre vider=1 pour indiquer qu'il faut vider le panier. -->
                    <?php 
                         $info = '' ;
     
                         // debug( $_SESSION['panier']);
                         //s'il n'y a aucune clé dans le tableau
                         if(!isset($_SESSION['panier']) || empty($_SESSION['panier'])){
     
                              $info = alert("Votre panier est vide","danger");
                              echo $info;
                         }else {
     
                    
                    ?>
               <a href="?vider" class="btn align-self-end mb-5">Vider le panier</a>
     
                         <table class="fs-4">
                              <tr>
                                   <th class="text-center text-danger fw-bolder">Affiche</th>
                                   <th class="text-center text-danger fw-bolder">Nom</th>
                                   <th class="text-center text-danger fw-bolder">Prix</th>
                                   <th class="text-center text-danger fw-bolder">Quantité</th>
                                   <th class="text-center text-danger fw-bolder">Sous-total</th>
                                   <th class="text-center text-danger fw-bolder">Supprimer</th>
                              </tr>
     
                    <?php
                         // parcourir chaque film dans le panier et afficher les détails
                              foreach( $_SESSION['panier'] as  $film){
                    ?>
                              <tr>
                                   <td class="text-center border-top border-dark-subtle"> <a href="<?=RACINE_SITE?>showfilm.php?id_film=<?= $film['id_film']?>"><img src="<?=RACINE_SITE."assets/".$film['image']?>" style="width: 100px;"></a></td>
                                   <td class="text-center border-top border-dark-subtle"><?=$film['title']?></td>
                                   <td class="text-center border-top border-dark-subtle"><?=$film['price']?>€</td>
                                   <td class="text-center border-top border-dark-subtle d-flex align-items-center justify-content-center" style="padding: 7rem;">
                                     
                                        <?=$film['quantity']?> <!-- Afficher la quantité actuelle -->
                                      
                                   </td>
                                   <td  class="text-center border-top border-dark-subtle"><?=$sousTotal= $film['price'] * $film['quantity'] ?>€</td>
                                   <td  class="text-center border-top border-dark-subtle"><a href="?id_film=<?= $film['id_film']?>"><i class="bi bi-trash3"></i></a></td>
                              </tr>
                    <?php 
                              }
     
                    ?>
                              <tr class="border-top border-dark-subtle">
                                   <th class="text-danger p-4 fs-3">Total : <?= $total = calculerMontantTotal($_SESSION['panier']) ?>€</th>
                              </tr>
                   
                         
                    
                         </table>
                    <a href="checkout.php?total=<?=$total?>" class="btn align-self-end mt-5" id="checkout-button">Payer</a>
                    <!-- <a href="checkout.php" class="btn align-self-end mt-5">Payer</a> -->

                    <?php 
     
                    }
                    ?>
          </div>
     </div>



