<?php
$title="produits";
require_once "../inc/functions.inc.php";

if(empty($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");

}else{
if($_SESSION['user']['role']=='ROLE_USER'){
    header("location:".RACINE_SITE."index.php");
}
} 

?>

<?php
//pour suprimer et modification

if(isset($_GET['action']) && isset($_GET['id_product'])){
            
        
    if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_product'])){ 
        // debug($_GET['action']); 

        $idproduct = htmlentities($_GET['id_product']) ;

        deleteProduct( $idproduct);

        header('location:gestionProduits.php');

    }else if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_product'])){ // récupération d'une catégorie

        $idproduct = htmlentities($_GET['id_product']) ;

        $product  = showProduct( $idproduct);

    }else{

        header('location:gestionProduits.php');
    }

 }

//pour validation en post 
$info =''; 
if (!empty($_POST)){
    // debug($_POST);
debug($_FILES);
    $varif=true;
    foreach($_POST as $key => $value){
        if(empty(trim($value))){ 
            $varif= false;

        }
    }
    //la superglobale $_FILES a un indice "image" qui correspond au "name" de l'input type="file" du formulaire, ainsi qu'un indice "name" qui contient le nom du fichier en cours de téléchargement.
    if(!empty($_FILES['image']['name'])){ //si le nom du fichier en cours de téléchargement n'est pas vide, alors c'est qu'on est en train de télécharger une photo
        
       
        $image='img/'. $_FILES['image']['name'];//$image contient le chemin relatif de la photo et sera enregistré en BDD. On utilise ce chemin pour les "src" des balises <img>.
       
//debug($_FILES);
        copy($_FILES['image']['tmp_name'],'../assets/'.$image);
//debug($_FILES);
        //on enregistre le fichier photo qui se trouve à l'adresse contenue dans $_FILES['image']['tmp_name'] vers la destination qui est le dossier "img" à l'adresse "../asstes/nom_du_fichier.jpg".
    }

    if(!$varif || empty($image)){
        $info=alert("tout le champs sont requise","danger");
    }else{
        ////si tout est renseigné je commence la validation des champs

        // on vérifie l'image : 
            // $_FILES['image']['name'] Nom
            // $_FILES ['image']['type'] Type
            // $_FILES ['image']['size'] Taille
            // $_FILES ['image']['tmp_name'] Emplacement temporaire
            // $_FILES ['image']['error'] Erreur si oui/non l'image a été réceptionné

        if($_FILES['image']['error']!= 0 || $_FILES['image']['size'] == 0 || !isset($_FILES['image']['type'])){

        $info=alert("l'image n'est pas valide","danger");
        }
        $titleProduit = trim($_POST['title']);  
        $category = trim($_POST['categories']);//// $category => je récupére le nom de la catégorie avec le bouton radio     
        $date = trim($_POST['date']);
        $price  = trim($_POST['price']);
        $stock = trim($_POST['stock']);
        $weight = trim($_POST['weight']);
        $desProduct = trim($_POST['description']);
       

        
        ////Explications: 

        //    .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne.
        //     \/ : correspond au caractère /. Le caractère / doit être précédé d'un backslash \ car il est un caractère spécial en expression régulière. Le backslash est appelé caractère d'échappement et il permet de spécifier que le caractère qui suit doit être considéré comme un caractère ordinaire.
        //     .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne.
        if(strlen( $titleProduit) < 3 || preg_match('/[0-9]+/', $titleProduit)){
            $info=alert("le champ de  nom de la categorie n'est pas valide","danger");

        }
        if(!is_numeric($price)  ){ 

            $info.=alert("le prix n'est pas valide","danger"); 
        }
        if(strlen( $desProduct) < 50 ){
              
            $info.= alert("il faut que la description dépasser 50 caractere","danger");

        }
        //si il n'y a pas d'erreure sur la formulaire
        if(empty($info)){
            $titleProduit=htmlentities($titleProduit);
           $category=htmlentities($category);           
           $date=htmlentities($date);
           $price=(float)htmlentities($price);//le flot quand on donner valeure va changer float
           //je convertir le contenu la variable $price en float
           $stock=(int)htmlentities($stock);//le int quand on donner valeure va changer float
           //je convertir le contenu la variable $stock en int
           $weight=(int)htmlentities($weight);
           $desProduct=htmlentities($desProduct);
         
           //pour l'index categories de la superglobale $-POST il faut récupérer l'id-category afin de l'insérer  dans la table films 
           $idCategory=idcategory($category);//je recupere avec la function idcategory()un tableau avec un seule élement qui contient l'identifiant de la catégorie choisie
           //debug($idCategory);
           $category_id =$idCategory['id_category'];
        //    $result = addProduct($titleProduit,$category_id,$date,$image,$price,$stock,$quantity,$desProduct);
          // debug($category_id);
           // debug($stock);
           if(isset($_GET['action']) && $_GET['action']=='update' && isset($_GET['id_product']) && !empty($_GET['id_product'])){ // je vérifie l'action dans l'url et l'id 

            $idproduct = htmlentities( $product['id_product']);
             
             $result = updateProduct( $idproduct,$titleProduit,$category_id,$image,$date,$price,$stock,$weight,$desProduct);  // j'essfectue la modification avec la fonction updateFilm() créé dans le fichier des fonctions
          
           
             }else{
                $result = addProduct($titleProduit,$category_id,$date,$image,$price,$stock,$weight,$desProduct);
            
            // j'insére mon film avec la fonction addFilm() créée dans le fichier fonctions.php  
            
             }
          // j'insére mon film avec la fonction addFilm() créée dans le fichier fonctions.php 
          header('location:gestionProduits.php');
          //redirection de page 


        }


    }
}

