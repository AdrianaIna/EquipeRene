<!--- 
Page de test pour les fonctions parsing d'une page HTML

--->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Cours INM5001 Site pour essais de projet</h1>
        
       
        <div class="narration">Quelques pages pour faire des essais sur des fonctions PHP de 'parsing'. 
        </br>
        
        Ce deuxième test consiste a entré un site web avec le http:// et quelques nom de balise html séparé d'un espace.
        
        </div>
        </br>
         </br></br><h2>Demo 2 </h2>
        <form name="choix" action="INM5001A13_parseur_testeur2_page2.php" method="get">
            Enter a URL (http://blabla.com)
            <input type="text" name="xurl" />
            
            </br>Space separated tags example (body ul li): 
            <input type="text" name="tagName" value ='body div '>
            <input type="submit" value="Go Test" />
         
        </form>

        <?php
        // put your code here
        ?>
    </body>
</html>
