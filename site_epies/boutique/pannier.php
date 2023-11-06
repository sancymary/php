<?php
$title = "Panier";
require_once "../inc/functions.inc.php";


if (empty($_SESSION['user'])) { // si'l'utilisateur n'est pas connécté il ne peut pas accéder à son panier

     header("location:" . RACINE_SITE . "authentification.php"); // je lle redérige vers la page de connexion
}
if (isset($_POST["ajout_panier"])) {
     // Récupérer les données du product depuis le formulaire
     // on récupére l'id de l'input caché dans le formulaire et la quantité sélectionné
     $id_product = htmlentities($_POST['id_product']);
     $quantity = htmlentities($_POST['quantity']);
     if (!isset($quantity) || empty($quantity)) { // si'l'utilisateur n'est pas connecté il ne peut pas accéder à son panier
          header("location:" . RACINE_SITE . "showproduit.php"); // je lle redérige vers la page de connexion

     } else { // s'il y a une quantité et l'utilisateur est connecté 

          // je vérifie si je n'ai pas  de produit dans le panier donc je initialise le panier
          if (!isset($_SESSION['panier'])) {
               //s'il n'existe pas une session avec l'index panier on créer une et on mets un tableau a l'intérieur 
               //si elle existe déjà on passe directement à la vérification du film
               $_SESSION["panier"] = array();
               //   debug($_SESSION);
          }

          // Vérifier si le film existe déjà dans le panier
          $product_existe = false;
          foreach ($_SESSION['panier'] as $key => $product) { //nous parcourons le panier pour vérifier si le film existe déjà

               if ($product['id_product'] === $id_product) {
                    // Si le film existe, ajouter la quantité sélectionnée à la quantité existante
                    $_SESSION['panier'][$key]['quantity'] += $quantity;
                    $product_existe = true;
                    break;
               }
          }
          if (!$product_existe) {
               // Si le film n'existe pas, ajouter le film avec toutes les informations dans $_SESSION['panier']
               $new_product = array(
                    'id_product' => $id_product,
                    'quantity' => $quantity,
                    'title' => $_POST['title'],
                    'price' => $_POST['price'],
                    'stock' => $_POST['stock'],
                    'image' => $_POST['image']

               );
               $_SESSION['panier'][] = $new_product;
          }
     }
}
// Vérifier si un produit doit être supprimé du panier
if (isset($_GET['id_product']) && isset($_SESSION['panier'])) {
     $idproductForDelete = $_GET['id_product'];
     // parcourons le panier pour trouver le film correspondant et le supprimer à l'aide de la fonction unset.
     foreach ($_SESSION['panier'] as $key => $product) {
          if ($product['id_product'] === $idproductForDelete) {
               // Supprimer le film du panier
               unset($_SESSION['panier'][$key]);
               break;
          }
     }
} else if (isset($_GET['vider'])) {
     // Vider complètement le panier avec la fonction unset
     unset($_SESSION['panier']);
}
require_once "../inc/header.inc.php";
?>
<main class="container">
     <div class="panier d-flex justify-content-center" style="padding-top:8rem;">
          <div class="d-flex flex-column  mt-5 p-5">
               <h2 class="text-center fw-bolder mb-5 text-danger">Mon panier</h2>

               <!-- le paramètre vider=1 pour indiquer qu'il faut vider le panier. -->
               <?php
               $info = '';
               //s'il n'y a aucune clé dans le tableau
               if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {

                    $info = alert("Votre panier est vide", "danger");
                    echo $info;
               } else {
               ?>
                    <a href="?vider" class="align-self-end mb-5 text-decoration-none text-dark btn btn-danger ">
                         Vider le panier</a>
                    <!-- <div class="row"> -->
                    <!-- <div class="col-sm-12 col-md-6 col-lg-12"> -->
                    <table class="fs-4 table-responsive text-dark">
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
                         foreach ($_SESSION['panier'] as  $product) {
                         ?>
                              <tr>
                                   <td class="text-center border-top border-dark-subtle"> <a href="<?= RACINE_SITE ?>showproduit.php?id_product=<?= $product['id_product'] ?>"><img src="<?= RACINE_SITE . "assets/" . $product['image'] ?>" style="width: 100px;"></a></td>
                                   <td class="text-center border-top border-dark-subtle"><?= $product['title'] ?></td>
                                   <td class="text-center border-top border-dark-subtle"><?= $product['price'] ?>€</td>
                                   <td class="text-center border-top border-dark-subtle d-flex align-items-center justify-content-center" style="padding: 7rem;">
                                        <?= $product['quantity'] ?> <!-- Afficher la quantité actuelle -->

                                   </td>
                                   <td class="text-center border-top border-dark-subtle"><?= $sousTotal = $product['price'] * $product['quantity'] ?>€</td>
                                   <td class="text-center border-top border-dark-subtle"><a href="?id_product=<?= $product['id_product'] ?>"><i class="bi bi-trash3"></i></a></td>
                              </tr>
                         <?php
                         }
                         ?>
                         <tr class="border-top border-dark-subtle col-sm-12">
                              <th class="text-danger p-4 fs-3">Total : <?= $total = calculerMontantTotal($_SESSION['panier']) ?>€</th>
                         </tr>
                    </table>
                    <form action="checkout.php" method="post">
                         <input type="hidden" name="total" value="<?= $total ?>">
                         <button type="submit" class="btn btn-danger mt-5 p-4" id="checkout-button">Payer </button>
                    </form>
                    <!-- <a href="checkout.php?total=<//?=$total?>" class="btn align-self-end mt-5" id="checkout-button">Payer</a> -->
                    <!-- <a href="checkout.php" class="btn align-self-end mt-5">Payer</a> -->

               <?php

               }
               ?>
          </div>
     </div>
</main>

<?php
require_once "../inc/footer.inc.php";
?>