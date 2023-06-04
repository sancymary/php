<?php
$title="gestion/Films";
require_once "../inc/function.inc.php";
require_once "../inc/header.inc.php";

?>
<?php
//////////////////////////////////2/01/2023-VENDREDI//////////////////pour subrimer ///////////////////////

if(isset($_GET['action']) && isset($_GET['id_film'])){
            
        
    if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_film'])){ //Suppresion d'une catégorie
        // debug($_GET['action']);

        $idfilm = htmlentities($_GET['id_film']) ;

        deleteFilm( $idfilm);

        header('location:dashboard.php?films_php');



    }else if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_film'])){ // récupération d'une catégorie

        $idfilm  = htmlentities($_GET['id_film']) ;

        $film  = showFilm($idfilm);
   
    }else{

        header('location:dashboard.php?categories_php');
    }

 }

////////////////////////////////////////////////////////////////////////////////////////
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
        $titleFilm = trim($_POST['title']);
        $director = trim($_POST['director']);
        $actors = trim($_POST['actors']);
        $category = trim($_POST['categories']);//// $category => je récupére le nom de la catégorie avec le bouton radio 
        $duration = trim($_POST['duration']);
        $synopsis = trim($_POST['synopsis']);
        $dateSortie = trim($_POST['date']);
        $price  = trim($_POST['price']);
        $stock = trim($_POST['stock']);
        $ageLimit = trim($_POST['ageLimit']);

        if(strlen($director) < 3 ||  preg_match('/[0-9]+/',$director)){

            $info.=alert("le champs director n'est pas valide","danger"); 
        }
        ////Explications: 

        //    .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne.
        //     \/ : correspond au caractère /. Le caractère / doit être précédé d'un backslash \ car il est un caractère spécial en expression régulière. Le backslash est appelé caractère d'échappement et il permet de spécifier que le caractère qui suit doit être considéré comme un caractère ordinaire.
        //     .* : correspond à n'importe quel nombre de caractères (y compris zéro caractère), sauf une nouvelle ligne.

        if(strlen($actors) < 3 ||  preg_match('/[0-9]+/',$actors) || !preg_match('/.*\/.*/',$actors)){ /// valider que l'utilisateur a bien inséré le symbole '/' : chaîne de caractères qui contient au moins un caractère avant et après le symbole /.

            $info.=alert("le champs de actors n'est pas valide,il faut séparer les acteures avec symbole","danger"); 
        }

        if(strlen($synopsis) < 50 ){ /// valider que l'utilisateur a bien inséré le symbole '/' : chaîne de caractères qui contient au moins un caractère avant et après le symbole /.

            $info.=alert("il faut que le requise le resume dépasser 50 caractere","danger"); 
        }

        if(!is_numeric($price)  ){ 

            $info.=alert("le prix n'est pas valide","danger"); 
        }
        //si il n'y a pas d'erreure sur la formulaire
        if(empty($info)){
           $titleFilm=htmlentities($titleFilm);
           $director=htmlentities($director);
           $actors=htmlentities($actors);
           $ageLimit=htmlentities($ageLimit);
           $category=htmlentities($category);
           $duration=htmlentities($duration);
           $dateSortie=htmlentities($dateSortie);
           $price=(float)htmlentities($price);//le flot quand on donner valeure va changer float
           //je convertir le contenu la variable $price en float
           $stock=(int)htmlentities($stock);//le int quand on donner valeure va changer float
           //je convertir le contenu la variable $stock en int
           $synopsis=htmlentities($synopsis);
           //pour l'index categories de la superglobale $-POST il faut récupérer l'id-category afin de l'insérer  dans la table films 
           $idCategory=idcategory($category);//je recupere avec la function idcategory()un tableau avec un seule élement qui contient l'identifiant de la catégorie choisie
           //debug($idCategory);
           $category_id =$idCategory['id_category'];
          // debug($category_id);
           // debug($stock);
           if(isset($_GET['action']) && $_GET['action']=='update' && isset($_GET['id_film']) && !empty($_GET['id_film'])){ // je vérifie l'action dans l'url et l'id 

             $idFilm = htmlentities($film['id_film']);
             
             $result = updateFilm($idFilm,$titleFilm,$director,$actors,$ageLimit,$category_id,$duration,$dateSortie,$synopsis,$image,$price,$stock);  // j'essfectue la modification avec la fonction updateFilm() créé dans le fichier des fonctions
          
           
             }else{
            
             $result = addFilm($titleFilm,$director,$actors,$ageLimit,$category_id,$duration,$dateSortie,$synopsis,$image,$price,$stock);// j'insére mon film avec la fonction addFilm() créée dans le fichier fonctions.php  
            
             }
          // j'insére mon film avec la fonction addFilm() créée dans le fichier fonctions.php 
          header('location:dashboard.php?films_php');


        }


    }
}


////////////////////////////////////////////////////////POUR FORM VALITATION EXERCICES 01/06/23


