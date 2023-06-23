<!-- fichier qui contient le header des differente pages de notre site -->
<?php
require_once "function.inc.php";
$categories = allcategorie();
?>
<!doctype html>
<html lang="en">

<head>
  
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="premiere site en PH site avec la BDD cinema">
  <meta name="author" content="Sancy">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=RACINE_SITE."assets/css/style.css"?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title><?= $title ?></title>

</head>

<body>
  <header class="mb-5">
    <nav class="navbar navbar-expand-lg fixed-top">
     <div class="container-fluid">
            <h1><a class="navbar-brand" href="<?=RACINE_SITE?>index.php">MOVIES</a></h1>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav w-100 d-flex justify-content-end">
  <li class="nav-item">
      <a class="nav-link" href="<?=RACINE_SITE?>index.php">Accueil</a>
  </li>
  <!-- 12/06/23 -->
  <li class="dropdown nav-item">
  <button class="btn btn-danger h-100 dropdown-toggle fs-2"  data-bs-toggle="dropdown" aria-expanded="false">
    choisir une categories
  </button>
  <ul class="dropdown-menu dropdown-menu-light w-100">
  <?php
  //pourquoi changer les $valuecategorie paceque pour eviter ecraser le valeure de fichier categories.php 12/06/23
  foreach($categories as $key => $valuecategorie){
  ?>
  <!-- 1ere facon -->
  <li><a class="dropdown-item text-dark fs-4" href="<?=RACINE_SITE?>index.php?id_category=<?=$valuecategorie['id_category']?>"><?=$valuecategorie['name']?></a></li>
  <!-- 2"eme methode -->
  <!-- <li><a class="dropdown-item text-dark fs-4" href="index.php?category=<?//=$valuecategorie['name']?>"><?//=$valuecategorie['name']?></a></li> -->

  <?php
  }
?>
  </ul>
</li>
<!-- end 12/06/23 -->
                         

                            <?php
                            if(empty($_SESSION['user'])){
                            ?>
 
   <li class="nav-item">
        <a class="nav-link" href="<?=RACINE_SITE?>register.php">Inscription</a>
   </li>

   <li class="nav-item">
        <a class="nav-link" href="<?=RACINE_SITE?>authentification.php">connexion</a>
    </li>

                          <?php
                          }else{
                          ?>
                                                    
<li class="nav-item">
      <a class="nav-link" href="<?=RACINE_SITE?>profil.php">Compte <sub class="badge rounded-pill text-bg-danger ms-2 fs-2"><?=$_SESSION['user']['pseudo']?></sub></a>
</li>
            <?php
            if($_SESSION['user']['role']=='ROLE_ADMIN'){
            ?>

  <li class="nav-item">
      <a class="nav-link" href="<?=RACINE_SITE?>admin/dashboard.php?dashboard_php">Backoffice</a>
  </li>

                  <?php
                    }                                         
                    ?>
 <li class="nav-item">
    <a class="nav-link" href="<?=RACINE_SITE?>?action=deconnexion">Deconnexion</a>
  </li>
  
                       
                  <?php
                     }
                         
                    ?>
                        <!-- quand on deconnecte -->

                        <!-- <li class="nav-item"><a class="nav-link" href=""></a></li> -->

   <li class="nav-item">
    <!--  le nombre de produit dans le panier:  j'affiche le nombre de produit dans le panier/ si je veux afficher le nombre de produits dans le panier que lorsque l'utilisateur est connecté je rajoute ( !empty($_session['user']))  --> 
    <a class="nav-link" href="<?=RACINE_SITE?>/boutique/pannier.php"><i class="bi bi-bag"><?=(!empty($_SESSION['panier'])) && !empty($_SESSION['user']) ? count($_SESSION['panier']):''?></i></a>
  </li>

         </ul>    
        </div> 
    </div> 


    </nav>
   
  </header>

 
 


