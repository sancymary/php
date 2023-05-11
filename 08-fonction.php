<?php
$title ="les founction en  php ";
$titre = "les founction en php";
$paragraphe="les founction";
require_once "inc/header.inc.php";
?>
<main class="container px-5 border border-dark">
<div class="row">
 <h2 class="mt-5">1 - Les fonctions prédéfinies </h2>
 <ul>
<li> Une fonction prédéfine permet de réaliser un traitrement spécifique prédéterminé dans le language PHP</li>
 </ul>
 <div class="col-sm-12 mt-5">
<h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des chaînes de carcatères </h3>
<div class="row">
<div class="col-sm-12 col-md-6">
 <ul>
<!-- https://www.php.net/manual/en/function.rtrim.php -->
<li><span>substr()</span> : permet d'extraire une partie d'une chaine de caractère</li>
<li><span>strpos()</span>: permet de récuperer la position d'un caractère dans une chaîne de caractère </li>
<li><span>strlen()</span> : permet de récupérer la taille d'une chaîne de carctére</li>
<li><span>substr_replace()</span> : permet de remplacer un segment de la chaîne</li>
<li><span>substr_ireplace()</span>: Version insensible à la casse de str_replace()</li>
<li><span>str_contains()</span> : permet de vérifier si la chaîne contient un mot particulier</li>
<li><span>str_starts_with()</span> : permet de vérifier si une chaîne commence par une sous-chaîne donnée</li>

 </ul>
</div>
<div class="col-sm-12 col-md-6">
 <ul>
<li><span>str_ends_with()</span> : permet de vérifier si une chaîne se termine par une sous-chaîne donnée</li>
<li><span>trim()</span> : permet de supprimer les espaces avant et après une chaîne de caractère </li>
<li><span>strtolower()</span> : permet de retourner la chaîne en miniscule</li>
<li><span>strtoupper()</span> : permet de retourner la chaîne en majuscules</li>
<li><span>ucfirst()</span> : permet de mettre le premier caractère en majuscule. </li>
<li><span>lcfirst()</span> : permet de mettre le premier caractère en miniscule. </li>
 </ul>
</div>
<?php
$machaine="bonjour aime le pHp";
//je afficher un caractere de la chaine de caractere
echo $machaine[3].'<br>';// affiche le lettre j
//modifier un caracter de la chaine
$machaine[0]="B";//je change le b miniscule avec un B majuscule
echo $machaine.'<br>';
//extrait une partie de la chaine de caractere
$vlchaine=substr($machaine,0,9);// cette function prend en parametre la variable,le point de depart et la longuere qu'on souhaite obtenir
echo $vlchaine.'<br>'; ;
//exercices
//requiperer une partie du text (de l'indices 0 à indices 40) et remplace la partie en lever avec ce morceau de code
//<a href="#">lire la suite</a>

//
$text ="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et tempora adipisci cum sunt fugit dolorem pariatur maiores tenetur quae eveniet magni rem in eos deserunt itaque iste, accusamus esse totam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et tempora adipisci cum sunt fugit dolorem pariatur maiores tenetur quae eveniet magni rem in eos deserunt itaque iste, accusamus esse totam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et tempora adipisci cum sunt fugit dolorem pariatur maiores tenetur quae eveniet magni rem in eos deserunt itaque iste, accusamus esse totam.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et tempora adipisci cum sunt fugit dolorem pariatur maiores tenetur quae eveniet magni rem in eos deserunt itaque iste, accusamus esse totam.";

echo $text.'<br>';
$partie=substr($text,0,40);
echo "<p>$partie... <a href=\"#\">lire la suite</a></p>";


// attention les espaces sont des caractere dans la chaine et les accents circonflex sont considere comme 2 caractere


//requipere le position de caractere dans une chaine de caractere
echo 'la position de la lettre H dans ma phrase est:'.strpos($machaine,'H').'<br>';
//la position 17
//attention la founction est case sensible elle fait attention à la case de lettre:si je met la lettre miniscule in ne nous afficher rien.
// var_dump(strpos($machaine,'H'));
//requiperer la taille d'une chaine de caractere
echo strlen($machaine).'<br>';
//remplacer une partie de la chaine
$machaine2=str_replace('pHp','jS',$machaine);// les paramétre les fonction :la chaine de caractere  à changer,la chaine de caractere qui remplace et a variable à manipuler

