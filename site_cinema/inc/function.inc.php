<?php

// fichier qui contient les function php à utiliser dans notre site
    ///////////////////////// function de débougage/////////////////
        function debug($var){
                echo'<pre class="border border-dark bg-light text-primary w-50 p-3">';
                var_dump($var);

                echo'</pre>';
        }

 ///////////////Function de sécurisation/////////////////
//  function security($variable){
//     $variable = htmlentities(trim($variable));

//  }


        ///////////////constante pour  définir le chemin du site/////////////////

        define("RACINE_SITE","/php/site_cinema/");//constante qui défini dans lesquelle se suitue le site pour pouvoir déterminer des chemin absolu à partir de localhost(on ne prend localost).ainsi nous ecrivons tous le chemin (exp:src,href)en absolu avec cette constante.


         ///////////////////////// function de connexion à la BDD/////////////////

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
        define('DBNAME',"cinema");

        function connexionBdd(){

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

            // debug(get_class_methods ($pdo));//permettre afficher la liste des methode présente dans object $pdo
            
            // echo"je suis connecter";//je comment 01/06/23

        }catch(PDOException $e){// PDOException est une classe qui represnte un erreure émise par PDO et $e c'est l'objet de la classe en question qui vas stocker cette erreure

            die($e->getMessage()); //die permet arreter le PHP et d'afficher une erreure en utilisant la methode getMessage de l'objet $e

        }
        return $pdo;//ici on utilise une return car on récuper l'object de la function que l'on vas appelle dans plusieure autre functions
    }
    connexionBdd();

    //////////////////////08/06/23
    //pour create une section
    session_start();

 


       ////////////////////////////////////// function alertes //////////////////////////////////////////////////////
function alert(string $contenu,string $class){
 return "<div class=\"alert alert-$class alert-dismissible fade show\" role=\"alert\">
        $contenu
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
  </div>";
   
  


}

   ////////////////////////////////////// LES TABLES ////////////////////////////////////

    //////////une function crére pour la table categorie//////////////////////////////////////

    function createTableCategorie(){
        $pdo = connexionBdd();
        $sql = "CREATE TABLE IF NOT EXISTS categories (id_category INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50)NOT NULL,description TEXT  NULL)";

        $request = $pdo->exec($sql);

    }
    //createTableCategorie();

            //////////une function pour ajoute une categorie////////////////////////////////////

    function addCatagory(string $nameCategorie,string $description): void {
        $pdo=connexionBdd(); 
        $sql="INSERT INTO categories (name,description) VALUES (:name, :description)"; // requeste d'insertion que je stocke dans une variable
        $request = $pdo->prepare($sql);//je prepare ma function et je l'execute
        $request->execute(array(
            ':name'=>$nameCategorie,
            ':description'=>$description

    ));

    }

     //////////une function pour recuperer tous les categories //////////////////////////

     function allcategorie() : array {
        $pdo=connexionBdd();
        // echo "function";
         $sql="SELECT * FROM categories";// requête d'insertion que je stocke dans une variable
         $request = $pdo->query($sql);
         $result = $request ->fetchAll();// je utiliser fetchall pour recuperer toutes les lignes à la fois
        return $result;//ma fonction retourne un tableau avec les données récupérer de la BDD
     }

    //////////une function pour suprimer UNE categories ////////////////////////////////////

    function deleteCategory(int $id):void{
        $pdo=connexionBdd();
        $sql="DELETE FROM categories WHERE id_category= :id";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':id' => $id
        ));

    }

    //////////une function pour MODIFIER CATEGORY ////////////////////////// ///////////////

    function updateCategory(int $id,string $name,string $description):void{
        $pdo=connexionBdd();
        $sql="UPDATE  categories SET name =:name, description =:description where id_category = :id";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':name' => $name,
            ':description' => $description,
            ':id' => $id
        ));

    }
      //////////une function pour recuperer une seule categories ////////////////////////// 
      
      function showCategory(int $id): array{
        $pdo=connexionBdd();
        $sql="SELECT * FROM categories WHERE id_category = :id";
        $request=$pdo->prepare($sql);
        $request->execute(array(
           
            ':id' => $id
        ));
        $result=$request->fetch();// Un fetch simple car je récupère une ligne bien déterminé grâce à l'id

        return $result;//ma fonction retourne un tableau avec une seule ligne

    }


    //////////////////////////////////////function pour recupere les films la meme categories 12/06/23
    function filmbycategoryname(string $name){
        $pdo=connexionBdd();
        $sql="SELECT * FROM films WHERE category_id =(SELECT id_category FROM categories WHERE name = :name)";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':name' => $name
        ));
        $result=$request->fetchAll();

        return $result;

    }
    //////////////////////////////////////function pour recupere les films la meme categories 12/06/23
    function filmbycategoryid(string $id){
        $pdo=connexionBdd();
        $sql="SELECT * FROM films WHERE category_id = :id";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':id' => $id
        ));
        $result=$request->fetchAll();

        return $result;

    }


