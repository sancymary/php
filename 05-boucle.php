<!doctype html>
<html lang="fr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Les Boucle en PHP</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.png">

</head>

<body>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg" >
    <div class="container-fluid">
      <a class="navbar-brand" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="01_index.php">Introduction</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="02-base.php">Les bases</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="03-variable_constant.php">Les variables et les constantes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="04-conditioncor.php">Les conditions en PHP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="05-boucle.php">Les Boucle en PHP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="06-inclusioncor.php">Les importation des fichier en PHP</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="07-tableau.php">Les tableau</a>
          </li>
        </ul>
       
      </div>
    </div>
  </nav>
  <header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1>Les Boucle en PHP</h1>
            <p class="col-md-12 fs-4"> Les boucles (qu'on appelle aussi des structures itératives) sont un moyen de faire répéter plusieurs fois un même morceau de code. Une boucle est donc une répétition, comme on a pu le voir en JavaScript</p> 
        </section>
  </header><!-- fin header -->
  <main class="container-fluid px-5">
    <div class="col-sm-12 col-md-6">
        <h2>le boucle while</h2>
        <p>La boucle est, comme en JS, une boucle qui permet d'éxécuter un code TANT QUE  la condition d'entrée est toujours remplie.</p>
        <?php
        $a=0;// les initialisation de variable à 0= valeure de depart de la boucle
        while ($a < 5){// on boucle tant que $a est strictement inférieure à 5
            echo "<p> tour n° $a </p>"; // on affiche a quelle tour on se trouve
            $a++;// on incrementé la valeure de la variable pour que la condition d'entrée devienne fale  à un moment donné

        }
        //Exercices
        // à l'aide d'une boucle  while, vous afficher les annés 1920 à 2023 dans un menu déroulant.


        $i = 1920;

                echo '<form>
                        <select class="form-select form-select-lg" name="" id="">';
                            while ($i <= 2023){
                                 echo "<option value=\"$i\"> $i</option>";
                                 $i++;
                            }         
                echo  '</select>
                     </form>';
                     
                           
        //****************************************************************************** */
         // Exercice bonus : faire la même chose dans l'autre sens, de 2023 à 1920 
                
         $j=2023;   
         ?>
         <form action="#" class="mt-3">
             <select class="form-select form-select-lg">
                 <?php
                     while($j > 1919){
                 ?>
                     <!-- <option value=""> -->
                         <?php //echo $j ;?>
                     <!-- </option> -->
                     <option value="<?= $j ;?>"><?= $j; ?></option>

                 <?php

                     $j--;
                     }
                 ?>

             </select>
         
         
        <!-- //******************************************************************************* */ -->       
            
        </div>
        <div class="col-sm-12 col-md-6">
        <h2>La boucle do while</h2>
            <p>cete boucle fonctionne avec la même instruction que la boucle <span>while</span>. Ce pendant pour cette boucle, la condition est testée à la fin et pas au début</p>
            <p>La boucle do while a la particularité de s'exécuter au mois une fois puis tant que la condition de fin est vraie</p>

            <?php
            $i=0; //déclaration et intialisation de la variable ;valeure de départ
            do{ // ici on execute d'abord cette premiere partie avant même de regarder la condition
                echo "<p> $i</p>";//j'affichage la valeure de $i
                $i++;//je incremente//1
            }while($i>100);// je donner la condition ,si elle a deja été rempli mon script à cetee endroit sinon la boucle recommence jusque à ce que la condition soit remplie.
               ?>

        </div>
        <div class="col-sm-12 col-md-6">
            <h2>la boucle for</h2>
            <p>La boucle for , comme toutes les boucles, sert à répéter un morceau de code tant que la condition n'est pas respectée. Sa structure est cepenfdant différente :</p>
            <ol>
                <li><span>Initialisation de la variable</span></li>
                <li><span>Condition de sortie</span></li>
                <li><span>Incrémentation de la variable</span></li>
            </ol>
            <?php
            for($i=0;$i <15; $i++){ // je lance ma boucle for avec les option citéés au dessus
                echo "<p>  tour n° $i</p>"; //dans accolade je presic le code à répéter
            }
// ***********************************************************************************************************
 //Exercice : Créer en PHP un formulaiere de selection de date de naissance (jour - moi - année)
 echo '<form>

 <label for="jour" > Jour de naissance</label>
 <select class="form-select " name="jour" id="jour">';
     for($jour =1 ; $jour <= 31; $jour++) {
         echo "<option value=\"$jour\"> $jour</option>";
     }
                  
echo    '</select>
 <label for="mois" > Mois de naissance</label>
 <select class="form-select " name="mois" id="mois">';
     for($mois =1 ; $mois <= 12; $mois++) {
         echo "<option value=\"$mois\"> $mois</option>";
     }
     
echo    '</select>
 <label for="annee" > Année de naissance</label>
 <select class="form-select " name="anee" id="annee">';
     for($annee =2020 ; $annee > 1970 ; $annee--) {
         echo "<option value=\"$annee\"> $annee</option>";
     }



echo ' </select>
 </form>';
 //*************************************************************************************************************** */

// Exercice : créer un tableau qui affiche 0 à 9 sur une seule ligne
// Solution 1 :
echo "<table class=\"table table-bordered mt-5\">
<tr>";
for($i=1; $i<=10; $i++){
     echo"<td>Colonne numéro $i </td>";   
}
echo      "</tr>
<tr>";
for($i=0; $i<10; $i++){
     echo"<td> $i </td>";   
}
echo     "</tr>
</table>";
 ?>
</div>

        <div class="col-sm-12 col-md-6 mt-5">
                <h2>La boucle foreach</h2>
                <p>La boucle foreach sert à parcourir un tableau (array() ou []). On verra cette boucle plus en détails dans la page dédiée aux array(). </p>

                <p class="alert alert-danger">Attention. Lorsque que vous faites une boucle, vérifiez votre condition de sortie ainsi que l'incrémentation de votre variable. Sans incrémentation, vous aurez une boucle infinie.</p>

                <p class="alert alert-secondary">A force d'utilier les boucles, il sera de plus en plus logique de choisir telle ou telle boucle pour tel ou tel usage. </p>
          </div>
         </main>
  <footer>
    <div class="d-flex justify-content-evenly align-items-center bg-dark text-white p-3">
      <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/langref.php">Doc PHP</a>
      <a class="nav-link" href="01_index.php"><img src="assets/img/logo.png" alt="logo php"></a>
      <a class="nav-link" target="_blank" href="https://devdocs.io/php/">DevDocs</a>
    </div>
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>