echo $machaine2.'<br>';
//ici aussi la function sensible à la casse on ne change pas la valeure si y'en a une difference entre la valeure cherché et stocké
//il existe un autre function qui ne fait pas une distinction entre les lettres majuscules et miniscule la chaine 
$machaine =str_ireplace('bonjour','hello',$machaine);
echo $machaine.'<br>';
//verifier si la chaine contient un mot particulier
var_dump(str_contains($machaine,'js'));//les paramettre la variable contient la chaine et mot à verifier dans la chaine//sensible à la case
//le resultat est un boolean trur or fale (trouver ou pas trouver)

echo '<br>';//verifier si la chaine commencer par ce que vous lui passer dans les parametre
var_dump(str_starts_with($machaine,'Hel'));
echo '<br>';
//verifier si la chaine se termine par ce que vous lui passer dans le parametre
var_dump(str_ends_with($machaine,'Hel'));
echo '<br>';
//suprimer les espaces en début et fin de chaine

$testTrim="        je suis un phase avec des espaces test    ";

echo $testTrim.'<br>';
echo strlen($testTrim).'<br>';

$new=trim($testTrim);
echo $new.'<br>';
echo strlen($new).'<br>';

?>


<!-- ************************************JEUDI--COURS ****************************************** -->
</div>
    <div class="col-sm-12 mt-5">
    <h3 class="text-primary text-center mb-5">Les fonctions prédéfinies des tableaux </h3>
<div class="row">
 <div class="col-sm-12 col-md-6">
<ul>
 <li><span>array_push()</span> : permet d'ajouter plusieurs valeurs à la fin d' un tableau</li>
 <li class="alert alert-warning">Si on veut ajouter une seule valeur à la fin on utilise la syntaxe : <strong>$tableau[] = valeur_à_ajouter</strong> </li>
 <li><span>array_unshift</span>: permet d'ajouter une valeur au début d'un tableau</li>
 <li><span>array_pop</span>: permet de supprimer la dernière valeur d'un tableau</li>
 <li><span>array_shift</span>: permet de supprimer la première valeur d'un tableau</li>
 <li><span>unset()</span>: permet de supprimer un élément d'un tableau</li>
 <li><span>shuffle</span>: permet de mélanger et réorganiser un tableau</li>
</ul>
 </div>

 <div class="col-sm-12 col-md-6">
<ul>
 <li><span>array_chunk</span>: permet de déviser un tableau en plusieurs parties et avec un nombre de valeurs à définir</li>
 <li><span>count() / sizeof()</span> : permet de retourner la taille du tableau passé en paramètre.</li>
 <li><span>in_array()</span>: permet de vérifier qu'une valeur est présente dans un tableau.</li>
 <li><span>array_key_exists()</span> : permet de vérifier si une clé existe dans un tableau.</li>
 <li><span>explode()</span> : permet de transformer une chaîne de caractère en tableau</li>
 <li><span>implode()</span> : permet de Transformer un tableau en chaîne de caractères.</li>
  <li><span>array_slice()</span> :  permet de récuperer une partie d'un tableau </li>

 </ul>
  </div>
 </div>

<?php
$table= ['rouge','blue','rose','violet'];
echo '<pre>';
var_dump($table);
echo '</pre>';

//Ajouter de valeure à la fin
array_push($table,'vert','noir'); //dans le paramétre on met la variable qui contient le  tableau ensuite les valeure à ajouter
echo'<pre>';
var_dump($table);
echo'</pre>';

//ajouter des valeure au début
array_unshift($table,'gris','yellow');
echo'<pre>';
var_dump($table);
echo'</pre>';

//suprimer LA DERNIERE VALEURE DU TABLEAU
$valsupder=array_pop($table); //suprime la valeure et je peux la stocker dans une variable
echo'<pre>';
var_dump($table);//le tableaux apres supression de la derniere valeure
echo'</pre>';
echo'<pre>';
var_dump($valsupder);// la couleure suprimer du tableau à la fin de tableau
echo'</pre>';