//*********************************POUR FILMS************************************ */
//************************************ 01/06/2023**************************** */
////////create function pour table Films///////////////////////////

function createfilms(){
    $pdo = connexionBdd();
    $sql = "CREATE TABLE IF NOT EXISTS films (id_film INT NOT NULL PRIMARY KEY AUTO_INCREMENT,categorie_id INT NOT NULL, title VARCHAR(100) NOT NULL,director VARCHAR(50)NOT NULL,actors VARCHAR(100)NOT NULL,ageLimit VARCHAR(5)  NULL,duration TIME NOT NULL,synopsis TEXT NOT NULL,date DATE NOT NULL,image VARCHAR(255)NOT NULL,price FLOAT NOT NULL,stock INT NULL)";

    $request = $pdo->exec($sql);
}
// createfilms();

     //////// Une fonction pour récupérer l'id d'une catégorie/////////////////////////////////////////////

     function idcategory(string $name):array{ 
        $pdo=connexionBdd();
        $sql="SELECT id_category FROM categories WHERE name =:name";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':name' => $name
        ));
        $result=$request->fetch();//Un fetch simple car je récupère une ligne bien déterminé grâce à l'id
        return $result;//// ma fonction retourne un tableau avec une seule ligne


     }

     //function showfilms pour afficher un films pour faire modification

     function showfilm(int $id): mixed{
        $pdo=connexionBdd();
        $sql="SELECT * FROM films WHERE id_film = :id";
        $request=$pdo->prepare($sql);
        $request->execute(array(
           
            ':id' => $id
        ));
        $result=$request->fetch();// Un fetch simple car je récupère une ligne bien déterminé grâce à l'id

        return $result;//ma fonction retourne un tableau avec une seule ligne

    }

    ////////////////////////////////////
    // fonction update

