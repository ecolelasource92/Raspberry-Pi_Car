#!/usr/bin/python3
# -*- coding: utf-8 -*

import cgi 
import time


# Obtenir l'heure et la date locale
now = time.localtime(time.time())
year, month, day, hour, minute, second, weekday, yearday, daylight = now

print (time.asctime(now)) # Afficher la date en format lisible

print ("%04d-%02d-%02d" % (year, month, day))
print ("%02d:%02d:%02d" % (hour, minute, second))
#print ("Lun", "Mar", "Mer", "Jeu", "Ven", "SAM", "Dim")[weekday], yearday)

form = cgi.FieldStorage()
print("Content-type: text/html; charset=utf-8\n")
print(form.getvalue("name"))

html = """<!DOCTYPE html>
<head>
    <title>Mon programme</title>
    <meta HTTP-EQUIV="Refresh" CONTENT="1">
</head>
"""
print(html)

html = """
<body>
    <h2> Nous sommes le %04d-%02d-%02d , il est  : %02d:%02d:%02d</h2>
</body>
"""
print(html % (year, month, day, hour, minute, second))


#########################################
#***************************************
#########################################
# control des moteurs
html=""" <!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>test en jQUery</title>
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
    <script>
        jQuery(document).ready(function(){
            
            $(document).keypress(function(touche){
        
                var enfonce = touche.which || touche.keyCode;
                if(enfonce==38){
                    console.log("<UP>");
                }
            });
        });
    </script>
</body>
</html>
"""
print(html)

print("</html>")
