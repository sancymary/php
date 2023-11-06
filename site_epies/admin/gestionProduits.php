<?php
$title="gestionProduits";
require_once "../inc/functions.inc.php";



 if(empty($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");

}else{
if($_SESSION['user']['role']=='ROLE_USER'){
    header("location:".RACINE_SITE."index.php");
}
} 
 $product=allProduct();
//  debug( $product);

require_once "../inc/header.inc.php";
?>

<main>
<div class="container"> 
  <div class="d-flex flex-column m-auto mt-5 pt-5 table-responsive ">  
    <h1 class="text-center fw-bolder mt-5 pt-5 text-danger text-uppercase">liste des Produits</h1> 
    <a href="produits.php" class="btn btn-secondary color-dark align-self-end mt-5 me-5 fw-bolder fs-1">Ajoute un Produits</a> 


<table class="table table-bordered mt-5 pt-5 table-hover table-responsive tablegesProduct border-dark" >
            <thead class="theadback text-danger" >
                    <tr>                    
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Affiche</th>
                        <th>Genre</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Date</th>
                        <th>weight</th>
                        <th>Description</th>
                        <th>Supprimer</th>
                        <th>Modifier</th>
                    </tr>  
            </thead>

            <tbody class="tablegesProduct">
                <?php
                foreach($product as $key => $value){
                  //la catégorie du Products/////////////////////////////////////////////////////////////////////////
                  $category = showCategory($value['categorie_id']);
                  $categoryname=$category['name'];
                //   debug($value);   
                  ?>        
                <tr>
                    <td><?=$value['id_product']?></td> 
                    <td><?=$value['title']?></td> 
                    <td><img src="<?= RACINE_SITE."assets/". $value['image']?>"alt="affiche de immage" class="img-fluid"></td>
                    <td><?=$categoryname?></td>
                    <td><?=$value['price']?></td>
                    <td><?=$value['stock']?></td>
                    <td><?=$value['date']?></td>
                    <td><?=$value['weight']?></td>
                    <td><?=substr($value['description'],0,50)?>...</td>
                            <!-- pour delete -->                          
                    <td class="text-center"><a href="produits.php?action=delete&id_product=<?=$value['id_product']?>"><i class="bi bi-trash btn btn-dark"></i></a></td>
                            <!-- pour update  -->
                    <td  class="text-center"><a href="produits.php?action=update&id_product=<?=$value['id_product']?>"><i class="bi bi-pencil-fill btn btn-dark"></i></a></td>

                </tr>  
                    
                    <?php
                      }
                      ?>               
            </tbody>
        </table>
        </div> 
    </div>  
 </main>          

 <?php
require_once "../inc/footer.inc.php";
?>                    
               

           
   










