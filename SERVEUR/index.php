<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>RaspberryPI CAR</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- télécharge jQuery depuis ce lien -->
</head>
<body>

<?php

?>

<!-- transition distance / contrôles -->

<!-- action d'écriture après l'action submit jQuery / actualisation des distances-->	<!-- PHP -->
	<!-- ARRET -->
    <?php
    if (isset($_POST["STOP"])){ /* isset renvoie le booléen correspondant suivant si STOP est défini (!=NULL) */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\moteur\\moteurs.txt","w"); /* Ouverture de moteurs.txt en mode écriture après écrasement du fichier */
    	$STOP = $_POST["STOP"]; /* variable $STOP correspond au value de l'input de name = "STOP" du form envoyé */
		$write = fwrite($fp,$STOP); /* écriture dans moteurs.txt de la variable $STOP */
    	fclose($fp); /* fermeture du fichier moteurs.txt */
	/* Lecture des distances */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\avant.txt","r");/* Ouverture de avant.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier avant.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\droite.txt","r");/* Ouverture de droite.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier droite.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\gauche.txt","r");/* Ouverture de gauche.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier gauche.txt */
    }
	?>
	<!-- TOUT DROIT -->
    <?php
    if (isset($_POST["UP"])){ /* isset renvoie le booléen correspondant suivant si UP est défini (!=NULL) */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\moteur\\moteurs.txt","w"); /* Ouverture de moteurs.txt en mode écriture après écrasement du fichier */
    	$UP = $_POST["UP"]; /* variable $UP correspond au value de l'input de name = "UP" du form envoyé */
		$write = fwrite($fp,$UP); /* écriture dans moteurs.txt de la variable $UP */
   	 	fclose($fp); /* fermeture du fichier moteurs.txt */
	/* Lecture des distances */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\avant.txt","r");/* Ouverture de avant.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier avant.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\droite.txt","r");/* Ouverture de droite.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier droite.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\gauche.txt","r");/* Ouverture de gauche.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier gauche.txt */
   	 }
	?>
	<!-- RECULER -->
	<?php
    if (isset($_POST["DOWN"])){ /* isset renvoie le booléen correspondant suivant si DOWN est défini (!=NULL) */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\moteur\\moteurs.txt","w"); /* Ouverture de moteurs.txt en mode écriture après écrasement du fichier */
    	$DOWN = $_POST["DOWN"]; /* variable $DOWN correspond au value de l'input de name = "DOWN" du form envoyé */
		$write = fwrite($fp,$DOWN); /* écriture dans moteurs.txt de la variable $DOWN */
   	 	fclose($fp); /* fermeture du fichier moteurs.txt */
	/* Lecture des distances */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\avant.txt","r");/* Ouverture de avant.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier avant.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\droite.txt","r");/* Ouverture de droite.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier droite.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\gauche.txt","r");/* Ouverture de gauche.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier gauche.txt */
   	 }
	?>
	<!-- TOURNER A DROITE -->
	<?php
    if (isset($_POST["RIGHT"])){ /* isset renvoie le booléen correspondant suivant si RIGHT est défini (!=NULL) */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\moteur\\moteurs.txt","w"); /* Ouverture de moteurs.txt en mode écriture après écrasement du fichier */
    	$RIGHT = $_POST["RIGHT"]; /* variable $RIGHT correspond au value de l'input de name = "RIGHT" du form envoyé */
		$write = fwrite($fp,$RIGHT); /* écriture dans moteurs.txt de la variable $RIGHT */
   	 	fclose($fp); /* fermeture du fichier moteurs.txt */
	/* Lecture des distances */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\avant.txt","r");/* Ouverture de avant.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier avant.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\droite.txt","r");/* Ouverture de droite.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier droite.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\gauche.txt","r");/* Ouverture de gauche.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier gauche.txt */
   	 }
	?>
	<!-- TOURNER A GAUCHE -->
	<?php
    if (isset($_POST["LEFT"])){ /* isset renvoie le booléen correspondant suivant si LEFT est défini (!=NULL) */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\moteur\\moteurs.txt","w"); /* Ouverture de moteurs.txt en mode écriture après écrasement du fichier */
    	$LEFT = $_POST["LEFT"]; /* variable $LEFT correspond au value de l'input de name = "LEFT" du form envoyé */
		$write = fwrite($fp,$LEFT); /* écriture dans moteurs.txt de la variable $LEFT */
   	 	fclose($fp); /* fermeture du fichier moteurs.txt */
	/* Lecture des distances */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\avant.txt","r");/* Ouverture de avant.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier avant.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\droite.txt","r");/* Ouverture de droite.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier droite.txt */
    	echo "<br/>"; /* retour à la ligne HTML */
    	$fp = fopen("C:\\wamp64\\www\\RaspberryPI\\capteurs\\gauche.txt","r");/* Ouverture de gauche.txt en mode lecture */
		$read = fgets($fp,10); /* variable $read récupère les caractères situés avant le positionnement 3 du curseur dans le fichier */
    	echo $read ; /* affichage de la variable sur la page web */
    	fclose($fp); /* fermeture du fichier gauche.txt */
   	 }
	?>

