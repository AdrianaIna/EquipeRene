<?php
include("fonctions2.php");
?>
<html>
    <head><title>Formulaire de saisie utilisateur </title></head>
    <body>
        <h1>Inscrivez-vous !</h1>
        <h2>Entrez les donn�es demand�es :</h2>
        <form name="inscription" method="post" action="form.php">
            Entrez votre pseudo : <input type="text" name="pseudo"/> <br/>
            Gar�on ou fille ? 	<input type="radio" name="sexe" value="G"/>Gar�on<input type="radio" name="sexe" value="F"/>Fille<br/>
            Entrez votre age : <input type="text" name="age"/><br/>
            <input type="submit" name="valider" value="OK"/>
        </form>
        <?php
        if (isset ($_POST['valider'])){
            //On r�cup�re les valeurs entr�es par l'utilisateur :
            $pseudo=$_POST['pseudo'];
            $age=$_POST['age'];
            $sexe=$_POST['sexe'];
            //On construit la date d'aujourd'hui
            //strictement comme sql la construit
            $today = date("y-m-d");
            //On se connecte
            connectMaBase();
 
            //On pr�pare la commande sql d'insertion
            $sql = 'INSERT INTO Utilisateurs VALUES("","'.$pseudo.'","'.$sexe.'","'.$age.'","'.$today.'")'; 
 
            /*on lance la commande (mysql_query) et au cas o�, 
            on r�dige un petit message d'erreur si la requ�te ne passe pas (or die) 
            (Message qui int�grera les causes d'erreur sql)*/
            mysql_query ($sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error()); 
 
            // on ferme la connexion
            mysql_close();
        }
        ?>
    </body>
</html>
