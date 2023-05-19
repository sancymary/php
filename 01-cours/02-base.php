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
            <a class="nav-link " aria-current="page" href="01_index.php">Introduction</a>
          </li>
        
        <li class="nav-item">
          <a class="nav-link" href="02-base.php">Les base</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="03-variable_constant.php">Les variable et les constant</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="04-conditioncor.php">Les conditions en PHP</a>
          </li>
               
      </ul>
      
    </div>
  </div>
</nav>
  
  

<header class="p-5 m-4 bg-light rounded-3 border ">
        <section class="container py-5">
            <h1 class="display-5 fw-bold">les Base de PHP</h1>
            
        </section>
    </header><!-- fin header -->
    
    <!-- place navbar here -->
  </header>
  <main class="container px-5">

  <div class="row border p-5 mt-5">
    <div class="col-md-6 col-sm-12" >
        <h2>01-Les balise php</h2>
        <p>pour ouvrir un passage un php ,on utiliser la balise <span class="fw-bold"><code>&lt;?php</code></span></p>
    <p>pour fermer un passage un php ,on utiliser la balise <span class="fw-bold"><code>?></code></span></p>
    </div>
    <div class="col-md-6 col-sm-12">
        <h2>2-les commentaire en php</h2>
        <p>pour faire un commentaire sur une seule line on utilise</p>
        <ul>
            <li><em>//mon commentaire</em></li>
            <li><em>#mon commentaire</em></li>
        </ul>
    </div>
  
  <?php 
  //un premiere commentaire
  # un 2eme commentaire
  ?>
  <p>pour faire des commentaire sur plusieure line on utiliser:</p>
  <li><em>/* <br> mon commentaire <br> sur <br> plusiere <br> lignes*/ </em></li>
  <?php 
/*
pour faire des 
commentaire sur 
plusieure line 
on utiliser
*/
  ?>

<div class="col-sm-12">
    <h2>3-Extension "".php" VS ".html"</h2>
    <p>En Dehors des balise PHP,il est possible d'ecrire du code HTML  dans fichier ayant l'extension .php ce qui n'est pas poassible dans un fichier .html.cela est du au fait que les fichier .php sont traiter par le server en tant que code PHP et peuvent in clure des instruction PHP et HTML tandis que les fichier .html ne sont pas traiter comme du code php</p>
    <p>si notre fichier php ne contient que des script php,nous ne sone pas oblige de fermer la balise php  à la fin du script,cependant il est recommender de la faire pour evuter toute probleme potentiele avec l'affichage de contenu HTML ou des erreures de syntax si vius ajoute du code html aprés les instruction php dans le meme fichier .De plus ,certain standard de codage et bonnes pratique recommender de fermer toutes les balise php les balise pour une meillere lisibilitée et maintenabilité du code </p>
</div>
<div class="col-sm-12">
    <h2>4-affichage </h2>
    <p>pour afficher les text sur notre page a partir un script php on peut utiliser:</p>
    <ul>
        <li>l'instruction <span>echo</span>:permet effectuer un affichage nous pouvons y mettre du HTML .(ex:voir code sur VS code)</li>
        <div class="alert alert-primary w-50">
            <?php
            echo "je suis un text php dans une istruction echo";
            
            ?>

        </div>
        <li>
            l'istruction <span>print: </span>c'est une istruction affichage.nous pouvon y mettre du HTML.(ex:voir code sur VS code) 
        </li>
        <div class="alert alert-primary w-50">
            <?php
            print "je suis un text php dans une istruction print";
            
            ?>

            </div>
            <li> 
                les instruction <span>var_dump</span> et <span>print_r()</span>:permettre afficher du contenu mais on s'en servira principalement pour débuger.ces deux founctions d' affichage permettre analyser dans navigateure le contenu d'une variable par ex (nous en verrons l'utilisation plus tard).
            </li>
    </ul>

</div>
    <div class="col-sm-12">
        <h2>5-concaténation</h2>
        <p>EN PHP on concaténe avec le <span>.</span>(point)</p>
        <p>dans une 1ere variable je stock le mot 'Bonjour',et 2eme mot 'Madame',afin de afficher le pharse compléte je concatane le deux variables avec un point(.)(ex:voir le code sur VS code)</p>
        <div class="alert alert-primary w-50">
            <?php
            $mot1 ="Bonjour";
            $mot2 ="Madame";
            echo $mot1 ." ". $mot2;//afichage Bonjour Madame
            
            ?>

            </div>
    </div>
    <div class="col-sm-12">
        <h2>6-les variable utilisateure</h2>
        <p>une variable est un espace mémoire qui porte un nom et qui permet de conserver une valeure cette valeure peut etre de n'imporet quele type</p>
        <p>chaque variable posedé un identifiant particulaire qui commence toujours par le caractere dollare <span>$</span>.</p>
