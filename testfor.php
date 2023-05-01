<?php
//Exercice : Créer en PHP un formulaiere de selection de date de naissance (jour - moi - année)
echo '<form>

<label for="jour" > Jour de naissance</label>
<select class="form-select " name="jour" id="jour">';
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