//suprimer la premiere valeure du tableau
$valpre=array_shift($table);
echo'<pre>';
var_dump($table);//le tableaux apres supression de la premiere valeure
echo'</pre>';
echo'<pre>';
var_dump($valpre);// la couleure suprimer du  début du tableau
echo'</pre>';

//melanger un tableau
shuffle($table);
echo'<pre>';
var_dump($table);
echo'</pre>';

//diviser un tableau en plusieure partie
$tableau2=array_chunk($table,2,true);//en ajoutant true dans le paramétre ,je garde le meme indice au valeure du tableau d'orgine
echo'<pre>';
var_dump($tableau2);
echo'</pre>';

//compter les element dans un tableau
$nbr1=count($table);
$nbr2=sizeof($table);
echo'<pre>';
var_dump($nbr1);
echo'</pre>';


//verifier une valeure dans un tableau
$result=in_array('blue',$table);//cette founction est sensible à la case
echo'<pre>';
var_dump($result);
echo'</pre>';

//verifier une clé dans un tableau
$result=array_key_exists(4,$table);
echo'<pre>';
var_dump($result);
echo'</pre>';

//créer un tableau à partir de deux tableaux
$color=['white','orange','red','white'];//on décompose chacun des tableau avec l'opérateure de decomposition(...)
$all=[...$table,...$color];
echo'<pre>';
var_dump($all);// la variable $all contient le nouveau tableau indexé créer à partir des deux tableaus
echo'</pre>';

//je n'aurais pas le meme resultat avec cette syntax
$all=[$table,$color];
echo'<pre>';
var_dump($all);//resultat un tableau multidimensionnele
echo'</pre>';

//transformer un chaine de caractére en tableau
$machaine3='je me transforme un tableau';
$chnchanTable=explode(' ',$machaine3);//la paramétre :le caractere de séparation dans la chaine ,et la varaible de la chiane a scinder(couper)
echo'<pre>';
var_dump($chnchanTable);
echo'</pre>';

//tranformer un tableau un chaine de caractére
$montab=['salut','je','viens','du','tableau','!!!!'];
$tabenchaine=implode('  ',$montab);// le parametres:le caractere de separation dans la chaine et la variable du tableau à fusionner.
echo'<pre>';
var_dump($tabenchaine);
echo'</pre>';

//recupére une partie de tableau
$monarray=[
    'a'=>1,
    'b'=>2,
    'c'=>3,
    'd'=>4
];

$nuarray=array_slice($monarray,1, 2);//1 est point de depart et 2 combien de élement on prend.
echo'<pre>';
var_dump($nuarray);
echo'</pre>';
?>
</div>
<div class="col-sm-12 mt-5">
<h3 class="text-primary text-center mb-5">Les fonctions <span>isset()</span> et <span>empty()</span></h3> 
<ul>
 <li class="alert alert-success">Ces fonctions sont utiles lorsque vous souhaitez effectuer une validation de données.</li>
</ul>
<div class="row">
 <div class="col-sm-12 col-md-6">
<h4 class="text-success text-center">isset()</h4>
<ul>
 <li>La fonction<span>isset()</span> détermine si une variable existe.</li>
 <li>La fonction vérifie si la variable est définie, et non NULL </li>
 <li>La fonction retourne true quand la variable testé est définie ou elle ne contient pas la valeur NULL</li>
</ul>

 </div>
 <div class="col-sm-12 col-md-6">
<h4 class="text-success text-center">empty()</h4>
<ul>
 <li>La fonction <span>empty()</span> vérifie si une variable est vide.</li>
 <li>La focntion retourne true si la variable testé est égale à : 
 <ul>
