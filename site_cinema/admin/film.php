<?php
$title=" Films";
//require_once "../inc/function.inc.php";
 require_once "../inc/header.inc.php";

 if(empty($_SESSION['user'])){
    header("location:".RACINE_SITE."authentification.php");

}else{
if($_SESSION['user']['role']=='ROLE_USER'){
    header("location:".RACINE_SITE."index.php");
}
} 
 $films=allFilm();
//  debug($films);
?>
<div class="d-flex flex-column m-auto mt-5">
    
    <h2 class="text-center fw-bolder mb-5 text-danger">liste des Films</h2> 
    <a href="gestionFilms.php" class="btn align-self-end">Ajoute un film</a> 


<table class="table table-dark table-bordered mt-5 " >
            <thead>
                    <tr>
                    <!-- th*7 -->
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Affiche</th>
                        <th>Réalisateur</th>
                        <th>Acteurs</th>
                        <th>Àge limite</th>
                        <th>Genre</th>
                        <th>Durée</th>
                        <th>Prix</th>
                        <th>Stock</th>
                        <th>Synopsis</th>
                        <th>Date de sortie</th>
                        <th>Supprimer</th>
                        <th> Modifier</th>
                    </tr>
            </thead>
            <tbody>
                <?php
                foreach($films as $key => $film){
                     //avant afficher des donner il faut formater quelques une:
                    $actors = stringtoarray($film['actors']);//je tranforme la chaine de caractere recupére à partir de l'elementfilm['actors]du tableau $film en tableau avec la function stringtoarray

                    //la catégorie du film
                    $category = showCategory($film['category_id']);
                    $categoryname=$category['name'];
                    //debug($films);

                    //Gerer l'affichage de la duree
                    $date_time = new DateTime($film['duration']);//nous créons un nouvelle object date time en passant la valeure l'input de type time en tant que paramétre
                    $duration=$date_time->format('H:i'); //nous utilisons ensuite la methode format() pour extraire l'heure et les minute au format
                   
                        ?>
                        
                <tr>
                <td><?=$film['id_film']?></td> 
                    <td><?=$film['title']?></td> 
                    <td><img src="<?= RACINE_SITE."assets/". $film['image']?>"alt="affiche de immage" class="img-fluid"></td>
                    <td><?=$film['director']?></td>

                    <td>
                        <ul>
                                <?php
                                foreach($actors as $key =>$actor){
                                    ?>             
                    
                                        <li><?=$actor;?></li>

                                            <?php
                                                }
                                            ?>
                   
                        </ul>
                    </td>

                    <td><?=$film['ageLimit']?></td>
                    <td><?=$categoryname?></td>
                    <td><?=$film['duration']?></td>
                    <td><?=$film['price']?></td>
                    <td><?=$film['stock']?></td>
                    
                    <td><?=substr($film['synopsis'],0,50)?>...</td>
                    <td><?=$film['date']?></td>
                                                <!-- pour delete 02/06/2023-->
                    <td class="text-center"><a href="gestionFilms.php?action=delete&id_film=<?=$film['id_film']?>"><i class="bi bi-trash"></i></a></td>

                    <!-- pour update  02/06/2023-->

                <td  class="text-center"><a href="gestionFilms.php?action=update&id_film=<?=$film['id_film']?>"><i class="bi bi-pencil-fill"></i></a></td>
                

                    
                </tr>

            <?php
                }
                ?>
                
            </tbody>
</table>
</div>









<?php
// require_once "../inc/footer.inc.php";
?>