<p>ce caractere est suvi du nom de la variable .il existe des régle de nommage des variables en PHP  </p>
<li>par concentation un nom de variable commence par un miniscule puis on met un majuscule à chaque mot</li>
<li>le nom commencer par un caractere alphabetique pris dans un ensemble[A_Z][a_z] ou un underscore <span>_</span> (à eviter car en php existe des variable prédefinis et qui commencer par le underscore)</li>
<li>les caractere qui suivent peuvent etre les memes avec en plus l'essemble [0_9](jamais en début)</li>
<li>la longeure du nom de notre variable n'est pas limiter mais il convient d'etre raisonnable. il est conseiller de avoir des noms de variable le plus parlant possible.par examples <span>$nomClient</span>est plus parlant que <span>$x</span>.</li>
<li>les nom de variable sont sensible à la cases <span>$mavar</span>et  <span>$maVar</span>ne seront pas les meme variable</li>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-4 alert alert-success">
            <p>les variable suivant son correcte:</p>
            <ul>
                <li> <span>$mavar</span></li>
                <li><span>$_mavar</span></li>
                <li><span>$mavar2</span></li>
                <li><span>$M1</span></li>
                <li><span>$_123</span></li>
            </ul>

        </div>
        <div class="col-sm-12 col-md-4 alert alert-danger">
            <p>les variable suivant son interdit:</p>
            <ul>
                <li> <span>$*mavar</span></li>
                <li><span>$5_mavar</span></li>
                <li><span>$mavar2+</span></li>
                
            </ul>

        </div>
    </div>
    
    <div class="col-sm-12">
        <h2>7-Affectation des variables utilisation</h2>
        <p>affecter une variable a lui donner valeure : lorque vous déclarer ue variable vous ne lui donner pa de type c'est la valeyre que vous lui affecter qui va déterminer son type</p>
        <ul>
            <li>$maVar1 =75;=>integer</li>
            <li>$maVar2="paris";=>string</li>
            <li>$maVar3=12.5;=>double</li>
            <li>$maVar4=true; boolean</li>
        </ul>

    </div>
    <div class="col-sm-12">
                <h2>8- Les opérateurs  numériques </h2>
                
                    <table  class="table table-dark table-hover table-bordered">
                         <thead>
                         <tr>
                              <th scope="col">Opérateur</th>
                              <th scope="col">Description</th>
                         </tr>
                         </thead>
                         <tbody>
                         <tr>
                              <th scope="row">+</th>
                              <td>Addition</td>
                         </tr>
                         <tr>
                              <th scope="row">-</th>
                              <td>Soustraction</td>
                         </tr>
                         <tr>
                              <th scope="row">*</th>
                              <td>Multiplication</td>
                         </tr>
                         <tr>
                              <th scope="row">**</th>
                              <td>Puissance (associatif à droite)</td>
                         </tr>
                         <tr>
                              <th scope="row">/</th>
                              <td>Division</td>
                         </tr>
                         <tr>
                              <th scope="row">%</th>
                              <td>Modulo : reste de la division du premier opérande par le deuxième. Fonctionne aussi avec
                                   des
                                   opérandes décimaux. Dans ce cas, PHP ne tient compte que des parties entières de chacun
                                   des
                                   opérandes.</td>
                         </tr>
                         <tr>
                              <th scope="row">--</th>
                              <td>Décrémentation : soustrait une unité à la variable. Il existe deux possibilités, la
                                   prédécrémentation, qui soustrait avant d'utiliser la variable, et la postdécrémentation,
                                   qui
                                   soustrait après avoir utilisé la variable.</td>
                         </tr>
                         <tr>
                              <th scope="row">++</th>
                              <td>Incrémentation : ajoute une unité à la variable. Il existe deux possibilités, la
                                   préincrémentation, qui ajoute 1 avant d'utiliser la variable, et la postincrémentation,
                                   qui
                                   ajoute 1 après avoir utilisé la variable. </td>
                         </tr>
                         </tbody>
                    </table>
               </div>
               <div class="col-12">
                    <h2>9- Les opérateurs d'affectation combinés numèrique</h2>
                    <p>En plus de l'opérateur classique d'affection (=), il existe plusieurs opérateurs d'affectation
                         combinés. Ces opérateurs réalisent à la fois une opération entre deux opérandes et l'affectation du
                         résultat à l'opérande de gauche.</p>
                    <table  class="table table-dark table-hover table-bordered">
                         <thead>
                         <tr>
                              <th scope="col">Opérateur</th>
                              <th scope="col">Description</th>
                         </tr>
                         </thead>
                         <tbody>
                         <tr>
                              <th scope="row">+=</th>
                              <td>Addition puis affectation :<br>
                                   $x += $y équivaut à $x = $x + $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                         </tr>
                         <tr>
                              <th scope="row">-=</th>
                              <td>Soustraction puis affectation :<br>
                                   $x -= $y équivaut à $x = $x - $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                         </tr>
                         <tr>
                              <th scope="row">*=</th>
                              <td>Multiplication puis affectation :<br>
                                   $x *= $y équivaut à $x = $x * $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                         </tr>
                         <tr>
                              <th scope="row">**=</th>
                              <td>Puissance puis affectation<br>
                                   $x**=2 équivaut à $x=($x)²</td>
                         </tr>
                         <tr>
                              <th scope="row">/=</th>
                              <td>Division puis affectation :<br>
                                   $x /= $y équivaut à $x = $x / $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre différent de 0.</td>
                         </tr>
                         <tr>
                              <th scope="row">%=</th>
                              <td>Modulo puis affectation :<br>
                                   $x %= $y équivaut à $x = $x % $y $y<br>
                                   $y peut être une expression complexe dont la valeur est un nombre.</td>
                         </tr>
                         <tr>
                              <th scope="row">.=</th>
                              <td>Concaténation puis affectation :<br>
                                   $x .= $y équivaut à $x = $x . $y<br>
                                   $y peut être une expression littérale dont la valeur est une chaîne de caractères.</td>
                         </tr>
                         </tbody>
                    </table>
               </div>
               <div class="col-sm-12">
                    <h2>9 - Les variables prédéfinies</h2>
                    <p>PHP propose toute une série de variables qui sont déjà présentes dans le langage sans que vous n'ayez à les déclarer et  accessibles à tous vos scripts. Ces variables s'écrivent toujours en majuscules et nous fournissent divers renseignements.</p>
                    <p>Nous allons voir Les variables <span>Super-globales</span> qui sont des variables prédéfinies internes et sont toujours disponibles, quelque soit le contexte.</p>
                    <p> Il est inutile de faire <span>global $variable;</span> avant d'y accéder dans les fonctions ou les méthodes.</p>
                    <table class="table table-dark table-hover table-bordered">
                         <thead>
                              <tr>
                                   <th>Super-globale</th>
                                   <th>Utilisation</th>
                              </tr>
                         </thead>
                         <tbody>
                        <!-- tr*9>td*2 -->
          
                              <tr>
                                   <td>$GLOBALS</td>
                                   <td>Elle contient le nom et la valeur de toutes les variables du script. Les noms de
                                        variables sont les clés du tableau qui est renvoyé par cette variable. Pour appeler une
                                        variable en particulier : <code>$GLOBALS["nomvariable"]</code>. Ce code permet de
                                        récupérer la valeur de la variable en dehors de sa zone de visibilité. </td>
                              </tr>
                              <tr>
                                   <td>$_COOKIE</td>
                                   <td>Contient le nom et la valeur des cookies enregistrés sur le poste client. Comme pour
                                        $GLOBALS, le clés de ce tableau sont les noms des cookies.</td>
                              </tr>
                              <tr>
                                   <td>$_ENV</td>
                                   <td>Contient le nom et la valeur de toutes les variables d'environnement qui changent selon
                                        le serveur utilisé. </td>
                              </tr>
                              <tr>
                                   <td>$_GET</td>
                                   <td>Elle contient les informations passées à travers un url ou un formulaire ayant la méthod
                                        GET. Dans ce cas, les clés du tableau sont le name des champs du formulaire.</td>
                              </tr>
                              <tr>
                                   <td>$_POST</td>
                                   <td>Contient le nom et la valeur des données issues d'un formulaire envoyé par la method
                                        POST. Comme pour $_GET c'est le name des input qui sera la clé du tableau. </td>
                              </tr>
                              <tr>
                                   <td>$_REQUEST</td>
                                   <td>Contient l'ensemble des de ces variables : $_GET, $_POST, $_COOKIE, $_FILES</td>
                              </tr>
                              <tr>
                                   <td>$_SERVER</td>
                                   <td>Contient les informations liées au serveur web, tel le contenu des en-têtes HTTP ou le nom du script en cours d'exécution. Retenons les variables suivantes :
                                        <ul>
                                             <li><code>$_SERVER["HTTP_ACCEPT_LANGUAGE"]</code>, qui contient le code de langue du
                                                  navigateur client.</li>
                                             <li><code>$_SERVER["HTTP_COOKIE"]</code>, qui contient le nom et la valeur des
                                                  cookies lus
                                                  sur
                                                  le poste client.</li>
                                             <li><code>$_SERVER["HTTP_HOST"]</code>, qui donne le nom de domaine.</li>
                                             <li><code>$_SERVER["SERVER_ADDR"]</code>, qui indique l'adresse IP du serveur.</li>
                                             <li><code>$_SERVER["PHP_SELF"]</code>, qui contient le nom du script en cours. Nous
                                                  l'utiliserons souvent dans les formulaires.</li>
                                             <li><code>$_SERVER["QUERY_STRING"]</code>, qui contient la chaîne de la requête
                                                  utilisée
                                                  pour accéder au script.
                                   </td>
                              </tr>
                              <tr>
                                   <td>$_SESSION</td>
                                   <td>Contient l'ensemble de nom de variables de session et leur valeur</td>
                              </tr>
                              <tr>
                                   <td>$_FILES</td>
                                   <td>Contient le nom des fichiers téléchargés.</td>
                              </tr>
                         </tbody>
 
                    </table>
                   
               </div>
               <!-- ******************************************************************* -->
