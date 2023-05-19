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
    <title>les variable et le constant</title>
    <link rel="stylesheet" href="assets/img/logo.png">

</head>

<body>
  <header>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg" >
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
          <a class="nav-link " aria-current="page" href="#">Introduction</a>
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
            <?php
                 echo '<h1 class="display-5 fw-bold">Les variable et les constant en PHP</h1> ';
            ?>
            
        </section>
    </header><!-- fin header -->
    
    <!-- place navbar here -->
  </header>
  <main class="container px-5">
        <?php
                 echo '<h1 >les variable utilisateure/affectation/concatenation</h1> ';

                $number=127;// on declarer la variable $number et on lui affecter la valeure 127.
                echo'ma variable $ number veut:'.$number.'<br>'; //je concatene le point(.)
                //je peut voir le type une  variable avec la foucnction prédefini gettype()
                echo 'les typee de ma variable $number est : '.gettype($number).'<br>';//ici il s'agit un nombre
                //*************** */

                $double =1.5;
                echo ' ma variable $double veut : '.$double.'<br>';
                echo 'les typee de ma variable $double est : '.gettype($double).'<br>';//ici il s'agit un double (nombre à virgule)

                //********************** */
                $chaine ='une chaine de caractere entre sample quotes';
                echo ' ma variable $chaine veut : '.$chaine.'<br>';
                echo 'les typee de ma variable $chaine est : '.gettype($chaine).'<br>';//ici il s'agit un string (chaine de caractere)
                //******************** */

                //********************** */
                $chaine1 ="une chaine de caractere entre double quotes";
                echo ' ma variable $chaine1 veut : '.$chaine1.'<br>';
                echo 'les typee de ma variable $chaine1 est : '.gettype($chaine1).'<br>';
                //******************** */
                
                //********************** */
                $chaine2 ="127";
                echo ' ma variable $chaine2 veut : '.$chaine2.'<br>';
                echo 'les typee de ma variable $chaine2 est : '.gettype($chaine2).'<br>';//ici il s'agit un string (chaine de caractere)
                //******************** */
                //********************** */
                $chaine3 =`une chaine de caractere entre double des backquotes`;//les backquotes en php (https://www.php.net/manual/fr/language.operators.execution.php)
                echo ' ma variable $chaine3 veut : '.$chaine3.'<br>';
                echo 'les typee de ma variable $chaine3 est : '.gettype($chaine3).'<br>';//ici il agit un d'un null
                //******************** */

                //********************** */
                $boolean = true;//les false//le navigateure associer true à 1 et fale qui correspond à 0
                echo ' ma variable $boolean veut : '.$boolean.'<br>';
                echo 'les typee de ma variable $boolean est : '.gettype($boolean).'<br>';//ici il agit un d'un boolean
                 //(boolean):permet de savoir si quelque chose est vrai
                 //******************** */

                 //CONCATANATION ET AFFECTATION ET AFFECTATION COMBINER AVE OPERATEURE  ".=" pour chaine de caractere
                 $prenom='nicola ';
                 $prenom.='Thomas';//on ajoute le valeure Thomas a la valeure nicola sans la remplacer grace à operateure .=
                 //  echo $prenon;
                  //  $prenon.='Jose';
                //  $prenon.='Ludovic';

                 echo '<p>Bonjour'.$prenom .'</p>';
                 echo "<p>Bonjour $prenom </p>";//affiche"Bonjour Nicola Thomas".ici je utilise le double quotes ,je nai pas besoin concataner avec le poins(.) dand les quillements la variable est evaluer c'est son contenu qui est afficher c'est ce que l'on appelle la substitution de variable.
                 $age=30;
                 echo '<p> bonjour'.$prenom. 'tu as' .$age.'ans.<p>';
                 echo"<p> bonjour $prenom tu as $age ans.<p/>";
                //  echo"Bonjour $prenom"; //dans des quotes simple,$prenomest consider comme une chaine de carctere brute on affiche literalement
                 //************************* */
                 //échapement des apostraphe
                 $message="ajourd'hui";
                 $message="ajourd\'hui"; // on écharpe les apostrape  quand on ecrit dans les quotes simple avec "\".

//exercices : vous afficher blue-blanc-rouge en mettre le texte de chaque couleure dans des variable
$color="blue";
$color1="Blanc";
$color2="Rouge";
echo"$color - $color1- $color2";
echo"<p><span class='text-primary'> $color<span>-<span class='text-success'> $color1<span>-<span class='text-danger'> $color2<span></p>";



echo"<p><span class='blue'> $color<span>-<span class='vert'> $color1<span>-<span class='rouge'> $color2<span></p>";
//pour choip
$blue = "blue";
            $white = "white";
            $red = "red";

            echo 
            "<div class='d-flex justify-content-center bg-dark p-5 m-auto my-2 rounded' style='width: 40%;'>
                <div class='bg-primary text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                    $blue
                </div>
                <div class='bg-$white text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                    $white
                </div>
                <div class='bg-danger text-center fw-bold' style='width: 50px; height: 80px; line-height: 80px'>
                    $red
                </div>
            </div>";
