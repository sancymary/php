
<?php
$title = "backoffice";
require_once "../inc/functions.inc.php";


// if(empty($_SESSION['user'])){
//     header("location:".RACINE_SITE."authentification.php");

// }else{
// if($_SESSION['user']['role']=='ROLE_USER'){
//     header("location:".RACINE_SITE."index.php");
// }
// } 
require_once "../inc/header.inc.php";
?>
<main class="img ma">
    
    <div class="row">

            <div class="col-sm-6 col-md-4 col-lg-2 mt-5 pt-5">
                <div class="d-flex flex-column p-3 text-bg-dark sidebarre">
                    <hr>
                    <ul class="nav nav-pills mb-auto flex-column d-flex">
                        <li><a href="dashboard.php" class="nav-link text-light">Backoffice</a></li>
                        <li><a href="produits.php" class="nav-link text-light">produits</a></li>
                        <li><a href="categories.php" class="nav-link text-light">categories</a></li>
                        <li><a href="user.php" class="nav-link text-light">utilisateure</a></li>
                    </ul>
                    <hr>
                </div>
            </div>
          </div>    
        
   </main>      
  
<?php
    require_once "../inc/footer.inc.php";
?>    


 
