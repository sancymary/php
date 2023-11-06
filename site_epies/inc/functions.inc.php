<?php

// fichier qui contient les function php à utiliser dans notre site
    ///////////////////////// function de débougage/////////////////
        function debug($var){
                echo'<pre class="border border-dark bg-light text-primary w-50 p-3">';
                var_dump($var);

                echo'</pre>';
        }

 ///////////////constante pour  définir le chemin du site/////////////////

        define("RACINE_SITE","/php/site_epies/");//constante qui défini dans lesquelle se suitue le site pour pouvoir déterminer des chemin absolu à partir de localhost(on ne prend localost).


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
        define('DBNAME',"asiatique_epices");

        function connexionBdd(){

       
        $dsn="mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8";
        try{    //dans le try on vas instancier PDO,c'est creér un object de la classe PDO(un element de PDO)
           
            //avec la variable $dsn et les constantes
            $pdo=new PDO($dsn,DBUSER,DBPASS); 
            

            //on défini le mode erreure de PDO sur Exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);           
            // echo"je suis connecter";//je comment 01/06/23

        }catch(PDOException $e){// PDOException est une classe qui represnte un erreure émise par PDO et $e c'est l'objet de la classe en question qui vas stocker cette erreure

            die($e->getMessage()); //die permet arreter le PHP et d'afficher une erreure en utilisant la methode getMessage de l'objet $e

        }
        return $pdo;//ici on utilise une return car on récuper l'object de la function que l'on vas appelle dans plusieure autre functions
    }
    connexionBdd();

       ////////////////////////////////////// function alertes ///////////////////////////////////////////////
function alert(string $contenu,string $class){
    return "<div class=\"alert alert-$class alert-dismissible fade show\" role=\"alert\">
           $contenu
           <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
     </div>";
   } 
//    **********************************************POUR CREATE UNE SESSION*************************
    //pour create une section
    session_start();
   
   //*********************** */ LES TABLES *******************************************/

   //////////une function crére pour la table categories//////////////////////////////////////

   function createTableCategorie(){
       $pdo = connexionBdd();
       $sql = "CREATE TABLE IF NOT EXISTS categories (id_category INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name VARCHAR(50)NOT NULL,description TEXT  NULL)";

       $request = $pdo->exec($sql);

   }
   //createTableCategorie();

//////////une function crére pour la table products//////////////////////////////////////
function createTableProducts(){
    $pdo = connexionBdd();
    $sql = "CREATE TABLE IF NOT EXISTS products (id_product INT NOT NULL PRIMARY KEY AUTO_INCREMENT,categorie_id INT NOT NULL, title VARCHAR(100) NOT NULL,image VARCHAR(255)NOT NULL,date DATE NOT NULL,price FLOAT NOT NULL,stock INT NULL,weight INT NULL ,description TEXT  NULL)";

    $request = $pdo->exec($sql);
}
// createTableProducts();

//////////une function crére pour la table users//////////////////////////////////////
function createTableUsers(){
    $pdo = connexionBdd();
    $sql = "CREATE TABLE IF NOT EXISTS users (id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT, firstName VARCHAR(50)NOT NULL,lastName VARCHAR(50)NOT NULL,pseudo VARCHAR(50)NOT NULL,email VARCHAR(100)NOT NULL,mdp VARCHAR(255)NOT NULL,phone VARCHAR(30) NOT NULL,address VARCHAR(50) NULL,zip VARCHAR(50) NULL,city VARCHAR(50) NOT NULL,country VARCHAR(50)NOT NULL, role ENUM ('ROLE_USER','ROLE_ADMIN') DEFAULT 'ROLE_USER')";

    $request = $pdo->exec($sql);
}
// createTableUsers();

//////////une function crére pour la table users//////////////////////////////////////
function createTableAvis(){
    $pdo = connexionBdd();
    $sql = "CREATE TABLE IF NOT EXISTS avis (id_avis INT NOT NULL PRIMARY KEY AUTO_INCREMENT,user_id INT NOT NULL,commentaire text NOT NULL,date_commentaire DATE NOT NULL  )";

    $request = $pdo->exec($sql);
}
//  createTableAvis();

 
 

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
//************************ FUNCTION POUR  CRUD EN TABLE CATEGORIES************************************************

//////////une function pour recuperer tous les categories //////////////////////////

