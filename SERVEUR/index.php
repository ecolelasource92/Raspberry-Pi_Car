<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
     <link rel="stylesheet" type="text/css" href="stylesheet.css" />
    <title>RaspberryPI CAR</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- télécharge jQuery depuis ce lien -->
</head>
<body>


<!-- transition distance / contrôles -->

<!-- action d'écriture après l'action submit jQuery / actualisation des distances-->	<!-- PHP -->
	
    <?php
    if (isset($_POST["control"])){ /* isset renvoie le booléen correspondant suivant si control est défini (!=NULL) */
        $fp = fopen("C:\\wamp64\\www\\RaspberryPI\\moteur\\moteurs.txt","w"); /* Ouverture de moteurs.txt en mode écriture après écrasement du fichier */
        $control = $_POST["control"]; /* variable $control correspond au value de l'input de name = "control" du form envoyé */
        fwrite($fp,$control); /* écriture dans moteurs.txt de la variable $control */
        fclose($fp); /* fermeture du fichier moteurs.txt */
	/* Lecture des distances */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\avant.txt","r");/* Ouverture de avant.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 10 du curseur dans le fichier */
        echo "<div id='avant'>"; /* block html div permettant une mise en page en css car id ="avant" spécifique à la mesure avant */
    	echo $read ; /* affichage de la variable sur la page web */
        echo "</div>"; /* fermeture block div */
    	fclose($fp); /* fermeture du fichier avant.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\droite.txt","r");/* Ouverture de droite.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 10 du curseur dans le fichier */
        echo "<div id='droite'>"; /* block html div permettant une mise en page en css car id ="droite" spécifique à la mesure droite */
    	echo $read ; /* affichage de la variable sur la page web */
        echo "</div>"; /* fermeture block div */
    	fclose($fp); /* fermeture du fichier droite.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\gauche.txt","r");/* Ouverture de gauche.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 10 du curseur dans le fichier */
        echo "<div id='gauche'>"; /* block html div permettant une mise en page en css car id ="gauche" spécifique à la mesure gauche */
    	echo $read ; /* affichage de la variable sur la page web */
        echo "</div>"; /* fermeture block div */
    	fclose($fp); /* fermeture du fichier gauche.txt */
    }
	?>
	
<!-- formulaires moteurs -->
	<form action="" method="post" enctype="multipart/form-data" target="upload_target" id="form" > <!-- upload fait dans la meme page action="" -->
    </form>

    <!-- Submit : édite les fichiers de contrôle en envoyant les formulaires -->
	<script>
        jQuery(document).ready(function(){ // lorsque jQuery est chargé

            setTimeout(function(){ // delai 0.5 sec moteurs
                
                $('#form').html('<input name="control" type="hidden" value="0"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur 0
                $("#form").submit(); // post form
                console.log("STOP") // affiche dans la console STOP --> fonction setTimeout (delay) fonctionne
            }, 500);

            $(document).keypress(function(touche){ // lorsqu'une touche est enfoncé

                var enfonce = touche.which || touche.keyCode; // variable enfonce récupère la valeur de la touche suivant la compréhension du navigateur
                if(enfonce==38){ // touche flèche directionnelle HAUT test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="UP"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur UP
                    $("#form").submit(); // post form
                    console.log("UP") // affiche dans la console UP --> fonction keypress fonctionne
                }
                if(enfonce==40){ // touche flèche directionnelle DOWN test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="DOWN"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur DOWN
                    $("#form").submit(); // post form
                    console.log("DOWN") // affiche dans la console DOWN --> fonction keypress fonctionne
                }
                if(enfonce==39){ // touche flèche directionnelle RIGHT test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="RIGHT"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur RIGHT
                    $("#form").submit(); // post form
                    console.log("RIGHT") // affiche dans la console RIGHT --> fonction keypress fonctionne
                }
                if(enfonce==37){ // touche flèche directionnelle LEFT test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="LEFT"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur LEFT
                    $("#form").submit(); // post form
                    console.log("LEFT") // affiche dans la console LEFT --> fonction keypress fonctionne
                }
            });
        });
    </script>

</body>
</html>