?>
<main>
<h2 class="text-center fw-bolder mb-5 text-danger"><?=(isset($film)) ?'modifier un film':'Ajoute un film'?></h2>
<p><?=$info?></p>
<!-- (isset($film)) ?'modifier un film':'Ajoute un film' ithu eathukuna namma pencil click pannumpothu heading change avatharku -->

<form action="" method="post" enctype="multipart/form-data" class="back">
    <!-- le attribut enctype specifier que le formulaire envoie des fichier en plus des donner text:permet de telechger(upload) un fichier(photo)=>il est obligatoire -->
    <div class="row">
        
        <div class="col-md-6 mb-5">
            <label for="title">titre de film</label>
            <input type="text" name="title"id="title"class="form-control" value="<?= $film['title'] ?? '';?>">
            <?php
            // if(!empty($film['title'])){
            //     echo $film['title'];

            // }else
            // echo '';
            ?>
            
        </div>
        <div class="col-md-6 mb-5">
        <label for="image">Photo</label>
            <input type="file" name="image"id="image">
            <!-- type de fille il ne faut pas oublier le attribut enctype ="multipart/form-data" dans la balise form-->

        </div>

    </div>
    <!--  copie par  -->
    <div class="row"> 
<div class="col-md-6 mb-5">
 <label for="director">Réalisateur</label>
 <input type="text" class="form-control" id="director" name="director" value="<?= $film['director'] ?? '';?>" >
 </div>
 <div class="col-md-6">
 <label for="actors">Acteur(s)</label>
 <input type="text" class="form-control" id="actors" name="actors"  value="<?= $film['actors'] ?? '';?>" placeholder="séparez les noms d'acteurs avec un /">
 </div>  
 </div>
<div class="row">
 <!-- raccouci bs5 select multiple -->
 <div class="mb-3">
 <label for="ageLimit" class="form-label">Àge limite</label>
 <select multiple class="form-select form-select-lg" name="ageLimit" id="ageLimit">
 <option value="10" <?php if(isset($film['ageLimit']) && $film ['ageLimit']==10) echo 'selected'?>>10</option>
 <option value="13" <?php if(isset($film['ageLimit']) && $film ['ageLimit']==13) echo 'selected'?> >13</option>
 <option value="16" <?php if(isset($film['ageLimit']) && $film ['ageLimit']==16) echo 'selected'?> >16</option>
 </select>
 </div>
 <!-- cette if isset on vois 02.06/23  
echo 'selected' ithuve thana select pannum eantha age innu -->



 </div>
 <div class="row">
    <label for="categories">Genere de film</label>
    <?php
    $categories=allcategorie();
    // debug($categories);
    foreach($categories as $key => $category){
    ?>

<div class="form-check col-sm-12 col-md-4">
  <input class="form-check-input" type="radio" name="categories" id="flexRadioDefault1" value=" <?= $category['name']?>" <?php if(isset($film['category_id']) && $film ['category_id']==$category['id_category']) echo 'checked'?>>
  <label class="form-check-label" for="flexRadioDefault1">
   <?= $category['name']?>
   <!-- cette if isset on vois 02.06/23 
echo 'checked' ithuve thana check pannum eantha Genere de film -->
  
  </label>
</div>
<?php
    }
    ?>
   
 </div>
<div class="row">
 <div class="col-md-6 mb-5">
 <label for="duration">Durée du film</label>
 <input type="time" class="form-control" id="duration" name="duration"value="<?= $film['duration'] ?? '';?>">
 </div>
 
 <div class="col-md-6 mb-5">

 <label for="date">Date de sortie</label>
 <input type="date" name="date" id="date" class="form-control"value="<?= $film['date'] ?? '';?>" >
 </div>
 </div>
 <div class="row">
 <div class="col-md-6 mb-5">
 <label for="price">Prix</label>
 <div class=" input-group">
 <input type="text" class="form-control" id="price" name="price" aria-label="Euros amount (with dot and two decimal places)" value="<?= $film['price'] ?? '';?>">
 <span class="input-group-text">€</span>
 </div>
 </div>
 
 <div class="col-md-6">
 <label for="stock">Stock</label>
 <input type="number" name="stock" id="stock" class="form-control" min ="0" value="<?= $film['stock'] ?? '';?>"> <!--pas de stock négativ donc je rajoute min="0"-->
 </div>
 </div>
 <div class="row">
 <div class="col-12">
 <label for="synopsis">Synopsis</label>
 <textarea type="text" class="form-control" id="synopsis" name="synopsis" rows="10"> <?= $film['synopsis'] ?? '';?></textarea>
 </div>
 </div>
 <!-- pourquoi on met value value="// $film['stock'] ?? '';"quand on click pencil button ca arrive une modification en form pour ça --> 

<div class="row justify-content-center">
    <button type="submit" class="btn btn-danger p-3 w-25" ><?=(isset($film)) ?'modifier un film':'Ajoute un film'?></button>
    <!-- (isset($film)) ?'modifier un film':'Ajoute un film' ithu eathukuna namma pencil click pannumpothu heading change avatharku -->

</div>


</form>


</main>