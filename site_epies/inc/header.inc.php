<!-- fichier qui contient le header des differente pages de notre site -->
<?php
  require_once "functions.inc.php";
?>
<!doctype html>
<html lang="fr">

<head> 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=" mon site de sotenance BDD Epices">
    <meta name="author" content="Sancy">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"      
     rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- lien pour font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courgette&family=Inter:wght@600&family=Jost&family=Roboto+Condensed:wght@300&family=Work+Sans:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
      <!-- link pour Bootstrap icon CDN -->  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?=RACINE_SITE."assets/css/style.css"?>"> 
    <title><?= $title ?></title>
</head>

<body>
  <header class="mb-5">
    <nav class="navbar navbar-expand-lg fixed-top">
       <div class="container-fluid">
               <a class="navbar-brand" href="<?=RACINE_SITE?>index.php"><img src="<?=RACINE_SITE?>assets/img/logo.png"alt="logo de site"width="100" height="100"></a>
               
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"  
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">             
                  <span class="navbar-toggler-icon"></span>
               </button> 
               
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav w-100 d-flex justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link" href="<?=RACINE_SITE?>index.php">Accueil</a>
                        </li>
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
                                <a class="nav-link" href="<?=RACINE_SITE?>profil.php">Compte <sup class="badge rounded-pill text-bg-danger ms-2 "><?=$_SESSION['user']['pseudo']?></sup></a>
                          </li> 
                          <?php
                            if($_SESSION['user']['role']=='ROLE_ADMIN'){
                          ?>
                          <li class="nav-item backoffmenu">
                              <a class="nav-link" href="<?=RACINE_SITE?>admin/dashboard.php">Backoffice</a>
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
                            <li class="nav-item">
                              <!--   je veux afficher le nombre de produits dans le panier que lorsque l'utilisateur est connecté   --> 
                              <a class="nav-link" href="<?=RACINE_SITE?>/boutique/pannier.php"><i class="bi bi-bag"><?=(!empty($_SESSION['panier'])) && !empty($_SESSION['user']) ? count($_SESSION['panier']):''?></i></a>
                            </li>
                   </ul>    
            </div> 
     </div> 
    </nav>
  </header>

 
 


