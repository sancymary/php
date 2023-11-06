
<?php
$title = "backoffice";
require_once "../inc/functions.inc.php";


if(empty($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");

}else{
if($_SESSION['user']['role']=='ROLE_USER'){
    header("location:".RACINE_SITE."index.php");
}
} 
require_once "../inc/header.inc.php";
?>
    <main class="img">                 
        <div class="row d-flex justify-content-center mt-5">               
              <div class="dash test col-sm-12 col-md-6 col-lg-4">                            
                            <li>
                                <a class="nav-link" href="<?=RACINE_SITE?>admin/categories.php">Categorie</a>
                            </li>
            
                            <li>
                                  <a class="nav-link" href="<?=RACINE_SITE?>admin/produits.php">Produit</a>
                            </li>                                             
                            <li>
                                  <a class="nav-link" href="<?=RACINE_SITE?>admin/user.php">Utilisateures</a>
                           </li>       
               </div>              
        </div>    
    </main>
   
<?php
    require_once "../inc/footer.inc.php";
?>    


 
