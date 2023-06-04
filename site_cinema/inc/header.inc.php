<!-- fichier qui contient le header des differente pages de notre site -->
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
                        <li class="nav-item">
                        <a class="nav-link" href="<?=RACINE_SITE?>admin/dashboard.php?dashboard_php">Backoffice</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?=RACINE_SITE?>register.php">Inscription</a>
                        </li>

                        <!-- <li class="nav-item"><a class="nav-link" href=""></a></li> -->
                    </ul>    
                 </div> 
    </div> 


    </nav>
   
  </header>

 
 