<div class="col-sm-12">
     <h2>11-Les constantes utilisateures</h2>
     <p>une constante permet de conserve une valeure sauf  que celle-ci ne peut pas changer.c'est à dire qu'un peut pas le modifier durant l'exécution duc script.utile par example pour conserver les parametre de connexion à la BDD de façon certaine.</p>
     <p>les constante sont sensible à la case. par convention une constante s'ecrit toujour en   MAJUSCULE</p>
     <p>pour definir une constante on utiliser la founction <span>define()</span> dont la syntax sera la suivante:
                                             <code>define("NOMCONSTANT","valeur constant");</code> ex(voir code VS code)
</p>
<div class="alert alert-primary w-25">
     <?php
     define('CAPITALE_FRANCE','paris');//ici on affiche la constante CAPITALE_FRANCE à laquelle on affecte 'paris'
     
     echo CAPITALE_FRANCE;
?>
</div>
     
</div>    
       <!-- ******************************************** -->
       <div class="col-sm-12">
                    <h2>12 - Constantes prédéfinies   </h2>
                    <p>Il existe en PHP un grand nombre de constantes prédéfinies qui nous pouvons notamment utiliser dans les fonctions comme paramètres permettant de définr des options.</p>
                    <p>Nous allons voir <span>Les Constantes magiques</span> .</p>
                    <table class="table table-dark table-hover table-bordered">
                         <thead>
                              <tr>
                                   <th scope="col">Constantes</th>
                                   <th scope="col">Résultat</th>
                              </tr>
                         </thead>
                         <tbody>
                              <tr>
                                   <th scope="row">PHP_VERSION</th>
                                   <td>Version de PHP installé sur le serveur</td>
                              </tr>
                              <tr>
                                   <th scope="row">PHP_OS</th>
                                   <td>Nom du système d'exploitation du serveur</td>
                              </tr>
                              <tr>
                                   <th scope="row">DEFAULT_INCLUDE_PATH</th>
                                   <td>Chemin d'accès aux fichiers par défaut </td>
                              </tr>
                              <tr>
                                   <th scope="row">__FILE__</th>
                                   <td>Nom du fichier en cours d'exécution</td>
                              </tr>
                              <tr>
                                   <th scope="row">__DIR__</th>
                                   <td>Le dossier du fichier</td>
                              </tr>
                              <tr>
                                   <th scope="row">__LINE__</th>
                                   <td>Numéro de la ligne en cours d'exécution</td>
                              </tr>
                         </tbody>
                    </table>
               </div>
               <div class="col-sm-12">
                    <h2>13 - Les opérateurs booléens</h2>
                    <p>Quand ils sont associés, les opérateurs booléens servent à écrire des expressions simples ou complexes, qui sont évaluées par une valeur booléenne TRUE ou FALSE. Ces valeurs seront utilisées dans les instructions conditionnelles.</p>
                    <table class="table table-dark table-hover table-bordered">
                         <thead>
                         <tr>
                              <th scope="col">Opérateur</th>
                              <th scope="col">Description</th>
                         </tr>
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