function updateFilm(int $id, string $title, string $director, string $actors, string $ageLimit, int $category_id, string $duration, string $date, string $synopsis, string $image, float $price, int $stock): void
{
     $pdo = connexionBdd();

     $sql = "UPDATE films SET
                         id_film = :id,
                         title = :title,
                         director = :director,
                         actors = :actors,
                         ageLimit = :ageLimit,
                         category_id = :category_id,
                         duration = :duration,
                         date = :date,
                         synopsis = :synopsis,
                         image = :image,
                         price = :price,
                         stock = :stock
               WHERE id_film = :id";
          
     $request = $pdo->prepare($sql);     
     $request->execute(array( 
                    ':id'       => $id,
                    ':title'    => $title,
                    ':director' => $director,
                    ':actors'   => $actors,
                    ':ageLimit' => $ageLimit,
                    ':category_id'    => $category_id,
                    ':duration' => $duration,
                    ':date'     => $date,
                    ':synopsis' => $synopsis,
                    ':image'    => $image, // Attention, l'image ne doit pas venir de $_POST, mais de $_FILES
                    ':price'    => $price,
                    ':stock'    => $stock
                    ));
   
}


     

    

    //************************ function du CRUD pour les films///////////01/06/23///////////////
    function addFilm(string $title, string $director, string $actors, string $ageLimit, int $category_id, string $duration, string $date, string $synopsis, string $image, float $price, int $stock ): void {

        $pdo = connexionBdd(); // je stock ma connection à la BDD dans une variable 
    
        $sql = "INSERT INTO films
        (title, director, actors, ageLimit, category_id, duration, date, synopsis, image, price, stock)
        VALUES
        (:title , :director, :actors, :ageLimit, :category_id, :duration, :date, :synopsis, :image, :price, :stock)"; // Requeêt d'insertion que je la stock dans une variable
        $request = $pdo->prepare($sql);// Je prépare ma requête  et je l'exécute
        $request->execute(array( 
                        ':title'=> $title,
                        ':director' => $director,
                        ':actors' => $actors,
                        ':ageLimit' => $ageLimit,
                        ':category_id' => $category_id,
                        ':duration' => $duration,
                        ':date'=> $date,
                        ':synopsis' => $synopsis,
                        ':image' => $image, //attention la photo ne vient de $_POST mais de $_FILES
                        ':price'=> $price,
                        ':stock' => $stock,
                   ));
                   //  die (print_r($pdo->errorInfo()));
    }

     ////////create function pour récuparation///////////////////////////01/06/23
     function allFilm(): array {

        $pdo = connexionBdd();
        $sql = "SELECT * FROM films";
        $request = $pdo->query($sql);
        $result = $request->fetchAll();// j'utilise le fetchAll pour récuperer tout les ligne à la fois
        return $result; // ma fonction retourne un tableau avec les donées récupérer de la BDD
   }

   ////////une function de chaine  vers tableaux///////////////////////////01/06/23 et 02/06/23
   function stringtoarray(string $string):array{
    $array = explode('/',trim($string,'/')); // je tranforme ma chaine de caractere en tableaux et je suprimer les /autour de la chaine de caractere
    return $array;//ma function retourne un tableau

   }
   //////////////////////////////Function de connexion 09/06/23 ////////////////////
   function logout(){
    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action']== 'deconnexion'){
        unset($_SESSION['user']); //on suprimer l'index "user" de la session pour se deconnecter // cette function détruit les variables stocker comme 'firstname' et email
        //session_destroy(); // détruit touts le donner de la session déja établir.cette funcction détruit la session sur le serveure
        header("location:".RACINE_SITE."authentification.php");
    }

   }
   logout();


   //function delete film:pour suprimer un film////////////////02/06/23
   function deleteFilm(int $id):void{
    $pdo=connexionBdd();
    $sql="DELETE FROM films WHERE id_film= :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));

}




     //****************************POUR USER************************************************* */

     ////////create function pour table users///////////////////////////

    function createTableUsers(){
        $pdo = connexionBdd();
        $sql = "CREATE TABLE IF NOT EXISTS users (id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT, firstName VARCHAR(50)NOT NULL,lastName VARCHAR(50)NOT NULL,pseudo VARCHAR(50)NOT NULL,email VARCHAR(100)NOT NULL,mdp VARCHAR(255)NOT NULL,phone VARCHAR(30) NOT NULL,civility ENUM('f','h')NOT NULL,birthday DATE NOT NULL,address VARCHAR(50) NULL,zip VARCHAR(50) NULL,city VARCHAR(50) NOT NULL,country VARCHAR(50)NOT NULL), role ENUM ('ROLE_USER','ROLE_ADMIN')DEFAULT 'ROLE_USER'";

        $request = $pdo->exec($sql);
    }
   // createTableUsers();

    ////////function pour verfier si un EMAIL existe dans BDD///////////////////////////
    function checkEmailUser(string $email):mixed{ //avec le type mixed je preciser que le retour de cette function pet_etre tableaux ou un boolean,si j'ai un utilisateure dans un bdd qui a le meme email donc retour c'est un tableau si non le retour c'est un boolean
        $pdo=connexionBdd();
        $sql="SELECT * FROM users WHERE email=:email";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':email' => $email
        ));


$result=$request->fetch();
return $result;

    }
      ////////function pour verifier si pseudo un existe dans BDD///////////////////////////

   function checksudouser(string $pseudo):mixed{
        $pdo=connexionBdd();
        $sql="SELECT * FROM users WHERE pseudo=:pseudo";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':pseudo' => $pseudo
        ));


$result=$request->fetch();
return $result;

    }

 ////////////function de CRUD pou les utilisateure///////////////////////////////////////


 
    function inscriptionUsers(string $firstName, string $lastName, string $pseudo, string $mdp,  string $email, string $phone, string $civility, string $birthday, string $address, string $zip, string $city, string $country ): void {

        $pdo = connexionBdd(); // je stock ma connection à la BDD dans une variable 
    
        $sql = "INSERT INTO users
        (firstName, lastName, pseudo, mdp, email, phone, civility, birthday, address, zip, city, country)
        VALUES
        (:firstName , :lastName, :pseudo, :mdp,  :email, :phone, :civility, :birthday, :address, :zip, :city, :country)"; // Requeêt d'insertion que je la stock dans une variable
        $request = $pdo->prepare($sql);// Je prépare ma requête  et je l'exécute
        $request->execute(array( 
                        ':firstName'=> $firstName,
                        ':lastName' => $lastName,
                        ':pseudo' => $pseudo,
                        ':mdp' => $mdp,
                        ':email' => $email,
                        ':phone'=> $phone,
                        ':civility' => $civility,
                        ':birthday' => $birthday,
                        ':address'=> $address,
                        ':zip' => $zip,
                        ':city' => $city,
                        ':country' => $country,
                   )); 
                   
   }
   /////////////////////////////////////////////////////////////////////////////

