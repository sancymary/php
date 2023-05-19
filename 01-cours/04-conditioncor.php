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
    <title>Cours PHP - Les conditions</title>
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
            <h1>Les conditions en PHP</h1>
            <p class="col-md-12 fs-4"> Les conditions sont un chapitre clé en PHP comme dans les autres langages de programmation. Par exemple, lorque l'on fera une page de connexion, on aura la condition suivante: SI l'adresse existe dans la BDD et SI le mdp correspond à l'adresse, l'utilisateur est connecté  SINON il reste sur la page avec une messega d'erreur</p> 
        </section>
  </header><!-- fin header -->
  <main class="container-fluid px-5">
    <div class="row">
        <div class="col-sm-12">
            <h2>La condition simple if else </h2>

            <?php 
                $a = 10;
                $b = 5;
                $c = 2;

                if ($a > $b) { // si la condition est vrai, c'est à dire $a est supèrieur à $b alors on exécute les accolades qui suivent:
                    echo "<p class=\"alert alert-success\"> a qui contient $a est strictement supérieur à b qui vaut $b</p>";
                }else{ // si la condition, est fausse on exécute le else
                    echo "<p class=\"alert alert-success\"> Non, c'est b ($b) qui est supérieur à a ($a)</p>";
                }

                if ($a > $c) { 
                    echo "<p class=\"alert alert-success\"> a qui contient $a est strictement supérieur à c qui vaut $c</p>";
                }else{ 
                    echo "<p class=\"alert alert-success\"> Non, c'est b ($c) qui est supérieur à a ($a)</p>";
                }


            ?>
            <h2>La condition simple avec AND ou &&</h2>
                <?php 
                if ($a > $b && $b > $c) { // true
                    echo "<p class=\"alert alert-success\"> a qui contient $a est strictement supérieur à b qui vaut $b et b est strictement supèrieur à c qui vaut $c</p>";
                }else{ 
                    echo "<p class=\"alert alert-success\">L'une ou les deux conditions ne sont pas remplies</p>";
                }

                ?>
                <p>Comme en JS, la condition avec && attend forcément que chaque côté soit évalué à true et donc que les deux conditions renvoient vrai. Si l'une des deux est fausse, alors on ira au else s'il y en a un ou on affichera rien </p>

            <h2>Condition simple avec OR ou ||</h2>
                <?php 
                    if ($a == 9 || $b > $c) { // true
                        echo "<p class=\"alert alert-success\"> Une des deux conditions est vraie, le code renvoie true et le if s'exécute</p>";
                    }else{ 
                        echo "<p class=\"alert alert-success\">Aucune ,des conditions n'est vrai, c'estle else qui s'exécute </p>";
                    } 

                ?>
                <p>Au contraire, lorsque l'on utilise OR '||', on atend qu'une seule des deux conditions soit vraie. </p>


                <h2>Condition simple avec XOR </h2>
                <p>Alors que le OR s'exécute si une des conditons ou les deux conditions sont bonnes, XOR quant à lui ne s'exécute pas si les deux conditions sont bonnes ou si elles sont fausses. Seule l'une des deux conditions soit être bonne.</p>
                <?php
                    if ($a == 10 XOR $b == 5) { // true
                        echo "<p class=\"alert alert-success\"> Une des deux conditions est vraie, le code renvoie true et le if s'exécute</p>";
                    }else{ 
                        echo "<p class=\"alert alert-success\">Aucune, des conditions n'est vrai, ou les deux conditions sont vrais, c'est le else qui s'exécute </p>";
                    } 

                ?>
                <h2>Conditions multiples avec if, else if et else</h2>

                <p>Gràce a une conditon multiple, vérifiez dans un premièr temps si a est strictement égal à 8, dans un second temps si a  est différent de 10 et enfin si aucune de ces condition n'est vrai</p>

                
<?php

if ( $a === 8 ){
    echo "<p class=\"alert alert-success\">  a est egale a 8</p>";

}else if($a !== 10){   //si la condition est fause on execute le else
    echo"<p class=\"alert alert-success\"> a est egale a 10 </p>";

}else{
    echo"<p class=\"alert alert-success\">a n'est egale à 8  et n'est pas differen de 10 </p>";


}
?>
<h2>les Conditions ternaire</h2>
<?php
//la ternaire est une autre syntax pour ecrire un if ... else
$a=11;
echo ($a===10) ?"\$a est egale a 10" : '$a est different de 10 <br>';// Dans la ter le "?" remplace le if et le ":" remplace le else,Ainsi on dit :si $a est egale à 10 on affiche la premiere expression sinon le seconde
?>
<h2>Les operateure "==" et "==="</h2>
<p>l'operateure <span>==</span> permet de comparer une egalité de valeyre .alors que operateure <span>===</span> permet de comparer une facon stricte une comparioso en valeure et en type</p>
<?php
$varA=1;
$varB='1';
if ($varA==$varB){ //la  condition est vrai car en valeure 1 et 1 sont equivalent
  echo"<p class=\"alert alert-success\">  \$varA et \$varA sont égale en valeure </p>";

}else{
  echo"<p class=\"alert alert-success\">  \$varA et \$varA  ne sont pas  égale en valeure </p>"; 

}
//
if ($varA===$varB){ //la  condition est fausse  car en valeure 1 et 1 sont different  en type
  echo"<p class=\"alert alert-success\">  \$varA et \$varA sont égale en valeure et en type </p>";

}else{
  echo"<p class=\"alert alert-success\">  \$varA et \$varA  ne sont pas  égale en valeure mais pas en type </p>"; 

}
//
?>
<h2>condition avec operateure combiné <=></h2>
<?php
echo ($a <=> $b);// affiche 1
//je change $b=10
echo "<br>";
$b=11;
echo ($a <=> $b);// affiche 0
echo "<br>";
// je change $b=12
$b=12;
echo ($a <=> $b); // affiche -1
echo "<br>";
/* ici operateure combine compare à la fois : inférieure,le égale et le supérieure en retournant respectivement la valeure -1,0 et 1 
< -----> -1 si a =b (la valeure de gauche est egale à la valeure de droit)
> -----> -1 si a >b (la valeure de gauche est supérieure à la valeure de droit)


*/
$a=50;
$b=29;
if (($a<=>$b) ==-1){
  echo "\$a est inferieure à \$b";

}else if (($a<=>$b)==0){
  echo "\$a est egale à \$b";

}else if (($a<=>$b)==1){
  echo "\$a est superieure à \$b";
}
echo "<br>";


?>
<h2>condition avec switch</h2>
<?php
// la condition switch est une autre syntaxe pour écrire un if .. elseif ...else quand on veut comparer une variable à une multitude de valeurs
$langue='chinois';

switch($langue){
  case 'francaise';
  echo "Bonjour!";
  break;//"break" est obligatoire pour quitter le witcgh une fois un "case " est exécuté
  case 'italien';
  echo "Ciao!";
  break;
  case 'espagnol';
  echo "Hola!";
  break ;
  default:
  echo 'Hello';
  break;

}
echo "<br>";
?>
<h2></h2>
<?php
?>
        </div>

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