<!-- formulaires text moteurs hidden -->
	<!-- form : lorsqu'il y a inactivité de l'utilisateur -->
	<form action="" method="post" enctype="multipart/form-data" target="upload_target" id="STOP" > <!-- Toutes les valeurs transmisent sont égales à 0 (value = "0")/(moteurs à l'arrêt) -->
        <input name="STOP" type="hidden" value="0"/>
    </form>

	<!-- form : Upload consignes pour moteur -->
	<form action="" method="post" enctype="multipart/form-data" target="upload_target" id="UP" > <!-- Valeur moteurs UP-->
        <input name="UP" type="hidden" value="UP"/>
              
    </form>
    <form action="" method="post" enctype="multipart/form-data" target="upload_target" id="DOWN" > <!-- Valeur moteurs DOWN-->
        <input name="DOWN" type="hidden" value="DOWN"/>
              
    </form>
    <form action="" method="post" enctype="multipart/form-data" target="upload_target" id="RIGHT" > <!-- Valeur moteurs RIGHT-->
        <input name="RIGHT" type="hidden" value="RIGHT"/>
              
    </form>
    <form action="" method="post" enctype="multipart/form-data" target="upload_target" id="LEFT" > <!-- Valeur moteurs LEFT-->
        <input name="LEFT" type="hidden" value="LEFT"/>
              
    </form>

    <!-- Submit : édite les fichiers de contrôle en envoyant les formulaires -->
	<script>
		jQuery(document).ready(function(){ // lorsque jQuery est chargé

			setTimeout(function(){ // delai 1sec moteurs
				
				$("#STOP").submit(); // post form "STOP"
				console.log("STOP") // affiche dans la console STOP --> fonction setTimeout (delay) fonctionne
  			}, 500);

			$(document).keypress(function(touche){ // lorsqu'une touche est enfoncé

				var enfonce = touche.which || touche.keyCode; // variable enfonce récupère la valeur de la touche suivant la compréhension du navigateur
				if(enfonce==38){ // touche flèche directionnelle HAUT test de condition valeur de la touche enfoncé

				    $("#UP").submit(); // post form "UP"
				    console.log("UP") // affiche dans la console UP --> fonction keypress fonctionne
				}
				if(enfonce==40){ // touche flèche directionnelle DOWN test de condition valeur de la touche enfoncé

				    $("#DOWN").submit(); // post form "DOWN"
				    console.log("DOWN") // affiche dans la console DOWN --> fonction keypress fonctionne
				}
				if(enfonce==39){ // touche flèche directionnelle RIGHT test de condition valeur de la touche enfoncé

				    $("#RIGHT").submit(); // post form "RIGHT"
				    console.log("RIGHT") // affiche dans la console RIGHT --> fonction keypress fonctionne
				}
				if(enfonce==37){ // touche flèche directionnelle LEFT test de condition valeur de la touche enfoncé

				    $("#LEFT").submit(); // post form "LEFT"
				    console.log("LEFT") // affiche dans la console LEFT --> fonction keypress fonctionne
				}
			});
		});
	</script>

</body>
</html>