function allcategorie() : array {
    $pdo=connexionBdd();
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

 //////////une function pour recuperer une seule categories show////////////////////////// 
      
 function showCategory(int $category): array{
    $pdo=connexionBdd();
    $sql="SELECT * FROM categories WHERE id_category = :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
       
        ':id' =>$category
    ));
    $result=$request->fetch();// Un fetch simple car je récupère une ligne bien déterminé grâce à l'id

    return $result;//ma fonction retourne un tableau avec une seule ligne

}

//////////une function pour MODIFIER CATEGORY ////////////////////////// ///////////////
// (int $id,string $name,string $description)
    function updateCategory(int $idCategory,string $nameCategorie,string $description):void{
        $pdo=connexionBdd();
        $sql="UPDATE  categories SET name =:name, description =:description where id_category = :id";
        $request=$pdo->prepare($sql);
        $request->execute(array(
            ':id' => $idCategory,
            ':name' => $nameCategorie,
            ':description' => $description
            
        ));

    }
                      //*********************POUR TABLE PRODUITS**************************************

//////// Une fonction pour récupérer l'id d'une catégorie dans table product/////////////////////////////////////////////
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

   //////////////////////////////// POUR AJOUTER PRODUITS/////////////////////////
     function addProduct(string $title,int $category_id,string $date,string $image, float $price, int $stock, int $weight, string $desProduct): void {

        $pdo = connexionBdd(); // je stock ma connection à la BDD dans une variable 
    
        $sql = "INSERT INTO products
        (title,categorie_id,date,image, price,stock,weight,description)
        VALUES
        (:title,  :category_id,  :date,  :image, :price, :stock, :weight, :description)"; // Requeêt d'insertion que je la stock dans une variable
        $request = $pdo->prepare($sql);// Je prépare ma requête  et je l'exécute
        $request->execute(array( 
                        ':title'=> $title,
                        ':category_id' => $category_id,
                        ':date'=> $date,
                        ':image' => $image, //attention la photo ne vient de $_POST mais de $_FILES
                        ':price'=> $price,
                        ':stock' => $stock,
                        ':weight' => $weight,
                        ':description' => $desProduct
                   ));
                   
    }

//************************ FUNCTION POUR  CRUD EN TABLE PRODUCT************************************************

     ////////create function pour récuparation all dans table products///////////////////////////
    function allProduct(): array {

        $pdo = connexionBdd();
        $sql = "SELECT * FROM products";
        $request = $pdo->query($sql);
        $result = $request->fetchAll();// j'utilise le fetchAll pour récuperer tout les ligne à la fois
        return $result; // ma fonction retourne un tableau avec les donées récupérer de la BDD
   }

                    //////////////////////function pour delete products////////////////////////
   function deleteProduct(int $idproduct):void{
    $pdo=connexionBdd();
    $sql="DELETE FROM  products WHERE id_product= :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
        ':id' => $idproduct
    ));

}

   //function showproduct pour afficher un product 

function showProduct(int $idproduct): mixed{
    $pdo=connexionBdd();
    $sql="SELECT * FROM products WHERE id_product = :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
       
        ':id' => $idproduct
    ));
    $result=$request->fetch();// Un fetch simple car je récupère une ligne bien déterminé grâce à l'id

    return $result;//ma fonction retourne un tableau avec une seule ligne

}

   ////////// fonction update products///////////////

 function updateProduct(int $id,string $title,int $category_id,string $image,string $date, float $price, int $stock,int $weight,string $desProduct): void
 {
      $pdo = connexionBdd();
 
      $sql = "UPDATE products SET
                          id_product = :id,
                          title = :title,
                          categorie_id = :category_id,
                          image = :image,
                          date = :date,
                          price = :price,
                          stock = :stock,
                          weight =:weight,
                          description = :desProduct
                WHERE id_product  = :id";
           
      $request = $pdo->prepare($sql);     
      $request->execute(array( 
                     ':id'       => $id,
                     ':title'    => $title,
                     ':category_id'=> $category_id,
                     ':image'    => $image, 
                     ':date'     => $date,
                     ':price'    => $price,
                     ':stock'    => $stock,
                     ':weight' => $weight,
                     ':desProduct' => $desProduct
                    
                     ));
    
 }

 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
                    ////////////function pour insertion de  utilisateure///////////////////////////////////////


 function inscriptionUsers(string $firstName,string $lastName,string $pseudo,string $mdp,string $email,string $phone,string $address,string $zip,string $city,string $country ): void {

    $pdo = connexionBdd(); // je stock ma connection à la BDD dans une variable 

    $sql = "INSERT INTO users
    (firstName, lastName, pseudo, mdp, email, phone,address, zip, city, country)
    VALUES
    (:firstName, :lastName, :pseudo, :mdp,  :email, :phone,  :address, :zip, :city, :country)"; // Requeêt d'insertion que je la stock dans une variable
    $request = $pdo->prepare($sql);// Je prépare ma requête  et je l'exécute
    $request->execute(array( 
                    ':firstName'=> $firstName,
                    ':lastName' => $lastName,
                    ':pseudo' => $pseudo,
                    ':mdp' => $mdp,
                    ':email' => $email,
                    ':phone'=> $phone,
                    ':address'=> $address,
                    ':zip' => $zip,
                    ':city' => $city,
                    ':country' => $country,                    
               )); 
               
}

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

