<?php
/*Si user a cliqu� sur retour � la page d'accueil, redirection
ATTENTION : un header location se met toujours en toute premi�re instruction (et avant le html)
Il ne tol�re pas m�me un return (ligne vide) auparavant...
*/                
if(isset($_POST['quitter'])){
    header("location: abonnement.php");
}
//Int�grer le fichier des fonctions
include("fonctions2.php");
 
/*G�rer le probl�me de l'affichage dans le select de l'option s�lectionn�e
sinon on reste bloqu� au cas women � chaque rafra�chissement de la page
m�me si le reste du code s'ex�cute parfaitement*/
 
//Si user a cliqu� ok apr�s avoir choisi une info
//initialise $info en fonction
 
if(isset($_POST['info'])){
    $info=$_POST['info'];
}
 
//valeur par d�faut � l'arriv�e
 
else{
    $info="women";
}
 
/*voir suite dans les ajouts PHP dans le select
affiche l'option selected le cas �ch�ant*/
?>
<html>
    <head><title>Information sur les abonn�s</title></head>
    <body>
        <h1>Bonjour � l'administrateur du site</h1>
        <h2>Vous souhaitez voir :</h2>
        <form name="info" method="post" action="infoabo.php">
            <select name="info">
                <option value="women" <?php if($info =='women') { echo 'selected'; } ?>>Toutes les dames et demoiselles abonn�es</option>
                <option value="men" <?php if($info =='men') { echo 'selected'; } ?>>Tous les messieurs abonn�s</option>
                <option value="jeunes" <?php if($info =='jeunes') { echo 'selected'; } ?>>Tous les abonn�(e)s de moins de 30 ans</option>
                <option value="vieux" <?php if($info =='vieux') { echo 'selected'; } ?>>Tous les abonn�(e)s de 30 ans ou plus</option>
                <option value="mag" <?php if($info =='mag') { echo 'selected'; } ?>>Tous les abonn�(e)s par magazine</option>
                <option value="CP" <?php if($info =='CP') { echo 'selected'; } ?>>Tous les codes postaux des abonn�(e)s</option>
            </select>
            <input type="submit" name="valider" value="OK"/><br/>
            <input type="submit" name="quitter" value="Retour � la page d'accueil"/>
        </form>
        <?php
        /*attention � la gestion des lib�rations de m�moire
        c'est � la fin de chaque requ�te diff�rente
        Plusieurs peuvent donc se succ�der
        tandis que la connexion � la base et la d�connexion 
        ne se font qu'une seule fois quand la base entre ou sort du jeu*/
 
        //Commun � n'importe quelle option
 
        if (isset ($_POST['info'])){
 
            //connexion initiale de la db
            connectMaBase();
 
            //G�rer chaque choix :
            if($info=='women'){
                $sql='SELECT * from abonnement WHERE Civ="Mme" || Civ="Mlle"'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                while ($data = mysql_fetch_array($req)) { 
                    echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                }
                mysql_free_result ($req); 
            }
            elseif($info=='men'){
                $sql='SELECT * from abonnement WHERE Civ="Mr"'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                while ($data = mysql_fetch_array($req)) { 
                    echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                }
                mysql_free_result ($req); 
            }
            elseif($info=='jeunes'){
                $sql='SELECT * from abonnement WHERE Age<30'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                while ($data = mysql_fetch_array($req)) { 
                    echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                }
                mysql_free_result ($req); 
            }
            elseif($info=='vieux'){
                $sql='SELECT * from abonnement WHERE Age>=30'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                while ($data = mysql_fetch_array($req)) { 
                    echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                }
                mysql_free_result ($req); 
            }
 
            /*cas particulier du mag : il s'y imbrique des conditions successives qui s'ajoutent 
            (succession de simples if)
            pour afficher tous les magazines*/
            elseif($info=='mag'){
                $sql='SELECT * from abonnement WHERE abo="l\'eau elle aime �a"'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
 
                /*Point besoin d'afficher si personne n'est abonn� � ce mag
                donc encadrer l'affichage dans condition*/
 
                //si requete non nulle
                if ($req!=NULL){
                    echo'<h3>Liste des abonn�(e)s � "J\'ai l\'oeil vif".</h3>';
                    while ($data = mysql_fetch_array($req)) { 
                        echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                    }
                }
                mysql_free_result ($req); 
 
                $sql='SELECT * from abonnement WHERE abo="mon premier libre"'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                if ($req!=NULL){
                    echo'<h3>Liste des abonn�(e)s � "J\'ai le pied marin".</h3>';
                    while ($data = mysql_fetch_array($req)) { 
                        echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                    }
                }
                mysql_free_result ($req); 
 
                $sql='SELECT * from abonnement WHERE abo="main"'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                if ($req!=NULL){
                    echo'<h3>Liste des abonn�(e)s � "J\'ai la main verte".</h3>';
                    while ($data = mysql_fetch_array($req)) { 
                        echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                    }
                }
                mysql_free_result ($req); 
 
                $sql='SELECT * from abonnement WHERE abo="le monde du jazz"'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                if ($req!=NULL){
                    echo'<h3>Liste des abonn�(e)s � "J\'ai la rate qui se dilate".</h3>';
                    while ($data = mysql_fetch_array($req)) { 
                        echo $data['Civ'].' <strong>'.$data['Nom'].'</strong> '.$data['Prenom'].'<br/>';
                    }
                }
                mysql_free_result ($req); 
            }
 
            /*cas particulier du CP
            On veut juste la liste de toutes les valeurs que peut prendre ce champ
            donc pas de where restrictif*/
 
            elseif($info=='CP'){
 
                $sql='SELECT CP from abonnement'; 
                $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error()); 
                echo'<h3>Tous les codes postaux de nos abonn�s</h3>';
                while ($data = mysql_fetch_array($req)) { 
                    echo $data['CP'].'<br/>';
                }
                mysql_free_result ($req); 
            }
            else{
                echo'Vous n\'avez rien s�lectionn� ?';
            }
        //cl�ture finale de la db
        mysql_close ();  
        }
        ?>
    </body>
</html>
