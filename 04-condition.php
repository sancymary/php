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
    <title>cours PHP -Base</title>
    <link rel="stylesheet" href="assets/img/logo.png">

</head>

<body>
  <header>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top" >
  <div class="container-fluid">
    <a class="navbar-brand" href="01-index.php"><img src="assets/img/logo.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="#">Introduction</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="02-base.php">Les base</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="03-variable_constant.php">Les variable et les constant</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="04-condition.php">Les variable et les constant</a>
        </li>
               
      </ul>
      
    </div>
  </div>
</nav>
  
  

<header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1 class="display-5 fw-bold">les conditions en  PHP</h1>
            <p>les condition sont un chapitre clé en php comme dans les autres language de programmation .par ex lorsque l'on fera une page de connection ,on aura la condition suivante:si l'addresse existe dans le BDD et mdp correspond à l'addresse,l'utilisateure est connecter sinon il rese la page avec une message d'erreure</p>
            
        </section>
    </header><!-- fin header -->
    
    <!-- place navbar here -->
  </header>
  <main class="container px-5">
    <div class="col-sm-12">
        <h2>la condition simple if else </h2>
        <?php
        $a=10;
        $b=5;
        $c=2;
        if ( $a> $b){//si la condition est vrai ,c'est  a dire $a est superieure à $b alors on execute les accolades qui suivante:
            echo "<p class=\"alert alert-success\"> a qui contient $a est strictement supérieure à b qui veut $b</p>";

        }else{ //si la condition est fause on execute le else
            echo"<p> non,c'est b ($b)qui est  supérieure à a  ($a)</p>";

        }
        if ( $a> $c){//si la condition est vrai ,c'est  a dire $a est superieure à $b alors on execute les accolades qui suivante:
            echo "<p class=\"alert alert-success\"> a qui contient $a est strictement supérieure à b qui veut $c</p>";

        }else{   //si la condition est fause on execute le else
            echo"<p> non,c'est b ($c)qui est  supérieure à a  ($a)</p>";

        }
        ?>
          <h2>la condition simple avec and ou &&</h2>
        <?php      

        if ( $a> $b && $b> $c){//si la condition est vrai ,c'est  a dire $a est superieure à $b alors on execute les accolades qui suivante:
            echo "<p class=\"alert alert-success\"> a qui contient $a est strictement supérieure à b qui veut $b et b est strictement supérieure à c qui vaut $c</p>";

        }else{   //si la condition est fause on execute le else
            echo"<p> l'une ou les deux condition ne sont pas remplise ($a)</p>";

        }
        ?>        
       
        <p>comme en JS,la condition avec && attend forcément que chaque coté soit évalue à true et donc que les deux conditions renvoient vrai.si l'une des deux est fausse ,alors on ira au else s'il y en  a un ou on affichere rien</p>
        <h2>condition simple avec or ou || </h2>
        <?php

        if ( $a== 9 || $b> $c){// si la condition est vrai ,c'est  a dire $a est superieure à $b alors on execute les accolades qui suivante:
            echo "<p class=\"alert alert-success\"> a qui contient $a est strictement supérieure à b qui veut $b et b est strictement supérieure à c qui vaut $c</p>";

        }else{   //si la condition est fause on execute le else
            echo"<p> accune des condition n'est vrai ,c'est moi qui m'execute </p>";

        }
        ?>
        <p>au contraire lorsque l'on utiliser OR || on attend que seule des deux condition soit vrai</p>
        <h2>condition simple avec XOR</h2>
        <p>alors que le or s'execute si une des condition ou les deux condition bponnes ,xor quanda lui ne s'execute pas si les deux condition sont bonnes ou si elle sont fasse seule l'on des deux conditoion soit etre bonnes </p>
        <?php

if ( $a== 10 XOR $b==5){
    echo "<p class=\"alert alert-success\"> une deux condition est vrai,le code revoie true et le if s'execute</p>";

}else{   //si la condition est fause on execute le else
    echo"<p> accune des condition n'est vrai , ou deux conditions sont vrai ,c'est le else qui m'execute </p>";

}
?>
<h2>condition multibles avec if,else if et else </h2>
<p>grace a une condition multible ,verifier dans un premiere temps si a est strictement egale à 8,dans  un secon temps si a est different de 10 et enfin si accune de ces condition n'est vrai</p>
<?php

