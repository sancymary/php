<?php
$title = "Users";
//require_once "../inc/function.inc.php";

////////////////////////////



////////////////////////////////////
if(empty($_SESSION['user']) ) {

    header("location:".RACINE_SITE."authentification.php");

}else{

    if ( $_SESSION['user']['role'] == 'ROLE_USER') {

        header("location:".RACINE_SITE."index.php");
    }

}

if(isset($_GET['action']) && isset($_GET['id_user']) ){

    if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_user'])){ //Suppresion d'une catégorie
        // debug($_GET['action']);

        $idUser = htmlentities($_GET['id_user']) ;

        deleteUser($idUser);

        header('location:dashboard.php?user_php');


    }
    if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_user'])){ //Suppresion d'une catégorie
        // debug($_GET['action']);
        $user = showUser($_GET['id_user']);
        if($user['role'] == 'ROLE_ADMIN'){

            updateRole('ROLE_USER', $user['id_user']);


        }
        if($user['role'] == 'ROLE_USER'){
            
            updateRole('ROLE_ADMIN', $user['id_user']);

        }
        header('location:dashboard.php?user_php');
    }



}
require_once "../inc/header.inc.php";
?>
    <div class="d-flex flex-column m-auto mt-5 table-responsive">   
        <!-- tableau pour afficher toutles films avec des boutons de suppression et de modification -->
    <h2 class="text-center fw-bolder mb-5 text-danger">Liste des utilisateurs</h2>
    <table class="table  table-dark table-bordered mt-5">
        <thead>
           <tr>
           <!-- th*7 -->
               <th>ID</th>
               <th>FirstName</th>
               <th>LastName</th>
               <th>Pseudo</th>
               <th>Email</th>
               <th>Phone</th>
               <th>Civility</th>
               <th>Address</th>
               <th>Zip</th>
               <th>City</th>
               <th>Country</th>
               <th>Rôle</th>
               <th>Supprimer</th>
               <th>Modifier Le rôle</th>
           </tr>
        </thead>
   <tbody>
       <?php
      $users = alluser();
       // vu que le fetch se passe dans la function donc on vas boucler sur le tableau avec un foreach()
       foreach($users as $index => $user){
              

           //debug($users);
       
           // Je récupère les valeurs de mon tableau $user dans des td
       ?>
       <tr>
           <td><?=$user['id_user']?></td>
           <td><?=ucfirst($user['firstName'])?></td><!-- une majuscule sur la prmère lettre-->
           <td><?=ucfirst($user['lastName'])?></td>
           <td><?=$user['pseudo']?></td>
           <td><?=$user['email']?></td>
           <td><?=$user['phone']?></td>
           <td><?=$user['civility']?></td>
           <td><?=ucfirst($user['address'])?></td>
           <td><?=$user['zip']?></td>
           <td><?=ucfirst($user['city'])?></td>
           <td><?=ucfirst($user['country'])?></td>
           <td><?=ucfirst($user['role'])?></td>
           <td class="text-center"><a href="user.php?action=delete&id_user=<?= $user['id_user'] ?>"><i class="bi bi-trash3-fill"></i></a></td>
           <td class="text-center"><a href="user.php?action=update&id_user=<?= $user['id_user'] ?>" class="btn btn-danger"><?= ($user['role']) == 'ROLE_ADMIN' ? 'Rôle user' : 'Rôle admin'  ?></a></td>

           </tr>
                <!-- onclick="return(confirm('Êtes-vous sûr de vouloir supprimer cet film ?'))" -->

                <?php
                }

             
                ?>     
            </tbody>
        </table>
         
    </div>
                                    




















