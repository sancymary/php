<?php
$title ="les tableaux php (array())";
$titre = "les tableaux en php";
$paragraphe="mon Paragraphe";
require_once "inc/header.inc.php";
?>



<main class="container px-5 border">

<div class="row">
<h2 class="text-center my-5">1-declaration des tableaux</h2>
<div class="col-sm-12 col-md-5 mt-5">
    <h3 class="text-primary text-center">methode-1</h3>
    <p>la premiere facon pour déclarer un tableau c'est un utilisation la founction <span>array()</span>
    <br>
    <code>
        $tableau=array('valeure1','valeure2','valeure3','valeure4');
    </code>
    </p>
</div>

</div>
<div class="col-sm-12 col-md-5 mt-5">

<div class="col-sm-12 col-md-5 mt-5">
    <h3 class="text-primary text-center" >methode-2</h3>
    <p>la 2eme facon pour déclarer un tableau c'est un utilisation la syntaxe courte avec les crochets<span>array[]</span>
    <br>
    <code>
        $tableau=array['valeure1','valeure2','valeure3','valeure4'];
    </code>
</p>
</div>
<div class="row">
    <h2 class="text-center my-5">2-afficher les elements un tableau</h2>
    <div class="col-sm-12">
        <ul>
            <li>pour afficher une valeure de tableaux on ecrit son indice dans paire de crochets aprés le non du  tableaux</li>
            <?php
            //declaration un array
            $list1 =array('laurance','gerory','mary','mana','mariam');
            //echo $list; //erreure de type array to sting conversion car on ne peut pas afficher directement un tableau 
            echo '<pre>';
            var_dump($list1);// afficher les contenu un tableaux avec les types
            echo '</pre>';
            //on entoure le var_dumb  des balise pre afin de garder un format lisible
            // les var_dumb renvoie les information sur ce qui se trouve dans telle ou tele variable
            //il donne en premiere lieu le type de variable et si c'est un tableau,le nom  d'element contenu
            // les éléments avec leure types et leure longeure
            //cette founction de débougher sera utiliser pour verifier sinon on bien récupereer les information dans une varaible
            $list2=['laurance','gerory','mary','mana','mariam'];
            echo '<pre>';
            var_dump($list2);// afficher les contenu un tableaux avec les type
            echo '</pre>';
            ?>
            <li>
                afficher bonjour laurence depuis votre php grace à l'array crée.
                
            </li>
            <?php
                echo "<p class=\"alert alert-success w-25\">Bonjour $list1[0]</p>";
                echo "<p class=\"alert alert-success w-25\">Bonjour $list2[0]</p>";
                ?>
        </ul>
    </div>
</div>

</div>
<div class="row">
    <h2 class="text-center my-5"> 3-tableau non prédifini</h2>
    <div class="col-sm-12 col-md-6">
        <h3 class="text-primary text-center">exambles de tableau non predefini</h3>
        <?php
$listPays[]='London';
$listPays[]='Portugale';
$listPays[]='Suisse';
$listPays[]='France';
echo '<pre>';
var_dump($listPays);
echo '</pre>';
?>
    </div>
    <div class="col-sm-12 col-md-6">
        <h3 class="text-primary text-center">ajouter un valeure la fin un tableau</h3>
        <?php
//les croche vides siginifiantes qu'on ajoute une valeure à la fin du tableau
//existe des 
$list2[]='sancy';
echo '<pre>';
 var_dump($listPays);
 echo '</pre>';


?>
    </div>
