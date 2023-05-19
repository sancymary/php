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

            debug(get_class_methods ($pdo));//permettre afficher la liste des methode présente dans object $pdo
            
            echo"je suis connecter";

        }catch(PDOException $e){// PDOException est une classe qui represnte un erreure émise par PDO et $e c'est l'objet de la classe en question qui vas stocker cette erreure

            die($e->getMessage()); //die permet arreter le PHP et d'afficher une erreure en utilisant la methiode getMessage de l'objet $e

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


 //************************************ test  test test test test test*/
 echo"<table class=\"table table-secondary table-borderd \">";
 echo " <tr>
 <th>Id</th>
 <th>Prenom</th>
 <th>Nom</th>
 <th>Sexe</th>
 <th>Service</th>
 <th>Date d'embauche</th>
 <th>Salaire</th>
     </tr>";  
  echo"</table>";             
?>
   

    </main>
    <footer>
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