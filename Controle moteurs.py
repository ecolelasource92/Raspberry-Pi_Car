import RPi.GPIO as gpio
import time
from getkey import getkey, keys

gpio.setmode(gpio.BOARD)

#On demande les GPIO pins connecté
out=int(input("1er moteur GPIO OUT ?"))
out2=int(input("2nd moteur GPIO OUT ?"))

#Configuration des GPIOs
gpio.setup(out, gpio.OUT)
gpio.setup(out2, gpio.OUT)



#Boucle pour le controle des moteur
While True :
    
#Initialisation des commandes
    Avancer= (key==keys.UP)
    Reculer= (key==keys.DOWN)
    Droite= (key==keys.RIGHT)
    Gauche= (key==keys.LEFT)
    
#Utiliser les moteur
    gpio.OUT(out,Droite)
    gpio.OUT(out2,Gauche)

#Nettoyer le courant
    gpio.cleanup()