</div>
<div class="row">
<h2 class="text-center my-5">4 - Les catégories de tableaux en PHP</h2>
          <div class="col-sm-12">
               <p>Un tableau c'est une liste de couples <span>clé / valeur</span> :</p>
               <ul>
                    <li>Si la clé est un entier, on parle de tableau indexé. La clé est appelée un index. Les index ne sont pas forcément des entiers consécutifs.</li>
                    <li>Si la clé est une chaîne, on parle de tableau associatif.</li>
               </ul>
               <p class="alert alert-secondary">En PHP, comme dans tous les langages, il existe des tableaux à plusieurs dimensions. </p>
               <p class="alert alert-secondary"> Pour construire un tableau multidimensionnel on peut utiliser les deux types de tableaux, indexé ou associatif. </p>
               <p class="alert alert-secondary"> On peut faire un tableau à une seule dimension, dans lequel les clès vont être successivement des entiers puis des chaînes </p>
          </div>
          <div class="col-sm-12 col-md-6">
            <h3 class="text-center text-primary mt-5">les tableaux indexé</h3>
            <h4>1-creation un tableau avec <span>indexation automatique</span></h4>
            <?php
            $tab1=['jaune','Rouge','vert'];
            echo '<pre>';
            var_dump($tab1);
            echo '</pre>';
            ?>
            <h4>2-creation d'un tableaux avec <span>indexation manuelle</span></h4>
            <p>les tableau peut_etre crée manuellement element par element dans ce cas les index sont placer à la main .il n'est pas obligatoire de commencer à l'entire 0.les index peuvent etre des entiers non consecutifs </p>
            <?php
           $tab2[3]='orange';
           $tab2[10]='yellow';
           $tab2[14]='Noir';
            echo '<pre>';
            var_dump($tab2);
            echo '</pre>';

            ?>
          </div>
          <div class="col-sm-12 col-md-6">
          <h3 class="text-center text-primary mt-5">les tableaux associative</h3>
          <?php
           $color=array(
            'b'=> 'blue',
            'r'=> 'rouge',
            'v'=> 'vert',// la virgule ici est possible mais pas obligatoire// vous pouvez mzttre une virgule aprés le derniere element .De cette manniere,si jamais ,vous aojuter un element et bien la virgule serait deja la 
           );
           echo '<pre>';
           var_dump($color);
           echo '</pre>';

           $color2= [
            'g'=> 'gris',
            'n'=> 'noir',
            'j'=> 'yellow'

           ];
            echo '<pre>';
 var_dump($color2);
 echo '</pre>';
 //afficher une valeure de notre tableau associative
 echo'le 1er color du tableau 1 est:'.$color['b'].'<br>';
 echo"le 2er color du tableau 2 est:'{$color['r']}.'<br>";
 echo"le 2er color du tableau 2 est:".$color['v'].'<br>'; // quand un tavbleau associative est ecrit dans un quillement ou des double quotes ,il perd les quotes autour son indices
            ?>

          </div>
          <div class="col-sm-12">
            <h3> les tableau  multidimensionnelle</h3>
            <div class="row">
                <div>
                    <h4>1-tableaux multidimensionnelle <span>1ere dimension:indexé/2eme dimension: indéxé</span></h4>
                    <?php
                    $tab_multi_1=[
                        0=>[
                            0=>'rouge',
                            1=>'vert',
                            2=>'blue'
                            ],
                        1=>[
                            0=>'blanc',
                            1=>'noir',
                            2=>'gris'
                        ],
                        2=>[
                            0=>'rose',
                            1=>'yellow',
                            2=>'red'

                        ]
                        ];
                        echo '<pre>';
                        var_dump($tab_multi_1);
                        echo '</pre>';
                    ?>
                </div>
<div class="col-sm-4">
<h4>2-tableaux multidimesionnelle <span>1ere dimension:indexé/2eme dimension: associative</span></h4>
<?php
$tab_multi_2 =[
    0=>[
        'prenom'=> 'julien',
        'nom'=> 'Dupan',
        'phone'=> 2222222222222

    ],
    1=>[
        'prenom'=> 'nicola',
        'nom'=> 'Duron',
        'phone'=> 33333333333

        
    ],
    2=>[
        'prenom'=> 'pierre',
        'nom'=> 'Dulac',
        'phone'=>5555555
        
        ]
    ];
    echo '<pre>';
    var_dump($tab_multi_2);
     echo '</pre>';
?>
</div>