require_once "../inc/header.inc.php";
                            //POUR FORM DE VALITATION/////////
                            // <!-- Tableau de insertion -->
?>
 
<main class="backpro">
    <div class="container">        
        <h1 class="text-center fs-2 fw-bolder mb-5 text-uppercase text-danger border rounded-circle proform"><?=(isset($product)) ?'modifier un produit':'Ajoute un produit'?></h1>
   <div class="d-flex  justify-content-end ">
      <a href="gestionProduits.php" class="btn btn-success mt-2 pt-2 text-dark fw-bolder fs-1">voir des Produits</a>    
    </div>
    <p><?=$info?></p>

  <form action="" method="post" enctype="multipart/form-data" class="back">
    <!-- le attribut enctype specifier que le formulaire envoie des fichier en plus des donner text:permet de telechger(upload) un fichier(photo)=>il est obligatoire -->
    <div class="row">        
        <div class="col-sm-12 col-md-6  mb-5">
            <label for="title">Titre de Produit</label>
            <input type="text" name="title"id="title"class="form-control" value="<?= $product['title'] ?? '';?>">
                       
        </div>
        <div class="col-sm-12 col-md-6 mb-5 ms-2">
            <label for="image">Photo</label>
            <input type="file" name="image"id="image">
        </div>   
    </div>  

    <div class="row">
        <label for="categories">Type de produit</label>
                <?php
                $categories=allcategorie();
                // debug($categories);
                foreach($categories as $key => $category){
                ?>

      <div class="form-check col-sm-12 col-md-4 ps-6">
        <input class="form-check-input" type="radio" name="categories" id="flexRadioDefault1" value=" <?= $category['name']?>" <?php if(isset($product['categorie_id']) && $product ['categorie_id']==$category['id_category']) echo 'checked'?>>
        <label class="form-check-label" for="flexRadioDefault1"><?= $category['name']?></label>
          <!-- echo 'checked' ithuve thana check pannum eantha Genere de film -->
       </div>
       <?php } ?>
    </div>                                                            
   <div class="row">
    <div class="col-sm-12 col-md-6 mb-5">
        <label for="price">Prix</label>
        <div class=" input-group">
            <input type="text" class="form-control" id="price" name="price" aria-label="Euros amount (with dot and two decimal places)" value="<?= $product['price'] ?? '';?>">
            <span class="input-group-text">€</span>
        </div>
    </div>
 
    <div class=" col-sm-12 col-md-6">
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" class="form-control" min ="0" value="<?= $product['stock'] ?? '';?>"> <!--pas de stock négativ donc je rajoute min="0"-->
    </div>
 </div>
   <div class="row">
        <div class="col-sm-12 col-md-6">
            <label for="weight">poids</label>
            <input type="number" name="weight" id="weight" class="form-control" min ="0" value="<?= $product['weight'] ?? '';?>"> 
        </div>
        <div class="col-sm-12 col-md-6 mb-5">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control"value="<?= $product['date'] ?? '';?>" >
        </div>
   </div>  
   <div class="row">
        <div class="col-sm-12 col-md-8 mb-5">
            <label for="description">Description de product</label>
            <textarea type="text" name="description" id="description" class="form-control" cols="30" rows="10" ><?= $product['description'] ?? '';?></textarea>
                                   
        </div>
   </div>
   <div class="row justify-content-center">
    <button type="submit" class="btn btn-danger p-3 w-25" ><?=(isset($product)) ?'modifier un produits':'Ajoute un produits'?></button>
    <!-- (isset($product)) ?'modifier un film':'Ajoute un film' ithu eathukuna namma pencil click pannumpothu heading change avatharku -->

  </div>


 </form>



 </div>
 <!-- div fin de container -->
</main>
<?php
    require_once "../inc/footer.inc.php";
?>    