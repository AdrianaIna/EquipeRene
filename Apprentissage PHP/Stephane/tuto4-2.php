<html>
    <head><title>Mon agenda</title></head>
    <body>
    	
    	<h1>Tuto 4-2</h1>
        <a href="http://sylvie-vauthier.developpez.com/tutoriels/php/grand-debutant/?page=tableaux">lien du tuto suivi source developpez.com</a>
        <br />
        
        <?php
        $adresse0 = array(); 
        //on le remplit
        $adresse0 ['nom']='ZERO';
        $adresse0 ['prenom']='Toto';
        $adresse0 ['num'] = 10; 
        $adresse0 ['rue']  = 'rue des rosiers'; 
        $adresse0 ['cp']  = 94000;
        $adresse0 ['ville'] = 'IVRY-SUR-SEINE';
 
        $adresse1 = array(); 
        //on le remplit
        $adresse1 ['nom']='AIN';
        $adresse1 ['prenom']='Anne';
        $adresse1 ['num'] = 11; 
        $adresse1 ['rue']  = 'rue des moineaux'; 
        $adresse1 ['cp']  = 57000;
        $adresse1 ['ville'] = 'METZ';
 
        $adresse2 = array(); 
        //on le remplit
        $adresse2 ['nom']='DEUX';
        $adresse2 ['prenom']='Al';
        $adresse2 ['num'] = 2; 
        $adresse2 ['rue']  = 'rue des arbres'; 
        $adresse2 ['cp']  = 88000;
        $adresse2 ['ville'] = 'EPINAL';
 
        $adresse3 = array(); 
        //on le remplit
        $adresse3 ['nom']='TROIS';
        $adresse3 ['prenom']='L�a';
        $adresse3 ['num'] = 3; 
        $adresse3 ['rue']  = 'rue des �l�phants'; 
        $adresse3 ['cp']  = 69000;
        $adresse3 ['ville'] = 'LYON';
 
        $adresse4 = array(); 
        //on le remplit
        $adresse4 ['nom']='DUPONT';
        $adresse4 ['prenom']='Mick';
        $adresse4 ['num'] = 4; 
        $adresse4 ['rue']  = 'rue des �glantines'; 
        $adresse4 ['cp']  = 93000;
        $adresse4 ['ville'] = 'SAINT-DENIS';
 
        //on d�clare et remplit l'agenda avec toutes les adresses pr�c�dentes :
        $agenda=array($adresse0,$adresse1,$adresse2,$adresse3,$adresse4);
		
		
		
		//pour chaque �l�ment de $agenda cr�e la variable $adresse
foreach($agenda as $adresse){
    //pour chaque �l�ment de $adresse cr�e la variable $element
    foreach($adresse as $element){
    //�cris le $element sur la m�me ligne avec un tiret et des espaces
        echo '- '.$element.'  ';
    }
    //A chaque nouveau $adresse, saute une ligne
    echo'<br/>';
}



        ?>
    </body>
</html>