<div class="col-sm-4">
<h4>3-tableaux multidimesionnelle <span>1ere dimension:associative/2eme dimension: associative</span></h4>
<?php
$tab_multi_3 =[
    'personne1'=>[

        'prenom'=> 'julien',
        'nom'=> 'Dupan',
        'phone'=> 2222222222222

    ],
    'personne2'=>[
        'prenom'=> 'nicola',
        'nom'=> 'Duron',
        'phone'=> 33333333333

        
    ],
    'personne3'=>[
        'prenom'=> 'pierre',
        'nom'=> 'Dulac',
        'phone'=>5555555

        
        ]
    ];
    echo '<pre>';
    var_dump($tab_multi_3);
     echo '</pre>';
?>
</div>
<div class="col-sm-12">
    <h4>4-substitution un element de tableau multidimensionnel dans une chaine  de caracter</h4>
    <div>
        <div>
            <?php
            echo "<p> le nom de personne 2:{$tab_multi_3['personne2']['nom']}. </p>";
                //ici on affiche la valeure de indexe nom du tableau personne 2 qui est l'index du tableau tab_multi_3
            ?> 

        </div>
    </div>

</div>
        <div class="col-sm-12">
        <p class="alert alert-danger">afin de parcourir un tableau il faut utiliser une boucle

         </p>

</div>
       </div>

       </div>