<li>"" (une chaîne vide)</li>
<li>0 (0 en tant qu'entier)</li>
<li>0" (0 en tant que chaîne de caractères)</li>
<li>NULL</li>
<li>false</li>
<li>array() (un tableau vide)</li>
 </ul>

 </li>
</ul>
 </div>
 
</div>
<hr>

<?php
$var1=0;
$var2='';
if(!isset($var1)){//is true 
echo "\$var1 exist et est non null <br>";

}else{
    echo "\$var1 n'exist ou est un null <br>";
}
if(empty($var2)){
echo"\$var2 est vide(0,stringvide,null,false,non defini)<br>";

}else
echo"\$var2 n'est pas  vide <br>";
//difference entre isset et empty :si on suprime les declaration des variable $var1 et $var2:empty ()reste vrai car $var2 n'est pas défini,isset()devient fausse car $var1 n'est pas défini non plus.
//utilisation :empty():pour valider et verifier qu'un champs de formulaire est remplir.isset()pour vérifier l'existance d'une variable avant de l'utiliser.

?>


</div>
</div>
<div class="row">
<h2 class="mt-5">2 - Les fonctions Utilisateurs </h2>
 <ul>
 <li>Les fonctions utilisateurs sont des morceaux de code écrits dans des accolades et portant un nom.</li>
 <li>On applele une fonction au besoin pour exécuter le code qui s'y trouve .</li>
 <li>Il est d'usage de créer des fonctions pour ne pas se répéter quand on veut  exécuter plusieurs fois le même traitement . On parle alors de "factoriser" son code.</li>
 </ul>
<?php
function separation(){//on déclare une function avec le mot clé "function" suivi du nom de la founction et d'une paire de () qui accuillerons des paramétre ultérieurement
    echo "<hr>";
}
separation();//pour exécuter une founction(donc le code qui s'y trouve)on l'appelle en écrivant son nom suivi d'une paire de ()
// //////////////////////function avec paramétre et return /////////////////////////////////////////
//// function sans return
function bonjour1($prenom,$nom){//$prenom $nom  sont les parametre de notre founction.ils permettre de recevoire une valeure car il s'agit de variables de reception
echo"<p>Bonjour $prenom $nom ! </p>";

}
bonjour1('sancy','MARY');//SI LA FOUNCTION ATTEND DES VALEURE IL FAUT OBLOGATOIREMENT LES LUI DONNER.ces valeure s'appelle des arguments
bonjour1('Backary','FALL');
//$prenom,$nom called parametre

// ***********************la meme function avec return*******************************************

function bonjour2($prenom,$nom){
    return "<p>Bonjour $prenom $nom ! </p>"; //return permet de sortir la phrase"bonjour--" et de la renvoyer à l'endroit ou la founction est applée
//aprés le return tout les instruction ne seront pas executer
}
echo bonjour2 ('mana','hai');//ici on met un echo car la founction nous retourne la phrase mais ne l'affiche pas directement
//ici on peut remplace les argument par des vraiable(provenant d'un formulaire par example)
$prenom1='Gregory';
$nom1='LYFOUNG';
echo bonjour2($prenom1, $nom1);//les deux argument sont variable et peuvent recevoir n'importe quelle valeure
$prenom1='sancy';
$nom1='mary';
echo bonjour2($prenom1, $nom1);

//*************************************************************************************************************** */
// Exercice : vous écriver une fonction qui multiplie un nombre 1 par un nombre 2 fournis lors de l'appel . cette fonction retourne le résultat de la multiplication . Vous afficher le résultat

function muti($a,$b){
    $result=$a*$b;
    return "<p> le resultat de multiblication de la valeure $a X $b est égale à:$result</p> ";
    
}
 echo muti(1,2);

//********************************************* */
//  2eme METHODE
function multible($nombre1,$nombre2){

        return $nombre1*$nombre2;
}
 echo multible(20,5);
 //le resultat de la multiblication de la valeure $nombr1*$nombre2 est egale à:(la valeure de la multiplication)

 //**************************function avec paramétre optionnelle ***********************************
 //certains paramétre peuvent ne pas etre passer.Un evaluer est fournir lors de la déclaration.
 //Afin de se servir d'un paramétre optionnel il faut utliser les arguments nommés
 function bonjour3($prenom,$nom,$bonjour){
    //sans les paramétre nommé je suis obliger de mettre le paramétre optionnelle à la fin des paramétre dans le () de la founction
echo "<p>  $bonjour $prenom $nom <p>";
 }
 bonjour3('sancy','mary','bonjour');
?>
   
</div>



</main>



<?php
require_once "inc/footer.inc.php";

?>