<!doctype html>
<html lang="en">

<head>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <title>CRUD-enterprise</title>
</head>

<body>
    <header>
       <div class="p-5 mb-4"style="background-color:rgb(165, 103, 103)">
<section class="container py-5">
    <h1 class="fw-bold">CRUD</h1>
    <p class="col-md-8">Dans cette page on peut réaliser un crud complet on va utiliser la bdd enterprise</p>
</section>
       </div>
    </header>
  <main class="container">
    <?php
    ///////////////////////// function de débougage/////////////////
        function debug($var){
                echo'<pre class="border border-dark bg-light text-primary w-50 p-3">';
                var_dump($var);

                echo'</pre>';
        }
    ?>
    
    <h2 class="text-danger my-5">1-connexion à la BDD</h2>
    <?php
    ////////////////////connexion à base de donner(BDD)////////////////////////

    /*on va utiliser l'extension PHP data objects(PDO),elle défini une exellente interface pour acceder à une base de donner depuis php et d'executer des requeste SQL.
    **pour se connecter à la BDD avec PDO il faut crér une instance de cet object qui répresente une connexion à la base pour cela il faut servir du constructeure de la classe.
    *ce constructerure demande certains parametre:
    */
    //on declarer des constantes d'environnement qui vont contenir les information à la connexion à la BDD

        //constante du server
        define('DBHOST',"localhost");

        //Constante  de utilisateure de la BDD du serveur en local=> root
        define('DBUSER',"root");

        //constante pour le mot de passe de server en local=>pas de mot de passe
        define('DBPASS',"");

        //constante pour le nom de la base de donner(BDD)
        define('DBNAME',"entreprise");

        //DSN(data Source Name)
        // $dsn= "mysql:host=localhost;dbname=enterprise;chareset=utf8";
        $dsn="mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8";
        try{    //dans le try on vas instancier PDO,c'est creér un object de la classe PDO(un element de PDO)
            // $pdo=new PDO("mysql:host=localhost;dbname=enterprise;charset=utf8",'root,'');
            
            //avec la variable $dsn et les constantes
            $pdo=new PDO($dsn,DBUSER,DBPASS); 
            

            //on défini le mode erreure de PDO sur Exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

            debug(get_class_methods ($pdo));//permettre afficher la liste des methode présente dans object $pdo
            
            echo"je suis connecter";

        }catch(PDOException $e){// PDOException est une classe qui represnte un erreure émise par PDO et $e c'est l'objet de la classe en question qui vas stocker cette erreure

            die($e->getMessage()); //die permet arreter le PHP et d'afficher une erreure en utilisant la methode getMessage de l'objet $e

        }
        //a partir d'ici on est  connecte a la BDD et la variable $pdo est l'object qui represente la connexion à la BDD,cette variable va nous servir à effectuer les requeste SQL et à integrer la base de donner
        //la catch sera exécute dés lors on aura un probléme le try
        

        //à partir ici on est connecter à la BDD et la variable $pdo est l'object qui répresente la connextion à BDD,cette variable va nous servir à exxetuer les request SQL et à interroget la base de donner.


    ?>
    <h2 class="text-danger my-5">2-requeste d'insertion</h2>
    <?php

    /////////////////////////////////// requeste insertion//////////////////


    //on va insérer un employe en BDD :la methode exec() exécute une requeste SQL et retorne le nomber de line affecter,elle est utiliser pour faire des requeste qui ne retourne pas de jeu de réseulta: INSERT,UPDATE,DELETE

//      $request= $pdo->exec("INSERT INTO employes(prenom,nom,sexe,service,date_embauche,salaire)VALUES ('sancy','mary','f','informatique','2023-05-12',2000)");
//  debug($request);//affiche 1 
// echo"derniere id générer en BDD:".$pdo->lastInsertId();
echo"Employer sancy est bien enregistrer de la BDD ";
?>
<h2 class="text-danger my-5">3-requeste de  supression</h2>
<?php
 /////////////////////////////////// requeste de  supression//////////////////
 //suprimer de la BDD
 $request=$pdo->exec("DELETE FROM employes WHERE prenom ='sancy' ");
 echo"Employer sancy est bien suprimer de la BDD enterprise";
?>

  <h2 class="text-danger my-5">3-requeste d'affichage</h2> 
<?php
// **********************le cours de LUNDI 15/05/23*******************//

 ///////////////////////////////////// requeste de  affichage//////////////////
//on va utiliser la methode querry() :au contraire d'exec(),querry()est utiliser pour faire des requestes qui retourne un ou plusieure résultat:SELECT.on peut ausi utiliser avec DELETE,UPDATE ET INSERT

