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
    <a class="navbar-brand" href="index.php"><img src="assets/img/logo.png" alt=""></a>
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
                $b=5;
                echo "$a +$b=".$a+$b ."<br>";//affiche 15

                echo "$a +$b=" .$a-$b ."<br>";//affiche 5
                echo "$a -$b=" .$a*$b ."<br>";//affiche 50
                echo "$a /$b=".$a / $b."<br>";//affiche 2
                echo "$a %$b=".$a % $b."<br>";//affiche 0

                




               
                
                  
                 






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