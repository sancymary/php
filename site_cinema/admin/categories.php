<?php
$title = "categories";
require_once "../inc/function.inc.php";

if(empty($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");

}else{
    if($_SESSION['user']['role']=='ROLE_USER'){
        header("location:".RACINE_SITE."index.php");
    }
} 

// debug($_GET);
// die;

//supression d'une categorie

//pour update
if(isset($_GET['action']) && isset($_GET['id_category'])){
            
        
    if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_category'])){ //Suppresion d'une catégorie
        // debug($_GET['action']);

        $idCategory = htmlentities($_GET['id_category']) ;

        deleteCategory($idCategory);

        header('location:dashboard.php?categories_php');

    }else if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_category'])){ // récupération d'une catégorie

        $idCategory = htmlentities($_GET['id_category']) ;

        $category = showCategory($idCategory);
   
    }else{

        header('location:dashboard.php?categories_php');
    }

}
/* //--------------------------
    // La superglobale $_POST
    //---------------------------

    debug($_POST); 
    /*
    $_POST est une superglobale qui permet de récupérer les données saisie dans un formulaire.

    // Comme il s'agit d'une superglobale, $_POST est donc un tableau (array), et il est disponible dans tous les contextes du script, y compris au sein des fonctions (pas besoin de faire "global "$_POST").
        Le tableau $_POST se remplit de la manière suivante :
        $_POST = array(

            'name1' => 'valeur1',
            'nameN => 'valeurN'
        );
        où Les name1  et nameN correspondent aux attributs "name" du formulaire, et où valeur1 et valeurN correspondent aux valeurs saisies par l'internaute.

//  */
$info =''; //une variable qui va recevoir les message  d'alerte, on déclare dans le script en generale avec valeure vide pour ne pas engendred d'erreure sur la page quand on l'appel vide (sans message stocke)

if (!empty($_POST)){//// petit rappel : empty() vérifie si une variable est vide :  0, '',      NULL,  false 
    // avec !empty() on vérifie si la superglobal est n'est pa vide 
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

            // debug($nameCategorie);
              // debug($description);

            ///////////on fait de valitation donner*****************************
            //  echo grapheme_strlen($nameCategorie);
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
            updateCategory($idCategory,$nameCategorie,$description);//je effectuer la modification 
            header('location:dashboard.php?categories_php');
         }else{
            addCatagory( $nameCategorie,$description);
           // header('location:dashboard.php?categories_php');//la methode header permet à envoyer des request HTTP donc elle raffrachir la page est suprimer les donner enregistré
            //(je un propleme quand je insere le category il add mail avec une erroure donc je commander  //header('location:dashboard.php?categories_php'); )
         }
        //  header('location:dashboard.php?categories_php');
       
       

            }
        
    }



}

 require_once "../inc/header.inc.php";
?>

<div class="row mt-5 "style="padding-top:8rem">
    <div class="col-sm-12 col-md-6 mt-5">
        <h2 class="text-center fw-bolder mb-5 text-danger">Gestion de Categorie</h2>

        <?php
            echo $info; //pour afficher le message 
        ?>

        <form action="" method="post" class="back">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <label for="">nom de la categorie</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?= $category['name'] ?? '';?>">
                </div>
            </div>

            <div class="row">
                    <div class="col-md-12 mb-5">
                            <label for="">Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="10" ><?=$category['description'] ?? '';?></textarea>
                        </div>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-danger p-3"><?= (isset($category)) ? 'Modifier une categorie': 'Ajoute une categorie'?></button>

            </div>


        </form>

     
           
            

</div>
<div class="col-sm-12 col-md-6 d-flex flex-column mt-5 pe-3">  
        <!-- tableau pour afficher toute les catégories avec des boutons de suppression et de modification -->
        <h2 class="text-center fw-bolder mb-5 text-danger">Liste des catégories</h2>
        <?php
        $categories=allcategorie();// je recupere les categories de la BDD
        // debug($categories);
        ?>
        
        <table class="table table-dark table-bordered mt-5 " > 
            
                <thead>
                            <tr>
                            <!-- th*7 -->
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
            //je recupere le valeure de  mon tableaux $categoriy dans le BDD
            //pour moi  <tr> est un categorie,td est un champs
        ?>

            <tr>

                <td><?=$category['id_category']?></td>
                <td><?=html_entity_decode(ucfirst($category['name']))?></td> 
                <!-- une majuscule sur la premiere lettre avec uvfirst -->
                <td><?=substr(html_entity_decode(ucfirst($category['description'])),0,50)."..."?></td>


                <td class="text-center"><a href="categories.php?action=delete&id_category=<?=$category['id_category']?>"><i class="bi bi-trash"></i></a></td>
                <td  class="text-center"><a href="categories.php?action=update&id_category=<?=$category['id_category']?>"><i class="bi bi-pencil-fill"></i></a></td>
                



            </tr>

            <?php
        }
       
        ?>
        </tbody>
        </table>

    </div>

<?php
// require_once "../inc/footer.inc.php";
?>