//*le valeure de retoure:
//   succes:query()retourne un nouvelle objet qui provient de la classe PDO statement
//Echec:False

/////////////////////////// recuiperation affichage une seule donner de la BDD//////////////////

//on va selectionner les information de l'employes Daniel
//$request=$pdo->query("SELECT * FROM employes WHERE prenom='Daniel'");
//debug($request); //Affche la requeste
//on peut compter le nombre de ligne retourne par la requeste avec la methode rowCount()
//debug($request->rowCount());// ici dans notre request et avec la condition on réquipere 1 selule employes

//dans cette objet $request ,nous ne voyons pas les donner concernant Daniel,pourtant elle s'y trouvent ,pour y accedre nous devons utiliser une methode qui s'appelle fetch().(Puiseque on as un seule resultat)
//il existe aussi la methode fetchAll()pour réquipere toutes les donner à partir de l'object
//$employe=$request->fetch(PDO::FETCH_ASSOC); //fetch () transforme l'object résultat en tableau et ici je le stock dans une variable $employe

//debug($employe);
//le parametre PDO::FETCH_ASSOC permet de transformer l'object en un array ASSOCIATIVE.on y trouve en indice le nom des champs de la request SQL.


//pour information,on peut mettre dans paranthese de fetch()

//PDO::FETCH_ASSOC pour obtenir un tableau aux indices Associative
////PDO::FETCH_NUM pour obtenir un tableau aux indices numerique
//PDO::FETCH_OBJ pour obtenir un dernier object
//ou encore des () vides pour obtenir un melange de tableau associative et indexé

//on peut éviter de metter cette constante comme paramétre de la methode  fetch() à chaque  fois en la difinissant dans la connexion de la BDD par defaut(dans le try de la connexion à la BDD)
//*************** */
//Exercices---1
//je suis daniel chevel du service informatique

$request=$pdo->query("SELECT * FROM employes WHERE prenom='Daniel'");
$employe=$request->fetch();
debug($employe);
echo"<p class=\"alert alert-secondary\">je suis $employe[prenom].$employe[nom] du service $employe[service].</p>";

//quand on met $employe[prenom][nom] [service] cette un table multidimensionnelle ca macher pas (c'est mon note)

//Exercices-2
//afficher le services de l'employe dont id_employe est 417
$request1=$pdo->query("SELECT * FROM employes WHERE id_employes= 417 ");
$employe1=$request1->fetch();
debug($employe1);
 echo"<p class=\"alert alert-secondary\">je suis $employe1[prenom].$employe1[nom],j'ai l'identifiant $employe1[id_employes] et viens de service $employe1[service].</p>";

//   echo"<p class=\"alert alert-secondary\">je suis {$employe1['prenom']}.{$employe1['nom']},j'ai l'identifiant {$employe1['id_employes']} et viens de service {$employe1['service']}.</p>";


    ///////////////// recupération  et affichage de plusieure donner de la BDD//////////////////
    $request=$pdo->query("SELECT * FROM employes");
    //debug($request->rowCount());
    $nbrEmployes=$request->rowCount();
    echo"<p class=\"alert alert-secondary\">le nombre employes dans l'enterprise:$nbrEmployes</p>";

    //je veux afficher le donner employes,je vais faire un fetch resultat et je stock mes employes dans un tableaux $employes (avec un s).
    // $employe=$request->fetch();//
    debug($employe);//affiche  que les donner de la premiere line de la BDD
    //comme nous avons plusieure line dans $request,nous devons faire une boucle pour le parcourir.
    echo '<div class="row">';
    while($employe=$request->fetch()){
        echo'<div class="col-sm-12 col-md-3">';
        echo  "<div>id_employes:$employe[id_employes]</div>";
        echo  "<div>nom et prenom:$employe[nom].$employe[prenom]</div>";
        echo  "<div>le service $employe[service]</div>";
        echo  "<div>la salaire$employe[salaire]</div>";
        echo '<hr>';
        echo '</div>';
    }
    
    echo '</div>';

    //si votre request ne donne qu'un seule résultat (par identifiant par example)alors on ne fait pas de boucle
    //si votre request donner plusieure resultats,alors on fait un boucle (sinon on obtenir que le primiere resultat de la requeste)
