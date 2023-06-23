<?php
     $title = "Panier";
     require_once "../inc/function.inc.php";     
    
     if (empty($_SESSION['user'])) { //si ma session est vide => l'utilisateur n'est pas connecté il ne poura pas accéder à la page panier.php ( son panier)

        header('location:../authentification.php'); // je le redérige vers la page de connexion
     
    }

// debug($_SESSION);
    if(isset($_POST['ajout_panier'])){
     $quantity=htmlentities($_POST['quantity']);

     if(!isset($quantity)||empty($quantity)){
          header('location:../showFilm.php');
     }else{}

          if(!isset($_SESSION['panier'])){

               //s'il nexiste pas une session avec l'index panier on créer une et on mets un tableau a l'intérieur 
               //si elle existe déjà on passe directement à la vérification du film
               $_SESSION['panier'] = array();

          }
          $film_existe = false;
          foreach($_SESSION['panier'] as $key => $film){
            if($film['id_film'] == $_POST['id_film']){
                $_SESSION['panier'][$key]['quantity'] += $_POST['quantity'];
                $film_existe = true;

                // $film['quantity']+=$_POST['quantity'];
                // $film_existe = true;
            }

          }
          if($film_existe == false){
            $newFilm = array(
                'id_film' => $_POST['id_film'],
                'quantity' => $_POST['quantity'],
                'title' => $_POST['title'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'image' => $_POST['image']
                );

      $_SESSION['panier'][]= $newFilm;
      //debug($_SESSION['panier']);

          }
   
    }
    if(isset($_GET['id_film']) && isset($_SESSION['panier'])){
        $idFimfordelete=$_GET['id_film'];
        foreach($_SESSION['panier'] as $key =>$film){
            if($film['id_film']== $idFimfordelete){
                unset($_SESSION['panier'][$key]);
            }
        }

    }else if(isset($_GET['vider'])){
        //vider completement le pannier avec la function unset
        unset($_SESSION['panier']);
    }






    require_once "../inc/header.inc.php";
?>
     <div class="panier d-flex justify-content-center" style="padding-top:8rem;">

         
          <div class="d-flex flex-column  mt-5 p-5">
               <h2 class="text-center fw-bolder mb-5 text-danger">Mon panier</h2>
               <?php
            //    $info="";
            //    if(!isset($_SESSION['panier']) || empty($_SESSION['panier'])){
            //     $info =alert("votre pannier est  vider","danger");

            //    }
            //    else{

              
               ?>
               
               <a href="pannier.php?vider=1" class="btn align-self-end mb-5">Vider le panier</a>
     
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
                                 
                                  if(isset($_SESSION['panier']) || !empty($_SESSION['panier'])){
                                  
                                    foreach($_SESSION['panier'] as $film){
                                 
                                  
                                 ?>
     
                         <?php

                        
                         ?>
                              <tr>
                                   <td class="text-center border-top border-dark-subtle"><img src="<?=RACINE_SITE."assets/". $film['image']?>" style="width: 100px;"></td>
                                   <td class="text-center border-top border-dark-subtle"><?= $film['title']?></td>
                                   <td class="text-center border-top border-dark-subtle"><?= $film['price']?></td>
                                   <td class="text-center border-top border-dark-subtle "><?= $film['quantity']?></td>
                                   <td  class="text-center border-top border-dark-subtle"><?= $film['quantity'] * $film['price'] ?></td>
                                   <td  class="text-center border-top border-dark-subtle"><a href="?id_film=<?= $film['id_film']?>"><i class="bi bi-trash3"></i></a></td>
                              </tr>
                         <?php
                         }
                         ?>
                              <tr class="border-top border-dark-subtle">
                                   <th class="text-danger p-4 fs-3">Total : <?= calculerMontantTotal($_SESSION['panier'])?>£</th>
                              </tr>
                              
                        
                         </table>
                        
                    <a href="checkout.php" class="btn align-self-end mt-5">Payer</a>
                    <?php
                                  }
                             ?>
          </div>
        
     </div>




<?php

    //  require_once "../inc/footer.inc.php";
?>