///une function pour verifier un utilisateure dans la BDD******************
   function checkuser(string$email,string $pseudo):mixed{
    $pdo=connexionBdd();
        $sql="SELECT * FROM users WHERE pseudo=:pseudo AND email =:email";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':pseudo' => $pseudo,
            ':email' => $email
        ));


$result=$request->fetch();
return $result;


   }


   //********************************************************************************* */
 

    ////////create function pour table Films///////////////////////////

    // function createfilms(){
    //     $pdo = connexionBdd();
    //     $sql = "CREATE TABLE IF NOT EXISTS films (id_film INT NOT NULL PRIMARY KEY AUTO_INCREMENT,categorie_id INT NOT NULL, title VARCHAR(100) NOT NULL,director VARCHAR(50)NOT NULL,actors VARCHAR(100)NOT NULL,ageLimit VARCHAR(5)  NULL,duration TIME NOT NULL,synopsis TEXT NOT NULL,date DATE NOT NULL,image VARCHAR(255)NOT NULL,price FLOAT NOT NULL,stock INT NULL)";

    //     $request = $pdo->exec($sql);
    // }
   // createfilms();
   //////////////////////////////////////////////////////////////////
   /*************************exercises08/06/23************************************************** */
////////create function pour récuparation tous les utilisateure///////////////////////////01/06/


function alluser() : array {
    $pdo=connexionBdd();
    // echo "function";
     $sql="SELECT * FROM users";// requête d'insertion que je stocke dans une variable
     $request = $pdo->query($sql);
     $result = $request ->fetchAll();// je utiliser fetchall pour recuperer toutes les lignes à la fois
    return $result;//ma fonction retourne un tableau avec les données récupérer de la BDD
 }

 //////////////////////////////////function pour suprimer un utilisateure
 function deleteuser(int $id):void{
    $pdo=connexionBdd();
    $sql="DELETE FROM users WHERE id_user= :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));

}


/////////////////////////// recuperation un seule utilisateure
function showuser(int $id): array{
    $pdo=connexionBdd();
    $sql="SELECT * FROM users WHERE id_user = :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
       
        ':id' => $id
    ));
    $result=$request->fetch();
    return $result;
}

//////function pour modification le  role
function updateRole(string $role,int $id):void{

    $pdo=connexionBdd();
    $sql="UPDATE  users SET role =:role where id_user = :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
        ':role' => $role,
        ':id' => $id
    ));

}
  

 ////////create function pour la  création des clé etrangers///////////////////
 
 //$tableF:table ou' on vas crére la clé etrangére(dans mon cas :table films)
 //$tablep:table à partir de laquelle on recupére la clé primary(dans mon cas :table categories)

 //$foreign:le nom de clé etrangere (dans mon cas :table de films categorie_id)
 //$primary:le nom de la clé primary (dans mon cas : dans table categories de id_category)

 function foreignKey(string $tableF,string $foreign,string $tablep,string $primary){
    $pdo = connexionBdd(); 
    $sql = "ALTER TABLE $tableF ADD CONSTRAINT FOREIGN KEY ($foreign) REFERENCES $tablep ($primary)";
    $request = $pdo->exec($sql);

     }
     //creation de la clé etranger dans key table films
 //foreignKey('films','categorie_id','categories','id_category');
//on execute argument

/////////////////////pour sortir recent(live films)films and just affiche que 6 films  19/06/23 
function filmbydate(){
    $pdo=connexionBdd();
    $sql= "SELECT * FROM films  ORDER BY date DESC LIMIT 6 ";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;

}
//////////////////////////
//  calculerMontantTotal() pour calculer le montant total du panier en additionnant les sous-totaux de chaque film.
function calculerMontantTotal(array $tab) :int{
    $montant_total = 0;

    foreach ($tab as $key) {
        $montant_total += $key['price'] * $key['quantity'];
    }

    return $montant_total;
}


    ?>