</div>
<div class="row">
    <h2 class="text-center my-5">5-parcourir les tableau grace au boucles</h2>
    <div class="col-sm-12 col-md-12">
        <h3 class="text-primary text-center">Boucle for</h3>
        <ul>
                    <li>La boucle for va permettre de parcourir un array, et d'en extraire les données pour les afficher sous la forme demandée.</li>
                    <li>On utilise la boucle for dans les tableaux indexés</li>
                    <li>L'utilisation de la boucle for dans le parcours d’une table nécessite le calcule de la taille du tableau à chaque itération.</li>
               </ul>
               <?php
               // avec un tableau unidimension
               $listFourniture=['stylo','crayon','feutre','régles','surliner'];
                                 //00      //1      //2     //3         //4
               echo '<pre>';
               var_dump($listFourniture);
                echo'</pre>';
                echo "<p> list de fournitures:</p>";
                echo "<ul>";
                for($i=0;$i < sizeof($listFourniture);$i++) //tant que $i inferieure au nombres element du tableaux on mettre dans boucle
                // la founction predéfini sizeof() permet le nombre element dans un tableau. la founction count( )permet de faire la meme chose
                echo "<li> -> $listFourniture[$i]</li>"; //le $i represente l'index du tableau et c'est la raison pour laquelle on passe entre les crochetes à la suite de $listfurniture.on lui indiquer ainsi qu'au 1ere lieu on veut afficher le premire element du tableau et ainsi de suite

                echo "</ul>";
                $listeeleve =[
                    0=> [
                        'prenom'=>'julien',
                        'classe'=>'maternelle',
                        'ecole'=>'juvisy'

                    ],
                    1=> [
                        'prenom'=>'Theo',
                        'classe'=>'maternelle',
                        'ecole'=>'evry'

                    ],
                    2=> [
                        'prenom'=>'mary',
                        'classe'=>'maternelle',
                        'ecole'=>'paris'

                    ]
                    ];
                    echo"<p> </p>";
                    echo "<ul>";
                    for($i=0;$i < count($listeeleve);$i++) {
                        echo "<li>{$listeeleve[$i]['prenom']}.</li>";  
                    }
                    echo "</ul>";

               ?>
            
        
    </div>
    <div class="col-sm-12 col-md-6">
    <h3 class="text-primary text-center">Boucle while</h3>
    <ul>
        <li>la boucle while permet de parcourir un tableau d'une manniere efficace dans le cas d'un tableau retourner aprés une request sur une base de donner</li>

    </ul>
    <?php
    $apprenants=['bakary','Tatiana','Sadek','bakary',];
    $i=0;
    while(isset($apprenants[$i])){ //isset () détermine si une variable existe
        // la founction verifier en fait si la variable est declare et si elle est tout sauf null // isset renverra false si la valeure de notre variable est null (n'existe pas)
        echo "<p> mon tableau\$apprenants contien:$apprenants[$i] </p>";
        $i++;
       
    }
    ?>

    </div>
    <div class="col-sm-12">
        <h3 class="text-primary text-center">Boucle foreach</h3>
        <ul>
                    <li>La boucle foreach est un moyen simple de passer un revue un tableau de façcon automatique . Cette boucle ne fonction que sur les tableaux est les objets.</li>
                    <li>Elle est efficace pour les tableaux associatifs mais fonctionne également pour les tableaux  avec indexé.</li>
                    <li>Contrairement à la boucle for, la boucle foreach() ne nécessite pas de connaître par avance le nombre d’éléments du tableau à lire. Sa syntaxe varie en fonction du type de tableau.</li>
                    <li>La structure foreach a deux formes. La première ne récupère que les valeurs. La deuxième récupère les clés et les valeurs.</li>                    
               </ul>
               <div class="row">
                    <div class="col-sm-12 col-md-6">
                            <h4> parcours des valeure du tableau</h4>
                            <code>
                                <pre>
                                foreach($tableau as $valeur){
                                    //bloc de code utilisant les valeure de la variable $tableau
                                }
                                </pre>
                            </code>
                            <?php
                        $montab=['html','css','JS','PHP'];
                        echo "<ul>";
                        foreach($montab as $valeur){
                            //on parcours le tableau par ses valeures.la variable $valeure prend les valeure du tableau successivement à chaque tour de boucle.le mot clé "as" fait partie de la syntax,il est obligatoire
                            echo "<li>\$valeur=$valeur</li>";
                        }
                        echo "</ul>";
                        ?>

                     </div>
                     <div class="col-sm-12 col-md-6">
                <h4>parcours des clé et des valeures de tableau</h4>
                <code>
                    <pre>
                        foreach($tableau as $cle=> $valeure){
                            //bloc de code utilisant les clé et le valeures de tableau
                        }
                    </pre>
                </code>
                    <?php
                    echo "<ul>";
                    foreach($montab as $cle => $valeur){ //je peux recupere le clé et valeure, que le tableau soit indéxé ou  associative quand il ya 2 variables aprés as celle de gauche parcours les indices et celle de droits parcourt les valeure
                      
                        echo "<li>\$cle = $cle => \$valeur=$valeur</li>";
                    }
                    echo "</ul>";

                    
                    ?>
                   </div>
               <p class="alert alert-secondary">La boucle foreach s'écrit toujours de la même façon. Entre les parenthèses, nous retrouverons d'abord le nom de la variable contenant un tableau. Vient ensuite le mot clé <code>as</code>, prédéfinit dans le langage PHP. Ensuite on trouve les deux variable qui représentent les indices du tableau et leurs valeurs. On peut donner le nom que l'on veut aux deux variables $key et $value, c'est leur emplacement qui indique à quoi elles servent. Entre ces deux variables on retrouve la flèche <code>=></code> qui signifie "correspond à". </p>
               <?php
               //******************************************************************************* */
               
    //  Exercice 1 : vous déclarez un tableau associatif avec les indices prenom, nom, email, telephone et vous y metter les valeurs correspondabnt à un seul contact. Puis avec une boucle foreach , vous affichez les valeurs dans des <p>, sauf le prenom doit étre dans un <h3>.
    $exer=[
        
        'prenom'=>'sancy',
        'nom'=>'mary',
        'email'=>'sancy@com',
        'telephone'=>9999999999999
        
        ];
               foreach($exer as $cle=> $val){ 
            if($cle =='prenom'){
                echo "<h3> bonjour $val</h3>";
            } else{
                echo"<p>$val </p>";
            }
                
        }
        //Exercice  2 :  vous déclarez un tableau avec les taille  S, M et L et XL , puis vous affichez les tailles dans un menu déroulant avec une boucle foreach .

        $taile=['S','M','L','XL'];
        ?>
       <form >
                <label >taille</label>
                <select >
                <?php
                foreach($taile as  $val){
                    ?>  
                    <option value="<?=$val ?>"><?=$val ?></option> 
            
                <?php //mudikirathu loop php kullathan irukanum
                }
                ?>  
                </select>
       </form>      
    </div>          
    </div>
    

</div>
</main>
<?php
require_once "inc/footer.inc.php";

?>


