<?php
$title = "categories";
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
                        //pour supression et  update d'une categorie
if(isset($_GET['action']) && isset($_GET['id_category'])){
            
        
    if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_category'])){ //Suppresion d'une catégorie
        // debug($_GET['action']);

            $idCategory = htmlentities($_GET['id_category']) ;

            deleteCategory($idCategory);

            header('location:categories.php');

    }else if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_category'])){ // récupération d'une catégorie

            $idCategory = htmlentities($_GET['id_category']) ;

            $category = showCategory($idCategory);
           
   
    }else{

        header('location:categories.php');
    }

}

$info =''; //une variable qui va recevoir les message  d'alerte, on déclare dans le script en generale avec valeure vide pour ne pas engendred d'erreure sur la page quand on l'appel vide (sans message stocke)

if (!empty($_POST)){
    // avec !empty() on vérifie si la superglobal est n'est pas vide 
    // si $_POST n'est pas vide , c'est que $_POST est rempli, donc que le formulaire a été envoyé. Notez que  on peut l'envoyer avec des champs vides, les valeurs de $_POST étant alors des strings vides.

    // on verifie que tous les champs recuperer avec $_POST sont remplir

    $varif=true;// variable qui vas nous servire à verifier si les champs sont remplir on a declarer en true
    foreach($_POST as $key => $value){//avec une boucle on verifier le tableau $_POST
        if(empty(trim($value))){//si les valeure sont vide ou une seule valeure est vide $varif recoit la valeure fale
            $varif= false;

        } 
    }
    if(!$varif){ // je verifier finale de la variable $verif//si $verif est fale je stock un message d'erreure dans $info
        $info=alert("tous les champs sont requise","danger");

    }else{
        // debug($_POST);
        //si tout est renseigner je commence la validation des champs

        // je stock les valeure récuperer dans des variable en verifiant qu'on n'as pas de chaines de caractere vides
            $nameCategorie =trim( $_POST['name']);
            $description =trim( $_POST['description']);

           

            ///////////on fait de valitation donner*****************************
            
            if(strlen($nameCategorie) < 3 || preg_match('/[0-9]+/',$nameCategorie)){
                //l'expression réguliaire [0-9]+ recherche une séquence d'un ou plusieure chiffre dans la chaine de caractére.la function preg-match renvoie 1 si la coressponde est trouvé sinon 0.
                $info=alert("le champ de  nom de la categorie n'est pas valide","danger");

            }
            if(strlen( $description) < 50 ){
              
                $info.= alert("il faut que la description dépasser 50 caractere","danger");

            }
            if(empty($info)){
                    
        $nameCategorie= htmlentities($nameCategorie);   
        $description= htmlentities($description); 
      
       
        if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_category'])){
            $idCategory=htmlentities($_GET['id_category']);
            $result= updateCategory($idCategory,$nameCategorie,$description);//je effectuer la modification 
            header('location:categories.php');
         }else{
            $result= addCatagory($nameCategorie,$description);
            header('location:categories.php');
         }
    }

}
}
require_once "../inc/header.inc.php";
?>
<main>

<div class="container-fluide">
                            <!-- Tableau de insertion -->
   
        <div class="col-sm-12 col-md-12 col-lg-12 mt-5">
                 <h2 class="text-center mb-5 text-danger">GESTION DE CATEGORIE</h2>
                        <?php
                            echo $info; 
                         ?>                           
            <form action="" method="post" class="back">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mb-5">
                        <label for="">Nom de la categorie</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?= $category['name'] ?? '';?>">
                    </div>
                </div>
    
                <div class="row">
                     <div class="col-sm-12 col-md-12 mb-5">
                        <label for="">Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10" ><?=$category['description'] ?? '';?></textarea>
                     </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-danger p-3"><?= (isset($category)) ?'Modifier une categorie':'Ajoute une categorie'?></button>
    
                </div>
            </form>
          </div>
    
        </div>   

         <!-- tableau pour afficher toute les catégories avec des boutons de suppression et de modification -->
        
        <div class="col-sm-12 col-md-6 d-flex flex-column mt-5 mx-auto p-2">  
       
             <h2 class="text-center fw-bolder mt-5 text-danger fs-1">Liste des catégories</h2>
                        <?php
                        $categories=allcategorie();// je recupere les categories de la BDD
                        ?>
         <table class="table table-bordered mt-5 tablecategory border-dark" >  
                <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Supprimer</th>
                                <th>Modifier</th>
                            </tr>
                </thead>
             <tbody>
                <?php
                //uv que le fetch se passe dans la  function (allcategiries()),on va boucler sur le tableau avec un foreach
                foreach ($categories as $key => $category){
                    //je recupere le valeure de  mon tableaux $categories dans le BDD   
                ?>

            <tr>
                <td><?=$category['id_category']?></td>
                <td><?=html_entity_decode(ucfirst($category['name']))?></td> 
                <td><?=substr(html_entity_decode(ucfirst($category['description'])),0,50)."..."?></td>
                <td class="text-center"><a href="categories.php?action=delete&id_category=<?=$category['id_category']?>"><i class="bi bi-trash text-dark"></i></a></td>
                <td  class="text-center"><a href="categories.php?action=update&id_category=<?=$category['id_category']?>"><i class="bi bi-pencil-fill"></i></a></td>
            </tr>
                <?php
                }
                ?>
         </tbody>
       </table>

    </div>
  </div>
    <!-- fin de container div -->
</main>

<?php
require_once "../inc/footer.inc.php";
?>
         
            
       
               
                
    
    
