<?php
$title = "Users";
require_once "../inc/functions.inc.php";
////////////////////////////////////
if(empty($_SESSION['user']) ) {

    header("location:".RACINE_SITE."authentification.php");

}else{

    if ( $_SESSION['user']['role'] == 'ROLE_USER') {

        header("location:".RACINE_SITE."index.php");
    }

}

if(isset($_GET['action']) && isset($_GET['id_user']) ){

    if(!empty($_GET['action']) && $_GET['action'] == 'delete' && !empty($_GET['id_user'])){ //Suppresion d'une user
        // debug($_GET['action']);

        $idUser = htmlentities($_GET['id_user']) ; 

        deleteUser($idUser);

        header('location:user.php');


    }
    if(!empty($_GET['action']) && $_GET['action'] == 'update' && !empty($_GET['id_user'])){ 
        // debug($_GET['action']);
        $user = showUser($_GET['id_user']);
        if($user['role'] == 'ROLE_ADMIN'){

            updateRole('ROLE_USER', $user['id_user']);


        }
        if($user['role'] == 'ROLE_USER'){
            
            updateRole('ROLE_ADMIN', $user['id_user']);

        }
        header('location:user.php');
    }

}

require_once "../inc/header.inc.php";
?>
<main class="bacuser">
   <div class="container">
    <div class="d-flex flex-column m-auto mt-5 pt-5 ms-3 table-responsive">    
      <h1 class="text-center fw-bolder mt-5 text-danger text-uppercase italique fs-2">Liste des utilisateurs</h1>
    <table class="table table-bordered mt-5 table-hover user">
        <thead class="thead-dark theadback text-danger">
           <tr>
               <th>ID</th>
               <th>FirstName</th>
               <th>LastName</th>
               <th>Pseudo</th>
               <th>Email</th>
               <th>Phone</th>
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
        //    debug($users);
        // debug($user);
       
           // Je récupère les valeurs de mon tableau $user dans des td
       ?>
       <tr>
           <td><?=$user['id_user']?></td>
           <td><?=ucfirst($user['firstName'])?></td>
           <td><?=ucfirst($user['lastName'])?></td>
           <td><?=$user['pseudo']?></td>
           <td><?=$user['email']?></td>
           <td><?=$user['phone']?></td>
           <td><?=ucfirst($user['address'])?></td>
           <td><?=$user['zip']?></td>
           <td><?=ucfirst($user['city'])?></td>
           <td><?=ucfirst($user['country'])?></td>
           <td><?=ucfirst($user['role'])?></td>
           <td class="text-center"><a href="user.php?action=delete&id_user=<?= $user['id_user'] ?>"><i class="bi bi-trash3-fill"></i></a></td>
           <td class="text-center"><a href="user.php?action=update&id_user=<?= $user['id_user'] ?>" class="btn btn-danger"><?= ($user['role']) == 'ROLE_ADMIN' ? 'Rôle user' : 'Rôle admin'  ?></a></td>

        </tr>
        <?php
          }
         ?>     
       </tbody>
        </table>     
    </div>
    </div>
    <!-- fin de div container -->
 </main>                                 

<?php

require_once "../inc/footer.inc.php";
?>                    
         



