//*************************************************** */
//exercies
    //vous afficher la liste des different services dans une list,en mettant un services par <li>
    $request=$pdo->query("SELECT distinct service FROM employes");
    debug($employe);
   
    echo '<ul>';
    while($employe=$request->fetch()){
    echo  "<li>le service $employe[service]</li>";
           }
    echo '</ul>';

    //je veux récupere les different salaire dans la table employe
    $request=$pdo->query("SELECT distinct salaire FROM employes order by salaire desc ");
    $salaire=$request->fetchAll();//fetch all() recupére toutes les resulta dans la request et les sort sous  forme d'un tableau à 2 dimensions.
    debug($salaire);
 
    //ici  il y a 2 facon de faire:

            //ici 1ere facon :j'utiliser une boucle foreach
            echo"<p>List des differente salaires dans l'enterprise</p>";
            echo "<ul>";
            foreach($salaire as $key => $value){
            echo  '<li>'.$salaire[$key]['salaire'] .'</li>';
            }
            echo "</ul>";
//vous afficher les employes femmes et qui ganeant un salaire superieure à 2000 avec un fetchAll()
$request=$pdo->query("SELECT  * FROM employes where sexe='F' and salaire>=2000");
    $salaireF=$request->fetchAll();
    debug($salaireF);

    //ici  il y a 2 facon de faire:

            //ici 1ere facon :j'utiliser une boucle foreach
            echo"<p>List des employes dans l'enterprise</p>";
            echo "<ul>";
            foreach($salaireF as $key => $value){
                echo '<li>'.$salaireF[$key]['prenom'].$salaireF[$key]['nom'].$salaireF[$key]['salaire'].$salaireF[$key]['sexe'].$salaireF[$key]['service'].'</li>'.'<br>';
            
            }
            echo "</ul>";
//*************************** AVEC boucle FOR */
echo"<p>List des employes dans l'enterprise</p>";
echo "<ul>";
for($i=0;$i<count($salaireF);$i++){
    // for($j=0;$j<count($salaireF[$i]);$j++){ 
        debug($salaireF[$i]);

    echo '<li>'.$salaireF[$i]['prenom'].$salaireF[$i]['nom'].$salaireF[$i]['salaire'].$salaireF[$i]['sexe'].$salaireF[$i]['service'].'</li>'.'<br>';

}
// }
echo "</ul>";

///**************** */ afficher les resultat de la requeste dans une table HTML***************