//*********** */ pour sadik
$text = '<span style="color: blue">bleu</style></span>';
                $text2 = '<span style="color: green">vert</style></span>';
                $text3 = '<span style="color: red">rouge</style></span>';

                echo $text.' - '.$text2.' - '.$text3;
               // ******************************************************************


                echo'<h2 class ="mt-5"> operateure numerique </h2>';
                $a=10;
                $b=2;
                echo "$a +$b=".$a+$b ."<br>";//affiche 15

                echo "$a +$b=" .$a-$b ."<br>";//affiche 5
                echo "$a -$b=" .$a*$b ."<br>";//affiche 50
                echo "$a /$b=".$a / $b."<br>";//affiche 2
                echo "$a %$b=".$a % $b."<br>";//affiche 0
                //************************************************** */ Jeudi-27/04

                //les operateure affectation compiné pour les valeure numerique:
                $a+=$b;// equivalent à $s=sa+$b soit $a =10+2//12
                echo $a;//12
                echo "<br>";
                $a-=$b;//// equivalent à $s=sa-$b soit $a =12-2//10
                echo $a;
                //il existe auusi les operateure *= et /= et  %=
                //******************************************************* */

                //INCREMENTATION ET DECREMENTATION
                echo "<br>";
                $i=0;
                $i++;//
                echo $i;
                echo "<br>";
                $i--;
                echo $i;
                //**************************************************************** */

                echo '<h2 class="mt-5"> Les variable prédefinis:super-globale</h2>';
                echo $_SERVER["HTTP_HOST"];
                echo'<pre>';
                var_dump($_SERVER);
                echo'<pre>';
                
                //je veux afficher le contenu de ma super_global  echo $_SERVER["HTTP_HOST"]; dans une chaine de caractere:
                $message="le nom de domaine à partir duquelle j'affiche ma page c'est <strong>{$_SERVER["HTTP_HOST"]}</strong> <br>";
                echo $message;//j'utiliser les accolade pour integrer ma variable $_SERVER["HTTP_HOST"] dans une chaine de caractere
                //

//si je veux afficher les contenu d'une variable et qu'elle soit collé à une chaine de caractere ex:je veux afficher:

//afficher Aujourd'hui il fait 32°c!!
$temp=32;
$meto1="<p> Aujourd'hui il fait {$temp}°c!! </p>";
$meto2='<p> Aujourd\'hui il fait'.' ' .$temp.'°c!! </p>';
echo $meto1;
echo $meto2;
//************************ */
echo '<h2 class="mt-5">transtypage des variables</h2>';
$string1= (int)'100';
var_dump($string1);//affiche 100 avec type integer
$string2= (float)'12.5';
var_dump($string2);//affiche12.5 avec type float
$string3= (int)'12.5';
var_dump($string3);//affiche 12 avec type integer
echo '<br>';

//****************** */
echo '<h2 class="mt-5"> constante utilisateure</h2>';
//avec function prédefinie define()
//le nom de la constante :CHAINE, la valeure de la constante :"la valeure de la constante CHAINE";
define('CHAINE','la valeure de la chaine CHAINE');
echo CHAINE;
define('ENTIER',30);
echo ENTIER .'<br>';
echo gettype(ENTIER);
//je recupére la valeure de  ma constante dans une  chaine de caractere
echo "j'ai ENTIER ans <br>";//pas de interpratation de la constante ENTIER et la'affichage de son valeure//AFFICHAGE j'ai ENTIER ans
echo "j'ai". ENTIER."ans <br>";//avec les constante on ne peut pas uitiliser la mecanisme de la substitution des variable


//constante avec le mot réservé const:
//avec const ,il est possible de defini la valeure de la constante en utilisant une expression  scalaire qui contient d'auter constantes.
//le nombre d'heure mensuele=Temps hebdomadaire X 52 semaines /12 mois (soit 35X52/12=151.67h par mois)
const SEMAINE =25;
const HEBDOMADAIRE=35;
const MOIS=12;

const HEURE= HEBDOMADAIRE * SEMAINE /MOIS;
echo HEURE.'<br>';
//************************************************************* */

// avec cette expression on ne peut pas appellé des functions
// const NBR_AU_PIF =rand(1,10);

define('NBR_AU_PIF' ,rand(1,10));
echo NBR_AU_PIF;
//*************************************************** */

echo '<h2 class="mt-5"> constante PREDEFINI/Magiques</h2>';
echo PHP_VERSION;
echo '<br>';
echo PHP_MAJOR_VERSION;
echo '<br>';

echo __LINE__;
echo '<br>';

echo __DIR__;










                

                




               
                
                  
                 






            ?>


   
    
    

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