if ( $a == 8 ){
    echo "<p class=\"alert alert-success\">  a est strictement egale a 8</p>";

}else if($a !==10){   //si la condition est fause on execute le else
    echo"<p> accune des condition n'est vrai , ou deux conditions sont vrai ,c'est le else qui m'execute </p>";

}else{
    echo"<p> accune des condition n'est vrai , ou deux conditions sont vrai ,c'est le else qui m'execute </p>";


}
?>
    </div>

  
                            
                                   
                         </thead>
                         <tbody>
                         <tr>
                              <th scope="row">==</th>
                              <td>
                                   Teste l'égalité de deux valeurs. L'expression $a == $b vaut TRUE si la valeur de $a est
                                   égale
                                   à celle de $b et
                                   FALSE dans le cas contraire </td>
                         </tr>
                         <tr>
                              <th scope="row">!= ou &lt;></th>
                              <td>
                                   Teste l'inégalité de deux valeurs.<br>
                                   L'expression $a != $b vaut TRUE si la valeur de $a est différente de celle de $b et
                                   FALSE
                                   dans le cas contraire.
                              </td>
                         </tr>
                         <tr>
                              <th scope="row">===</th>
                              <td>
                                   Teste l'identité des valeurs et les types de deux expressions.<br>
                                   L'expression $a === $b vaut TRUE si la valeur de $a est égale à celle de $b et que $a et
                                   $b
                                   sont du même type. Elle vaut FALSE dans le cas contraire</td>
                         </tr>
                         <tr>
                              <th scope="row">!==</th>
                              <td>
                                   Teste la non-identité de deux expressions.<br>
                                   L'expression $a !== $b vaut TRUE si la valeur de $a est différente de celle de $b ou si
                                   $a et
                                   $b sont d'un type différent. Dans le cas contraire, elle vaut FALSE </td>
                         </tr>
                         <tr>
                              <th scope="row">&lt;</th>
                              <td>
                                   Teste si le premier opérande est strictement inférieur au second.
                              </td>
                         </tr>
                         <tr>
                              <th scope="row">&lt;=</th>
                              <td>
                                   Teste si le premier opérande est inférieur ou égal au second.
                              </td>
                         </tr>
                         <tr>
                              <th scope="row">></th>
                              <td>
                                   Teste si le premier opérande est strictement supérieur au second.
                              </td>
                         </tr>
                         <tr>
                              <th scope="row">>=</th>
                              <td>
                                   Teste si le premier opérande est supérieur ou égal au second.
                              </td>
                         </tr>
                         <tr>
                              <th scope="row">&lt;=></th>
                              <td>
                                   Avec $a<=>$b, retourne -1, 0 ou 1 respectivement si $a<$b, $a=$b ou $a>$b ($a et $b
                                        peuvent
                                        être des chaînes).
                              </td>
                         </tr>
                         </tbody>
                    </table>
               </div>
               <div class="col-12">
                    <h3 >14- Les opérateurs logiques </h3>
                    <table class="table table-dark table-hover table-bordered">
                         <thead>
                         <tr>
                              <th scope="col">Opérateurs</th>
                              <th scope="col">Description</th>
                         </tr>
                         </thead>
                         <tbody>
                         <tr>
                              <th scope="row">OR</th>
                              <td>Teste si l'un au moins des opérandes a la valeur TRUE .</td>
                         </tr>
                         <tr>
                              <th scope="row">||</th>
                              <td>Équivaut à l'opérateur OR mais n'a pas la même priorité.</td>
                         </tr>
                         <tr>
                              <th scope="row">XOR</th>
                              <td>Teste si un et un seul des opérandes a la valeur TRUE </td>
                         </tr>
                         <tr>
                              <th scope="row">AND</th>
                              <td>Teste si les deux opérandes valent TRUE en même temps </td>
                         </tr>
                         <tr>
                              <th scope="row">&&</th>
                              <td>Équivaut à l'opérateur AND mais n'a pas la même priorité.</td>
                         </tr>
                         <tr>
                              <th scope="row">!</th>
                              <td>Opérateur unaire de négation, qui inverse la valeur de l'opérande </td>
                         </tr>
                         </tbody>
                    </table>
                    <p class="alert alert-danger">Attention, une erreur classique dans l'écriture des expressions conditionnelles consiste à confondre l'opérateur de comparaison (==) et l'opérateur d'affectation (=). L'usage des parenthèses est recommandé pour éviter les problèmes liés à l'ordre d'évaluation des opérateurs.</p>
               </div>






</div>
        

  </main>
  <footer>
    
    <div class="d-flex justify-content-evenly align-items-center bg-dark text-white p3">
      <a class="nav-link" target="_blank" href="https://www.php.net/manual/fr/intro-whatis.phps">Doc PHP</a>
      <a class="nav-link"href=""><img src="assets/img/logo.png"></a>
      <a class="nav-link"href="https://devdocs.io/php/">Devdoc</a>
    </div>
    <!-- place footer here -->
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