// AVEC foreach
$request=$pdo->query("SELECT  * FROM employes where date_embauche>'2010-01-01'");
//  echo $nbemploye=$request->rowCount();           
  ?>
  <h3 class="text-success mb-5">les employes de notre enterprise embauches à partir de 2010</h3>
  <h5>methode-1:en HTML et avec une boucle while et un foreach</h5>
  <table class="table table-secondary table-borderd">
    <tr>
        <th>Id</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Sexe</th>
        <th>Service</th>
        <th>Date d'embauche</th>
        <th>Salaire</th>
 </tr>
        <?php
        //les line de tableau(le row)
            while($employe=$request->fetch()){//la boucle while avec le fetch permet l'object $request,on crer un tableau assciative $employe à chaque tour de boucle
        ?>
  <tr>
        <?php
      //quand on fait 1 tour de while,on fait à l'interieure 7 tour de foreach pour parcourir un employer quand la while a parcourir la tatalité des line de retour de la $request,alors le fetch retourner false et la while s'arrete
            foreach($employe as $key => $value){//$employes etant un tableau ,on peut le parcourir avec un foreach.la variavle $value prend les valeure successivement à chaque tour de boucle
                
                    if($key=='sexe'){ //j'aurais besoins de l'index sexe afin d'etablir une condition sur l'affichage des valeure f et m =>femme/m->Homme
                        if($value=='f'){
                               echo"<td>femme</td>"; 
                        }else{
                            echo"<td>Homme</td>"; 
                        }

                        }elseif($key=='date_embauche'){//j' aurai besoins de  l'index de ma condition sur champs date_embauche
                            echo"<td>".date('d/m/y',strtotime($value))."</td>"; // ici on utiliser une founction prédéfini date().cette function PHP prend 2 argument:le  1 argument  format de la date,2eme argument la date que l'on veut modifier avec la founction strtotime() qui s'attend à recevoir une chaine de caractere contenant un format de date anglaise et esseira d'analyser ce format dans un horofdatage unix.on peut préciser une date nous -meme ou alors récupérer une date depuis BDD
                        }else{
                            echo"<td>$value</td>"; //j'affiche la valeure des autre clés(sans les condition)dans des td
                        }

            }
        ?>
            

</tr>



<?php
         }

  ?>
 </table>
  <h5>methode-2:en PHP avec une boucle while et un foreach</h5>
  <?php
  //******************************* */ Mardi*****************************************           
  ?>
  
        <?php
          $request=$pdo->query("SELECT  * FROM employes where date_embauche>'2010-01-01'");
          echo"<table class=\" table table-secondary table-borderd\">";
       echo " <tr>
        <th>Id</th>
        <th>Prenom</th>
        <th>Nom</th>
        <th>Sexe</th>
        <th>Service</th>
        <th>Date d'embauche</th>
        <th>Salaire</th>
            </tr>";             
                    
         while($employe=$request->fetch()){
            echo"<tr>";
                                   
            foreach($employe as $key => $value){
    
                    if($key=='sexe'){ 
                        if($value=='f'){
                               echo"<td>femme</td>"; 
                        }else{
                            echo"<td>Homme</td>"; 
                        }

                        }elseif($key=='date_embauche'){
                            echo"<td>".date('d/m/y',strtotime($value))."</td>"; 
                        }else{
                            echo"<td>$value</td>"; 
                        }
                       
            }
            echo"</tr>"; 
        }
       
   echo"</table>";    
        ?>
       

       <h5>methode 3:en php et avec la methode while</h5>
        <?php
       
          $request=$pdo->query("SELECT  * FROM employes where date_embauche>'2010-01-01'");
          $employe=$request->fetch(); 
          echo"<table class=\" table table-secondary table-borderd\">";
          echo"<tr>;
          <th>ID</th>
          <th>Prenom</th>
          <th>nom</th>
          <th>sexe</th>
          <th>Service</th>
          <th>date de embauche</th>  
          <th>salaire</th>             
           echo</tr>";        
                    
         while($employe=$request->fetch()){
            echo"<tr>";
            echo"<td>{$employe['id_employes']}</td>";
            echo"<td>{$employe['prenom']}</td>";
            echo"<td>{$employe['nom']}</td>";   
            echo "<td>";
            echo($employe['sexe']=='f')?'femme':'Homme';           
            echo "</td>";
            
            echo"<td>{$employe['service']}</td>"; 
            echo "<td>";
            echo date('d/m/y',strtotime($employe['date_embauche']));
            echo "</td>";
            echo"<td>{$employe['salaire']}</td>"; 

            echo"</tr>"; 
        }
        echo"</table>";
        
        ?>

        <h5>methode 4:en php et avec la methode fetchall</h5>
            
        <?php
        //////////// ///fetchall///////////////////////////////////////////////
          $request=$pdo->query("SELECT  * FROM employes where date_embauche>'2010-01-01'");
          $employe=$request->fetchAll(); 
          echo"<table class=\" table table-secondary table-borderd\">";
          echo"<tr>;
          <th>ID</th>
          <th>Prenom</th>
          <th>nom</th>
          <th>sexe</th>
          <th>Service</th>
          <th>date de embauche</th>  
          <th>salaire</th>             
           echo </tr>";        
                    
         foreach($employe as $key=> $value){
            echo"<tr>";
            echo"<td>{$employe[$key]['id_employes']}</td>";
            echo"<td>{$employe[$key]['prenom']}</td>";
            echo"<td>{$employe[$key]['nom']}</td>";   
            echo "<td>";
            echo($employe[$key]['sexe']=='f')?'femme':'Homme';           
            echo "</td>";
            
            echo"<td>{$employe[$key]['service']}</td>"; 
            echo "<td>";
            echo date('d/m/y',strtotime($employe[$key]['date_embauche']));
            echo "</td>";
            echo"<td>{$employe[$key]['salaire']}</td>"; 
            echo"</tr>"; 
        }
        echo"</table>";
        
        ?>
        <h2 class="text-danger my-5">5-request modification</h2>
        <?php
        ///////////requeste de modification//////////////////////////


            //on va agumenter le salaire de Julien/////////////////////
            $request=$pdo->exec("UPDATE employes set salaire= 1500 where prenom='julien'");
            echo"<p class='alert alert-secondary'>le salaire de l'emploi julien a bien éte augumenter</p>";

            //on va faire la meme chose avec un querry=on va faire diminuer le salire de employes avec l'identifiant 350
            $request=$pdo->query("UPDATE employes set salaire = 5000 where id_employes=350");
            echo"<p class='alert alert-secondary'>le salaire de l'emploi qui a un identifiant égale à 350 a bien ete diminué</p>";
        ?>
    <h2 class="text-danger my-5">6-request preparés</h2>
    <p>le request préparers sont préconiser si vous executer plusieure fois la  meme requeste.Ainsi vous éviter au SGBS de repéter toutes les phrases analyse/interprétation/exécution de la requeste(gain de performance).le requeste preparer sont aussi utiliser pour nettoyer les donner et se prémunir des injection de type SQL(ce que nous verrons dans un chapiter ultérieure)</p>
    <ul>
        une requeste prépare se réaliser en trois étabes
    <li>1-on prepare la requeste</li>
    <li>2-on lie le marquere à la requeste</li>
    <li>3-on execute la requeste</li>
