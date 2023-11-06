<!-- Ce fichier correspond à la page d'affichage d'un seul film -->
<?php
 $title ="propos";   
require_once "inc/functions.inc.php";
    
require_once "inc/header.inc.php";           
?>


<main class=""style="background:url(assets/img/backgrounproduct.jpg) repeat; background-size:center; background-attachment:fixed;">
     <div class="container">
      <div class="row">
        <div class="col-12">
         <div class="text-dark mb-5">
            <h1 class="text-center mb-5">À propos de nous</h1>               
            <div class="text-center m-auto propos w-75">
               <p class="w-100 m-auto" >nos épices est une entreprise familiale, spécialisée dans la vente d'épices du monde . Nous avons sélectionné pour vous toute une gamme de produits au meilleur rapport qualité prix. Nos produits sont bio quand c’est indiqué (surtout des poivres, piments,curry masalé), tous les autres produits sont choisis par nos soins et avec une éthique stricte (pas de pesticides, pas d'ionisation, etc.). De nombreux autres produits sont issus de ramassage et non de culture. N'hésitez pas à nous contacter pour échanger, ce sera avec plaisir !</p> 
            </div>
           </div>  
                     <!--/////////////////////////////////////////////////////////////////////////////  -->
      <div class="slider d-flex flex-column align-items-center justify-content-center position-relative border rounded-pill  w-50 m-auto rounded-5 " >
       
            <div class=" d-flex justify-content-center mt-5">
             <img src="assets/img/1.jpg" class="caresole" alt="image de du slider">
            </div>
            <div class="d-flex mb-5">
          <div class="left position-absolute bottom-50 end-100"  title ="image du précedent ">
            <i class="bi bi-caret-left-fill fs-1 text-dark " ></i>
          </div>
          <div class="right position-absolute bottom-50  start-100" title="démarer du carousel">
            <i class="bi bi-caret-right-fill fs-1 text-dark"></i>
          </div>
        </div>
     </div>
     </div>
     </div>
        </div>
         <!--fin de container  -->
  </main>                  

<?php
     require_once "inc/footer.inc.php";
?>