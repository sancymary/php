<?php
//Exercice : Créer en PHP un formulaiere de selection de date de naissance (jour - moi - année)
echo '<form> <label for="jour" > Jour de naissance</label> <select class="form-select " name="jour" id="jour">';

    for($jour =1 ; $jour <= 31; $jour++) {
        echo "<option value=\"$jour\"> $jour</option>";
    }
                  
echo    '</select> 

<label for="mois" > Mois de naissance</label>
<select class="form-select " name="mois" id="mois">';
    for($mois =1 ; $mois <= 12; $mois++) {
        echo "<option value=\"$mois\"> $mois</option>";
    }
    
echo    '</select>
<label for="annee" > Année de naissance</label>
<select class="form-select " name="anee" id="annee">';
    for($annee =2020 ; $annee > 1970 ; $annee--) {
        echo "<option value=\"$annee\"> $annee</option>";
    }



echo ' </select>
</form>';


?>
<?php
echo
"<table class=\"\">
<tr>";
for($i=0;$i<=10;$i++){
    echo " <td> coolum $i</td>";
}
    echo "</tr>
    <tr>";
for($i=0;$i<=10;$i++){
    echo "<td>  $i</td>";
}
    echo "</tr>


  </table>";



?>
echo '<div class="d-flex">
                    <label for="jour" class="mx-2">jour de naissance</label>
                    <form>
                    <select>';
                    // FIN DE MON ECHO
                    // MA BOUCLE WHILE N'EST PAS DANS UN ECHO 
                    for ($jj=1;$jj<=31;$jj++){
                        echo "<option>$jj</option>";
                    }
                    // FERMETURE DE MES BALISES FORM ET SELECT
                    echo '
                    </select>
                    </form>';

                    echo '
                    <label for="moi" class="mx-2">moi de naissance</label>
                    <form>
                    <select>';
                    // FIN DE MON ECHO
                    // MA BOUCLE WHILE N'EST PAS DANS UN ECHO 
                    for ($m=1;$m<=12;$m++){
                        echo "<option>$m</option>";
                    }
                    // FERMETURE DE MES BALISES FORM ET SELECT
                    echo '
                    </select>
                    </form>';


                    echo '
                    <label for="annee" class="mx-2">année de naissance</label>
                    <form>
                    <select>';
                    // FIN DE MON ECHO
                    // MA BOUCLE WHILE N'EST PAS DANS UN ECHO 
                    for ($a=1920;$a<=2023;$a++){
                        echo "<option>$a</option>";
                    }
                    // FERMETURE DE MES BALISES FORM ET SELECT
                    echo '
                    </select>
                    </form>
                    </div>';


                    <?php
//Exercice : Créer en PHP un formulaiere de selection de date de naissance (jour - moi - année)
echo '<form> <label for="jour" > Jour de naissance</label> <select class="form-select" name="jour" id="jour">';

    for($jour =1 ; $jour <= 31; $jour++) {
        echo "<option value=\"$jour\"> $jour</option>";
    }
    echo   '</select> </form>';
                  
echo '<form> <label for="mois" > Mois de naissance</label> <select class="form-select" name="mois" id="mois">';     
    for($mois =1 ; $mois <= 12; $mois++) {
        echo "<option value=\"$mois\"> $mois</option>";
    }
     '</select> </form>';
    
echo    '<form> <label for="annee" > Année de naissance</label> <select class="form-select " name="anee" id="annee">';
    for($annee =2020 ; $annee > 1970 ; $annee--) {
        echo "<option value=\"$annee\"> $annee</option>";
    }
'</select></form>';



?>  
<!-- //**************************************************** */                   -->
<?php
echo
"<table class=\"\">
<tr>";
for($i=0;$i<=10;$i++){
    echo " <td> coolum $i</td>";
}
     "</tr>";
     echo  "<tr>";
for($i=0;$i<=10;$i++){
    echo "<td>  $i</td>";
}
    echo "</tr>


  </table>";



?>
<?php
$test=[
    'prenom'=>'sancy',
    'nom'=>'Mary',
    'add'=>'5,square chareles Amouroux',
    'phone'=>2222222222
];
foreach($test as $cle => $val){
    if($cle=='nom'){

 echo "<h1>$cle'='.$val </h1>" ;
    }else
    echo "<p>$val </p>" ;
    // echo $val.'<br>'.$cle.'<br>';
    // echo "<p>$cle'='.$val </p>" ;
}
?>
<?php
$taille=['S','XL','M','XXL','L'];

?>

    <form>
        <label >Taille de vetement</label>
        <select >
        <?php
            
            foreach($taille as $a){
                ?>
              
                <option value="<?=$a?>"><?=$a?></option>";
                <?php
                        // echo "<option value="\$a"\>$a</option>";
            }
            ?> 
          
            
            
        </select>
    </form>
    ***************
    <?php
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

    ?>
    <form>
        <label >Taille de vetement</label>
        <select >
        <?php
            
            foreach($listeeleve[0] as $b[0]){
                ?>
              
                <option value="<?=$b[0]?>"><?=$b[0]?></option>";
                <?php
                        // echo "<option value="\$a"\>$a</option>";
            }
            ?> 
          
            
            
        </select>
    </form>
   <?php
    $machaine="bonjour aime le pHp";
    //je afficher un caractere de la chaine de caractere
    echo $machaine[3].'<br>';// affiche le lettre j
    //modifier un caracter de la chaine
   $machaine[0]="B";//je change le b miniscule avec un B majuscule
    echo $machaine.'<br>';
   ?>