</ul>
<h3 class="mt-5">requeste prepare avec bindParam()</h3>

<?php
//1-on prepare la request:shm
$request=$pdo->prepare("SELECT * from employes where prenom= :prenom");
//preparer() est une methode qui permet qui preparer la requeste sans executer.elle contiens markup:prenom qui est vide et attend une valeure
//$request est à cette line une object PDOStatement
//2-on lie le marquere à la variable $prenom
$prenom='Damien';
$request->bindParam(':prenom',$prenom);
//bindParm() permet de lier le marquer à la variable $prenom,cette methode ne recoit qu'un variable on ne peut pas y mettre un evaleure fixe comme 'Damien' par example
//$request->bindParam(':nom','damien')//ce n'est pas possible
//si vous voulez lier le marquere à une valeure fixe,alors il faut utiliser la methode bindvalue()
//examples
//$request->bindParam(':nom','damien')
//3-on execute la requeste:
$request->execute();
//execute () permet d'executer toutes la requeste preparer ave prepare()
$employe=$request->fetch();
debug($employe);
echo"<p class='alert alert-secondary'>l'employes$employe[prenom] travaille dans le service $employe[service]</p>";
/////// Auter facon pour déclarer des marquer dans une requeste prepere avec bindpara()////////
$request=$pdo->prepare("SELECT * from employes where prenom = ? and service = ?");
$prenom='Celine';
$service='commercial';
$request->bindParam(1,$prenom);
$request->bindParam(2,$service);
$request->execute();
$employe=$request->fetch();
debug($employe);
echo"<p class='alert alert-secondary'>l'employes$employe[prenom] travaille dans le service $employe[service]</p>";

?>
<h3>requeste preprer sans bindParam()</h3>
<?Php
$request=$pdo->prepare("SELECT * from employes where prenom =:prenom and nom =:nom");
$request->execute(array(
    ':prenom'=>'Julien',
    ':nom'=>'Cottet'

));//on peut se passer de bindParam() et associer les marquere à leure valeures directement dans un tableau passer en argument de executer().
$employe=$request->fetch();
debug($employe);
echo"<p class='alert alert-secondary'>l'employes$employe[prenom] travaille dans le service $employe[service]</p>";

// /////// Auter facon pour déclarer des marquer dans une requeste prepere sans bindpara()////////
$request=$pdo->prepare("SELECT * from employes where sexe =? and service = ?");
$sexe='f';
$service='commercial';
$request->execute(array($sexe,$service));
$employe=$request->fetch();
debug($employe);
echo"<p class='alert alert-secondary'>l'employes$employe[prenom] travaille dans le service $employe[service]</p>";
//****************************************** exercices*/
$request=$pdo->prepare("SELECT * from employes where sexe =? and service = ?");
$sexe='f';
$service='commercial';
 $request->execute(array($sexe,$service));

while($employe=$request->fetch()){
debug($employe);
echo"<p class='alert alert-secondary'>l'employes$employe[prenom] travaille dans le service $employe[service]</p>";
}
///insertion avec utilisant les requeste preparer et les marquere//////////////////
$request=$pdo->prepare("INSERT into employes (nom,prenom,sexe,service,date_embauche,salaire) VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)");
$request->execute(array(
    ':prenom'=>'Joe',
    ':nom'=>'Dalton',
    ':sexe'=>'m',
    ':service'=>'commercial',
    ':date_embauche'=>'2020-05-16',
    ':salaire'=>1000

));
//******************************************* */
$request=$pdo->prepare("UPDATE employes set salaire = ? where prenom = ?");
$salaire=5000;
$prenom='dalton';
 $request->execute(array($salaire,$prenom));

 //************************************ */
 $request=$pdo->prepare("UPDATE employes set salaire =:salaire where prenom =:prenom ");
 $request->execute(array(
    ':prenom'=>'Dalton',
    ':salaire'=>500

));

//********************** */
$request=$pdo->prepare("UPDATE employes set nom=:nom, salaire =:salaire where prenom =:prenom ");
 $request->execute(array(

    ':prenom'=>'Dalton',
    ':nom'=>'JOE',
    ':salaire'=>100

));

?>

       
           
 
  

    </main>
    <footer style="background-color: #EEA545;">
    <div class="container">
        <hr>
        <div class="row text-center">
            <div class="col-12">
                <p>&copy;Enterprise-<?=date('Y')?></p>
                <?php
              $date = date('d/m/Y h:i:s a', time());
              echo $date;
                ?>
            </div>
        </div>
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