///une function pour verifier un utilisateure dans la BDD (pour authentification)******************
function checkuser(string $email,string $pseudo):mixed{
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
   //********************************LE CRUD POUR TABLE USER********************************* */
////////create function pour récuparation tous les utilisateure///////////////////////////


function alluser() : array {
    $pdo=connexionBdd();
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

///******************************************* POUR INDEX AFFICHAGE*************************** */
//////////////////////////////////////function pour recupere les product la meme categories ///////////
function productbycategoryid(string $id){
    $pdo=connexionBdd();
    $sql="SELECT * FROM products WHERE categorie_id = :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
        ':id' => $id
    ));
    $result=$request->fetchAll();

    return $result;

}

/////////////////////pour affiche les product son date (recent)
function productbydate(){
    $pdo=connexionBdd();
    $sql= "SELECT * FROM products ORDER BY date DESC LIMIT 6 ";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;

}

////////////////////////// le function pour faire total
//  calculerMontantTotal() pour calculer le montant total du panier en additionnant les sous-totaux de chaque film.
function calculerMontantTotal(array $tab) :int{
    $montant_total = 0;

    foreach ($tab as $key) {
        $montant_total += $key['price'] * $key['quantity'];
    }

    return $montant_total;
}
///////////////////////////////pour faire deconnexion///////////////////////////////////////////////
function logout(){
    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action']== 'deconnexion'){
        unset($_SESSION['user']); //on suprimer l'index "user" de la session pour se deconnecter // cette function détruit les variables stocker comme 'firstname' et email
        //session_destroy(); // détruit touts le donner de la session déja établir.cette funcction détruit la session sur le serveure
        // unset($_SESSION['panier']);

        header("location:".RACINE_SITE."authentification.php");
    }

   }
   logout();

    ////////////function pour insertion de  AVis///////////////////////////////////////

function inscriptionAvis(int $userId,string $commentaire,string $date ): void {

    $pdo = connexionBdd(); // je stock ma connection à la BDD dans une variable 
    
    $sql = "INSERT INTO avis
    (user_id,commentaire,date_commentaire)
    VALUES
    (:user,:commentaire, :datecommentaire)"; // Requeêt d'insertion que je la stock dans une variable
    $request = $pdo->prepare($sql);// Je prépare ma requête  et je l'exécute
    $request->execute(array( 
                     ':user' => $userId, 
                    ':commentaire' => $commentaire,   
                    ':datecommentaire' => $date,                  
                    
                                       
               )); 
               
}

/////////////////////pour affiche les Avis son date (recent)
function avisbydate(){
    $pdo=connexionBdd();
    $sql= "SELECT * FROM avis ORDER BY date_commentaire DESC LIMIT 2";
    $request = $pdo->query($sql);
    $result = $request->fetchAll();
    return $result;

}

 ////// clé etranger pour table Avis///////////////////////////////////////////////////////////

function foreignKey(string $tableF,string $foreign,string $tablep,string $primary){
    $pdo = connexionBdd(); 
    $sql = "ALTER TABLE $tableF ADD CONSTRAINT FOREIGN KEY ($foreign) REFERENCES $tablep ($primary)";
    $request = $pdo->exec($sql);

     }
    // foreignKey('avis','user_id','users','id_user');
//si on commenter pas touts le réfres donner une relation

//////////////////////////////changement Addresse/////////////////////////////////////////////////
function updateAddress(string $address,int $zip,string $city,string $country,int $userId):void{ 
        $pdo=connexionBdd();
    $sql="UPDATE users SET address =:address, zip =:zip,city =:city,country =:country where id_user = :id";
    $request=$pdo->prepare($sql);
    $request->execute(array(
        ':address' => $address,
        ':zip' => $zip,
        ':city' => $city,
        ':country' => $country,
        ':id' => $userId
    ));

}
