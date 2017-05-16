<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>

    <title>RaspberryPI CAR</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> <!-- télécharge jQuery depuis ce lien -->


    <style> /* css */ /* cause : firefox ne reconnait pas le css des boutons dans le stylesheet */
html, body{ /* style appliqué aux balise html et body */
	margin:0; /* pas de marge*/
	height:100%; /* hauteur fenêtre complète */
	width:100%; /* largeur fenêtre complète */
	color:black; /* couleur de la police : noire */
	background-image:url(voiture.png); /* image de fond */
	background-repeat: no-repeat; /* image de fond non répétée (pas de mosaïque) */
	background-position: 50%; /* image de fond centrée */
	background-size: contain; /* image de fond forcée dans body */

	overflow:hidden; /* barres de défilements cachées et désactivées */

}

#avant { /* block div avant (distance capteur avant) */
	position: relative; /* position relative à la taille de la fenêtre */
	text-align: center; /* positionnement texte */
	top:5%; /* depuis le bord droit en pourcentage */
	font-size: 200%; /* taille police affichage des distances */
}

#droite{ /* block div droite (distance capteur droit) */
	position: relative;
	left:75%;
	top:65%;
	font-size: 200%; /* taille police affichage des distances */
}

#gauche{ /* block div gauche (distance capteur gauche) */
	position: relative;
	left:20%;
	top:61.5%;
	font-size: 200%; /* taille police affichage des distances */
}

#B_UP{
	position:absolute; /* absolute car chrome ne l'interprete pas en relative */
	top: 0%;
	left: 25%;
	height:50%; /* hauteur du bouton */
	width:50%; /* largeur du bouton */
	opacity:0.25; /* opacité du bouton */
	background-color: rgba(0,0,0,0); /* couleur de fond du bouton */
}
#B_DOWN{
	position:absolute;
	top: 50%;
	left: 25%;
	height:50%;
	width:50%;
	opacity:0.25;
	background-color: rgba(0,0,0,0);
}
#B_RIGHT{
	position:absolute;
	top: 0%;
	left: 75%;
	height:100%;
	width:25%;
	opacity:0.25;
	background-color: rgba(0,0,0,0);
}
#B_LEFT{
	position:absolute;
	top: 0%;
	left: 0%;
	height:100%;
	width:25%;
	opacity:0.25;
	background-color: rgba(0,0,0,0);
}
    </style>
</head>
<body>


<!-- action d'écriture après l'action submit jQuery / actualisation des distances-->	<!-- PHP -->
	
    <?php
    if (isset($_POST["control"])){ /* isset renvoie le booléen correspondant suivant si control est défini (!=NULL) */
    /* Ecriture de l'action a effectuer par la voiture */
        $fp = fopen("/var/www/RaspberryPI/moteur/moteurs.txt","w"); /* Ouverture de moteurs.txt en mode écriture après écrasement du fichier */
        $control = $_POST["control"]; /* variable $control correspond au value de l'input de name = "control" du form envoyé */
        fwrite($fp,$control); /* écriture dans moteurs.txt de la variable $control */
        fclose($fp); /* fermeture du fichier moteurs.txt */
	/* Lecture des distances */
    	$fp = fopen("/var/www/RaspberryPI/capteurs/avant.txt","r");/* Ouverture de avant.txt en mode lecture */
		$read = fgets($fp,6); /* variable $read récupère les caractères situés avant le positionnement 10 du curseur dans le fichier */
        echo "<div id='avant'>"; /* block html div permettant une mise en page en css car id ="avant" spécifique à la mesure avant */
    	echo $read ; /* affichage de la variable sur la page web */
        echo "</div>"; /* fermeture block div */
    	fclose($fp); /* fermeture du fichier avant.txt */
    	$fp = fopen("/var/www/RaspberryPI/capteurs/droite.txt","r");/* Ouverture de droite.txt en mode lecture */
		$read = fgets($fp,6); /* variable $read récupère les caractères situés avant le positionnement 10 du curseur dans le fichier */
        echo "<div id='droite'>"; /* block html div permettant une mise en page en css car id ="droite" spécifique à la mesure droite */
    	echo $read ; /* affichage de la variable sur la page web */
        echo "</div>"; /* fermeture block div */
    	fclose($fp); /* fermeture du fichier droite.txt */
    	$fp = fopen("/var/www/RaspberryPI/capteurs/gauche.txt","r");/* Ouverture de gauche.txt en mode lecture */
		$read = fgets($fp,6); /* variable $read récupère les caractères situés avant le positionnement 10 du curseur dans le fichier */
        echo "<div id='gauche'>"; /* block html div permettant une mise en page en css car id ="gauche" spécifique à la mesure gauche */
    	echo $read ; /* affichage de la variable sur la page web */
        echo "</div>"; /* fermeture block div */
    	fclose($fp); /* fermeture du fichier gauche.txt */
    }
	?>
	
