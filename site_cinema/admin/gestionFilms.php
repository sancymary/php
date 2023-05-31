<?php
$title="gestion / Films";
require_once"../inc/function.inc.php";
require_once"../inc/header.inc.php";
?>
<h2 class="text-center fw-bolder mb-5 text-danger">Ajoute un Films</h2>

<form action="" method="post" enctype="multipart/form-data" class="back">
    <!-- le attribut enctype specifier que le formulaire envoie des fichier en plus des donner text:permet de telechger(upload) un fichier(photo)=>il est obligatoire -->
    <div class="row">
        <div class="col-md-6 mb-5">
            <label for="title">titre de film</label>
            <input type="text" name="title"id="title"class="form-control">
            
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
 <input type="text" class="form-control" id="director" name="director"  >
 </div>
 <div class="col-md-6">
 <label for="actors">Acteur(s)</label>
  <input type="text" class="form-control" id="actors" name="actors"  placeholder="séparez les noms d'acteurs avec un /">
 </div>   
 </div>
  <div class="row">
 <!-- raccouci bs5 select multiple -->
 <div class="mb-3">
  <label for="ageLimite" class="form-label">Àge limite</label>
 <select multiple class="form-select form-select-lg" name="ageLimite" id="ageLimite">
 <option value="10" >10</option>
 <option value="13" >13</option>
 <option value="16" >16</option>
 </select>
 </div>



 </div>
 <div class="row">
    <label for="categories">Genere de film</label>
    <?php
    $categories=allcategorie();
    debug($categories);
    foreach($categories as $key => $category){
        ?>

<div class="form-check col-sm-12 col-md-4">
  <input class="form-check-input" type="radio" name="categories" id="flexRadioDefault1" value=" <?= $category['name']?>">
  <label class="form-check-label" for="flexRadioDefault1">
   <?= $category['name']?>
  
  </label>
</div>
<?php
    }
    ?>
   
 </div>
<div class="row">
 <div class="col-md-6 mb-5">
 <label for="duration">Durée du film</label>
 <input type="time" class="form-control" id="duration" name="duration"  >
  </div>
  
  <div class="col-md-6 mb-5">

  <label for="date">Date de sortie</label>
  <input type="date" name="date" id="date" class="form-control" >
 </div>
  </div>
  <div class="row">
  <div class="col-md-6 mb-5">
 <label for="price">Prix</label>
                    <div class=" input-group">
                        <input type="text" class="form-control" id="price" name="price"    aria-label="Euros amount (with dot and two decimal places)">
                        <span class="input-group-text">€</span>
                    </div>
                </div>
        
                <div class="col-md-6">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" min ="0" > <!--pas de stock négativ donc je rajoute min="0"-->
                </div>
        </div>
        <div class="row">
                <div class="col-12">
                    <label for="synopsis">Synopsis</label>
                    <textarea type="text" class="form-control" id="synopsis" name="synopsis" rows="10"></textarea>
                </div>
        </div>

<div class="row justify-content-center">
    <button type="submit" class="btn btn-danger p-3 w-25">Ajoute un film</button>

</div>


</form>