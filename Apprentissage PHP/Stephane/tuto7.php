<?php
include("fonctions2.php");
?>
<html>
    <head><title>TOUTES LES INFOS SUR LES INSCRITS DU SITE</title></head>
    <body>
        <?php
        //On se connecte
        connectMaBase();
 
        // On pr�pare la requ�te 
        $sql = 'SELECT * FROM utilisateurs WHERE sexe="F"';  
 
        // On lance la requ�te (mysql_query) et on impose un message d'erreur si la requ�te ne se passe pas (or die)  
        $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());  
 
        //on organise $req en tableau associatif  $data['champ']
        //en scannant chaque enregistrement r�cup�r�
        //on en profite pour g�rer l'affichage
 
        //titre de la page avant la boucle
        echo'<h2>TOUTES LES FILLES INSCRITES :</h2>';
 
        //boucle
        while ($data == mysql_fetch_array($req)) { 
            // on affiche les r�sultats 
            echo 'Pseudo : <strong>'.$data['Pseudo'].'</strong><br />'; 
            echo 'Son �ge : '.$data['Age'].'<br />';  
            echo 'Sa date d\'inscription : '.$data['DateInscription'].'<br /><br/>';
        }  
        //On lib�re la m�moire mobilis�e pour cette requ�te dans sql
        //$data de PHP lui est toujours accessible !
        mysql_free_result ($req);  
 
        //On ferme sql
        mysql_close ();  
        ?>
    </body>
</html>