<!-- formulaires moteurs -->
	<form action="" method="post" enctype="multipart/form-data" target="_self" id="form" > <!-- upload fait dans la meme page action="" (php présent), method"post", enctype (pas d'encoding pour les caractères ni les espaces), target (réponse dans la même page) id (css) -->
    </form>

<!-- Boutton directionnel de control mobile -->
	<button class="ui-btn" id="B_UP"></button>
	<button class="ui-btn" id="B_DOWN"></button>
	<button class="ui-btn" id="B_RIGHT"></button>
	<button class="ui-btn" id="B_LEFT"></button>

	<!-- Jquery -->
    <!-- Submit : édite les fichiers de contrôle en envoyant les formulaires -->
	<script>
        jQuery(document).ready(function(){ // lorsque jQuery est chargé sur la page

            // flèches directionnelles

            $(document).keypress(function(touche){ // lorsqu'une touche est enfoncé sur la page

                var enfonce = touche.which || touche.keyCode; // variable enfonce récupère la valeur de la touche suivant la compréhension du navigateur
                
                if(enfonce==38){ // touche flèche directionnelle HAUT test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="UP"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur UP
                    $("#form").submit(); // post form
                    console.log("UP"); // affiche dans la console UP --> fonction keypress fonctionne
                }
                if(enfonce==40){ // touche flèche directionnelle DOWN test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="DOWN"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur DOWN
                    $("#form").submit(); // post form
                    console.log("DOWN"); // affiche dans la console DOWN --> fonction keypress fonctionne
                }
                if(enfonce==39){ // touche flèche directionnelle RIGHT test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="RIGHT"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur RIGHT
                    $("#form").submit(); // post form
                    console.log("RIGHT"); // affiche dans la console RIGHT --> fonction keypress fonctionne
                }
                if(enfonce==37){ // touche flèche directionnelle LEFT test de condition valeur de la touche enfoncé

                    $('#form').html('<input name="control" type="hidden" value="LEFT"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur LEFT
                    $("#form").submit(); // post form
                    console.log("LEFT"); // affiche dans la console LEFT --> fonction keypress fonctionne
                }
            });

            // boutons

			$("#B_UP").click(function(){ // lorsqu'un boutton est cliqué (id="B_UP")
					$('#form').html('<input name="control" type="hidden" value="UP"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur UP
				    $("#form").submit(); // post form "UP"
				    console.log("B_UP"); // affiche dans la console B_UP --> fonction .click fonctionne
			});
			$("#B_DOWN").click(function(){ // lorsqu'un boutton est cliqué (id="B_DOWN")
					$('#form').html('<input name="control" type="hidden" value="DOWN"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur DOWN
				    $("#form").submit(); // post form "DOWN"
				    console.log("B_DOWN"); // affiche dans la console B_DOWN --> fonction .click fonctionne
			});
			$("#B_RIGHT").click(function(){ // lorsqu'un boutton est cliqué (id="B_RIGHT")
					$('#form').html('<input name="control" type="hidden" value="RIGHT"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur RIGHT
				    $("#form").submit(); // post form "RIGHT"
				    console.log("B_RIGHT"); // affiche dans la console B_RIGHT --> fonction .click fonctionne
			});
			$("#B_LEFT").click(function(){ // lorsqu'un boutton est cliqué (id="B_LEFT")
					$('#form').html('<input name="control" type="hidden" value="LEFT"/>'); // insertion html dans le formulaire id="form" d'un champ de nom "control" hidden de valeur LEFT
				    $("#form").submit(); // post form "LEFT"
				    console.log("B_LEFT"); // affiche dans la console B_LEFT --> fonction .click fonctionne
			});
        });
    </script>

</body>
</html>